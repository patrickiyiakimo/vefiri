@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('vendor.dashboard') }}" class="text-orange-600 hover:text-orange-700 transition flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Dashboard
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Edit Product</h1>
                <p class="text-orange-100 mt-1">Update your product information</p>
            </div>
            
            <form action="{{ route('vendor.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Product Name *
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('name') border-red-500 @enderror"
                        placeholder="Enter product name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Category *
                    </label>
                    <select name="category_id" id="category_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('category_id') border-red-500 @enderror">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description *
                    </label>
                    <textarea name="description" id="description" rows="6" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('description') border-red-500 @enderror"
                        placeholder="Describe your product in detail...">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Price and Compare Price -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                            Price (₱) *
                        </label>
                        <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('price') border-red-500 @enderror"
                            placeholder="0.00">
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="compare_price" class="block text-sm font-medium text-gray-700 mb-2">
                            Compare at Price (Optional)
                        </label>
                        <input type="number" step="0.01" name="compare_price" id="compare_price" value="{{ old('compare_price', $product->compare_price) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                            placeholder="0.00">
                        <p class="mt-1 text-xs text-gray-500">Original price to show discount (must be higher than price)</p>
                        @error('compare_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Stock and SKU -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-2">
                            Stock Quantity *
                        </label>
                        <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('stock_quantity') border-red-500 @enderror"
                            placeholder="0">
                        @error('stock_quantity')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="sku" class="block text-sm font-medium text-gray-700 mb-2">
                            SKU (Stock Keeping Unit) *
                        </label>
                        <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('sku') border-red-500 @enderror"
                            placeholder="Unique product code">
                        @error('sku')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
              <!-- Existing Images -->
@if($product->images && count($product->images) > 0)
<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Current Images
    </label>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($product->images as $index => $image)
        <div class="relative group">
            <img src="{{ asset('storage/' . $image) }}" class="w-full h-32 object-cover rounded-lg border border-gray-200">
            <button type="button" onclick="removeImage('{{ $image }}', this)" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 opacity-0 group-hover:opacity-100 transition">
                ×
            </button>
        </div>
        @endforeach
    </div>
</div>
@endif
                
                <!-- New Images -->
                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                        Add New Images
                    </label>
                    <input type="file" name="images[]" id="images" multiple accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                    <div id="image-preview" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4"></div>
                    <p class="mt-1 text-xs text-gray-500">You can select multiple images (JPEG, PNG, JPG, GIF up to 2MB each)</p>
                    @error('images.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Form Actions -->
                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('vendor.dashboard') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:shadow-lg transition">
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Image preview functionality
    document.getElementById('images').addEventListener('change', function(e) {
        const preview = document.getElementById('image-preview');
        preview.innerHTML = '';
        
        const files = Array.from(e.target.files);
        files.forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative';
                div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-32 object-cover rounded-lg border border-gray-200">
                    <button type="button" onclick="this.parentElement.remove()" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600">
                        ×
                    </button>
                `;
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    });
    
    function removeImage(imagePath) {
        if (confirm('Remove this image?')) {
            // Add hidden input to mark image for deletion
            const form = document.querySelector('form');
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'remove_images[]';
            input.value = imagePath;
            form.appendChild(input);
            
            // Remove the image element
            event.target.closest('.relative').remove();
        }
    }
</script>
@endsection