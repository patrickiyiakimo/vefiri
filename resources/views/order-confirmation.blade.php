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
            <p class="text-gray-600 mb-6">Your order has been placed successfully.</p>
            
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
                        <p class="font-semibold text-orange-600">₦{{ number_format($order->total, 2) }}</p>
                    </div>
                </div>
            </div>
            
            @if($order->payment_method === 'bank_transfer')
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6 text-left">
                <h4 class="font-semibold text-blue-800 mb-2">Bank Transfer Details</h4>
                <p class="text-sm text-blue-700">Bank: Vefiri Commerce Bank</p>
                <p class="text-sm text-blue-700">Account Name: Vefiri Marketplace</p>
                <p class="text-sm text-blue-700">Account Number: 1234567890</p>
                <p class="text-sm text-blue-700 mt-2">Please use your order number <strong>{{ $order->order_number }}</strong> as reference when making payment.</p>
                <p class="text-sm text-blue-700 mt-2">After payment, please contact us to confirm your payment.</p>
            </div>
            @elseif($order->payment_method === 'cash_on_delivery')
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6 text-left">
                <h4 class="font-semibold text-yellow-800 mb-2">Cash on Delivery</h4>
                <p class="text-sm text-yellow-700">You have selected Cash on Delivery. Please pay the total amount when your order is delivered.</p>
            </div>
            @endif
            
            <p class="text-gray-500 text-sm mb-6">A confirmation email has been sent to your email address.</p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('orders.show', $order) }}" class="inline-flex items-center justify-center px-6 py-3 bg-gray-800 text-white hover:bg-gray-700 transition">
                    View Order Details
                </a>
                <a href="{{ route('shop') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white hover:shadow-lg transition">
                    Continue Shopping
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection