@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen">

<section class="relative bg-gradient-to-r from-orange-500 to-orange-600 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate-fade-in">
                Shop Our <span class="text-orange-200">Collection</span>
            </h1>
            <p class="text-xl md:text-2xl text-orange-100 mb-4 animate-fade-in-up">
                Discover amazing products from our trusted vendors
            </p>
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg class="w-full h-12 text-white" preserveAspectRatio="none" viewBox="0 0 1440 54">
            <path fill="currentColor" d="M0 22L120 16.7C240 11 480 0 720 0C960 0 1200 11 1320 16.7L1440 22V54H0V22Z"/>
        </svg>
    </div>
</section>
    <!-- Hero Banner -->
    <!-- <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Shop Our Collection</h1>
            <p class="text-lg md:text-xl text-orange-100">Discover amazing products from our trusted vendors</p>
        </div>
    </div> -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-lg shadow-lg sticky top-24">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Filters
                        </h2>
                    </div>

                    <div class="p-6 border-b border-gray-200">
                        <h3 class="font-medium text-gray-900 mb-4">Categories</h3>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="category" value="all" class="category-filter h-4 w-4 text-orange-600 focus:ring-orange-500" checked>
                                <span class="ml-3 text-sm text-gray-700">All Categories</span>
                                <span class="ml-auto text-xs text-gray-500" id="all-count">0</span>
                            </label>
                            @foreach($categories as $category)
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="category" value="{{ $category->id }}" class="category-filter h-4 w-4 text-orange-600 focus:ring-orange-500">
                                <span class="ml-3 text-sm text-gray-700">{{ $category->name }}</span>
                                <span class="ml-auto text-xs text-gray-500 category-count" data-id="{{ $category->id }}">0</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="p-6 border-b border-gray-200">
                        <h3 class="font-medium text-gray-900 mb-4">Price Range</h3>
                        <div class="space-y-3">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="price_range" value="all" class="price-filter h-4 w-4 text-orange-600 focus:ring-orange-500" checked>
                                <span class="ml-3 text-sm text-gray-700">All Prices</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="price_range" value="0-500" class="price-filter h-4 w-4 text-orange-600 focus:ring-orange-500">
                                <span class="ml-3 text-sm text-gray-700">Under ₦500</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="price_range" value="500-1000" class="price-filter h-4 w-4 text-orange-600 focus:ring-orange-500">
                                <span class="ml-3 text-sm text-gray-700">₦500 - ₦1,000</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="price_range" value="1000-2000" class="price-filter h-4 w-4 text-orange-600 focus:ring-orange-500">
                                <span class="ml-3 text-sm text-gray-700">₦1,000 - ₦2,000</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="price_range" value="2000-5000" class="price-filter h-4 w-4 text-orange-600 focus:ring-orange-500">
                                <span class="ml-3 text-sm text-gray-700">₦2,000 - ₦5,000</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="price_range" value="5000+" class="price-filter h-4 w-4 text-orange-600 focus:ring-orange-500">
                                <span class="ml-3 text-sm text-gray-700">₦5,000+</span>
                            </label>
                        </div>
                    </div>

                    <div class="p-6 border-b border-gray-200">
                        <h3 class="font-medium text-gray-900 mb-4">Availability</h3>
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" id="in-stock-only" class="h-4 w-4 text-orange-600 focus:ring-orange-500 rounded">
                            <span class="ml-3 text-sm text-gray-700">In Stock Only</span>
                        </label>
                    </div>

                    <div class="p-6">
                        <button id="clear-filters" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
                            Clear All Filters
                        </button>
                    </div>
                </div>
            </div>

            <div class="lg:w-3/4">
                <div class="bg-white rounded-lg shadow-lg p-4 mb-6">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-600">Sort by:</span>
                            <select id="sort-by" class="text-sm border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                <option value="newest">Newest First</option>
                                <option value="price_low">Price: Low to High</option>
                                <option value="price_high">Price: High to Low</option>
                                <option value="popular">Most Popular</option>
                                <option value="name_asc">Name: A to Z</option>
                            </select>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-600" id="product-count">0 products found</span>
                            <div class="flex border border-gray-300 rounded-lg overflow-hidden">
                                <button data-view="grid" class="view-toggle px-3 py-1 bg-orange-500 text-white transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                    </svg>
                                </button>
                                <button data-view="list" class="view-toggle px-3 py-1 bg-gray-200 text-gray-600 hover:bg-gray-300 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-4 mb-6">
                    <div class="relative">
                        <input type="text" id="search-products" placeholder="Search products..." class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <div id="loading-spinner" class="hidden text-center py-12">
                    <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-orange-500"></div>
                    <p class="mt-4 text-gray-600">Loading products...</p>
                </div>

                <div id="products-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>

                <div id="pagination" class="mt-8 flex justify-center"></div>
            </div>
        </div>
    </div>
</div>

<script>
    let currentPage = 1;
    let currentView = 'grid';
    let currentFilters = {
        category: 'all',
        price_range: 'all',
        in_stock_only: false,
        sort_by: 'newest',
        search: ''
    };
    let searchTimeout;

    document.addEventListener('DOMContentLoaded', function() {
        loadProducts();
        setupEventListeners();
    });

    function setupEventListeners() {
        document.querySelectorAll('.category-filter').forEach(radio => {
            radio.addEventListener('change', function() {
                currentFilters.category = this.value;
                currentPage = 1;
                loadProducts();
            });
        });

        document.querySelectorAll('.price-filter').forEach(radio => {
            radio.addEventListener('change', function() {
                currentFilters.price_range = this.value;
                currentPage = 1;
                loadProducts();
            });
        });

        document.getElementById('in-stock-only').addEventListener('change', function() {
            currentFilters.in_stock_only = this.checked;
            currentPage = 1;
            loadProducts();
        });

        document.getElementById('sort-by').addEventListener('change', function() {
            currentFilters.sort_by = this.value;
            currentPage = 1;
            loadProducts();
        });

        document.getElementById('search-products').addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                currentFilters.search = this.value;
                currentPage = 1;
                loadProducts();
            }, 500);
        });

        document.getElementById('clear-filters').addEventListener('click', function() {
            document.querySelectorAll('.category-filter').forEach(radio => {
                if (radio.value === 'all') radio.checked = true;
            });
            document.querySelectorAll('.price-filter').forEach(radio => {
                if (radio.value === 'all') radio.checked = true;
            });
            document.getElementById('in-stock-only').checked = false;
            document.getElementById('sort-by').value = 'newest';
            document.getElementById('search-products').value = '';
            
            currentFilters = {
                category: 'all',
                price_range: 'all',
                in_stock_only: false,
                sort_by: 'newest',
                search: ''
            };
            currentPage = 1;
            loadProducts();
        });

        document.querySelectorAll('.view-toggle').forEach(btn => {
            btn.addEventListener('click', function() {
                const view = this.dataset.view;
                currentView = view;
                
                document.querySelectorAll('.view-toggle').forEach(b => {
                    b.classList.remove('bg-orange-500', 'text-white');
                    b.classList.add('bg-gray-200', 'text-gray-600');
                });
                this.classList.remove('bg-gray-200', 'text-gray-600');
                this.classList.add('bg-orange-500', 'text-white');
                
                const container = document.getElementById('products-container');
                if (view === 'grid') {
                    container.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6';
                } else {
                    container.className = 'space-y-4';
                }
                
                loadProducts();
            });
        });
    }

    function loadProducts() {
        const spinner = document.getElementById('loading-spinner');
        const container = document.getElementById('products-container');
        
        spinner.classList.remove('hidden');
        container.innerHTML = '';
        
        const params = new URLSearchParams({
            page: currentPage,
            category: currentFilters.category,
            price_range: currentFilters.price_range,
            in_stock_only: currentFilters.in_stock_only,
            sort_by: currentFilters.sort_by,
            search: currentFilters.search
        });
        
        fetch(`/api/products?${params.toString()}`)
            .then(response => response.json())
            .then(data => {
                spinner.classList.add('hidden');
                renderProducts(data.products);
                renderPagination(data);
                document.getElementById('product-count').innerText = `${data.total} products found`;
                updateCategoryCounts(data.category_counts);
            })
            .catch(error => {
                spinner.classList.add('hidden');
                container.innerHTML = '<div class="col-span-full text-center py-12 text-gray-500">Error loading products. Please try again.</div>';
                console.error('Error:', error);
            });
    }

    function renderProducts(products) {
        const container = document.getElementById('products-container');
        
        if (!products || products.length === 0) {
            container.innerHTML = '<div class="col-span-full text-center py-12"><p class="text-gray-500">No products found.</p></div>';
            return;
        }
        
        if (currentView === 'grid') {
            container.innerHTML = products.map(product => {
                const productImages = product.images && Array.isArray(product.images) ? product.images : [];
                const hasImage = productImages.length > 0;
                const imageUrl = hasImage ? `/storage/${productImages[0]}` : '';
                const discount = product.discount_percentage || 0;
                const isOutOfStock = product.stock_quantity <= 0;
                
                return `
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                        <div class="relative">
                            <div class="h-48 bg-gray-200 flex items-center justify-center overflow-hidden">
                                ${hasImage ? 
                                    `<img src="${imageUrl}" alt="${escapeHtml(product.name)}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">` :
                                    `<div class="text-gray-400 text-center">
                                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <p class="text-sm mt-2">No image</p>
                                    </div>`
                                }
                            </div>
                            ${discount > 0 ? `
                                <div class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                    -${discount}%
                                </div>
                            ` : ''}
                            ${isOutOfStock ? `
                                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                    <span class="bg-red-500 text-white px-4 py-2 rounded-lg font-semibold">Out of Stock</span>
                                </div>
                            ` : ''}
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-gray-900 mb-1 line-clamp-1">${escapeHtml(product.name)}</h3>
                            <p class="text-gray-600 text-sm mb-2 line-clamp-2">${escapeHtml(product.description ? product.description.substring(0, 100) : '')}</p>
                            <div class="flex items-center justify-between mb-3">
                                <div>
                                    <span class="text-2xl font-bold text-orange-600">₦${parseFloat(product.price).toFixed(2)}</span>
                                    ${product.compare_price ? `
                                        <span class="text-sm text-gray-500 line-through ml-2">₦${parseFloat(product.compare_price).toFixed(2)}</span>
                                    ` : ''}
                                </div>
                            </div>
                            <button onclick="addToCart(${product.id})" 
                                class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white py-2 rounded-lg hover:shadow-lg transition ${isOutOfStock ? 'opacity-50 cursor-not-allowed' : ''}"
                                ${isOutOfStock ? 'disabled' : ''}>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                `;
            }).join('');
        } else {
            container.innerHTML = products.map(product => {
                const productImages = product.images && Array.isArray(product.images) ? product.images : [];
                const hasImage = productImages.length > 0;
                const imageUrl = hasImage ? `/storage/${productImages[0]}` : '';
                const isOutOfStock = product.stock_quantity <= 0;
                
                return `
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all">
                        <div class="flex flex-col md:flex-row">
                            <div class="md:w-48 h-48 bg-gray-200 flex items-center justify-center">
                                ${hasImage ? 
                                    `<img src="${imageUrl}" alt="${escapeHtml(product.name)}" class="w-full h-full object-cover">` :
                                    `<div class="text-gray-400 text-center">
                                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>`
                                }
                            </div>
                            <div class="flex-1 p-6">
                                <h3 class="font-semibold text-xl text-gray-900 mb-2">${escapeHtml(product.name)}</h3>
                                <p class="text-gray-600 mb-3">${escapeHtml(product.description ? product.description.substring(0, 150) : '')}</p>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-2xl font-bold text-orange-600">₦${parseFloat(product.price).toFixed(2)}</span>
                                        ${product.compare_price ? `
                                            <span class="text-sm text-gray-500 line-through ml-2">₦${parseFloat(product.compare_price).toFixed(2)}</span>
                                        ` : ''}
                                    </div>
                                    <div class="text-sm ${product.stock_quantity > 0 ? 'text-green-600' : 'text-red-600'}">
                                        ${product.stock_quantity > 0 ? `In Stock (${product.stock_quantity})` : 'Out of Stock'}
                                    </div>
                                </div>
                                <button onclick="addToCart(${product.id})" 
                                    class="mt-4 w-full md:w-auto px-6 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:shadow-lg transition ${isOutOfStock ? 'opacity-50 cursor-not-allowed' : ''}"
                                    ${isOutOfStock ? 'disabled' : ''}>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        }
    }

    function renderPagination(data) {
        const paginationContainer = document.getElementById('pagination');
        
        if (data.last_page <= 1) {
            paginationContainer.innerHTML = '';
            return;
        }
        
        let paginationHtml = '<nav class="flex items-center space-x-2">';
        
        if (data.current_page > 1) {
            paginationHtml += `<button onclick="changePage(${data.current_page - 1})" class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">Previous</button>`;
        }
        
        for (let i = 1; i <= data.last_page; i++) {
            if (i === data.current_page) {
                paginationHtml += `<button class="px-3 py-2 bg-orange-500 text-white rounded-lg">${i}</button>`;
            } else if (Math.abs(i - data.current_page) <= 2) {
                paginationHtml += `<button onclick="changePage(${i})" class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">${i}</button>`;
            } else if (Math.abs(i - data.current_page) === 3) {
                paginationHtml += `<span class="px-3 py-2">...</span>`;
            }
        }
        
        if (data.current_page < data.last_page) {
            paginationHtml += `<button onclick="changePage(${data.current_page + 1})" class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">Next</button>`;
        }
        
        paginationHtml += '</nav>';
        paginationContainer.innerHTML = paginationHtml;
    }

    function changePage(page) {
        currentPage = page;
        loadProducts();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function updateCategoryCounts(counts) {
        document.getElementById('all-count').innerText = counts?.all || 0;
        if (counts?.categories) {
            counts.categories.forEach(category => {
                const element = document.querySelector(`.category-count[data-id="${category.id}"]`);
                if (element) element.innerText = category.total;
            });
        }
    }

    function addToCart(productId) {
        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ product_id: productId, quantity: 1 })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Product added to cart!', 'success');
                if (window.updateCartCount) {
                    window.updateCartCount(data.cart_count);
                }
            } else {
                showNotification('Error adding product to cart', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Please login to add items to cart', 'error');
        });
    }

    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `fixed top-20 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300 translate-x-full ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        }`;
        notification.innerHTML = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
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
</style>
@endsection