@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Shopping Cart</h1>
        
        @php
            $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
            $cartItems = $cart ? $cart->items()->with('product')->get() : collect();
            $total = 0;
        @endphp
        
        @if($cartItems->count() > 0)
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cart Items -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="hidden md:grid md:grid-cols-12 gap-4 p-4 bg-gray-50 border-b border-gray-200 text-sm font-medium text-gray-700">
                            <div class="md:col-span-6">Product</div>
                            <div class="md:col-span-2 text-center">Price</div>
                            <div class="md:col-span-2 text-center">Quantity</div>
                            <div class="md:col-span-2 text-center">Total</div>
                        </div>
                        
                        <div class="divide-y divide-gray-200" id="cart-items-container">
                            @foreach($cartItems as $item)
                                @php
                                    $product = $item->product;
                                    $subtotal = $product->price * $item->quantity;
                                    $total += $subtotal;
                                    
                                    // Handle images properly
                                    $images = $product->images ?? [];
                                    if (is_string($images)) {
                                        $images = json_decode($images, true) ?? [];
                                    }
                                    
                                    // Fallback images based on product ID
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
                                    if (is_array($images) && count($images) > 0 && !empty($images[0])) {
                                        $imageUrl = asset('storage/' . $images[0]);
                                    } elseif (isset($fallbackImages[$product->id])) {
                                        $imageUrl = $fallbackImages[$product->id];
                                    } else {
                                        $imageUrl = 'https://images.unsplash.com/photo-1518834107818-ae3d91a17a95?w=200&h=200&fit=crop';
                                    }
                                @endphp
                                <div class="p-4 cart-item" data-item-id="{{ $item->id }}" data-price="{{ $product->price }}">
                                    <div class="flex flex-col md:grid md:grid-cols-12 gap-4 items-center">
                                        <!-- Product Info -->
                                        <div class="md:col-span-6 flex items-center space-x-4 w-full">
                                            <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden flex-shrink-0">
                                                <img src="{{ $imageUrl }}" 
                                                     alt="{{ $product->name }}" 
                                                     class="w-full h-full object-cover">
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="font-semibold text-gray-900">{{ $product->name }}</h3>
                                                <!-- <p class="text-sm text-gray-500">{{ $product->sku ?? 'SKU-' . $product->id }}</p> -->
                                                <button onclick="removeFromCart({{ $item->id }})" class="mt-2 text-sm text-red-600 hover:text-red-700 transition flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <!-- Price -->
                                        <div class="md:col-span-2 text-center">
                                            <span class="text-gray-900 font-medium item-price">₦{{ number_format($product->price, 2) }}</span>
                                        </div>
                                        
                                        <!-- Quantity -->
                                        <div class="md:col-span-2">
                                            <div class="flex items-center justify-center space-x-2">
                                                <button onclick="updateQuantity({{ $item->id }}, 'decrement')" 
                                                        class="quantity-btn w-8 h-8 bg-gray-100 rounded-full hover:bg-gray-200 transition flex items-center justify-center"
                                                        data-item-id="{{ $item->id }}">
                                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                    </svg>
                                                </button>
                                                <input type="number" 
                                                       class="quantity-input w-16 text-center border rounded-lg py-1 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                                       data-item-id="{{ $item->id }}"
                                                       value="{{ $item->quantity }}"
                                                       min="1"
                                                       max="99"
                                                       onchange="updateQuantityFromInput({{ $item->id }}, this)">
                                                <button onclick="updateQuantity({{ $item->id }}, 'increment')" 
                                                        class="quantity-btn w-8 h-8 bg-gray-100 rounded-full hover:bg-gray-200 transition flex items-center justify-center"
                                                        data-item-id="{{ $item->id }}">
                                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <!-- Total -->
                                        <div class="md:col-span-2 text-center">
                                            <span class="item-subtotal-{{ $item->id }} text-lg font-bold text-orange-600">₦{{ number_format($subtotal, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Continue Shopping Link -->
                        <div class="p-4 bg-gray-50 border-t border-gray-200">
                            <a href="{{ route('shop') }}" class="text-orange-600 hover:text-orange-700 transition flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-lg shadow-lg p-6 sticky top-24">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Order Summary</h2>
                        
                        <div class="space-y-3 border-b border-gray-200 pb-4">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span id="cart-subtotal">₦{{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Shipping</span>
                                <span id="cart-shipping">Calculated at checkout</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Tax</span>
                                <span id="cart-tax">
                                    Calculated at checkout
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex justify-between text-lg font-bold text-gray-900 mt-4 pb-4 border-b border-gray-200">
                            <span>Total</span>
                            <span id="cart-total">₦{{ number_format($total, 2) }}</span>
                        </div>
                        
                        <div class="mt-6 space-y-3">
                            <button onclick="proceedToCheckout()" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3 hover:shadow-lg transition font-semibold">
                                Proceed to Checkout
                            </button>
                            
                            <button onclick="clearCart()" class="w-full bg-gray-100 text-gray-700 py-3  hover:bg-gray-200 transition font-medium">
                                Clear Cart
                            </button>
                        </div>
                        
                        <!-- Payment Methods -->
                        <div class="mt-6 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-500 text-center mb-3">Secure payment methods</p>
                            <div class="flex justify-center space-x-4">
                                <svg class="h-8 w-auto" viewBox="0 0 24 24" fill="#1a1f71">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 13c-2.33 0-4.31-1.46-5.11-3.5h10.22c-.8 2.04-2.78 3.5-5.11 3.5z"/>
                                </svg>
                                <svg class="h-8 w-auto" viewBox="0 0 24 24" fill="#ff5f00">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 13c-2.33 0-4.31-1.46-5.11-3.5h10.22c-.8 2.04-2.78 3.5-5.11 3.5z"/>
                                </svg>
                                <svg class="h-8 w-auto" viewBox="0 0 24 24" fill="#0066cc">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 13c-2.33 0-4.31-1.46-5.11-3.5h10.22c-.8 2.04-2.78 3.5-5.11 3.5z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart -->
            <div class="bg-white rounded-lg shadow-lg p-12 text-center">
                <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                </svg>
                <h2 class="text-2xl font-bold text-gray-700 mb-2">Your cart is empty</h2>
                <p class="text-gray-500 mb-6">Looks like you haven't added any items to your cart yet.</p>
                <a href="{{ route('shop') }}" class="inline-block bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transition">
                    Start Shopping
                </a>
            </div>
        @endif
    </div>
</div>

<script>
    // Track pending updates
    const pendingUpdates = new Map();
    const itemQuantities = new Map();

    // Initialize quantities from the DOM
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.cart-item').forEach(item => {
            const itemId = parseInt(item.dataset.itemId);
            const input = item.querySelector('.quantity-input');
            if (input) {
                itemQuantities.set(itemId, parseInt(input.value));
            }
        });
    });

    function updateQuantity(itemId, action) {
        const input = document.querySelector(`.quantity-input[data-item-id="${itemId}"]`);
        if (!input) return;

        let currentValue = parseInt(input.value) || 1;
        let newQuantity;

        if (action === 'increment') {
            newQuantity = currentValue + 1;
        } else if (action === 'decrement') {
            newQuantity = currentValue - 1;
        } else {
            return;
        }

        if (newQuantity < 1) {
            removeFromCart(itemId);
            return;
        }

        // Update UI immediately (optimistic update)
        updateUI(itemId, newQuantity);
        
        // Sync with server
        syncWithServer(itemId, newQuantity);
    }

    function updateQuantityFromInput(itemId, input) {
        let newQuantity = parseInt(input.value) || 1;
        
        if (newQuantity < 1) {
            newQuantity = 1;
            input.value = 1;
        }
        
        if (newQuantity > 99) {
            newQuantity = 99;
            input.value = 99;
        }

        // Update UI immediately
        updateUI(itemId, newQuantity);
        
        // Sync with server
        syncWithServer(itemId, newQuantity);
    }

    function updateUI(itemId, newQuantity) {
        // Update input value
        const input = document.querySelector(`.quantity-input[data-item-id="${itemId}"]`);
        if (input) {
            input.value = newQuantity;
        }

        // Update subtotal
        const item = document.querySelector(`.cart-item[data-item-id="${itemId}"]`);
        if (item) {
            const priceText = item.querySelector('.item-price').innerText;
            const price = parseFloat(priceText.replace(/[₦,]/g, ''));
            const newSubtotal = price * newQuantity;
            const subtotalEl = document.querySelector(`.item-subtotal-${itemId}`);
            if (subtotalEl) {
                subtotalEl.innerText = formatPrice(newSubtotal);
            }
        }

        // Store the new quantity
        itemQuantities.set(itemId, newQuantity);

        // Update totals
        updateCartTotals();
    }

    function syncWithServer(itemId, newQuantity) {
        // Cancel any pending update for this item
        if (pendingUpdates.has(itemId)) {
            clearTimeout(pendingUpdates.get(itemId));
        }

        // Debounce the server update (wait 300ms after last change)
        const timeoutId = setTimeout(() => {
            fetch('/cart/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ 
                    item_id: itemId, 
                    quantity: newQuantity 
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Update cart count in navbar
                    if (window.updateCartCount) {
                        window.updateCartCount(data.cart_count);
                    }
                    
                    // Show success notification (only if not a rapid succession)
                    if (!pendingUpdates.has(itemId)) {
                        showNotification('Cart updated successfully!', 'success');
                    }
                } else {
                    // Rollback on error
                    rollbackItem(itemId);
                    showNotification('Error updating cart: ' + (data.message || 'Unknown error'), 'error');
                }
            })
            .catch(error => {
                console.error('Error syncing with server:', error);
                rollbackItem(itemId);
                showNotification('Network error. Please try again.', 'error');
            })
            .finally(() => {
                pendingUpdates.delete(itemId);
            });
        }, 300);

        pendingUpdates.set(itemId, timeoutId);
    }

    function rollbackItem(itemId) {
        const originalQuantity = itemQuantities.get(itemId) || 1;
        
        // Revert UI to original quantity
        const input = document.querySelector(`.quantity-input[data-item-id="${itemId}"]`);
        if (input) {
            input.value = originalQuantity;
        }

        // Revert subtotal
        const item = document.querySelector(`.cart-item[data-item-id="${itemId}"]`);
        if (item) {
            const priceText = item.querySelector('.item-price').innerText;
            const price = parseFloat(priceText.replace(/[₦,]/g, ''));
            const newSubtotal = price * originalQuantity;
            const subtotalEl = document.querySelector(`.item-subtotal-${itemId}`);
            if (subtotalEl) {
                subtotalEl.innerText = formatPrice(newSubtotal);
            }
        }

        // Update totals
        updateCartTotals();
    }

    function removeFromCart(itemId) {
        if (!confirm('Are you sure you want to remove this item?')) return;

        // Optimistic removal
        const itemElement = document.querySelector(`.cart-item[data-item-id="${itemId}"]`);
        if (itemElement) {
            itemElement.style.transition = 'all 0.3s ease';
            itemElement.style.opacity = '0';
            itemElement.style.transform = 'translateX(50px)';
        }

        // Remove from local cache
        itemQuantities.delete(itemId);

        fetch('/cart/remove', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ item_id: itemId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                setTimeout(() => {
                    if (itemElement) {
                        itemElement.remove();
                    }
                    
                    // Update cart totals
                    updateCartTotals();
                    
                    // Update cart count in navbar
                    if (window.updateCartCount) {
                        window.updateCartCount(data.cart_count);
                    }
                    
                    showNotification('Item removed from cart!', 'success');
                    
                    // Check if cart is empty
                    const remainingItems = document.querySelectorAll('.cart-item').length;
                    if (remainingItems === 0) {
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    }
                }, 300);
            } else {
                // Restore the item if removal failed
                if (itemElement) {
                    itemElement.style.opacity = '1';
                    itemElement.style.transform = 'translateX(0)';
                }
                showNotification('Error removing item', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Restore the item if removal failed
            if (itemElement) {
                itemElement.style.opacity = '1';
                itemElement.style.transform = 'translateX(0)';
            }
            showNotification('Error removing item', 'error');
        });
    }
    
    function clearCart() {
        if (confirm('Are you sure you want to clear your entire cart?')) {
            fetch('/cart/clear', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error clearing cart', 'error');
            });
        }
    }
    
    function updateCartTotals() {
        let subtotal = 0;
        
        document.querySelectorAll('.cart-item').forEach(item => {
            const priceText = item.querySelector('.item-price').innerText;
            const price = parseFloat(priceText.replace(/[₦,]/g, ''));
            const quantityInput = item.querySelector('.quantity-input');
            const quantity = parseInt(quantityInput ? quantityInput.value : 1);
            subtotal += price * quantity;
        });

        document.getElementById('cart-subtotal').innerText = formatPrice(subtotal);
        document.getElementById('cart-total').innerText = formatPrice(subtotal);
    }
    
    function proceedToCheckout() {
        window.location.href = '/checkout';
    }
    
    function formatPrice(price) {
        return '₦' + parseFloat(price).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    
    function showNotification(message, type) {
        // Remove existing notifications
        document.querySelectorAll('.cart-notification').forEach(el => el.remove());
        
        const notification = document.createElement('div');
        notification.className = `cart-notification fixed top-20 right-4 z-[9999] px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300 translate-x-full ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        }`;
        notification.style.minWidth = '250px';
        notification.style.maxWidth = '400px';
        notification.innerHTML = message;
        document.body.appendChild(notification);
        
        // Trigger slide in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        // Slide out and remove
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 300);
        }, 3000);
    }

    // Keyboard support for quantity inputs
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            const target = e.target;
            if (target.classList.contains('quantity-input')) {
                const itemId = parseInt(target.dataset.itemId);
                updateQuantityFromInput(itemId, target);
            }
        }
    });
</script>

<style>
    .cart-notification {
        z-index: 9999 !important;
    }
    
    .quantity-input::-webkit-inner-spin-button,
    .quantity-input::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    .quantity-input {
        -moz-appearance: textfield;
    }
    
    .quantity-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>
@endsection