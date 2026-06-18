<!-- Featured Products Section -->
<section id="featured-products" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Featured <span class="bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent">Products</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Discover our hand-picked selection of premium products from trusted vendors
            </p>
        </div>
        
        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Product 1: Premium Generator -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative overflow-hidden h-64 bg-gradient-to-br from-gray-900 to-gray-700">
                    <img src="https://images.unsplash.com/photo-1626285861696-9f0bf5a49c6d?w=400&h=400&fit=crop" 
                         alt="Premium Generator" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10 animate-pulse">
                        -25% OFF
                    </div>
                    <div class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                        ⭐ Featured
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Premium Generator 5000W</h3>
                    <p class="text-gray-500 text-sm mb-3">High-performance generator for home and outdoor use</p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-orange-600">₦18,750.00</span>
                            <span class="text-sm text-gray-400 line-through ml-2">₦25,000.00</span>
                        </div>
                        <button onclick="addToCart(1)" 
                            class="add-to-cart-btn bg-gradient-to-r from-orange-500 to-orange-600 text-white p-2 rounded-lg hover:shadow-lg transition transform hover:-translate-y-1"
                            data-product-id="1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 2: Casual T-Shirt -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative overflow-hidden h-64 bg-gradient-to-br from-blue-100 to-blue-200">
                    <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&h=400&fit=crop" 
                         alt="Casual T-Shirt" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                        ⭐ Featured
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Premium Cotton T-Shirt</h3>
                    <p class="text-gray-500 text-sm mb-3">Comfortable 100% cotton shirt, available in multiple colors</p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-orange-600">₦599.00</span>
                            <span class="text-sm text-gray-400 line-through ml-2">₦899.00</span>
                        </div>
                        <button onclick="addToCart(2)" 
                            class="add-to-cart-btn bg-gradient-to-r from-orange-500 to-orange-600 text-white p-2 rounded-lg hover:shadow-lg transition transform hover:-translate-y-1"
                            data-product-id="2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 3: Standing Fan -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative overflow-hidden h-64 bg-gradient-to-br from-gray-100 to-gray-300">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400&h=400&fit=crop" 
                         alt="Standing Fan" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10 animate-pulse">
                        -15% OFF
                    </div>
                    <div class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                        ⭐ Featured
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Electric Standing Fan</h3>
                    <p class="text-gray-500 text-sm mb-3">Energy-saving fan with remote control and 3 speed settings</p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-orange-600">₦2,549.00</span>
                            <span class="text-sm text-gray-400 line-through ml-2">₦2,999.00</span>
                        </div>
                        <button onclick="addToCart(3)" 
                            class="add-to-cart-btn bg-gradient-to-r from-orange-500 to-orange-600 text-white p-2 rounded-lg hover:shadow-lg transition transform hover:-translate-y-1"
                            data-product-id="3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 4: Leather Jacket -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative overflow-hidden h-64 bg-gradient-to-br from-amber-800 to-amber-600">
                    <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400&h=400&fit=crop" 
                         alt="Leather Jacket" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                        ⭐ Featured
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Premium Leather Jacket</h3>
                    <p class="text-gray-500 text-sm mb-3">Genuine leather jacket, perfect for any occasion</p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-orange-600">₦3,999.00</span>
                        </div>
                        <button onclick="addToCart(4)" 
                            class="add-to-cart-btn bg-gradient-to-r from-orange-500 to-orange-600 text-white p-2 rounded-lg hover:shadow-lg transition transform hover:-translate-y-1"
                            data-product-id="4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 5: Wireless Headphones -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative overflow-hidden h-64 bg-gradient-to-br from-gray-800 to-gray-600">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=400&fit=crop" 
                         alt="Wireless Headphones" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10 animate-pulse">
                        -30% OFF
                    </div>
                    <div class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                        ⭐ Featured
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Wireless Headphones</h3>
                    <p class="text-gray-500 text-sm mb-3">Noise-cancelling Bluetooth headphones with 30hr battery</p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-orange-600">₦2,099.00</span>
                            <span class="text-sm text-gray-400 line-through ml-2">₦2,999.00</span>
                        </div>
                        <button onclick="addToCart(5)" 
                            class="add-to-cart-btn bg-gradient-to-r from-orange-500 to-orange-600 text-white p-2 rounded-lg hover:shadow-lg transition transform hover:-translate-y-1"
                            data-product-id="5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 6: Smart Watch -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative overflow-hidden h-64 bg-gradient-to-br from-blue-900 to-blue-700">
                    <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?w=400&h=400&fit=crop" 
                         alt="Smart Watch" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                        ⭐ Featured
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Smart Watch Pro</h3>
                    <p class="text-gray-500 text-sm mb-3">Track your fitness, heart rate, and notifications</p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-orange-600">₦3,499.00</span>
                            <span class="text-sm text-gray-400 line-through ml-2">₦4,999.00</span>
                        </div>
                        <button onclick="addToCart(6)" 
                            class="add-to-cart-btn bg-gradient-to-r from-orange-500 to-orange-600 text-white p-2 rounded-lg hover:shadow-lg transition transform hover:-translate-y-1"
                            data-product-id="6">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 7: Coffee Maker -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative overflow-hidden h-64 bg-gradient-to-br from-amber-700 to-amber-500">
                    <img src="https://images.unsplash.com/photo-1517668808822-9bbb02a47f12?w=400&h=400&fit=crop" 
                         alt="Coffee Maker" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10 animate-pulse">
                        -20% OFF
                    </div>
                    <div class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                        ⭐ Featured
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Automatic Coffee Maker</h3>
                    <p class="text-gray-500 text-sm mb-3">Brew perfect coffee with programmable timer</p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-orange-600">₦3,199.00</span>
                            <span class="text-sm text-gray-400 line-through ml-2">₦3,999.00</span>
                        </div>
                        <button onclick="addToCart(7)" 
                            class="add-to-cart-btn bg-gradient-to-r from-orange-500 to-orange-600 text-white p-2 rounded-lg hover:shadow-lg transition transform hover:-translate-y-1"
                            data-product-id="7">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 8: Backpack -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative overflow-hidden h-64 bg-gradient-to-br from-green-800 to-green-600">
                    <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=400&fit=crop" 
                         alt="Backpack" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                        ⭐ Featured
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Laptop Backpack</h3>
                    <p class="text-gray-500 text-sm mb-3">Water-resistant backpack with USB charging port</p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-orange-600">₦1,299.00</span>
                            <span class="text-sm text-gray-400 line-through ml-2">₦1,999.00</span>
                        </div>
                        <button onclick="addToCart(8)" 
                            class="add-to-cart-btn bg-gradient-to-r from-orange-500 to-orange-600 text-white p-2 rounded-lg hover:shadow-lg transition transform hover:-translate-y-1"
                            data-product-id="8">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- View All Products Button -->
        <div class="text-center mt-12">
            <a href="{{ route('shop') }}" 
               class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transition transform hover:-translate-y-1">
                View All Products
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<script>
    function addToCart(productId) {
        // Get CSRF token from meta tag
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        
        // Check if user is logged in by checking if there's a user element
        const isLoggedIn = document.querySelector('nav .user-menu') !== null || 
                          document.querySelector('nav [x-data]') !== null;
        
        if (!token) {
            showNotification('Please refresh the page and try again.', 'error');
            return;
        }
        
        // Disable the button to prevent multiple clicks
        const buttons = document.querySelectorAll(`.add-to-cart-btn[data-product-id="${productId}"]`);
        buttons.forEach(btn => {
            btn.disabled = true;
            btn.style.opacity = '0.6';
            btn.innerHTML = `
                <svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
            `;
        });
        
        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ 
                product_id: productId, 
                quantity: 1 
            })
        })
        .then(response => {
            if (!response.ok) {
                // If response is 401, user is not authenticated
                if (response.status === 401) {
                    throw new Error('Please login to add items to cart');
                }
                return response.json().then(err => { throw new Error(err.message || 'Something went wrong'); });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                showNotification('✅ Product added to cart!', 'success');
                
                // Update cart count in navbar
                if (window.updateCartCount) {
                    window.updateCartCount(data.cart_count);
                }
                
                // Update local cart count display
                const cartCountElement = document.querySelector('.cart-count');
                if (cartCountElement) {
                    cartCountElement.textContent = data.cart_count;
                    if (data.cart_count > 0) {
                        cartCountElement.style.display = 'flex';
                    }
                }
            } else {
                showNotification(data.message || 'Failed to add item to cart.', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification(error.message || 'Please login to add items to cart', 'error');
        })
        .finally(() => {
            // Re-enable the button
            buttons.forEach(btn => {
                btn.disabled = false;
                btn.style.opacity = '1';
                btn.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                    </svg>
                `;
            });
        });
    }

    function showNotification(message, type) {
        // Remove existing notifications
        document.querySelectorAll('.custom-notification').forEach(el => el.remove());
        
        const notification = document.createElement('div');
        notification.className = `custom-notification fixed top-20 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300 translate-x-full ${
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
</script>

<style>
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .custom-notification {
        z-index: 9999;
    }
    
    .add-to-cart-btn:disabled {
        cursor: not-allowed;
        opacity: 0.6 !important;
    }
    
    .add-to-cart-btn svg.animate-spin {
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>