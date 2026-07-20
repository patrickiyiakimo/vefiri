@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Order #{{ $order->order_number }}</h1>
                <p class="text-gray-600">Placed on {{ $order->created_at->format('F j, Y') }}</p>
                <!-- Debug: Show current status -->
                <p class="text-sm mt-1">
                    <span class="font-semibold">Current Status:</span>
                    <span class="px-2 py-1 text-xs rounded-full 
                        {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : 
                           ($order->status === 'processing' ? 'bg-blue-100 text-blue-700' : 
                           ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                           ($order->status === 'shipped' ? 'bg-purple-100 text-purple-700' : 
                           ($order->status === 'delivered' ? 'bg-green-100 text-green-700' : 
                           ($order->status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700'))))) }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </p>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="text-orange-600 hover:text-orange-700 transition flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Orders
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Order Status Update -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Update Order Status
                        </h2>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('admin.orders.update-status', $order) }}" method="POST">
                            @csrf
                            <div class="flex flex-col md:flex-row gap-4">
                                <select name="status" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <input type="text" name="notes" placeholder="Add admin note..." class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                <button type="submit" class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition">
                                    Update
                                </button>
                            </div>
                        </form>
                        
                        <!-- Payment Status Update -->
                        <form action="{{ route('admin.orders.update-payment', $order) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="flex flex-col md:flex-row gap-4">
                                <select name="payment_status" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                    <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                                    <option value="refunded" {{ $order->payment_status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                                </select>
                                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                    Update Payment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-900">Order Items</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @foreach($order->items as $item)
                        <div class="p-6 flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                @php
                                    // Handle images properly - Same logic as cart page
                                    $product = $item->product;
                                    $images = $product->images ?? [];
                                    
                                    // If images is a JSON string, decode it
                                    if (is_string($images)) {
                                        $images = json_decode($images, true) ?? [];
                                    }
                                    
                                    // If images is a collection or array, convert to array
                                    if ($images instanceof \Illuminate\Support\Collection) {
                                        $images = $images->toArray();
                                    }
                                    
                                    // Get the first image
                                    $firstImage = null;
                                    if (is_array($images) && count($images) > 0 && !empty($images[0])) {
                                        $firstImage = $images[0];
                                    }
                                    
                                    // Fallback images based on product ID (same as cart page)
                                    $fallbackImages = [
                                        1 => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=200&h=200&fit=crop',
                                        2 => 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=200&h=200&fit=crop',
                                        3 => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=200&h=200&fit=crop',
                                        4 => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=200&h=200&fit=crop',
                                        5 => 'https://images.unsplash.com/photo-1519681393784-d120267933ba?w=200&h=200&fit=crop',
                                        6 => 'https://images.unsplash.com/photo-1546868871-7041f2a55e12?w=200&h=200&fit=crop',
                                        7 => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop',
                                        8 => 'https://images.unsplash.com/photo-1514228742587-6b1558fcca3d?w=200&h=200&fit=crop',
                                        9 => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=200&h=200&fit=crop',
                                        10 => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=200&h=200&fit=crop',
                                        11 => 'https://images.unsplash.com/photo-1580618672591-eb180b1a973f?w=200&h=200&fit=crop',
                                        12 => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=200&h=200&fit=crop',
                                    ];
                                    
                                    $imageUrl = null;
                                    if ($firstImage) {
                                        // Check if it's a full URL (starts with http)
                                        if (filter_var($firstImage, FILTER_VALIDATE_URL)) {
                                            $imageUrl = $firstImage;
                                        } else {
                                            // Try storage path
                                            $storagePath = asset('storage/' . $firstImage);
                                            // Try public path as fallback
                                            $publicPath = asset($firstImage);
                                            
                                            // Use storage path by default
                                            $imageUrl = $storagePath;
                                        }
                                    } elseif (isset($fallbackImages[$product->id])) {
                                        $imageUrl = $fallbackImages[$product->id];
                                    } else {
                                        // Generic fallback image
                                        $imageUrl = 'https://images.unsplash.com/photo-1518834107818-ae3d91a17a95?w=200&h=200&fit=crop';
                                    }
                                @endphp
                                <img src="{{ $imageUrl }}" 
                                     alt="{{ $product->name ?? 'Product' }}" 
                                     class="w-full h-full object-cover"
                                     onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1518834107818-ae3d91a17a95?w=200&h=200&fit=crop';">
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900">{{ $product->name ?? 'Product' }}</h3>
                                <p class="text-sm text-gray-500">Vendor: {{ $item->vendor->store_name ?? $item->vendor->name ?? 'Vefiri' }}</p>
                                <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-gray-900">₦{{ number_format($item->price, 2) }}</p>
                                <p class="text-sm text-gray-500">Total: ₦{{ number_format($item->total, 2) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Customer Information -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                        <h3 class="font-semibold text-gray-900">Customer Information</h3>
                    </div>
                    <div class="p-6 space-y-3">
                        <div>
                            <p class="text-sm text-gray-500">Name</p>
                            <p class="font-medium text-gray-900">
                                {{ $order->user->name ?? '' }} 
                                {{ $order->user->last_name ?? '' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium text-gray-900">{{ $order->user->email ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Phone</p>
                            <p class="font-medium text-gray-900">{{ $order->user->phone ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Shipping Information -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                        <h3 class="font-semibold text-gray-900">Shipping Information</h3>
                    </div>
                    <div class="p-6 space-y-3">
                        <div>
                            <p class="text-sm text-gray-500">Address</p>
                            <p class="font-medium text-gray-900">
                                {{ $order->user->address ?? 'N/A' }}{{ $order->city ? ', ' . $order->city : '' }}{{ $order->state ? ', ' . $order->state : '' }}{{ $order->zip_code ? ' ' . $order->zip_code : '' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Shipping Address</p>
                            <p class="font-medium text-gray-900">{{ $order->shipping_address ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                        <h3 class="font-semibold text-gray-900">Order Summary</h3>
                    </div>
                    <div class="p-6 space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium">₦{{ number_format($order->subtotal ?? 0, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium">₦{{ number_format($order->shipping_cost ?? 0, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax</span>
                            <span class="font-medium">₦{{ number_format($order->tax ?? 0, 2) }}</span>
                        </div>
                        <div class="border-t pt-3 mt-3">
                            <div class="flex justify-between font-bold text-lg">
                                <span>Total</span>
                                <span class="text-orange-600">₦{{ number_format($order->total ?? 0, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Order -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 bg-red-50">
                        <h3 class="font-semibold text-red-600">Danger Zone</h3>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                                Delete Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for handling images -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle any broken images
    document.querySelectorAll('img').forEach(function(img) {
        img.addEventListener('error', function() {
            console.warn('Image failed to load:', this.src);
            this.onerror = null;
            this.src = 'https://images.unsplash.com/photo-1518834107818-ae3d91a17a95?w=200&h=200&fit=crop';
        });
    });
});
</script>
@endsection