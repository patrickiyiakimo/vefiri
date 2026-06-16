@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Order Details</h1>
                    <p class="text-gray-600 mt-2">Order #{{ $order->order_number }}</p>
                </div>
                <a href="{{ route('profile') }}#orders" class="text-orange-600 hover:text-orange-700 transition flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Profile
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content - Left Side -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Order Status -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Order Status
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <div class="flex items-center relative">
                                        <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white z-10">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div class="absolute left-5 w-full h-0.5 bg-gray-300"></div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-semibold text-gray-900">Order Placed</p>
                                        <p class="text-xs text-gray-500">{{ $order->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <div class="flex items-center relative">
                                        <div class="w-10 h-10 rounded-full {{ in_array($order->status, ['processing', 'shipped', 'delivered', 'completed']) ? 'bg-green-500' : 'bg-gray-300' }} flex items-center justify-center text-white z-10">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                            </svg>
                                        </div>
                                        <div class="absolute left-5 w-full h-0.5 bg-gray-300"></div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-semibold text-gray-900">Processing</p>
                                        <p class="text-xs text-gray-500">Awaiting confirmation</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <div class="flex items-center relative">
                                        <div class="w-10 h-10 rounded-full {{ in_array($order->status, ['shipped', 'delivered', 'completed']) ? 'bg-green-500' : 'bg-gray-300' }} flex items-center justify-center text-white z-10">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div class="absolute left-5 w-full h-0.5 bg-gray-300"></div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-semibold text-gray-900">Shipped</p>
                                        <p class="text-xs text-gray-500">On its way</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full {{ $order->status === 'delivered' || $order->status === 'completed' ? 'bg-green-500' : 'bg-gray-300' }} flex items-center justify-center text-white z-10">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-semibold text-gray-900">Delivered</p>
                                        <p class="text-xs text-gray-500">Order completed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-sm text-gray-500">Current Status:</span>
                                    <span class="ml-2 px-3 py-1 text-xs rounded-full 
                                        {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : 
                                           ($order->status === 'processing' ? 'bg-blue-100 text-blue-700' : 
                                           ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                                           ($order->status === 'shipped' ? 'bg-purple-100 text-purple-700' : 
                                           ($order->status === 'delivered' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700')))) }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                                <div>
                                    <span class="text-sm text-gray-500">Payment Status:</span>
                                    <span class="ml-2 px-3 py-1 text-xs rounded-full 
                                        {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Items -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Order Items
                        </h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @foreach($order->items as $item)
                        <div class="p-6 hover:bg-gray-50 transition">
                            <div class="flex items-center space-x-4">
                                <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                    @php
                                        $productImages = $item->product->images ?? [];
                                    @endphp
                                    @if(is_array($productImages) && count($productImages) > 0)
                                        <img src="{{ asset('storage/' . $productImages[0]) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900">{{ $item->product->name }}</h3>
                                    <p class="text-sm text-gray-500">Vendor: {{ $item->vendor->store_name ?? $item->vendor->name ?? 'Vefiri' }}</p>
                                    <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-gray-900">₦{{ number_format($item->price, 2) }}</p>
                                    <p class="text-sm text-gray-500">Total: ₦{{ number_format($item->total, 2) }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Payment Information -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                            Payment Information
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Payment Method</p>
                                <p class="font-semibold text-gray-900 capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Payment Status</p>
                                <p class="font-semibold capitalize {{ $order->payment_status === 'paid' ? 'text-green-600' : 'text-yellow-600' }}">
                                    {{ ucfirst($order->payment_status) }}
                                </p>
                            </div>
                            @if(isset($order->payment) && $order->payment && $order->payment->reference)
                            <div class="col-span-2">
                                <p class="text-sm text-gray-500">Transaction Reference</p>
                                <p class="font-mono text-sm text-gray-800">{{ $order->payment->reference }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar - Right Side -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Shipping Information -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden sticky top-24">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Shipping Information
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm text-gray-500">Full Name</p>
                                <p class="font-semibold text-gray-900">
                                    {{ $order->first_name ?? $order->user->name ?? 'N/A' }} 
                                    {{ $order->last_name ?? '' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Email Address</p>
                                <p class="font-semibold text-gray-900">{{ $order->email ?? $order->user->email ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Phone Number</p>
                                <p class="font-semibold text-gray-900">{{ $order->phone ?? $order->user->phone ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Shipping Address</p>
                                <p class="text-gray-900">
                                    @if($order->address)
                                        {{ $order->address }}, 
                                        @if($order->city){{ $order->city }}, @endif
                                        @if($order->state){{ $order->state }} @endif
                                        @if($order->zip_code){{ $order->zip_code }}@endif
                                    @else
                                        {{ $order->shipping_address ?? 'N/A' }}
                                    @endif
                                </p>
                            </div>
                            @if($order->notes)
                            <div>
                                <p class="text-sm text-gray-500">Order Notes</p>
                                <p class="text-gray-900 italic">{{ $order->notes }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Order Summary
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold text-gray-900">₦{{ number_format($order->subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-semibold text-gray-900">₦{{ number_format($order->shipping_cost, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tax (7.5% VAT)</span>
                                <span class="font-semibold text-gray-900">₦{{ number_format($order->tax, 2) }}</span>
                            </div>
                            <div class="border-t border-gray-200 pt-3 mt-3">
                                <div class="flex justify-between">
                                    <span class="text-lg font-bold text-gray-900">Total</span>
                                    <span class="text-xl font-bold text-orange-600">₦{{ number_format($order->total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Help Section -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-blue-800">Need Help?</h4>
                            <p class="text-sm text-blue-700 mt-1">Contact our customer support for any questions about your order.</p>
                            <a href="#" class="inline-block mt-2 text-sm text-blue-800 font-medium hover:underline">Contact Support →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .sticky {
        position: sticky;
        top: 6rem;
    }
</style>
@endsection