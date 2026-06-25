<!-- Hero Section with Responsive Background Video -->
<section class="relative overflow-hidden bg-black">
    <!-- Video Container with Aspect Ratio Control -->
    <div class="absolute inset-0">
        <!-- Mobile Video (portrait optimized) -->
        <video id="hero-video-mobile" 
               autoplay 
               loop 
               muted 
               playsinline 
               preload="auto"
               class="w-full h-full object-cover object-center md:hidden"
               style="display: none;">
            <source src="{{ asset('videos/vefiri-background-mobile.mp4') }}" type="video/mp4">
            <source src="{{ asset('videos/vefiri-background.mp4') }}" type="video/mp4">
        </video>
        
        <!-- Desktop Video (landscape optimized) -->
        <video id="hero-video-desktop" 
               autoplay 
               loop 
               muted 
               playsinline 
               preload="auto"
               class="w-full h-full object-cover object-center hidden md:block">
            <source src="{{ asset('videos/vefiri-background.mp4') }}" type="video/mp4">
            <source src="{{ asset('videos/vefiri-background-mobile.mp4') }}" type="video/mp4">
        </video>
        
        <!-- Fallback Background Image -->
        <div id="fallback-bg" class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-0 transition-opacity duration-1000" 
             style="background-image: url('{{ asset('images/hero-fallback.jpg') }}'); background-color: #1a1a2e;">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50"></div>
        </div>
    </div>
    
    <!-- Dark Overlays -->
    <div class="absolute inset-0 bg-black/40 z-10"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/40 z-10"></div>
    
    <!-- Pattern Overlay -->
    <div class="absolute inset-0 opacity-5 z-10" 
         style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
    </div>
    
    <!-- Content -->
    <div class="relative z-20 flex flex-col items-center justify-center px-4 sm:px-6 py-12 min-h-[70vh] md:min-h-[85vh] lg:min-h-[100vh] xl:min-h-[100vh] 2xl:min-h-[85vh]">
        <div class="mx-auto w-full text-center max-w-3xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl px-4 md:px-0">
            
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-extrabold text-white mb-4 sm:mb-6 leading-tight">
                Verified Vendors
                <span class="bg-gradient-to-r from-orange-400 to-orange-600 bg-clip-text text-transparent block sm:inline">Only</span>
            </h1>
            
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-200 mb-8 sm:mb-10 max-w-3xl mx-auto leading-relaxed px-4 md:px-0">
                Connect with verified sellers. Get authentic products from trusted sources with 100% buyer protection.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-5 justify-center mb-12 sm:mb-16 px-4 sm:px-0">
                @auth
                    @if(auth()->user()->isVendor())
                        <a href="{{ route('vendor.dashboard') }}" 
                           class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-base sm:text-lg">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Vendor Dashboard
                        </a>
                    @elseif(auth()->user()->isLogisticsPartner())
                        <a href="{{ route('logistics.dashboard') }}" 
                           class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-base sm:text-lg">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                            Logistics Dashboard
                        </a>
                    @elseif(auth()->user()->hasLogisticsApplication())
                        <a href="{{ route('logistics.status') }}" 
                           class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-semibold hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-base sm:text-lg">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Application Status
                        </a>
                    @else
                        <a href="{{ route('vendor.apply') }}" 
                           class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-base sm:text-lg">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Become a Vendor
                        </a>
                    @endif
                @else
                    <a href="{{ route('signup') }}" 
                       class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-base sm:text-lg">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Get Started
                    </a>
                @endauth
                
                <a href="{{ route('shop') }}" 
                   class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-white/10 backdrop-blur-md border-2 border-white text-white font-semibold  hover:bg-white hover:text-gray-900 transition-all duration-300 text-base sm:text-lg">
                    Shop Now
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileVideo = document.getElementById('hero-video-mobile');
    const desktopVideo = document.getElementById('hero-video-desktop');
    const fallbackBg = document.getElementById('fallback-bg');
    
    // Function to handle video playback
    function setupVideo(video, isMobile = false) {
        if (!video) return;
        
        video.loop = true;
        video.style.opacity = '0';
        video.style.transition = 'opacity 1s ease-in-out';
        
        // For mobile, ensure proper display
        if (isMobile) {
            video.style.objectFit = 'cover';
            video.style.width = '100%';
            video.style.height = '100%';
        }
        
        const playPromise = video.play();
        
        if (playPromise !== undefined) {
            playPromise.then(() => {
                video.style.opacity = '1';
                if (fallbackBg) fallbackBg.style.opacity = '0';
            }).catch(error => {
                console.log('Auto-play prevented on ' + (isMobile ? 'mobile' : 'desktop'));
                if (fallbackBg) fallbackBg.style.opacity = '1';
                
                // Try to play on user interaction
                document.addEventListener('click', function playOnClick() {
                    video.play().then(() => {
                        video.style.opacity = '1';
                        if (fallbackBg) fallbackBg.style.opacity = '0';
                    }).catch(() => {});
                    document.removeEventListener('click', playOnClick);
                }, { once: true });
            });
        }
        
        // Handle video errors
        video.addEventListener('error', function() {
            console.log('Video failed to load on ' + (isMobile ? 'mobile' : 'desktop'));
            if (fallbackBg) fallbackBg.style.opacity = '1';
        });
        
        // Handle successful load
        video.addEventListener('canplay', function() {
            if (video.style.opacity === '0') {
                video.style.opacity = '1';
            }
        });
    }
    
    // Check screen size and show appropriate video
    function handleVideoDisplay() {
        const isMobile = window.innerWidth < 768;
        
        if (mobileVideo && desktopVideo) {
            if (isMobile) {
                mobileVideo.style.display = 'block';
                desktopVideo.style.display = 'none';
                setupVideo(mobileVideo, true);
            } else {
                mobileVideo.style.display = 'none';
                desktopVideo.style.display = 'block';
                setupVideo(desktopVideo, false);
            }
        }
    }
    
    // Initial setup
    handleVideoDisplay();
    
    // Handle resize with debounce
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            handleVideoDisplay();
        }, 250);
    });
    
    // IOS specific fixes
    const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent);
    if (isIOS) {
        [mobileVideo, desktopVideo].forEach(video => {
            if (video) {
                video.style.width = '100%';
                video.style.height = '100%';
                video.style.objectFit = 'cover';
            }
        });
    }
});
</script>

<style>
/* Video containers */
#hero-video-mobile,
#hero-video-desktop {
    object-fit: cover;
    width: 100%;
    height: 100%;
    object-position: center center;
}

/* Responsive height control */
section {
    min-height: 70vh;
    height: auto;
    background-color: #0a0a1a;
}

.relative.z-20 {
    min-height: 70vh;
    padding-top: 3rem;
    padding-bottom: 3rem;
}

/* Mobile: optimized portrait view */
@media (max-width: 640px) {
    section {
        min-height: 80vh !important;
    }
    
    .relative.z-20 {
        min-height: 80vh !important;
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
    }
    
    h1 {
        font-size: 2.5rem !important;
        line-height: 1.2 !important;
    }
    
    /* Ensure video covers full area on mobile */
    #hero-video-mobile {
        object-fit: cover !important;
        object-position: center 30% !important;
    }
}

/* Tablet: medium height */
@media (min-width: 641px) and (max-width: 1024px) {
    section {
        min-height: 85vh !important;
    }
    
    .relative.z-20 {
        min-height: 85vh !important;
    }
}

/* Laptop: full height */
@media (min-width: 1025px) and (max-width: 1919px) {
    section {
        min-height: 100vh !important;
    }
    
    .relative.z-20 {
        min-height: 100vh !important;
    }
}

/* Ultrawide: slightly shorter */
@media (min-width: 1920px) {
    section {
        min-height: 85vh !important;
    }
    
    .relative.z-20 {
        min-height: 85vh !important;
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
    }
}

/* Hide video controls */
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

/* Fallback image transition */
#fallback-bg {
    transition: opacity 1s ease-in-out;
}

/* Smooth scroll */
html {
    scroll-behavior: smooth;
}
</style>