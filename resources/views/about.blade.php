@extends('layouts.app')

@section('content')
<!-- About Hero Section -->
<section class="relative bg-gradient-to-r from-orange-500 to-orange-600 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate-fade-in">
                About <span class="text-orange-200">Vefiri</span>
            </h1>
            <p class="text-xl md:text-2xl text-orange-100 mb-4 animate-fade-in-up">
                Shop Safely with Verified Sellers Across Nigeria
            </p>
            <p class="text-lg text-orange-50/90 animate-fade-in-up" style="animation-delay: 0.1s">
                Connecting trusted sellers with savvy shoppers across Nigeria for a seamless shopping experience
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

<!-- Mission Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="inline-flex items-center px-3 py-1 bg-orange-100 rounded-full">
                    <span class="text-orange-600 text-sm font-semibold">Our Mission</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                    Vefiri is more than just an online marketplace
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    We're creating a trusted ecosystem where quality meets convenience.
                </p>
                <blockquote class="border-l-4 border-orange-500 pl-6 py-2">
                    <p class="text-gray-700 italic leading-relaxed">
                        "We believe in empowering local businesses while providing shoppers with a curated selection of authentic products. Every transaction is backed by our commitment to quality and customer satisfaction."
                    </p>
                    <footer class="mt-3 text-orange-600 font-semibold">
                        — Vefiri Team
                    </footer>
                </blockquote>
                <p class="text-gray-600 leading-relaxed">
                    Whether you're looking for the latest fashion trends, electronics, home essentials, or unique gifts, Vefiri brings you a curated selection from Nigeria's best vendors. We're building a community where local businesses thrive and shoppers find exactly what they need.
                </p>
            </div>
            <div class="relative">
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-orange-200 rounded-full opacity-50 blur-2xl"></div>
                <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-orange-300 rounded-full opacity-50 blur-2xl"></div>
                <div class="relative bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8 shadow-xl">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-orange-600">500+</div>
                            <div class="text-sm text-gray-600 mt-1">Active Sellers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-orange-600">10K+</div>
                            <div class="text-sm text-gray-600 mt-1">Products Listed</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-orange-600">98%</div>
                            <div class="text-sm text-gray-600 mt-1">Customer Satisfaction</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-orange-600">24/7</div>
                            <div class="text-sm text-gray-600 mt-1">Customer Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Why Choose <span class="text-orange-600">Vefiri?</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Experience the best online shopping experience with our unique features
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1: Curated Marketplace -->
            <div class="group bg-white rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-colors duration-300">
                    <svg class="w-8 h-8 text-orange-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Curated Marketplace</h3>
                <p class="text-gray-600">Handpicked products from trusted sellers across Nigeria</p>
            </div>
            
            <!-- Feature 2: Verified Sellers -->
            <div class="group bg-white rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-colors duration-300">
                    <svg class="w-8 h-8 text-orange-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Verified Sellers</h3>
                <p class="text-gray-600">Every vendor undergoes rigorous verification for your safety</p>
            </div>
            
            <!-- Feature 3: Fast Delivery -->
            <div class="group bg-white rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-colors duration-300">
                    <svg class="w-8 h-8 text-orange-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Fast Delivery</h3>
                <p class="text-gray-600">Reliable logistics network ensuring timely doorstep delivery</p>
            </div>
            
            <!-- Feature 4: Best Prices -->
            <div class="group bg-white rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-colors duration-300">
                    <svg class="w-8 h-8 text-orange-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Best Prices</h3>
                <p class="text-gray-600">Competitive pricing with exclusive deals and discounts</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats & Benefits Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Stats Grid -->
            <div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-6 text-center">
                        <div class="text-4xl font-bold text-orange-600 mb-2">500+</div>
                        <div class="text-gray-700 font-semibold">Active Sellers</div>
                        <div class="text-sm text-gray-500 mt-1">Growing daily</div>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 text-center">
                        <div class="text-4xl font-bold text-green-600 mb-2">10K+</div>
                        <div class="text-gray-700 font-semibold">Products Listed</div>
                        <div class="text-sm text-gray-500 mt-1">Always expanding</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2">98%</div>
                        <div class="text-gray-700 font-semibold">Customer Satisfaction</div>
                        <div class="text-sm text-gray-500 mt-1">Happy customers</div>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 text-center">
                        <div class="text-4xl font-bold text-purple-600 mb-2">24/7</div>
                        <div class="text-gray-700 font-semibold">Customer Support</div>
                        <div class="text-sm text-gray-500 mt-1">Always here for you</div>
                    </div>
                </div>
            </div>
            
            <!-- Benefits List -->
            <div class="space-y-6">
                <div>
                    <div class="inline-flex items-center px-3 py-1 bg-orange-100 rounded-full mb-4">
                        <span class="text-orange-600 text-sm font-semibold">Why Shop With Us</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Shopping Benefits</h3>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-start space-x-3 group cursor-pointer">
                        <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:bg-green-500 transition-colors">
                            <svg class="w-4 h-4 text-green-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Secure Payments</h4>
                            <p class="text-gray-600 text-sm">Multiple payment options with advanced encryption for your safety</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3 group cursor-pointer">
                        <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:bg-green-500 transition-colors">
                            <svg class="w-4 h-4 text-green-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Free Delivery on Orders ₦50,000+</h4>
                            <p class="text-gray-600 text-sm">Enjoy free shipping on orders above ₦50,000 across Nigeria</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3 group cursor-pointer">
                        <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:bg-green-500 transition-colors">
                            <svg class="w-4 h-4 text-green-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">30-Day Returns</h4>
                            <p class="text-gray-600 text-sm">Not satisfied? Return within 30 days for a full refund</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3 group cursor-pointer">
                        <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:bg-green-500 transition-colors">
                            <svg class="w-4 h-4 text-green-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Verified Vendors</h4>
                            <p class="text-gray-600 text-sm">All sellers are thoroughly vetted for authenticity and reliability</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-orange-500 to-orange-600">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Ready to Start Shopping?
        </h2>
        <p class="text-lg text-orange-100 mb-8">
            Join thousands of satisfied customers shopping on Vefiri today
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('shop') }}" 
               class="inline-flex items-center justify-center px-8 py-3 bg-white text-orange-600 font-semibold rounded-lg hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                Shop Now
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
            <a href="{{ route('signup') }}" 
               class="inline-flex items-center justify-center px-8 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-orange-600 transition-all duration-300">
                Become a Seller
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fade-in 0.8s ease-out;
    }
    
    .animate-fade-in-up {
        animation: fade-in-up 1s ease-out 0.2s both;
    }
    
    /* Hover animations */
    .group:hover .w-16 {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }
</style>
@endsection