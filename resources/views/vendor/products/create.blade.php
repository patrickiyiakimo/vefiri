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
                <h1 class="text-2xl font-bold text-white">Add New Product</h1>
                <p class="text-orange-100 mt-1">Fill in the details to add a new product to your store</p>
            </div>
            
            <form action="{{ route('vendor.products.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                
                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Product Name *
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border  rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('name') border-red-500 @enderror"
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
                        class="w-full px-4 py-2 border rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('category_id') border-red-500 @enderror">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                        class="w-full px-4 py-2 border  rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('description') border-red-500 @enderror"
                        placeholder="Describe your product in detail...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Price and Compare Price -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                            Price (₦) *
                        </label>
                        <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required
                            class="w-full px-4 py-2 border  rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('price') border-red-500 @enderror"
                            placeholder="0.00">
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="compare_price" class="block text-sm font-medium text-gray-700 mb-2">
                            Compare at Price (Optional)
                        </label>
                        <input type="number" step="0.01" name="compare_price" id="compare_price" value="{{ old('compare_price') }}"
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
                        <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity') }}" required
                            class="w-full px-4 py-2 border  rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('stock_quantity') border-red-500 @enderror"
                            placeholder="0">
                        @error('stock_quantity')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="sku" class="block text-sm font-medium text-gray-700 mb-2">
                            SKU (Stock Keeping Unit) *
                        </label>
                        <input type="text" name="sku" id="sku" value="{{ old('sku') }}" required
                            class="w-full px-4 py-2 border  rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('sku') border-red-500 @enderror"
                            placeholder="Unique product code">
                        @error('sku')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Product Images -->
                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                        Product Images
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
                        Create Product
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
</script>
@endsection