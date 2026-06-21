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

        @php
            // Get featured products from database
            $featuredProducts = \App\Models\Product::where('is_active', true)
                ->where('is_featured', true)
                ->take(8)
                ->get();

            // If no featured products, use specific IDs
            if ($featuredProducts->count() < 8) {
                $featuredIds = [1, 2, 3, 4, 5, 6, 7, 8];
                $featuredProducts = \App\Models\Product::whereIn('id', $featuredIds)
                    ->where('is_active', true)
                    ->get();
            }
        @endphp

        @if($featuredProducts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden h-64 bg-gradient-to-br from-gray-900 to-gray-700">
                        @php
                            $images = $product->images ?? [];
                            if (is_string($images)) {
                                $images = json_decode($images, true) ?? [];
                            }
                        @endphp
                        
                        @if(is_array($images) && count($images) > 0 && !empty($images[0]))
                            <img src="{{ asset('storage/' . $images[0]) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        @else
                            <!-- Fallback images based on product ID -->
                            @php
                                $fallbackImages = [
                                    1 => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&h=400&fit=crop', // Classic White T-Shirt
                                    2 => 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=400&h=400&fit=crop', // Slim Fit Jeans
                                    3 => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400&h=400&fit=crop', // Leather Jacket
                                    4 => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=400&fit=crop', // Running Shoes
                                    5 => 'https://images.unsplash.com/photo-1519681393784-d120267933ba?w=400&h=400&fit=crop', // Wool Scarf
                                    6 => 'https://images.unsplash.com/photo-1546868871-7041f2a55e12?w=400&h=400&fit=crop', // Smart Watch
                                    7 => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=400&fit=crop', // Wireless Headphones
                                    8 => 'https://images.unsplash.com/photo-1514228742587-6b1558fcca3d?w=400&h=400&fit=crop', // Coffee Mug Set
                                    9 => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=400&h=400&fit=crop', // Yoga Mat
                                    10 => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=400&fit=crop', // Backpack
                                    11 => 'https://images.unsplash.com/photo-1580618672591-eb180b1a973f?w=400&h=400&fit=crop', // Cutton Wigs
                                    12 => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&h=400&fit=crop', // T-Shirts
                                ];
                            @endphp
                            <img src="{{ $fallbackImages[$product->id] ?? 'https://images.unsplash.com/photo-1518834107818-ae3d91a17a95?w=400&h=400&fit=crop' }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        @endif
                        
                        @if($product->compare_price && $product->compare_price > $product->price)
                        <div class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10 animate-pulse">
                            -{{ round((($product->compare_price - $product->price) / $product->compare_price) * 100) }}% OFF
                        </div>
                        @endif
                        <div class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                            ⭐ Featured
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-500 text-sm mb-3 line-clamp-2">{{ Str::limit($product->description ?? 'Premium product from trusted vendor', 60) }}</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-orange-600">₦{{ number_format($product->price, 2) }}</span>
                                @if($product->compare_price && $product->compare_price > $product->price)
                                    <span class="text-sm text-gray-400 line-through ml-2">₦{{ number_format($product->compare_price, 2) }}</span>
                                @endif
                            </div>
                            <button onclick="addToCart({{ $product->id }})" 
                                class="add-to-cart-btn bg-gradient-to-r from-orange-500 to-orange-600 text-white p-2 rounded-lg hover:shadow-lg transition transform hover:-translate-y-1"
                                data-product-id="{{ $product->id }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 text-gray-500">
                <p>No featured products available at the moment.</p>
            </div>
        @endif
        
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
                if (response.status === 401) {
                    throw new Error('Please login to add items to cart');
                }
                return response.json().then(err => { throw new Error(err.message || 'Something went wrong'); });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                showNotification('✓ Product added to cart!', 'success');
                
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
    
    .cart-notification {
        z-index: 9999 !important;
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