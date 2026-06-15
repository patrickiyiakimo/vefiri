<!-- Call to Action Section - Dual Purpose -->
<section class="py-24 relative overflow-hidden bg-cover bg-fixed" 
         style="background-image: url('https://images.pexels.com/photos/4483610/pexels-photo-4483610.jpeg?auto=compress&cs=tinysrgb&w=1600');">
    
    <!-- Dark Overlay for better text readability -->
    <div class="absolute inset-0 bg-black/70"></div>
    
    <!-- Subtle Gradient Overlay -->
    <!-- <div class="absolute inset-0 bg-gradient-to-r from-black/50 via-transparent to-black/50"></div> -->
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <!-- Section Header -->
        <div class="text-center mb-20">
           
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                Ready to <span class="bg-gradient-to-r from-orange-400 to-orange-600 bg-clip-text text-transparent">Get Started?</span>
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full mx-auto mb-6"></div>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Choose your path and join thousands of successful users on Vefiri
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Left Card - For Shoppers -->
            <div class="group bg-white/10 backdrop-blur-md rounded-2xl overflow-hidden border border-white/20 hover:border-orange-500/50 transition-all duration-300 hover:shadow-2xl">
                <div class="relative p-8 md:p-10">
                    <!-- Icon -->
                    <div class="mb-8">
                        <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-3">Start Shopping</h3>
                    <p class="text-lg text-orange-400 font-semibold mb-4">Ready to Shop?</p>
                    <p class="text-gray-300 mb-8 leading-relaxed">
                        Discover quality products from thousands of trusted sellers. Shop with confidence and enjoy a seamless experience from browsing to delivery.
                    </p>
                    
                    <!-- Benefits -->
                    <div class="space-y-4 mb-10">
                        <div class="flex items-center text-gray-300">
                            <div class="w-6 h-6 bg-green-500/20 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span>100% authentic products guaranteed</span>
                        </div>
                        <div class="flex items-center text-gray-300">
                            <div class="w-6 h-6 bg-green-500/20 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span>Secure payments with buyer protection</span>
                        </div>
                        <div class="flex items-center text-gray-300">
                            <div class="w-6 h-6 bg-green-500/20 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span>Fast shipping & easy returns</span>
                        </div>
                        <div class="flex items-center text-gray-300">
                            <div class="w-6 h-6 bg-green-500/20 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span>Verified vendor ratings & reviews</span>
                        </div>
                    </div>
                    
                    <!-- CTA Button -->
                    <a href="{{ route('shop') }}" 
                       class="group/btn w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold  hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <span>Start Shopping</span>
                        <svg class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    
                    <!-- Stats -->
                    <div class="mt-8 pt-6 border-t border-white/20">
                        <div class="flex justify-between">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-orange-400">10K+</div>
                                <div class="text-xs text-gray-400">Happy Customers</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-orange-400">500+</div>
                                <div class="text-xs text-gray-400">Trusted Vendors</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-orange-400">50K+</div>
                                <div class="text-xs text-gray-400">Products Sold</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Card - For Sellers/Vendors -->
            <div class="group bg-white/10 backdrop-blur-md rounded-2xl overflow-hidden border border-white/20 hover:border-green-500/50 transition-all duration-300 hover:shadow-2xl">
                <div class="relative p-8 md:p-10">
                    <!-- Icon -->
                    <div class="mb-8">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-3">Sell Your Products</h3>
                    <p class="text-lg text-green-400 font-semibold mb-4">Become a Vendor</p>
                    <p class="text-gray-300 mb-8 leading-relaxed">
                        Reach thousands of customers and grow your business with us. Start selling today and watch your business thrive.
                    </p>
                    
                    <!-- Benefits -->
                    <div class="space-y-4 mb-10">
                        <div class="flex items-center text-gray-300">
                            <div class="w-6 h-6 bg-green-500/20 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span>Zero upfront fees - pay only when you sell</span>
                        </div>
                        <div class="flex items-center text-gray-300">
                            <div class="w-6 h-6 bg-green-500/20 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span>Easy product listing & inventory management</span>
                        </div>
                        <div class="flex items-center text-gray-300">
                            <div class="w-6 h-6 bg-green-500/20 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span>Reach thousands of active buyers</span>
                        </div>
                        <div class="flex items-center text-gray-300">
                            <div class="w-6 h-6 bg-green-500/20 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span>Dedicated vendor support & analytics</span>
                        </div>
                    </div>
                    
                    <!-- Conditional CTA Button -->
                    @auth
                        @if(auth()->user()->isVendor())
                            <a href="{{ route('vendor.dashboard') }}" 
                               class="group/btn w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold  hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                <span>Go to Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('vendor.apply') }}" 
                               class="group/btn w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold  hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                <span>Become a Vendor</span>
                                <svg class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('signup') }}" 
                           class="group/btn w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold  hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            <span>Sign Up to Sell</span>
                            <svg class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    @endauth
                    
                    <!-- Trust Badges -->
                    <div class="mt-8 pt-6 border-t border-white/20">
                        <div class="flex justify-center space-x-6">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-xs text-gray-400">Trusted Platform</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-xs text-gray-400">Verified Badge</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                                    <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-xs text-gray-400">Secure Payments</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Trust Bar -->
        <div class="mt-20 text-center">
            <div class="max-w-3xl mx-auto">
                <p class="text-gray-300 text-base mb-4">
                    Join <span class="text-white font-semibold">10,000+</span> successful entrepreneurs who started their journey with Vefiri
                </p>
                <div class="flex flex-wrap justify-center items-center gap-6">
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-400 text-sm">No hidden fees</span>
                    </div>
                    <div class="w-1 h-1 bg-gray-500 rounded-full"></div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-400 text-sm">Free registration</span>
                    </div>
                    <div class="w-1 h-1 bg-gray-500 rounded-full"></div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-400 text-sm">24/7 support</span>
                    </div>
                    <div class="w-1 h-1 bg-gray-500 rounded-full"></div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-400 text-sm">Easy setup</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Glass morphism improvements */
    .backdrop-blur-md {
        backdrop-filter: blur(12px);
    }
    
    /* Smooth hover transitions */
    .group:hover .w-20 {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }
    
    /* Button gradient animation */
    .bg-gradient-to-r {
        background-size: 200% 200%;
        transition: all 0.3s ease;
    }
    
    .bg-gradient-to-r:hover {
        background-position: 100% 50%;
    }
</style>