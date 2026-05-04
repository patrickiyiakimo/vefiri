<!-- Hero Section with Background Video -->
<section class="relative min-h-screen overflow-hidden">
    <!-- Background Video Container -->
    <div class="absolute inset-0 flex items-center justify-center">
        <video id="hero-video" 
               autoplay 
               loop 
               muted 
               playsinline 
               preload="auto"
               class="w-full h-full object-cover object-center">
            <source src="{{ asset('videos/vefiri-background.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    
    <!-- Fallback Background Image (shows if video fails) -->
    <div id="fallback-bg" class="absolute inset-0 bg-cover bg-center bg-no-repeat bg-fixed" 
         style="background-image: url('{{ asset('images/hero-fallback.jpg') }}'); background-color: #1a1a2e;">
        <!-- Gradient overlay for fallback -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50"></div>
    </div>
    
    <!-- Dark Overlay for Text Readability -->
    <div class="absolute inset-0 bg-black/50 z-10"></div>
    
    <!-- Gradient Overlay for Smooth Edges -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/40 z-10"></div>
    
    <!-- Pattern Overlay for Texture -->
    <div class="absolute inset-0 opacity-5 z-10" 
         style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
    </div>
    
    <!-- Content -->
    <div class="relative z-20 min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 py-12">
        <div class="max-w-6xl mx-auto text-center">
            <!-- Trust Badge -->
            <div class="inline-flex items-center px-3 sm:px-4 py-1.5 sm:py-2 bg-white/10 backdrop-blur-md rounded-full mb-4 sm:mb-6 border border-white/20 animate-pulse">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-orange-400 mr-1 sm:mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-white text-xs sm:text-sm font-medium">Marketplace Trusted By Thousands</span>
            </div>
            
            <!-- Main Heading -->
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-extrabold text-white mb-4 sm:mb-6 leading-tight">
                Verified Vendors
                <span class="bg-gradient-to-r from-orange-400 to-orange-600 bg-clip-text text-transparent block sm:inline">Only</span>
            </h1>
            
            <!-- Description -->
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-200 mb-8 sm:mb-10 max-w-3xl mx-auto leading-relaxed px-4">
                Connect with verified sellers. Get authentic products from trusted sources with 100% buyer protection.
            </p>
            
           <!-- CTA Buttons -->
<div class="flex flex-col sm:flex-row gap-3 sm:gap-5 justify-center mb-12 sm:mb-16 px-4 sm:px-0">
    @auth
        @if(auth()->user()->isVendor())
            <!-- If user is already a vendor, go to vendor dashboard -->
            <a href="{{ route('vendor.dashboard') }}" 
               class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-base sm:text-lg">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Vendor Dashboard
            </a>
        @elseif(auth()->user()->isLogisticsPartner())
            <!-- If user is a logistics partner -->
            <a href="{{ route('logistics.dashboard') }}" 
               class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-base sm:text-lg">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                </svg>
                Logistics Dashboard
            </a>
        @elseif(auth()->user()->hasLogisticsApplication())
            <!-- If user has pending logistics application -->
            <a href="{{ route('logistics.status') }}" 
               class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-semibold rounded-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-base sm:text-lg">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Application Status
            </a>
        @else
            <!-- If user is logged in but not a vendor, show Become a Vendor button -->
            <a href="{{ route('vendor.apply') }}" 
               class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-base sm:text-lg">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                Become a Vendor
            </a>
        @endif
    @else
        <!-- If user is not logged in, show Sign Up button -->
        <a href="{{ route('signup') }}" 
           class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-base sm:text-lg">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            Get Started
        </a>
    @endauth
    
    <!-- Shop Now Button (Always visible, same for everyone) -->
    <a href="{{ route('shop') }}" 
       class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-white/10 backdrop-blur-md border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-gray-900 transition-all duration-300 text-base sm:text-lg">
        Shop Now
        <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
        </svg>
    </a>
</div>
            
            <!-- Trust Features Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-6 max-w-4xl mx-auto px-4 sm:px-0">
                <!-- Feature 1: Vendor Verification -->
                <div class="bg-white/10 backdrop-blur-md rounded-lg sm:rounded-xl p-3 sm:p-4 border border-white/20 hover:bg-white/20 transition-all duration-300 group">
                    <div class="flex items-center justify-center space-x-2 sm:space-x-3">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-green-500/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <span class="text-white text-xs sm:text-sm md:text-base font-medium">Vendor Verification</span>
                    </div>
                </div>
                
                <!-- Feature 2: Authenticity Guaranteed -->
                <div class="bg-white/10 backdrop-blur-md rounded-lg sm:rounded-xl p-3 sm:p-4 border border-white/20 hover:bg-white/20 transition-all duration-300 group">
                    <div class="flex items-center justify-center space-x-2 sm:space-x-3">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-500/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                        </div>
                        <span class="text-white text-xs sm:text-sm md:text-base font-medium">Authenticity Guaranteed</span>
                    </div>
                </div>
                
                <!-- Feature 3: Secure Payments -->
                <div class="bg-white/10 backdrop-blur-md rounded-lg sm:rounded-xl p-3 sm:p-4 border border-white/20 hover:bg-white/20 transition-all duration-300 group">
                    <div class="flex items-center justify-center space-x-2 sm:space-x-3">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-purple-500/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <span class="text-white text-xs sm:text-sm md:text-base font-medium">Secure Payments</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.getElementById('hero-video');
        const fallbackBg = document.getElementById('fallback-bg');
        
        if (video) {
            // Ensure video loops continuously
            video.loop = true;
            
            // Hide fallback initially
            if (fallbackBg) {
                fallbackBg.style.opacity = '0';
            }
            
            // Force center positioning for video on all devices
            video.style.objectPosition = 'center center';
            
            // Check if it's mobile and adjust video positioning
            const isMobile = window.innerWidth < 768;
            if (isMobile) {
                video.style.objectPosition = 'center center';
                video.style.transform = 'scale(1)';
            }
            
            // Handle resize events to maintain center positioning
            window.addEventListener('resize', function() {
                const mobile = window.innerWidth < 768;
                if (mobile) {
                    video.style.objectPosition = 'center center';
                } else {
                    video.style.objectPosition = 'center center';
                }
            });
            
            // Try to play video
            const playVideo = video.play();
            
            if (playVideo !== undefined) {
                playVideo.catch(error => {
                    console.log('Auto-play was prevented. Showing fallback background.');
                    // Show fallback background if video can't autoplay
                    if (fallbackBg) {
                        fallbackBg.style.opacity = '1';
                    }
                    // Add a click anywhere to play video
                    document.body.addEventListener('click', function playOnClick() {
                        video.play();
                        video.style.opacity = '1';
                        if (fallbackBg) {
                            fallbackBg.style.opacity = '0';
                        }
                        document.body.removeEventListener('click', playOnClick);
                    }, { once: true });
                });
            }
            
            // Handle video error - show fallback
            video.addEventListener('error', function() {
                console.log('Video failed to load, showing fallback background');
                if (fallbackBg) {
                    fallbackBg.style.opacity = '1';
                }
            });
            
            // Fade in video when ready
            video.addEventListener('canplay', function() {
                video.style.opacity = '1';
            });
            
            // Set initial opacity and transition
            video.style.opacity = '0';
            video.style.transition = 'opacity 1s ease-in-out';
            video.style.objectFit = 'cover';
        }
        
        // Fix for iOS Safari video centering
        const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent);
        if (isIOS && video) {
            video.style.width = '100%';
            video.style.height = '100%';
            video.style.objectFit = 'cover';
        }
    });
</script>

<style>
    /* Video background fixes */
    #hero-video {
        object-fit: cover;
        width: 100%;
        height: 100%;
        object-position: center center;
    }
    
    /* Mobile-specific video adjustments */
    @media (max-width: 768px) {
        #hero-video {
            object-position: center center !important;
            width: 100% !important;
            height: 100% !important;
        }
        
        /* Ensure video container is centered */
        .relative .absolute:first-child {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
    
    /* Prevent video controls from showing */
    video::-webkit-media-controls {
        display: none !important;
    }
    
    video::-webkit-media-controls-enclosure {
        display: none !important;
    }
    
    video::-webkit-media-controls-panel {
        display: none !important;
    }
    
    video::-webkit-media-controls-play-button {
        display: none !important;
    }
    
    video::-webkit-media-controls-start-playback-button {
        display: none !important;
    }
    
    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }
    
    /* Fallback background transition */
    #fallback-bg {
        transition: opacity 0.8s ease-in-out;
    }
    
    /* Ensure content is above video and overlays */
    .z-20 {
        z-index: 20;
    }
    
    /* Video container */
    .relative {
        position: relative;
    }
    
    /* Better text readability on mobile */
    @media (max-width: 640px) {
        .backdrop-blur-md {
            backdrop-filter: blur(8px);
        }
    }
    
    /* Fix for iOS Safari */
    @supports (-webkit-touch-callout: none) {
        #hero-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }
</style>