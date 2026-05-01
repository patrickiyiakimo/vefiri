@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Vendor Dashboard</h1>
                <p class="text-gray-600 mt-2">Welcome back, {{ Auth::user()->name }}!</p>
            </div>
            <a href="{{ route('vendor.products.create') }}" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-2 rounded-lg hover:shadow-lg transition">
                + Add New Product
            </a>
        </div>
        
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-orange-100 rounded-full">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Products</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalProducts ?? 0 }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Sales</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalSales ?? 0 }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Low Stock Items</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $lowStockProducts ?? 0 }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Store Status</p>
                        <p class="text-2xl font-semibold text-green-600">Active</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Products List -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Your Products</h2>
            </div>
            
            @if(isset($products) && $products->count() > 0)
                <div class="divide-y divide-gray-200">
                    @foreach($products as $product)
                    <div class="p-6 hover:bg-gray-50">
                        <div class="flex justify-between items-center">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-500">SKU: {{ $product->sku }} | Stock: {{ $product->stock_quantity }} units</p>
                                <p class="text-sm text-gray-500">Price: ₱{{ number_format($product->price, 2) }}</p>
                                <p class="text-sm text-gray-500">Sales: {{ $product->sales_count }} units sold</p>
                            </div>
                            <div class="flex space-x-3">
                                <a href="{{ route('vendor.products.edit', $product) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-sm">
                                    Edit
                                </a>
                                <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition text-sm" onclick="deleteProduct({{ $product->id }})">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="px-6 py-4">
                    {{ $products->links() }}
                </div>
            @else
                <div class="p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <p class="text-gray-500">You haven't added any products yet.</p>
                    <a href="{{ route('vendor.products.create') }}" class="inline-block mt-4 text-orange-600 hover:text-orange-700 transition">
                        Add Your First Product →
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
function deleteProduct(productId) {
    if (confirm('Are you sure you want to delete this product?')) {
        // Implement delete functionality
        alert('Delete functionality will be implemented soon');
    }
}
</script>
@endsection