<!-- Hero Section with Background Video -->
<section class="relative min-h-screen overflow-hidden">
    <!-- Background Video -->
    <video id="hero-video" 
           autoplay 
           loop 
           muted 
           playsinline 
           preload="auto"
           class="absolute top-0 left-0 w-full h-full object-cover">
        <source src="{{ asset('videos/vefiri-background.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <!-- Fallback Background Image (shows if video fails) -->
    <div id="fallback-bg" class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
         style="background-image: url('{{ asset('images/hero-fallback.jpg') }}'); background-color: #1a1a2e;">
        <!-- Gradient overlay for fallback -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50"></div>
    </div>
    
    <!-- Dark Overlay for Text Readability -->
    <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
    
    <!-- Gradient Overlay for Smooth Edges -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/40 z-10"></div>
    
    <!-- Content -->
    <div class="relative z-20 min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto text-center">
            <!-- Trust Badge -->
            <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-md rounded-full mb-6 border border-white/20 animate-pulse">
                <svg class="w-5 h-5 text-orange-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-white text-sm font-medium">Marketplace Trusted By Thousands</span>
            </div>
            
            <!-- Main Heading -->
            <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-extrabold text-white mb-6 leading-tight">
                Verified Vendors
                <span class="bg-gradient-to-r from-orange-400 to-orange-600 bg-clip-text text-transparent">Only</span>
            </h1>
            
            <!-- Description -->
            <p class="text-lg sm:text-xl md:text-2xl text-gray-200 mb-10 max-w-3xl mx-auto leading-relaxed">
                Connect with verified sellers. Get authentic products from trusted sources with 100% buyer protection.
            </p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-5 justify-center mb-16">
                <a href="{{ route('signup') }}" 
                   class="group inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-lg">
                    <svg class="w-5 h-5 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Become a Vendor
                </a>
                <a href="{{ route('shop') }}" 
                   class="group inline-flex items-center justify-center px-8 py-4 bg-white/10 backdrop-blur-md border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-gray-900 transition-all duration-300 text-lg">
                    Shop Now
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
            
            <!-- Trust Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                <!-- Feature 1: Vendor Verification -->
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 hover:bg-white/20 transition-all duration-300 group">
                    <div class="flex items-center justify-center space-x-3">
                        <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <span class="text-white font-medium">Vendor Verification</span>
                    </div>
                </div>
                
                <!-- Feature 2: Authenticity Guaranteed -->
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 hover:bg-white/20 transition-all duration-300 group">
                    <div class="flex items-center justify-center space-x-3">
                        <div class="w-10 h-10 bg-blue-500/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                        </div>
                        <span class="text-white font-medium">Authenticity Guaranteed</span>
                    </div>
                </div>
                
                <!-- Feature 3: Secure Payments -->
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 hover:bg-white/20 transition-all duration-300 group">
                    <div class="flex items-center justify-center space-x-3">
                        <div class="w-10 h-10 bg-purple-500/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <span class="text-white font-medium">Secure Payments</span>
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
    });
</script>

<style>
    /* Video background fixes */
    #hero-video {
        object-fit: cover;
        width: 100%;
        height: 100%;
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
</style>