@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">My Orders</h1>
                    <p class="text-gray-600 mt-2">View and track all your orders</p>
                </div>
                <a href="{{ route('profile') }}" class="text-orange-600 hover:text-orange-700 transition flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Profile
                </a>
            </div>
        </div>

        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="p-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-900">Order #{{ $order->order_number }}</p>
                                <p class="text-sm text-gray-500">Placed on {{ $order->created_at->format('F j, Y') }}</p>
                            </div>
                            <div class="mt-2 md:mt-0 flex flex-wrap items-center gap-2">
                                <span class="px-3 py-1 text-xs rounded-full 
                                    {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : 
                                       ($order->status === 'processing' ? 'bg-blue-100 text-blue-700' : 
                                       ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                                       ($order->status === 'shipped' ? 'bg-purple-100 text-purple-700' : 
                                       ($order->status === 'delivered' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700')))) }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                                <span class="px-3 py-1 text-xs rounded-full 
                                    {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-100 pt-4">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                                <div class="mb-3 md:mb-0">
                                    <p class="text-sm text-gray-500">Total Amount</p>
                                    <p class="text-2xl font-bold text-orange-600">₦{{ number_format($order->total, 2) }}</p>
                                </div>
                                <div class="mb-3 md:mb-0">
                                    <p class="text-sm text-gray-500">Items</p>
                                    <p class="font-semibold text-gray-900">{{ $order->items->count() }} product(s)</p>
                                </div>
                                <div>
                                    <a href="{{ route('orders.show', $order) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-medium hover:shadow-lg transition">
                                        View Details
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-8">
                {{ $orders->links() }}
            </div>
        @else
            <div class="bg-white rounded-lg shadow-lg p-12 text-center">
                <svg class="w-20 h-20 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No Orders Yet</h3>
                <p class="text-gray-500 mb-6">You haven't placed any orders yet. Start shopping to see your orders here.</p>
                <a href="{{ route('shop') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transition">
                    Start Shopping
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
