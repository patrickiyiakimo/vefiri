<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorApplicationRequest;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function showApplicationForm()
    {
        return view('vendor.apply');
    }

    public function submitApplication(VendorApplicationRequest $request)
    {
        $user = auth()->user();
        
        DB::transaction(function () use ($user, $request) {
            $user->update([
                'role' => 'vendor',
                'vendor_status' => 'pending',
                'store_name' => $request->store_name,
                'store_description' => $request->store_description,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        });

        return redirect()->route('vendor.dashboard')
            ->with('success', 'Your vendor application has been submitted! Admin will review it soon.');
    }

    public function dashboard()
    {
        $user = auth()->user();
        
        // Admin Dashboard
        if ($user->isAdmin()) {
            $pendingVendors = User::where('role', 'vendor')
                ->where('vendor_status', 'pending')
                ->get();
            $totalVendors = User::where('role', 'vendor')->count();
            $totalCustomers = User::where('role', 'customer')->count();
            $totalProducts = Product::count();
            $recentProducts = Product::with('vendor')->latest()->take(10)->get();
            
            return view('admin.dashboard', compact('pendingVendors', 'totalVendors', 'totalCustomers', 'totalProducts', 'recentProducts'));
        }
        
        // Vendor Dashboard
        if ($user->isVendor()) {
            $products = $user->products()->latest()->paginate(10);
            $totalSales = $user->products()->sum('sales_count');
            $totalProducts = $user->products()->count();
            $lowStockProducts = $user->products()->where('stock_quantity', '<=', 10)->count();
            
            return view('vendor.dashboard', compact('products', 'totalSales', 'totalProducts', 'lowStockProducts'));
        }
        
        // Customers don't get a dashboard - redirect to shop
        return redirect('/shop');
    }
}