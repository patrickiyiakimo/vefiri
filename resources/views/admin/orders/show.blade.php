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
                                    $productImages = $item->product->images ?? [];
                                @endphp
                                @if(is_array($productImages) && count($productImages) > 0)
                                    <img src="{{ asset('storage/' . $productImages[0]) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900">{{ $item->product->name }}</h3>
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
                            <p class="font-medium text-gray-900">  {{  $order->user->name  }} 
                                    {{ $order->user->last_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium text-gray-900">{{ $order->user->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Phone</p>
                            <p class="font-medium text-gray-900">{{ $order->user->phone }}</p>
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
                            <p class="font-medium text-gray-900">{{ $order->address }}, {{ $order->city }}, {{ $order->state }} {{ $order->zip_code }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Shipping Address</p>
                            <p class="font-medium text-gray-900">{{ $order->shipping_address }}</p>
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
                            <span class="font-medium">₦{{ number_format($order->subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium">₦{{ number_format($order->shipping_cost, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax</span>
                            <span class="font-medium">₦{{ number_format($order->tax, 2) }}</span>
                        </div>
                        <div class="border-t pt-3 mt-3">
                            <div class="flex justify-between font-bold text-lg">
                                <span>Total</span>
                                <span class="text-orange-600">₦{{ number_format($order->total, 2) }}</span>
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
@endsection