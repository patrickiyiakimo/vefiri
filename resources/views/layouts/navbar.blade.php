<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Vefiri') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Custom transitions for smooth dropdown */
        .dropdown-enter {
            transition: all 0.3s ease;
        }
        @media (max-width: 768px) {
            .mobile-menu-open {
                overflow: hidden;
            }
        }
        
        /* Smooth dropdown animation */
        .dropdown-content {
            transition: all 0.3s ease;
        }
        
        /* Mobile menu slide animation */
        .mobile-menu-enter {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .mobile-menu-enter-active {
            max-height: 500px;
            opacity: 1;
        }
        
        .mobile-menu-leave {
            max-height: 500px;
            opacity: 1;
        }
        
        .mobile-menu-leave-active {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        /* Cart count animation */
        .cart-count-updated {
            animation: bounce 0.3s ease;
        }
        
        @keyframes bounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.3); }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 lg:h-20">
                <!-- Logo Section -->
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}" class="flex items-center space-x-1 group">
                        <div>
                            <span class="text-white font-bold text-xl">
                                <img src="{{ asset('/images/PHOTO-2026-03-18-03-30-30.jpg') }}" alt="Vefiri Logo" class="w-12 h-12">
                            </span>
                        </div>
                        <span class="text-2xl font-bold bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent">
                            Vefiri
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center space-x-1 lg:space-x-8">
                    <!-- <a href="{{ url('/') }}" class="px-3 py-2 text-gray-700 font-medium hover:text-orange-500 transition duration-300 relative group">
                        Home
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-500 group-hover:w-full transition-all duration-300"></span>
                    </a> -->
                    <a href="{{ route('shop') }}" class="px-3 py-2 text-gray-700 font-medium hover:text-orange-500 transition duration-300 relative group">
                        Shop
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-500 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('about') }}" class="px-3 py-2 text-gray-700 font-medium hover:text-orange-500 transition duration-300 relative group">
                        About
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-500 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('vendor') }}" class="px-3 py-2 text-gray-700 font-medium hover:text-orange-500 transition duration-300 relative group">
                        Vendors
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-500 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    
                    <!-- Logistics Link - Shows differently based on user status -->
                    @auth
                        @if(auth()->user()->isLogisticsPartner())
                            <a href="{{ route('logistics.dashboard') }}" class="px-3 py-2 text-orange-600 font-medium hover:text-orange-700 transition duration-300 relative group">
                                Logistics Dashboard
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-500 group-hover:w-full transition-all duration-300"></span>
                            </a>
                        @elseif(auth()->user()->hasLogisticsApplication())
                            <a href="{{ route('logistics.status') }}" class="px-3 py-2 text-yellow-600 font-medium hover:text-yellow-700 transition duration-300 relative group">
                                Application Status
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 group-hover:w-full transition-all duration-300"></span>
                            </a>
                        @else
                            <a href="{{ route('logistics') }}" class="px-3 py-2 text-gray-700 font-medium hover:text-orange-500 transition duration-300 relative group">
                                Logistics
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-500 group-hover:w-full transition-all duration-300"></span>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('logistics') }}" class="px-3 py-2 text-gray-700 font-medium hover:text-orange-500 transition duration-300 relative group">
                            Logistics
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-500 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    @endauth
                </div>

                <!-- Right Section: Cart & Auth -->
                <div class="flex items-center space-x-4">
                    <!-- Cart Icon -->
                    <a href="{{ url('/cart') }}" class="relative text-gray-700 hover:text-orange-500 transition duration-300 p-2 rounded-full hover:bg-orange-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6" />
                        </svg>
                        @php
                            $cartCount = session('cart_count', 0);
                        @endphp
                        @if($cartCount > 0)
                            <span class="cart-count-badge absolute -top-1 -right-1 bg-orange-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center animate-pulse">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <!-- Desktop Authentication -->
                    <div class="hidden md:block">
                        @auth
                            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                                <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none group">
                                    <div class="w-8 h-8 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white font-semibold">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    <div class="text-left">
                                        <p class="text-sm font-medium text-gray-700 group-hover:text-orange-500">
                                            {{ Auth::user()->name }}
                                        </p>
                                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                    </div>
                                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                
                                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2" class="absolute right-0 mt-3 w-80 bg-white rounded-lg shadow-2xl ring-1 ring-black ring-opacity-5 overflow-hidden" style="display: none;">
                                    <div class="p-4 border-b border-gray-100">
                                        <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-500 mt-1">{{ Auth::user()->email }}</p>
                                    </div>
                                    <div class="py-2">
                                        <!-- Dashboard - Only show for Admin and Vendor -->
                                        @if(Auth::user()->isAdmin() || Auth::user()->isVendor())
                                            <a href="{{ Auth::user()->isAdmin() ? url('/admin/dashboard') : url('/vendor/dashboard') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition">
                                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                                </svg>
                                                Dashboard
                                            </a>
                                        @endif
                                        
                                        <!-- Logistics Dashboard/Status for Logistics Partners -->
                                        @if(Auth::user()->isLogisticsPartner())
                                            <a href="{{ route('logistics.dashboard') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition">
                                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                                                </svg>
                                                Logistics Dashboard
                                            </a>
                                        @elseif(Auth::user()->hasLogisticsApplication())
                                            <a href="{{ route('logistics.status') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition">
                                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Logistics Application Status
                                            </a>
                                        @endif
                                        
                                        <a href="{{ url('/profile') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition">
                                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            My Profile
                                        </a>
                                        <a href="{{ url('/orders') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition">
                                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                            </svg>
                                            My Orders
                                        </a>
                                        
                                        <!-- Become a Vendor - Only show for customers who are not vendors -->
                                        @if(Auth::user()->isCustomer())
                                            <a href="{{ route('vendor.apply') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition">
                                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                                Become a Vendor
                                            </a>
                                        @endif
                                    </div>
                                    <div class="border-t border-gray-100 py-2">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition">
                                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                                </svg>
                                                Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('signup') }}" class="px-4 py-2 text-gray-700 font-medium hover:text-orange-500 transition">
                                    Sign Up
                                </a>
                                <a href="{{ route('login') }}" class="px-5 py-2 bg-orange-500 text-white font-medium hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
                                    Login
                                </a>
                            </div>
                        @endauth
                    </div>

                    <!-- Mobile menu button (Hamburger Icon) -->
                    <div class="md:hidden">
                        <button id="mobile-menu-button" class="text-gray-700 hover:text-orange-500 focus:outline-none p-2 rounded-lg hover:bg-gray-100 transition relative z-50">
                            <span class="sr-only">Open main menu</span>
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-100 shadow-lg fixed inset-x-0 top-16 z-40 max-h-[calc(100vh-4rem)] overflow-y-auto">
            <div class="px-4 py-3 space-y-1">
                <!-- Mobile Nav Links -->
                <!-- <a href="{{ url('/') }}" class="flex items-center px-3 py-3 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition group">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Home
                </a> -->
                <a href="{{ route('shop') }}" class="flex items-center px-3 py-3 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition group">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Shop
                </a>
                <a href="{{ route('about') }}" class="flex items-center px-3 py-3 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition group">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    About
                </a>
                <a href="{{ route('vendor') }}" class="flex items-center px-3 py-3 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition group">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Vendors
                </a>
                
                <!-- Mobile Logistics Links -->
                @auth
                    @if(auth()->user()->isLogisticsPartner())
                        <a href="{{ route('logistics.dashboard') }}" class="flex items-center px-3 py-3 text-orange-600 hover:text-orange-700 hover:bg-orange-50 rounded-lg transition group">
                            <svg class="w-5 h-5 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                            Logistics Dashboard
                        </a>
                    @elseif(auth()->user()->hasLogisticsApplication())
                        <a href="{{ route('logistics.status') }}" class="flex items-center px-3 py-3 text-yellow-600 hover:text-yellow-700 hover:bg-yellow-50 rounded-lg transition group">
                            <svg class="w-5 h-5 mr-3 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Application Status
                        </a>
                    @else
                        <a href="{{ route('logistics') }}" class="flex items-center px-3 py-3 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition group">
                            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                            Become Logistics Partner
                        </a>
                    @endif
                @else
                    <a href="{{ route('logistics') }}" class="flex items-center px-3 py-3 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                        </svg>
                        Logistics
                    </a>
                @endauth
                
                <div class="border-t border-gray-100 my-2"></div>
                
                <!-- Mobile Authentication -->
                @auth
                    <div class="px-3 py-2">
                        <div class="flex items-center space-x-3 mb-3 p-3 bg-orange-100 to-orange-100 rounded-lg">
                            <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-600">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        
                        <!-- Dashboard - Only show for Admin and Vendor -->
                        @if(Auth::user()->isAdmin() || Auth::user()->isVendor())
                            <a href="{{ Auth::user()->isAdmin() ? url('/admin/dashboard') : url('/vendor/dashboard') }}" class="flex items-center px-3 py-3 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition group">
                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Dashboard
                            </a>
                        @endif
                        
                        <a href="{{ url('/profile') }}" class="flex items-center px-3 py-3 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition group">
                            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            My Profile
                        </a>
                        <a href="{{ url('/orders') }}" class="flex items-center px-3 py-3 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition group">
                            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            My Orders
                        </a>
                       
                        <!-- Become a Vendor - Only show for customers -->
                        @if(Auth::user()->isCustomer())
                            <a href="{{ route('vendor.apply') }}" class="flex items-center px-3 py-3 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition group">
                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Become a Vendor
                            </a>
                        @endif
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center w-full px-3 py-3 text-red-600 hover:bg-red-50 rounded-lg transition group">
                                <svg class="w-5 h-5 mr-3 text-red-400 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <div class="space-y-2">
                        <a href="{{ route('signup') }}" class="flex items-center px-3 py-3 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition group">
                            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Sign Up
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center justify-center px-3 py-3 bg-orange-600 text-white rounded-lg transition mx-3 hover:from-orange-700 hover:to-orange-500">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Login
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
    
    <main>
        @yield('content')
    </main>

    <script>
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            let menuOpen = false;
            
            if (menuButton && mobileMenu) {
                function toggleMenu() {
                    menuOpen = !menuOpen;
                    
                    if (menuOpen) {
                        mobileMenu.classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                        const svg = menuButton.querySelector('svg');
                        svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                    } else {
                        mobileMenu.classList.add('hidden');
                        document.body.style.overflow = '';
                        const svg = menuButton.querySelector('svg');
                        svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
                    }
                }
                
                menuButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    toggleMenu();
                });
                
                document.addEventListener('click', function(event) {
                    if (menuOpen && !mobileMenu.contains(event.target) && !menuButton.contains(event.target)) {
                        toggleMenu();
                    }
                });
                
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        if (menuOpen) {
                            toggleMenu();
                        }
                    });
                });
                
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && menuOpen) {
                        toggleMenu();
                    }
                });
            }
        });
        
        // Update cart count dynamically
        function updateCartCount(count) {
            const cartBadge = document.querySelector('.cart-count-badge');
            if (cartBadge) {
                if (count > 0) {
                    cartBadge.textContent = count;
                    cartBadge.classList.remove('hidden');
                    cartBadge.classList.add('cart-count-updated');
                    setTimeout(() => {
                        cartBadge.classList.remove('cart-count-updated');
                    }, 300);
                } else {
                    cartBadge.classList.add('hidden');
                }
            }
        }
    </script>
    
    <!-- Include Alpine.js for dropdown functionality -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>