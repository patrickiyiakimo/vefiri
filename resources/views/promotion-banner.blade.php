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
                    <a href="{{ route('signup') }}" 
                       class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base">
                        Get Started Now
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    
                    <a href="{{ route('vendor.apply') }}" 
                       class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-orange-500 text-orange-600 font-semibold hover:bg-orange-50 transition-all duration-300 text-base">
                        Become a Vendor
                    </a>
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
                         class="relative z-10 w-full h-auto object-contain rounded-none">
                </div>
            </div>
        </div>
    </div>
</section>