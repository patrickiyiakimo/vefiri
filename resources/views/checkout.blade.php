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
            $tax = $subtotal * 0.075;
            $total = $subtotal + $shipping + $tax;
            
            // Fallback images for products without images
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
        @endphp

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Checkout Form -->
            <div class="lg:w-2/3">
                <!-- Remove action attribute - JavaScript will handle submission -->
                <form id="checkout-form" method="POST">
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
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
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
                                    <input type="radio" name="payment_method" value="paystack" checked class="h-4 w-4 text-orange-600 focus:ring-orange-500">
                                    <div class="ml-3 flex items-center">
                                        <img src="https://paystack.com/assets/brand/paystack_logo.svg" alt="Paystack" class="h-6 mr-3">
                                        <div>
                                            <span class="font-medium text-gray-900">Pay with Paystack</span>
                                            <p class="text-sm text-gray-500">Card, Bank Transfer, USSD, QR Code</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            
                            <div class="mt-6 bg-gray-50 rounded-lg p-4">
                                <p class="text-sm text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    You will be redirected to Paystack's secure payment page to complete your transaction
                                </p>
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
                            @php
                                // Handle images properly
                                $productImages = $item->product->images ?? [];
                                if (is_string($productImages)) {
                                    $productImages = json_decode($productImages, true) ?? [];
                                }
                                
                                $imageUrl = null;
                                if (is_array($productImages) && count($productImages) > 0 && !empty($productImages[0])) {
                                    $imageUrl = asset('storage/' . $productImages[0]);
                                } elseif (isset($fallbackImages[$item->product->id])) {
                                    $imageUrl = $fallbackImages[$item->product->id];
                                } else {
                                    $imageUrl = 'https://images.unsplash.com/photo-1518834107818-ae3d91a17a95?w=200&h=200&fit=crop';
                                }
                            @endphp
                            <div class="flex items-center space-x-3 mb-4 pb-4 border-b border-gray-100">
                                <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                    <img src="{{ $imageUrl }}" 
                                         alt="{{ $item->product->name }}" 
                                         class="w-full h-full object-cover">
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
                        <button type="button" id="placeOrderBtn" class="w-full mt-6 bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3 hover:shadow-lg transition font-semibold">
                            Proceed to Payment
                        </button>
                        
                        <!-- Security Badges -->
                        <div class="mt-6 text-center">
                            <div class="flex justify-center space-x-4">
                                <img src="https://paystack.com/assets/brand/logo/paystack_logo_white.svg" class="h-6 opacity-50" alt="Paystack">
                            </div>
                            <p class="text-xs text-gray-500 mt-3">Secured by Paystack. Your payment information is encrypted.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Paystack Script -->
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    document.getElementById('placeOrderBtn').addEventListener('click', async function() {
        const form = document.getElementById('checkout-form');
        const formData = new FormData(form);
        
        // Show loading state
        const submitBtn = document.getElementById('placeOrderBtn');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Processing...';
        
        try {
            // First, create order in your backend
            const orderResponse = await fetch('{{ url("/orders/store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    first_name: formData.get('first_name'),
                    last_name: formData.get('last_name'),
                    email: formData.get('email'),
                    phone: formData.get('phone'),
                    address: formData.get('address'),
                    city: formData.get('city'),
                    state: formData.get('state'),
                    zip_code: formData.get('zip_code'),
                    notes: formData.get('notes'),
                    payment_method: 'paystack',
                    total: {{ $total }}
                })
            });
            
            const orderData = await orderResponse.json();
            
            if (!orderData.success) {
                throw new Error(orderData.message || 'Failed to create order');
            }
            
            // Initialize Paystack payment
            const paymentResponse = await fetch('{{ url("/payment/initialize") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    order_id: orderData.order_id,
                    email: formData.get('email'),
                    amount: {{ $total }}
                })
            });
            
            const paymentData = await paymentResponse.json();
            
            if (!paymentData.success) {
                throw new Error(paymentData.message);
            }
            
            // Redirect to Paystack payment page
            window.location.href = paymentData.authorization_url;
            
        } catch (error) {
            alert(error.message);
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });
</script>
@endsection