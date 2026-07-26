@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-orange-500 to-orange-600 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="text-center max-w-4xl mx-auto">
            
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate-fade-in">
                Become a Vefiri <span class="text-orange-200">Logistics Partner</span>
            </h1>
            <p class="text-xl md:text-2xl text-orange-100 mb-4 animate-fade-in-up">
                Earn money by delivering Vefiri products to customers in your area.
            </p>
            <p class="text-lg text-orange-50/90 animate-fade-in-up max-w-2xl mx-auto" style="animation-delay: 0.1s">
                Join our growing network of logistics partners and help us provide exceptional delivery service across the region.
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

<!-- Benefits Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Why Become a <span class="text-orange-600">Logistics Partner?</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Enjoy flexible work, competitive pay, and be part of a growing team
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Benefit 1: Flexible Schedule -->
            <div class="group bg-white rounded-xl p-8 text-center  transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto group-hover:bg-orange-500 transition-colors duration-300">
                        <span class="text-3xl font-bold text-orange-600 group-hover:text-white transition-colors duration-300">1</span>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Flexible Schedule</h3>
                <p class="text-gray-600">Work on your own time. Choose deliveries that fit your availability and lifestyle.</p>
            </div>
            
            <!-- Benefit 2: Good Earnings -->
            <div class="group bg-white rounded-xl p-8 text-center  transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto group-hover:bg-orange-500 transition-colors duration-300">
                        <span class="text-3xl font-bold text-orange-600 group-hover:text-white transition-colors duration-300">2</span>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Good Earnings</h3>
                <p class="text-gray-600">Competitive delivery fees with bonus opportunities for high performance.</p>
            </div>
            
            <!-- Benefit 3: Easy Onboarding -->
            <div class="group bg-white rounded-xl p-8 text-center  transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto group-hover:bg-orange-500 transition-colors duration-300">
                        <span class="text-3xl font-bold text-orange-600 group-hover:text-white transition-colors duration-300">3</span>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Easy Onboarding</h3>
                <p class="text-gray-600">Quick and simple process to get started. Sign up and begin delivering.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                How It <span class="text-orange-600">Works</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Simple steps to become a Vefiri logistics partner
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-500 text-white rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-4 shadow-lg">
                    1
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Sign Up</h3>
                <p class="text-gray-600 text-sm">Complete our simple online application</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-500 text-white rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-4 shadow-lg">
                    2
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Get Verified</h3>
                <p class="text-gray-600 text-sm">We'll verify your details quickly</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-500 text-white rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-4 shadow-lg">
                    3
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Start Delivery</h3>
                <p class="text-gray-600 text-sm">Accept deliveries in your area</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-500 text-white rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-4 shadow-lg">
                    4
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Get Paid</h3>
                <p class="text-gray-600 text-sm">Receive payments weekly</p>
            </div>
        </div>
    </div>
</section>

<!-- Requirements Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">What You Need to Get Started</h2>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900">Valid ID Card</h4>
                            <p class="text-gray-600 text-sm">National ID, Driver's License, or International Passport</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900">Smartphone with Internet</h4>
                            <p class="text-gray-600 text-sm">Android or iOS device to receive delivery requests</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900">Means of Transportation</h4>
                            <p class="text-gray-600 text-sm">Bicycle, motorcycle, or car for deliveries</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900">Bank Account</h4>
                            <p class="text-gray-600 text-sm">For seamless payment processing</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8">
                <div class="text-center mb-6">
                    <div class="text-4xl font-bold text-orange-600 mb-2">Start Earning Today</div>
                    <p class="text-gray-700">Join our logistics team</p>
                </div>
                <div class="text-center mb-6">
                    <div class="text-2xl font-bold text-gray-900">Average Earnings:</div>
                    <div class="text-3xl font-bold text-orange-600 mt-2">₦30,000 - ₦70,000</div>
                    <div class="text-sm text-gray-500 mt-1">per Month</div>
                </div>
                <div class="text-center">
    @auth
        @if(auth()->user()->isLogisticsPartner())
            <a href="{{ route('logistics.dashboard') }}" 
               class="inline-flex items-center justify-center w-full px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300">
                Go to Dashboard
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        @elseif(auth()->user()->hasLogisticsApplication())
            <a href="{{ route('logistics.status') }}" 
               class="inline-flex items-center justify-center w-full px-8 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-semibold hover:shadow-lg duration-300">
                Check Application Status
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </a>
        @else
            <a href="{{ route('logistics.apply') }}" 
               class="inline-flex items-center justify-center w-full px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transition-all duration-300">
                Apply Now
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        @endif
    @else
        <a href="{{ route('login') }}" 
           class="inline-flex items-center justify-center w-full px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transition-all duration-300">
            Login to Apply
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
            </svg>
        </a>
    @endauth
</div>
               
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                What Our <span class="text-orange-600">Partners Say</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Hear from successful Vefiri logistics partners
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="rounded-xl p-6 ">
                <div class="flex items-center mb-4">
                   
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Michael O.</h4>
                        <div class="flex text-yellow-400">★★★★★</div>
                    </div>
                </div>
                <p class="text-gray-600">"Being a logistics partner with Vefiri has changed my life. The flexible schedule allows me to work around my family time."</p>
                <div class="mt-3 text-sm text-orange-600">Earns: ₦50,000/month</div>
            </div>
            
            <div class="rounded-xl p-6 ">
                <div class="flex items-center mb-4">
                   
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Grace A.</h4>
                        <div class="flex text-yellow-400">★★★★★</div>
                    </div>
                </div>
                <p class="text-gray-600">"The onboarding process was quick and easy. I started earning within a week. Highly recommended!"</p>
                <div class="mt-3 text-sm text-orange-600">Earns: ₦65,000/month</div>
            </div>
            
            <div class="rounded-xl p-6 ">
                <div class="flex items-center mb-4">
                    
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">John O.</h4>
                        <div class="flex text-yellow-400">★★★★★</div>
                    </div>
                </div>
                <p class="text-gray-600">"Vefiri pays on time every week. The support team is always available when I need help."</p>
                <div class="mt-3 text-sm text-orange-600">Earns: ₦45,000/month</div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Frequently Asked <span class="text-orange-600">Questions</span>
            </h2>
        </div>
        
        <div class="space-y-4">
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="faq-question w-full text-left px-6 py-4 bg-gray-50 hover:bg-orange-100 transition font-semibold text-gray-900 flex justify-between items-center">
                    How long does it take to get approved?
                    <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 py-4 text-gray-600 border-t border-gray-200">
                    Approval typically takes 2-3 business days after you submit all required documents.
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="faq-question w-full text-left px-6 py-4 bg-gray-50 hover:bg-orange-100 transition font-semibold text-gray-900 flex justify-between items-center">
                    How often do I get paid?
                    <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 py-4 text-gray-600 border-t border-gray-200">
                    Payments are made weekly every Friday via bank transfer.
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="faq-question w-full text-left px-6 py-4 bg-gray-50 hover:bg-orange-100 transition font-semibold text-gray-900 flex justify-between items-center">
                    Do I need my own vehicle?
                    <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 py-4 text-gray-600 border-t border-gray-200">
                    Yes, you need your own means of transportation - bicycle, motorcycle, or car.
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="faq-question w-full text-left px-6 py-4 bg-gray-50 hover:bg-orange-100 transition font-semibold text-gray-900 flex justify-between items-center">
                    Are there any upfront fees?
                    <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 py-4 text-gray-600 border-t border-gray-200">
                    No, there are no upfront fees. You only share a small commission from successful deliveries.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sales CTA Section - Drives Customer & Vendor Actions -->
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
                            <!-- If user is already a vendor, go to vendor dashboard -->
                            <a href="{{ route('vendor.dashboard') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base ">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Vendor Dashboard
                            </a>
                        @elseif(auth()->user()->isLogisticsPartner())
                            <!-- If user is a logistics partner, show shop button -->
                            <a href="{{ route('shop') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base ">
                                Start Shopping
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                            
                            <a href="{{ route('logistics.dashboard') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-orange-500 text-orange-600 font-semibold hover:bg-orange-50 transition-all duration-300 text-base ">
                                Logistics Dashboard
                            </a>
                        @elseif(auth()->user()->hasLogisticsApplication())
                            <!-- If user has pending logistics application -->
                            <a href="{{ route('shop') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base ">
                                Start Shopping
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                            
                            <a href="{{ route('logistics.status') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-yellow-500 text-yellow-600 font-semibold hover:bg-yellow-50 transition-all duration-300 text-base ">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Application Status
                            </a>
                        @else
                            <!-- Regular logged-in user: Show both options -->
                            <a href="{{ route('shop') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base ">
                                Start Shopping
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                            
                            <a href="{{ route('vendor.apply') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-orange-500 text-orange-600 font-semibold hover:bg-orange-50 transition-all duration-300 text-base ">
                                Become a Vendor
                            </a>
                        @endif
                    @else
                        <!-- Guest user: Sign Up and Shop Now -->
                        <a href="{{ route('signup') }}" 
                           class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-base ">
                            Get Started Now
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        
                        <a href="{{ route('shop') }}" 
                           class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-orange-500 text-orange-600 font-semibold hover:bg-orange-50 transition-all duration-300 text-base ">
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
                         class="relative z-10 w-full h-auto object-contain rounded-none">
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // FAQ Toggle Functionality
    document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', () => {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('svg');
            
            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
</script>

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
    
    .rotate-180 {
        transform: rotate(180deg);
    }
</style>
@endsection
