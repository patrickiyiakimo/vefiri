<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('vendor.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'compare_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'sku' => 'required|string|unique:products,sku',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();
        $product->vendor_id = auth()->id();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name) . '-' . uniqid();
        $product->description = $request->description;
        $product->price = $request->price;
        $product->compare_price = $request->compare_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->sku = $request->sku;
        
        // Handle image uploads
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                // Store in public disk
                $path = $image->store('products', 'public');
                $images[] = $path;
            }
            $product->images = json_encode($images);
        }
        
        $product->save();

        return redirect()->route('vendor.dashboard')
            ->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        // Ensure vendor owns this product
        if ($product->vendor_id !== auth()->id()) {
            abort(403);
        }
        
        $categories = Category::where('is_active', true)->get();
        return view('vendor.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->vendor_id !== auth()->id()) {
            abort(403);
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'compare_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'sku' => 'required|string|unique:products,sku,' . $product->id,
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->compare_price = $request->compare_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->sku = $request->sku;
        
        // Handle image removal
        if ($request->has('remove_images')) {
            $currentImages = json_decode($product->images, true) ?? [];
            $removeImages = $request->remove_images;
            
            foreach ($removeImages as $removeImage) {
                // Delete from storage
                Storage::disk('public')->delete($removeImage);
                // Remove from array
                $key = array_search($removeImage, $currentImages);
                if ($key !== false) {
                    unset($currentImages[$key]);
                }
            }
            $product->images = json_encode(array_values($currentImages));
        }
        
        // Handle new image uploads
        if ($request->hasFile('images')) {
            $currentImages = json_decode($product->images, true) ?? [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $currentImages[] = $path;
            }
            $product->images = json_encode($currentImages);
        }
        
        $product->save();

        return redirect()->route('vendor.dashboard')
            ->with('success', 'Product updated successfully!');
    }
}