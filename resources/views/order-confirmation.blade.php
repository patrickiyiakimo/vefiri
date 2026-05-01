@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Order Confirmed!</h1>
            <p class="text-gray-600 mb-6">Thank you for your purchase. Your order has been received.</p>
            
            <div class="border-t border-b border-gray-200 py-4 mb-6">
                <div class="grid grid-cols-2 gap-4 text-left">
                    <div>
                        <p class="text-sm text-gray-500">Order Number</p>
                        <p class="font-semibold text-gray-900">{{ $order->order_number }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Order Date</p>
                        <p class="font-semibold text-gray-900">{{ $order->created_at->format('F j, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Payment Method</p>
                        <p class="font-semibold text-gray-900 capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Amount</p>
                        <p class="font-semibold text-orange-600">₱{{ number_format($order->total, 2) }}</p>
                    </div>
                </div>
            </div>
            
            <a href="{{ route('shop') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:shadow-lg transition">
                Continue Shopping
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection