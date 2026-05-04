<!-- Cookie Consent Banner -->
<div id="cookie-banner" class="fixed bottom-0 left-0 right-0 z-50 transform translate-y-full transition-transform duration-500 ease-in-out">
    <div class="bg-gray-900/95 backdrop-blur-md border-t border-gray-700 shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-white font-semibold text-lg">🍪 Cookie Consent</h3>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        We use cookies to enhance your browsing experience, serve personalized content, and analyze our traffic. 
                        By clicking "Accept All", you consent to our use of cookies. 
                        <a href="#" class="text-orange-400 hover:text-orange-300 underline transition">Learn more</a>
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 flex-shrink-0">
                    <button id="cookie-reject" class="px-5 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm font-medium rounded-lg transition duration-300">
                        Reject All
                    </button>
                    <button id="cookie-accept" class="px-6 py-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white text-sm font-semibold rounded-lg transition duration-300 shadow-lg">
                        Accept All
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cookieBanner = document.getElementById('cookie-banner');
        const acceptBtn = document.getElementById('cookie-accept');
        const rejectBtn = document.getElementById('cookie-reject');
        
        // Check if user has already made a choice
        const cookieChoice = localStorage.getItem('cookie_consent');
        
        if (!cookieChoice) {
            // Show banner with animation
            setTimeout(() => {
                cookieBanner.classList.remove('translate-y-full');
                cookieBanner.classList.add('translate-y-0');
            }, 1000);
        }
        
        // Accept cookies
        function acceptCookies() {
            localStorage.setItem('cookie_consent', 'accepted');
            localStorage.setItem('cookie_consent_date', new Date().toISOString());
            
            // Animate out
            cookieBanner.classList.remove('translate-y-0');
            cookieBanner.classList.add('translate-y-full');
            
            // You can enable analytics/tracking here
            enableAnalytics();
            
            setTimeout(() => {
                cookieBanner.style.display = 'none';
            }, 500);
        }
        
        // Reject cookies
        function rejectCookies() {
            localStorage.setItem('cookie_consent', 'rejected');
            localStorage.setItem('cookie_consent_date', new Date().toISOString());
            
            // Animate out
            cookieBanner.classList.remove('translate-y-0');
            cookieBanner.classList.add('translate-y-full');
            
            // Disable analytics if you have any
            disableAnalytics();
            
            setTimeout(() => {
                cookieBanner.style.display = 'none';
            }, 500);
        }
        
        // Example analytics function (customize as needed)
        function enableAnalytics() {
            console.log('Analytics enabled');
            // Add Google Analytics, Facebook Pixel, etc.
            // Example: gtag('consent', 'update', { analytics_storage: 'granted' });
        }
        
        function disableAnalytics() {
            console.log('Analytics disabled');
            // Example: gtag('consent', 'update', { analytics_storage: 'denied' });
        }
        
        // Event listeners
        if (acceptBtn) acceptBtn.addEventListener('click', acceptCookies);
        if (rejectBtn) rejectBtn.addEventListener('click', rejectCookies);
    });
</script>