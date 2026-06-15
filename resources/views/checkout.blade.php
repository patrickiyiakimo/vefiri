@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Checkout</h1>
            <p class="text-gray-600 mt-2">Complete your order securely</p>
        </div>

        @php
            $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
            $cartItems = $cart ? $cart->items()->with('product')->get() : collect();
            $subtotal = 0;
            foreach ($cartItems as $item) {
                $subtotal += $item->product->price * $item->quantity;
            }
            $shipping = $subtotal > 50000 ? 0 : 3000;
            $tax = $subtotal * 0.075; // 7.5% VAT
            $total = $subtotal + $shipping + $tax;
        @endphp

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Checkout Form -->
            <div class="lg:w-2/3">
                <form id="checkout-form" action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    
                    <!-- Shipping Information -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                            <h2 class="text-xl font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Shipping Information
                            </h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', explode(' ', auth()->user()->name)[0] ?? '') }}" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                </div>
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', explode(' ', auth()->user()->name)[1] ?? '') }}" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                </div>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                            </div>
                            
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Street Address *</label>
                                <input type="text" name="address" id="address" value="{{ old('address', auth()->user()->address) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                                    placeholder="House number and street name">
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                                    <input type="text" name="city" id="city" value="{{ old('city') }}" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                </div>
                                <div>
                                    <label for="state" class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                                    <input type="text" name="state" id="state" value="{{ old('state') }}" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                </div>
                                <div>
                                    <label for="zip_code" class="block text-sm font-medium text-gray-700 mb-2">ZIP Code *</label>
                                    <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Method -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                            <h2 class="text-xl font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                Payment Method
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="space-y-3">
                                <label class="flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                    <input type="radio" name="payment_method" value="card" checked class="h-4 w-4 text-orange-600 focus:ring-orange-500">
                                    <div class="ml-3 flex items-center">
                                        <svg class="w-8 h-8 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                        </svg>
                                        <div>
                                            <span class="font-medium text-gray-900">Credit / Debit Card</span>
                                            <p class="text-sm text-gray-500">Pay securely with your card</p>
                                        </div>
                                    </div>
                                </label>
                                
                                <label class="flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                    <input type="radio" name="payment_method" value="bank_transfer" class="h-4 w-4 text-orange-600 focus:ring-orange-500">
                                    <div class="ml-3 flex items-center">
                                        <svg class="w-8 h-8 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                        </svg>
                                        <div>
                                            <span class="font-medium text-gray-900">Bank Transfer</span>
                                            <p class="text-sm text-gray-500">Pay via bank transfer</p>
                                        </div>
                                    </div>
                                </label>
                                
                                <label class="flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                    <input type="radio" name="payment_method" value="cash_on_delivery" class="h-4 w-4 text-orange-600 focus:ring-orange-500">
                                    <div class="ml-3 flex items-center">
                                        <svg class="w-8 h-8 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm0 0v4"></path>
                                        </svg>
                                        <div>
                                            <span class="font-medium text-gray-900">Cash on Delivery</span>
                                            <p class="text-sm text-gray-500">Pay when you receive the order</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- Card Details (shown when card is selected) -->
                            <div id="card-details" class="mt-6 space-y-4">
                                <div>
                                    <label for="card_number" class="block text-sm font-medium text-gray-700 mb-2">Card Number</label>
                                    <input type="text" name="card_number" id="card_number" placeholder="1234 5678 9012 3456"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="expiry_date" class="block text-sm font-medium text-gray-700 mb-2">Expiry Date</label>
                                        <input type="text" name="expiry_date" id="expiry_date" placeholder="MM/YY"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                    </div>
                                    <div>
                                        <label for="cvv" class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                                        <input type="text" name="cvv" id="cvv" placeholder="123"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Bank Transfer Details -->
                            <div id="bank-details" class="mt-6 hidden">
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                    <h4 class="font-semibold text-blue-800 mb-2">Bank Transfer Information</h4>
                                    <p class="text-sm text-blue-700">Bank: Vefiri Commerce Bank</p>
                                    <p class="text-sm text-blue-700">Account Name: Vefiri Marketplace</p>
                                    <p class="text-sm text-blue-700">Account Number: 1234567890</p>
                                    <p class="text-sm text-blue-700 mt-2">Please use your order number as reference when making payment.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Notes -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                            <h2 class="text-xl font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Order Notes (Optional)
                            </h2>
                        </div>
                        <div class="p-6">
                            <textarea name="notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500" placeholder="Any special instructions for delivery?"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Order Summary -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-lg shadow-lg sticky top-24">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4 rounded-t-lg">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Order Summary
                        </h2>
                    </div>
                    
                    <div class="p-6">
                        <!-- Cart Items -->
                        <div class="max-h-80 overflow-y-auto mb-4">
                            @foreach($cartItems as $item)
                            <div class="flex items-center space-x-3 mb-4 pb-4 border-b border-gray-100">
                                <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                    @php
                                        // Images are already cast as array in the Product model
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
                                    <h4 class="font-medium text-gray-900 text-sm">{{ Str::limit($item->product->name, 40) }}</h4>
                                    <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                </div>
                                <div class="text-right">
                                    <span class="font-semibold text-gray-900">₦{{ number_format($item->product->price * $item->quantity, 2) }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Price Breakdown -->
                        <div class="space-y-3 border-t border-gray-200 pt-4">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span>₦{{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Shipping</span>
                                <span>@if($shipping == 0) <span class="text-green-600">Free</span> @else ₦{{ number_format($shipping, 2) }} @endif</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Tax (7.5% VAT)</span>
                                <span>₦{{ number_format($tax, 2) }}</span>
                            </div>
                            <div class="border-t border-gray-200 pt-3 mt-3">
                                <div class="flex justify-between text-lg font-bold text-gray-900">
                                    <span>Total</span>
                                    <span class="text-orange-600">₦{{ number_format($total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Place Order Button -->
                        <button type="submit" form="checkout-form" class="w-full mt-6 bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3  hover:shadow-lg transition font-semibold">
                            Place Order
                        </button>
                        
                        <!-- Security Badges -->
                        <div class="mt-6 text-center">
                            <div class="flex justify-center space-x-4">
                                <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 13c-2.33 0-4.31-1.46-5.11-3.5h10.22c-.8 2.04-2.78 3.5-5.11 3.5z"/>
                                </svg>
                                <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 13c-2.33 0-4.31-1.46-5.11-3.5h10.22c-.8 2.04-2.78 3.5-5.11 3.5z"/>
                                </svg>
                                <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 13c-2.33 0-4.31-1.46-5.11-3.5h10.22c-.8 2.04-2.78 3.5-5.11 3.5z"/>
                                </svg>
                            </div>
                            <p class="text-xs text-gray-500 mt-3">Your payment information is secure and encrypted</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle payment method details
    const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
    const cardDetails = document.getElementById('card-details');
    const bankDetails = document.getElementById('bank-details');
    
    paymentRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'card') {
                cardDetails.classList.remove('hidden');
                bankDetails.classList.add('hidden');
            } else if (this.value === 'bank_transfer') {
                cardDetails.classList.add('hidden');
                bankDetails.classList.remove('hidden');
            } else {
                cardDetails.classList.add('hidden');
                bankDetails.classList.add('hidden');
            }
        });
    });
    
    // Format card number
    const cardNumberInput = document.getElementById('card_number');
    if (cardNumberInput) {
        cardNumberInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(\d{4})/g, '$1 ').trim();
            e.target.value = value;
        });
    }
    
    // Format expiry date
    const expiryInput = document.getElementById('expiry_date');
    if (expiryInput) {
        expiryInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4);
            }
            e.target.value = value;
        });
    }
    
    // Format CVV
    const cvvInput = document.getElementById('cvv');
    if (cvvInput) {
        cvvInput.addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '').slice(0, 3);
        });
    }
</script>
@endsection