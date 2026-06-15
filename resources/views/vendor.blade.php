@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen">
    <!-- Vendor Hero Banner - Matching About Page Style -->
<section class="relative bg-gradient-to-r from-orange-500 to-orange-600 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate-fade-in">
                Our Trusted <span class="text-orange-200">Vendors</span>
            </h1>
            <p class="text-xl md:text-2xl text-orange-100 mb-4 animate-fade-in-up">
                Discover amazing products from our verified sellers
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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Search and Filter Section -->
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Search Bar -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Search Vendors</label>
                        <div class="relative">
                            <input type="text" id="search-vendors" placeholder="Search by store name or vendor name..." 
                                class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                            <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Sort Options -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sort By</label>
                        <select id="sort-vendors" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                            <option value="name_asc">Store Name: A to Z</option>
                            <option value="name_desc">Store Name: Z to A</option>
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="products_high">Most Products</option>
                            <option value="products_low">Least Products</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Spinner -->
        <div id="loading-spinner" class="hidden text-center py-12">
            <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-orange-500"></div>
            <p class="mt-4 text-gray-600">Loading vendors...</p>
        </div>

        <!-- Vendors Grid -->
        <div id="vendors-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Vendors will be loaded here via JavaScript -->
        </div>

        <!-- Pagination -->
        <div id="pagination" class="mt-8 flex justify-center">
            <!-- Pagination will be loaded here -->
        </div>
    </div>
</div>

<!-- Vendor Details Modal -->
<div id="vendor-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-4xl shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-900" id="modal-store-name"></h2>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <div class="mb-6">
            <div id="modal-store-banner" class="h-48 bg-gray-200 rounded-lg mb-4 overflow-hidden"></div>
            <div class="flex items-start space-x-4">
                <div id="modal-store-logo" class="w-24 h-24 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0"></div>
                <div class="flex-1">
                    <p id="modal-store-description" class="text-gray-600 mb-2"></p>
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span id="modal-store-joined" class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span id="modal-joined-date"></span>
                        </span>
                        <span id="modal-products-count" class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span id="modal-products-total"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-200 pt-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Products by this Vendor</h3>
            <div id="modal-products" class="grid grid-cols-1 md:grid-cols-2 gap-4 max-h-96 overflow-y-auto">
                <!-- Products will be loaded here -->
            </div>
        </div>
    </div>
</div>

<script>
    let currentPage = 1;
    let currentFilters = {
        search: '',
        sort_by: 'name_asc'
    };
    let searchTimeout;

    document.addEventListener('DOMContentLoaded', function() {
        loadVendors();
        setupEventListeners();
    });

    function setupEventListeners() {
        // Search with debounce
        document.getElementById('search-vendors').addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                currentFilters.search = this.value;
                currentPage = 1;
                loadVendors();
            }, 500);
        });

        // Sort by
        document.getElementById('sort-vendors').addEventListener('change', function() {
            currentFilters.sort_by = this.value;
            currentPage = 1;
            loadVendors();
        });
    }

    function loadVendors() {
        const spinner = document.getElementById('loading-spinner');
        const container = document.getElementById('vendors-container');
        
        spinner.classList.remove('hidden');
        container.innerHTML = '';
        
        const params = new URLSearchParams({
            page: currentPage,
            search: currentFilters.search,
            sort_by: currentFilters.sort_by
        });
        
        fetch(`/api/vendors?${params.toString()}`)
            .then(response => response.json())
            .then(data => {
                spinner.classList.add('hidden');
                renderVendors(data.vendors);
                renderPagination(data);
            })
            .catch(error => {
                spinner.classList.add('hidden');
                container.innerHTML = '<div class="col-span-full text-center py-12 text-gray-500">Error loading vendors. Please try again.</div>';
                console.error('Error:', error);
            });
    }

    function renderVendors(vendors) {
        const container = document.getElementById('vendors-container');
        
        if (!vendors || vendors.length === 0) {
            container.innerHTML = '<div class="col-span-full text-center py-12"><p class="text-gray-500">No vendors found.</p></div>';
            return;
        }
        
        container.innerHTML = vendors.map(vendor => {
            const logoUrl = vendor.store_logo ? `/storage/${vendor.store_logo}` : '';
            const hasLogo = vendor.store_logo && vendor.store_logo !== '';
            const joinedDate = new Date(vendor.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long' });
            
            return `
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group cursor-pointer" onclick="showVendorDetails(${vendor.id})">
                    <div class="relative h-32 bg-gradient-to-r from-orange-400 to-orange-600">
                        ${vendor.store_banner ? 
                            `<img src="/storage/${vendor.store_banner}" alt="${vendor.store_name}" class="w-full h-full object-cover">` :
                            `<div class="w-full h-full flex items-center justify-center">
                                <svg class="w-12 h-12 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>`
                        }
                    </div>
                    <div class="relative px-6 pb-6">
                        <div class="absolute -top-12 left-6">
                            <div class="w-24 h-24 bg-white rounded-full p-1 shadow-lg">
                                <div class="w-full h-full rounded-full overflow-hidden bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                                    ${hasLogo ? 
                                        `<img src="${logoUrl}" alt="${vendor.store_name}" class="w-full h-full object-cover">` :
                                        `<span class="text-white text-2xl font-bold">${vendor.store_name.charAt(0).toUpperCase()}</span>`
                                    }
                                </div>
                            </div>
                        </div>
                        <div class="mt-16 text-center">
                            <h3 class="text-xl font-bold text-gray-900 mb-1">${escapeHtml(vendor.store_name)}</h3>
                            <p class="text-sm text-gray-500 mb-3">by ${escapeHtml(vendor.name)}</p>
                            <div class="flex justify-center space-x-4 text-sm text-gray-600 mb-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    ${vendor.products_count} Products
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Joined ${joinedDate}
                                </span>
                            </div>
                            <p class="text-gray-600 text-sm line-clamp-2">${escapeHtml(vendor.store_description || 'No description available.')}</p>
                            <div class="mt-4 inline-flex items-center text-orange-600 hover:text-orange-700 transition">
                                View Store
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
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
        loadVendors();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function showVendorDetails(vendorId) {
        const modal = document.getElementById('vendor-modal');
        
        fetch(`/api/vendors/${vendorId}`)
            .then(response => response.json())
            .then(data => {
                const vendor = data.vendor;
                const joinedDate = new Date(vendor.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
                
                document.getElementById('modal-store-name').innerText = vendor.store_name;
                document.getElementById('modal-store-description').innerText = vendor.store_description || 'No description available.';
                document.getElementById('modal-joined-date').innerText = `Joined ${joinedDate}`;
                document.getElementById('modal-products-total').innerText = `${vendor.products_count} products`;
                
                // Set banner
                const bannerDiv = document.getElementById('modal-store-banner');
                if (vendor.store_banner) {
                    bannerDiv.innerHTML = `<img src="/storage/${vendor.store_banner}" class="w-full h-full object-cover">`;
                } else {
                    bannerDiv.innerHTML = `<div class="w-full h-full bg-gradient-to-r from-orange-400 to-orange-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>`;
                }
                
                // Set logo
                const logoDiv = document.getElementById('modal-store-logo');
                if (vendor.store_logo) {
                    logoDiv.innerHTML = `<img src="/storage/${vendor.store_logo}" class="w-full h-full object-cover">`;
                } else {
                    logoDiv.innerHTML = `<div class="w-full h-full bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                        <span class="text-white text-2xl font-bold">${vendor.store_name.charAt(0).toUpperCase()}</span>
                    </div>`;
                }
                
                // Render products
                const productsDiv = document.getElementById('modal-products');
                if (data.products && data.products.length > 0) {
                    productsDiv.innerHTML = data.products.map(product => {
                        const productImages = product.images && Array.isArray(product.images) ? product.images : [];
                        const hasImage = productImages.length > 0;
                        const imageUrl = hasImage ? `/storage/${productImages[0]}` : '';
                        
                        return `
                            <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition">
                                <div class="flex space-x-4">
                                    <div class="w-20 h-20 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                        ${hasImage ? 
                                            `<img src="${imageUrl}" alt="${escapeHtml(product.name)}" class="w-full h-full object-cover">` :
                                            `<div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>`
                                        }
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">${escapeHtml(product.name)}</h4>
                                        <p class="text-sm text-gray-600 mt-1 line-clamp-2">${escapeHtml(product.description.substring(0, 80))}</p>
                                        <div class="flex items-center justify-between mt-2">
                                            <span class="text-lg font-bold text-orange-600">₦${parseFloat(product.price).toFixed(2)}</span>
                                            <button onclick="addToCart(${product.id})" class="text-sm bg-orange-500 text-white px-3 py-1 rounded-lg hover:bg-orange-600 transition">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    }).join('');
                } else {
                    productsDiv.innerHTML = '<p class="text-gray-500 text-center py-8">No products available from this vendor.</p>';
                }
                
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error loading vendor details', 'error');
            });
    }

    function closeModal() {
        const modal = document.getElementById('vendor-modal');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
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

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('vendor-modal');
        if (event.target === modal) {
            closeModal();
        }
    }
</script>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection