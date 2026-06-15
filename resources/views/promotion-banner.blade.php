<!-- Promotional Banner - Sharp Edges, Role-Based Buttons -->
<section class="py-16 md:py-20 bg-gradient-to-br from-gray-50 to-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
            <!-- Left Side: Text and Button -->
            <div class="flex-1 text-center lg:text-left">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 leading-tight">
                    Ready to Join the 
                    <span class="bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent">Vefiri Community</span>?
                </h2>
                
                <p class="text-base md:text-lg text-gray-600 mb-8 max-w-lg mx-auto lg:mx-0">
                    Start shopping from verified vendors or become a seller today. Thousands of happy customers trust Vefiri for authentic products and secure payments.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    @auth
                        @if(auth()->user()->isVendor())
                            <!-- User is an approved vendor - Show Vendor Dashboard -->
                            <a href="{{ route('vendor.dashboard') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Vendor Dashboard
                            </a>
                            
                            <a href="{{ route('shop') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-orange-500 text-orange-600 font-semibold hover:bg-orange-50 transition-all duration-300 text-base">
                                Start Shopping
                            </a>
                            
                        @elseif(auth()->user()->isPendingVendor())
                            <!-- User has pending vendor application -->
                            <a href="{{ route('vendor.status') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Application Status
                            </a>
                            
                            <a href="{{ route('shop') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-orange-500 text-orange-600 font-semibold hover:bg-orange-50 transition-all duration-300 text-base">
                                Start Shopping
                            </a>
                            
                        @elseif(auth()->user()->isLogisticsPartner())
                            <!-- User is an approved logistics partner -->
                            <a href="{{ route('shop') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base">
                                Start Shopping
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                            
                            <a href="{{ route('logistics.dashboard') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-green-500 text-green-600 font-semibold hover:bg-green-50 transition-all duration-300 text-base">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                                </svg>
                                Logistics Dashboard
                            </a>
                            
                        @elseif(auth()->user()->hasLogisticsApplication())
                            <!-- User has pending logistics application -->
                            <a href="{{ route('shop') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base">
                                Start Shopping
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                            
                            <a href="{{ route('logistics.status') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-yellow-500 text-yellow-600 font-semibold hover:bg-yellow-50 transition-all duration-300 text-base">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Application Status
                            </a>
                            
                        @else
                            <!-- Regular logged-in user (customer) -->
                            <a href="{{ route('shop') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base">
                                Start Shopping
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                            
                            <a href="{{ route('vendor.apply') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-orange-500 text-orange-600 font-semibold hover:bg-orange-50 transition-all duration-300 text-base">
                                Become a Vendor
                            </a>
                        @endif
                    @else
                        <!-- Guest user (not logged in) -->
                        <a href="{{ route('signup') }}" 
                           class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base">
                            Get Started Now
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        
                        <a href="{{ route('shop') }}" 
                           class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-orange-500 text-orange-600 font-semibold hover:bg-orange-50 transition-all duration-300 text-base">
                            Shop Now
                        </a>
                    @endauth
                </div>
            </div>
            
            <!-- Right Side: Image -->
            <div class="flex-1 flex justify-center lg:justify-end">
                <div class="relative w-full max-w-md lg:max-w-lg">
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-orange-200 rounded-full opacity-50 blur-2xl"></div>
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-orange-300 rounded-full opacity-40 blur-2xl"></div>
                    
                    <!-- Main Image -->
                    <img src="{{ asset('images/Group 24.png') }}" 
                         alt="Vefiri Marketplace Shopping Experience" 
                         class="relative z-10 w-full h-auto object-contain">
                </div>
            </div>
        </div>
    </div>
</section>