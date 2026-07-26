@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen">
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
        <!-- Search and Filter Section - Enhanced -->
        <div class="mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-300">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Search Bar -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Search Vendors
                        </label>
                        <div class="relative">
                            <input type="text" id="search-vendors" placeholder="Search by store name or vendor name..." 
                                class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300 bg-gray-50 hover:bg-white">
                            <svg class="absolute left-4 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <button class="absolute right-2 top-2 px-4 py-1.5 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors duration-300 text-sm font-medium">
                                Search
                            </button>
                        </div>
                    </div>
                    
                    <!-- Sort Options -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                            </svg>
                            Sort By
                        </label>
                        <select id="sort-vendors" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300 bg-gray-50 hover:bg-white appearance-none cursor-pointer">
                            <option value="name_asc">Store Name: A to Z</option>
                            <option value="name_desc">Store Name: Z to A</option>
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="products_high">Most Products</option>
                            <option value="products_low">Least Products</option>
                        </select>
                    </div>
                </div>
                
                <!-- Active Filters -->
                <div id="active-filters" class="mt-4 flex flex-wrap items-center gap-2">
                    <span class="text-sm text-gray-500">Active filters:</span>
                    <span id="search-filter-tag" class="hidden bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm flex items-center">
                        <span id="search-filter-text"></span>
                        <button onclick="clearSearch()" class="ml-2 hover:text-orange-900">✕</button>
                    </span>
                </div>
            </div>
        </div>

        <!-- Stats Bar -->
        <div id="stats-bar" class="hidden mb-6 bg-white rounded-xl shadow-sm border border-gray-200 p-4 flex justify-between items-center">
            <span id="results-count" class="text-gray-600"></span>
            <span id="view-options" class="text-gray-500 text-sm">
                <button class="px-3 py-1 bg-orange-100 text-orange-600 rounded-lg">Grid</button>
                <button class="px-3 py-1 hover:bg-gray-100 rounded-lg transition">List</button>
            </span>
        </div>

        <!-- Vendors Grid - Enhanced -->
        <div id="vendors-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Vendors will be loaded here via JavaScript -->
        </div>

        <!-- Pagination - Enhanced -->
        <div id="pagination" class="mt-8 flex justify-center">
            <!-- Pagination will be loaded here -->
        </div>
    </div>
</div>

<!-- Vendor Details Modal - Enhanced -->
<div id="vendor-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-0 border w-full max-w-4xl shadow-2xl rounded-2xl bg-white overflow-hidden">
        <!-- Modal Header with Banner -->
        <div id="modal-banner-container" class="relative h-48 bg-gradient-to-r from-orange-400 to-orange-600">
            <div id="modal-store-banner" class="w-full h-full"></div>
            <button onclick="closeModal()" class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-colors duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <!-- Modal Content -->
        <div class="px-8 pb-8">
            <!-- Vendor Profile -->
            <div class="relative -mt-12 mb-6">
                <div class="flex items-end space-x-6">
                    <div id="modal-store-logo" class="w-28 h-28 bg-white rounded-2xl shadow-xl overflow-hidden flex-shrink-0 border-4 border-white ring-2 ring-orange-500/20"></div>
                    <div class="flex-1 pt-12">
                        <h2 id="modal-store-name" class="text-3xl font-bold text-gray-900"></h2>
                        <p id="modal-store-description" class="text-gray-600 mt-1"></p>
                    </div>
                </div>
            </div>
            
            <!-- Vendor Stats -->
            <div class="grid grid-cols-3 gap-4 mb-6 p-4 bg-gray-50 rounded-xl">
                <div class="text-center">
                    <span id="modal-products-total" class="block text-2xl font-bold text-orange-600"></span>
                    <span class="text-sm text-gray-500">Products</span>
                </div>
                <div class="text-center">
                    <span id="modal-joined-date" class="block text-2xl font-bold text-orange-600"></span>
                    <span class="text-sm text-gray-500">Joined</span>
                </div>
                <div class="text-center">
                    <span id="modal-rating" class="block text-2xl font-bold text-orange-600">4.5</span>
                    <span class="text-sm text-gray-500">Rating</span>
                </div>
            </div>
            
            <!-- Products Section -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Products by this Vendor
                </h3>
                <div id="modal-products" class="grid grid-cols-1 md:grid-cols-2 gap-4 max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-orange-300 scrollbar-track-gray-100">
                    <!-- Products will be loaded here -->
                </div>
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
    let isLoading = false;

    document.addEventListener('DOMContentLoaded', function() {
        loadVendors();
        setupEventListeners();
    });

    function setupEventListeners() {
        // Search with debounce
        const searchInput = document.getElementById('search-vendors');
        searchInput.addEventListener('input', function() {
            const searchBtn = this.nextElementSibling;
            if (this.value.trim()) {
                searchBtn.textContent = 'Clear';
                searchBtn.onclick = function(e) {
                    e.stopPropagation();
                    clearSearch();
                };
            } else {
                searchBtn.textContent = 'Search';
                searchBtn.onclick = null;
            }
            
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                currentFilters.search = this.value;
                currentPage = 1;
                loadVendors();
            }, 500);
        });

        // Search button click
        const searchBtn = searchInput.nextElementSibling;
        searchBtn.addEventListener('click', function(e) {
            if (this.textContent === 'Clear') {
                clearSearch();
            }
        });

        // Sort by
        document.getElementById('sort-vendors').addEventListener('change', function() {
            currentFilters.sort_by = this.value;
            currentPage = 1;
            loadVendors();
        });
    }

    function clearSearch() {
        const searchInput = document.getElementById('search-vendors');
        searchInput.value = '';
        currentFilters.search = '';
        currentPage = 1;
        const searchBtn = searchInput.nextElementSibling;
        searchBtn.textContent = 'Search';
        searchBtn.onclick = null;
        document.getElementById('search-filter-tag').classList.add('hidden');
        loadVendors();
    }

    function loadVendors() {
        if (isLoading) return;
        isLoading = true;
        
        const container = document.getElementById('vendors-container');
        container.innerHTML = '';
        
        // Show skeleton loading
        container.innerHTML = Array(6).fill(0).map(() => `
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden animate-pulse">
                <div class="h-32 bg-gray-200"></div>
                <div class="p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-gray-200 rounded-full"></div>
                        <div class="flex-1">
                            <div class="h-4 bg-gray-200 rounded w-3/4 mb-2"></div>
                            <div class="h-3 bg-gray-200 rounded w-1/2"></div>
                        </div>
                    </div>
                    <div class="mt-4 space-y-2">
                        <div class="h-3 bg-gray-200 rounded w-full"></div>
                        <div class="h-3 bg-gray-200 rounded w-2/3"></div>
                    </div>
                </div>
            </div>
        `).join('');
        
        const params = new URLSearchParams({
            page: currentPage,
            search: currentFilters.search,
            sort_by: currentFilters.sort_by
        });
        
        fetch(`/api/vendors?${params.toString()}`)
            .then(response => response.json())
            .then(data => {
                isLoading = false;
                renderVendors(data.vendors);
                renderPagination(data);
                updateStats(data);
                updateActiveFilters();
            })
            .catch(error => {
                isLoading = false;
                container.innerHTML = `
                    <div class="col-span-full text-center py-16">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg">Unable to load vendors. Please try again.</p>
                        <button onclick="loadVendors()" class="mt-4 px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                            Retry
                        </button>
                    </div>
                `;
                console.error('Error:', error);
            });
    }

    function updateStats(data) {
        const statsBar = document.getElementById('stats-bar');
        const resultsCount = document.getElementById('results-count');
        
        if (data.total > 0) {
            statsBar.classList.remove('hidden');
            resultsCount.textContent = `Showing ${data.from || 0} - ${data.to || 0} of ${data.total} vendors`;
        } else {
            statsBar.classList.add('hidden');
        }
    }

    function updateActiveFilters() {
        const searchTag = document.getElementById('search-filter-tag');
        const searchText = document.getElementById('search-filter-text');
        
        if (currentFilters.search.trim()) {
            searchTag.classList.remove('hidden');
            searchText.textContent = `"${currentFilters.search}"`;
        } else {
            searchTag.classList.add('hidden');
        }
    }

    function renderVendors(vendors) {
        const container = document.getElementById('vendors-container');
        
        if (!vendors || vendors.length === 0) {
            container.innerHTML = `
                <div class="col-span-full text-center py-16">
                    <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <p class="text-gray-500 text-lg">No vendors found matching your criteria.</p>
                    <p class="text-gray-400 text-sm mt-2">Try adjusting your search or filters</p>
                    <button onclick="clearSearch()" class="mt-4 px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                        Clear Filters
                    </button>
                </div>
            `;
            return;
        }
        
        container.innerHTML = vendors.map(vendor => {
            const logoUrl = vendor.store_logo ? `/storage/${vendor.store_logo}` : '';
            const hasLogo = vendor.store_logo && vendor.store_logo !== '';
            const joinedDate = new Date(vendor.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long' });
            
            return `
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group cursor-pointer" onclick="showVendorDetails(${vendor.id})">
                    <div class="relative h-32 bg-gradient-to-r from-orange-400 to-orange-600 overflow-hidden">
                        ${vendor.store_banner ? 
                            `<img src="/storage/${vendor.store_banner}" alt="${vendor.store_name}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">` :
                            `<div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>`
                        }
                        <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-orange-600 shadow-sm">
                            ${vendor.products_count} Products
                        </div>
                    </div>
                    <div class="relative px-6 pb-6">
                        <div class="absolute -top-12 left-6">
                            <div class="w-24 h-24 bg-white rounded-2xl p-1.5 shadow-xl ring-2 ring-orange-500/10">
                                <div class="w-full h-full rounded-xl overflow-hidden bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                                    ${hasLogo ? 
                                        `<img src="${logoUrl}" alt="${vendor.store_name}" class="w-full h-full object-cover">` :
                                        `<span class="text-white text-3xl font-bold">${vendor.store_name.charAt(0).toUpperCase()}</span>`
                                    }
                                </div>
                            </div>
                        </div>
                        <div class="mt-16 text-center">
                            <h3 class="text-xl font-bold text-gray-900 mb-1 hover:text-orange-600 transition-colors">${escapeHtml(vendor.store_name)}</h3>
                            <p class="text-sm text-gray-500 mb-3">by ${escapeHtml(vendor.name)}</p>
                            <div class="flex justify-center space-x-4 text-sm text-gray-600 mb-3">
                                <span class="flex items-center text-xs bg-gray-100 px-3 py-1 rounded-full">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Joined ${joinedDate}
                                </span>
                            </div>
                            <p class="text-gray-600 text-sm line-clamp-2">${escapeHtml(vendor.store_description || 'No description available.')}</p>
                            <div class="mt-4 inline-flex items-center text-orange-600 font-medium hover:text-orange-700 transition-colors group-hover:translate-x-1 duration-300">
                                View Store
                                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        
        let paginationHtml = '<nav class="flex items-center space-x-2 bg-white rounded-xl shadow-sm border border-gray-200 px-4 py-2">';
        
        if (data.current_page > 1) {
            paginationHtml += `<button onclick="changePage(${data.current_page - 1})" class="px-4 py-2 text-gray-600 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors duration-200 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Previous
            </button>`;
        }
        
        const pages = [];
        const total = data.last_page;
        const current = data.current_page;
        
        if (total <= 7) {
            for (let i = 1; i <= total; i++) pages.push(i);
        } else {
            if (current <= 3) {
                for (let i = 1; i <= 5; i++) pages.push(i);
                pages.push('...');
                pages.push(total);
            } else if (current >= total - 2) {
                pages.push(1);
                pages.push('...');
                for (let i = total - 4; i <= total; i++) pages.push(i);
            } else {
                pages.push(1);
                pages.push('...');
                for (let i = current - 1; i <= current + 1; i++) pages.push(i);
                pages.push('...');
                pages.push(total);
            }
        }
        
        for (const page of pages) {
            if (page === '...') {
                paginationHtml += `<span class="px-3 py-2 text-gray-400">...</span>`;
            } else if (page === data.current_page) {
                paginationHtml += `<span class="px-4 py-2 bg-orange-500 text-white rounded-lg font-medium">${page}</span>`;
            } else {
                paginationHtml += `<button onclick="changePage(${page})" class="px-4 py-2 text-gray-600 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors duration-200">${page}</button>`;
            }
        }
        
        if (data.current_page < data.last_page) {
            paginationHtml += `<button onclick="changePage(${data.current_page + 1})" class="px-4 py-2 text-gray-600 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors duration-200 flex items-center">
                Next
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>`;
        }
        
        paginationHtml += '</nav>';
        paginationContainer.innerHTML = paginationHtml;
    }

    function changePage(page) {
        if (page === currentPage) return;
        currentPage = page;
        loadVendors();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function showVendorDetails(vendorId) {
        const modal = document.getElementById('vendor-modal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        // Show loading state
        document.getElementById('modal-products').innerHTML = Array(4).fill(0).map(() => `
            <div class="bg-gray-50 rounded-lg p-4 animate-pulse">
                <div class="flex space-x-4">
                    <div class="w-20 h-20 bg-gray-200 rounded-lg"></div>
                    <div class="flex-1 space-y-2">
                        <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                        <div class="h-3 bg-gray-200 rounded w-full"></div>
                        <div class="h-3 bg-gray-200 rounded w-2/3"></div>
                    </div>
                </div>
            </div>
        `).join('');
        
        fetch(`/api/vendors/${vendorId}`)
            .then(response => response.json())
            .then(data => {
                const vendor = data.vendor;
                const joinedDate = new Date(vendor.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
                
                document.getElementById('modal-store-name').innerText = vendor.store_name;
                document.getElementById('modal-store-description').innerText = vendor.store_description || 'No description available.';
                document.getElementById('modal-joined-date').innerText = joinedDate;
                document.getElementById('modal-products-total').innerText = vendor.products_count;
                
                // Set banner
                const bannerDiv = document.getElementById('modal-store-banner');
                if (vendor.store_banner) {
                    bannerDiv.innerHTML = `<img src="/storage/${vendor.store_banner}" class="w-full h-full object-cover">`;
                } else {
                    bannerDiv.innerHTML = '';
                    document.getElementById('modal-banner-container').className = 'relative h-48 bg-gradient-to-r from-orange-400 to-orange-600';
                }
                
                // Set logo
                const logoDiv = document.getElementById('modal-store-logo');
                if (vendor.store_logo) {
                    logoDiv.innerHTML = `<img src="/storage/${vendor.store_logo}" class="w-full h-full object-cover">`;
                } else {
                    logoDiv.innerHTML = `<div class="w-full h-full bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                        <span class="text-white text-3xl font-bold">${vendor.store_name.charAt(0).toUpperCase()}</span>
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
                            <div class="bg-gray-50 rounded-xl p-4 hover:shadow-md transition-all duration-300 hover:bg-white group">
                                <div class="flex space-x-4">
                                    <div class="w-20 h-20 bg-gray-200 rounded-xl overflow-hidden flex-shrink-0">
                                        ${hasImage ? 
                                            `<img src="${imageUrl}" alt="${escapeHtml(product.name)}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">` :
                                            `<div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>`
                                        }
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-gray-900 group-hover:text-orange-600 transition-colors truncate">${escapeHtml(product.name)}</h4>
                                        <p class="text-sm text-gray-600 mt-1 line-clamp-2">${escapeHtml(product.description.substring(0, 80))}</p>
                                        <div class="flex items-center justify-between mt-2">
                                            <span class="text-lg font-bold text-orange-600">₦${parseFloat(product.price).toFixed(2)}</span>
                                            <button onclick="event.stopPropagation(); addToCart(${product.id})" class="text-sm bg-orange-500 text-white px-3 py-1.5 rounded-lg hover:bg-orange-600 transition-all duration-300 hover:shadow-md">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    }).join('');
                } else {
                    productsDiv.innerHTML = `
                        <div class="col-span-2 text-center py-12">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <p class="text-gray-500">No products available from this vendor.</p>
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error loading vendor details', 'error');
                closeModal();
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
        notification.className = `fixed top-20 right-4 z-50 px-6 py-4 rounded-xl shadow-lg text-white transform transition-all duration-500 ease-in-out translate-x-full ${
            type === 'success' ? 'bg-gradient-to-r from-green-500 to-green-600' : 'bg-gradient-to-r from-red-500 to-red-600'
        }`;
        notification.innerHTML = `
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type === 'success' ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' : 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'}"></path>
                </svg>
                <span class="font-medium">${message}</span>
            </div>
        `;
        document.body.appendChild(notification);
        
        // Animate in
        requestAnimationFrame(() => {
            notification.classList.remove('translate-x-full');
        });
        
        // Animate out
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => notification.remove(), 500);
        }, 4000);
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

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
</script>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .scrollbar-thin::-webkit-scrollbar {
        width: 6px;
    }
    
    .scrollbar-thin::-webkit-scrollbar-track {
        background: #f3f4f6;
        border-radius: 10px;
    }
    
    .scrollbar-thin::-webkit-scrollbar-thumb {
        background: #fb923c;
        border-radius: 10px;
    }
    
    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
        background: #f97316;
    }
    
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fade-in 0.8s ease-out forwards;
    }
    
    .animate-fade-in-up {
        animation: fade-in 0.8s ease-out 0.2s forwards;
        opacity: 0;
    }
</style>
@endsection