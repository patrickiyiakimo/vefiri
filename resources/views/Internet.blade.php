<!-- Simple Internet Connection Banner -->
<div id="connectionBanner" class="fixed top-16 left-0 right-0 z-[99999] hidden">
    <div class="bg-yellow-50 border-b border-yellow-400 px-3 sm:px-4 py-2 sm:py-3 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-2 sm:gap-4">
            <div class="flex items-center gap-2 sm:gap-3 flex-1 min-w-0">
                <!-- Warning Icon -->
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                
                <!-- Simple Message -->
                <p class="text-xs sm:text-sm text-yellow-800 truncate">
                    <span id="connectionStatusText">Poor internet connection</span>
                </p>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex items-center gap-1 sm:gap-2 flex-shrink-0">
                <button onclick="hideConnectionBanner()" class="text-yellow-700 hover:text-yellow-900 text-xs sm:text-sm px-2 py-0.5 sm:px-3 sm:py-1 hover:bg-yellow-100 transition">
                    Dismiss
                </button>
                <button onclick="location.reload()" class="text-white bg-yellow-600 hover:bg-yellow-700 text-xs sm:text-sm px-3 py-0.5 sm:px-4 sm:py-1 transition">
                    Retry
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Offline Banner -->
<div id="offlineBanner" class="fixed inset-0 z-[99999] bg-black/50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-2xl p-6 max-w-sm w-full">
        <div class="text-center">
            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                </svg>
            </div>
            <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-2">You're Offline</h3>
            <p class="text-sm sm:text-base text-gray-600 mb-6">Please check your internet connection and try again.</p>
            <button onclick="location.reload()" class="px-5 sm:px-6 py-2 sm:py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold hover:shadow-lg transition text-sm sm:text-base">
                Retry Connection
            </button>
        </div>
    </div>
</div>

<script>
    (function() {
        let connectionBanner = document.getElementById('connectionBanner');
        let offlineBanner = document.getElementById('offlineBanner');
        let connectionStatusText = document.getElementById('connectionStatusText');
        
        let isBannerVisible = false;
        let connectionCheckInterval = null;
        let poorConnectionCount = 0;
        
        // Get connection information
        function getConnectionInfo() {
            if (!navigator.connection) {
                return { effectiveType: 'unknown', downlink: 0, rtt: 0 };
            }
            const conn = navigator.connection;
            return {
                effectiveType: conn.effectiveType || 'unknown',
                downlink: conn.downlink || 0,
                rtt: conn.rtt || 0
            };
        }
        
        // Check if connection is poor
        function isConnectionPoor() {
            const info = getConnectionInfo();
            
            if (info.effectiveType === 'slow-2g' || info.effectiveType === '2g') {
                return true;
            }
            
            if (info.effectiveType === '3g' && info.downlink < 1) {
                return true;
            }
            
            if (info.downlink < 0.8) {
                return true;
            }
            
            if (info.rtt > 400) {
                return true;
            }
            
            return false;
        }
        
        // Show connection banner
        function showConnectionBanner() {
            if (isBannerVisible) return;
            
            connectionBanner.classList.remove('hidden');
            connectionBanner.style.display = 'block';
            isBannerVisible = true;
        }
        
        // Hide connection banner
        function hideConnectionBanner() {
            connectionBanner.style.display = 'none';
            connectionBanner.classList.add('hidden');
            isBannerVisible = false;
        }
        
        // Show offline banner
        function showOfflineBanner() {
            offlineBanner.classList.remove('hidden');
            offlineBanner.style.display = 'flex';
        }
        
        // Hide offline banner
        function hideOfflineBanner() {
            offlineBanner.style.display = 'none';
            offlineBanner.classList.add('hidden');
        }
        
        // Check connection status
        function checkConnection() {
            const online = navigator.onLine;
            
            if (!online) {
                hideConnectionBanner();
                showOfflineBanner();
                return;
            }
            
            hideOfflineBanner();
            
            if (isConnectionPoor()) {
                showConnectionBanner();
                poorConnectionCount++;
            } else {
                hideConnectionBanner();
                poorConnectionCount = 0;
            }
        }
        
        // Initialize
        function init() {
            checkConnection();
            
            connectionCheckInterval = setInterval(checkConnection, 8000);
            
            window.addEventListener('online', function() {
                checkConnection();
            });
            
            window.addEventListener('offline', function() {
                showOfflineBanner();
            });
            
            if (navigator.connection) {
                navigator.connection.addEventListener('change', function() {
                    checkConnection();
                });
            }
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
        } else {
            init();
        }
        
        window.addEventListener('beforeunload', function() {
            if (connectionCheckInterval) {
                clearInterval(connectionCheckInterval);
            }
        });
        
        // Make functions globally accessible
        window.hideConnectionBanner = hideConnectionBanner;
        window.hideOfflineBanner = hideOfflineBanner;
    })();
</script>

<style>
    /* Mobile responsiveness */
    #connectionBanner .bg-yellow-50 {
        border-bottom: 2px solid #f59e0b;
    }
    
    @media (max-width: 480px) {
        #connectionBanner .px-3 {
            padding-left: 10px;
            padding-right: 10px;
        }
        
        #connectionBanner .py-2 {
            padding-top: 8px;
            padding-bottom: 8px;
        }
        
        #connectionBanner .gap-2 {
            gap: 6px;
        }
        
        #offlineBanner .p-6 {
            padding: 20px;
        }
        
        #offlineBanner .w-16 {
            width: 56px;
            height: 56px;
        }
        
        #offlineBanner .w-8 {
            width: 28px;
            height: 28px;
        }
    }
</style>