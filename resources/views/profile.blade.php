@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Profile</h1>
            <p class="text-gray-600 mt-2">Manage your account settings and preferences</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Navigation -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden sticky top-24">
                    <div class="p-6 text-center border-b border-gray-200">
                        <div class="w-24 h-24 mx-auto bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white text-3xl font-bold mb-4">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <h3 class="font-semibold text-gray-900">{{ Auth::user()->name }}</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ Auth::user()->email }}</p>
                        <span class="inline-block mt-2 px-2 py-1 bg-{{ Auth::user()->isAdmin() ? 'red' : (Auth::user()->isVendor() ? 'green' : 'blue') }}-100 text-{{ Auth::user()->isAdmin() ? 'red' : (Auth::user()->isVendor() ? 'green' : 'blue') }}-700 text-xs rounded-full">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                    </div>
                    
                    <div class="p-4">
                        <button class="profile-tab-btn w-full text-left px-4 py-2 rounded-lg transition mb-2 active" data-tab="personal">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Personal Information
                            </div>
                        </button>
                        
                        <button class="profile-tab-btn w-full text-left px-4 py-2 rounded-lg transition mb-2" data-tab="security">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Security & Password
                            </div>
                        </button>
                        
                        <button class="profile-tab-btn w-full text-left px-4 py-2 rounded-lg transition mb-2" data-tab="orders">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                My Orders
                            </div>
                        </button>
                        
                        <button class="profile-tab-btn w-full text-left px-4 py-2 rounded-lg transition mb-2" data-tab="wishlist">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                Wishlist
                            </div>
                        </button>
                        
                        @if(Auth::user()->isVendor())
                        <button class="profile-tab-btn w-full text-left px-4 py-2 rounded-lg transition mb-2" data-tab="vendor">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Store Settings
                            </div>
                        </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:w-3/4">
                <!-- Personal Information Tab -->
                <div id="tab-personal" class="profile-tab-content">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Personal Information</h2>
                        
                        <form id="profile-form" method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Full Name *
                                    </label>
                                    <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" 
                                        class="w-full px-4 py-2 border  rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('name') border-red-500 @enderror"
                                        required>
                                    @error('name')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Email Address *
                                    </label>
                                    <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" 
                                        class="w-full px-4 py-2 border  rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('email') border-red-500 @enderror"
                                        required>
                                    @error('email')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                        Phone Number
                                    </label>
                                    <input type="tel" name="phone" id="phone" value="{{ old('phone', Auth::user()->phone) }}" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                </div>
                                
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                        Address
                                    </label>
                                    <textarea name="address" id="address" rows="2" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">{{ old('address', Auth::user()->address) }}</textarea>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:shadow-lg transition">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                        
                        @if(session('success'))
                            <div class="mt-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="mt-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Security & Password Tab -->
                <div id="tab-security" class="profile-tab-content hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Change Password</h2>
                        
                        <form id="password-form" method="POST" action="{{ route('profile.password') }}">
                            @csrf
                            @method('PUT')
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                                        Current Password *
                                    </label>
                                    <input type="password" name="current_password" id="current_password" 
                                        class="w-full px-4 py-2 border  rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('current_password') border-red-500 @enderror"
                                        required>
                                    @error('current_password')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                        New Password *
                                    </label>
                                    <input type="password" name="password" id="password" 
                                        class="w-full px-4 py-2 border  rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('password') border-red-500 @enderror"
                                        required>
                                    @error('password')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                        Confirm New Password *
                                    </label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                                        required>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:shadow-lg transition">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Orders Tab -->
<div id="tab-orders" class="profile-tab-content hidden">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-900">My Orders</h2>
            <a href="{{ route('orders.index') }}" class="text-orange-600 hover:text-orange-700 transition text-sm font-medium flex items-center">
                View All Orders
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        
        @php
            $recentOrders = \App\Models\Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->limit(5)->get();
        @endphp
        
        @if($recentOrders->count() > 0)
            <div class="divide-y divide-gray-200">
                @foreach($recentOrders as $order)
                <div class="p-6 hover:bg-gray-50 transition">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                        <div>
                            <p class="text-sm font-semibold text-gray-900">#{{ $order->order_number }}</p>
                            <p class="text-xs text-gray-500">{{ $order->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="mt-2 md:mt-0">
                            <span class="px-2 py-1 text-xs rounded-full 
                                {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : 
                                   ($order->status === 'processing' ? 'bg-blue-100 text-blue-700' : 
                                   ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-700')) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-between items-end">
                        <div>
                            <p class="text-lg font-bold text-orange-600">₦{{ number_format($order->total, 2) }}</p>
                            <p class="text-xs text-gray-500">{{ $order->items->count() }} item(s)</p>
                        </div>
                        <a href="{{ route('orders.show', $order) }}" class="text-orange-600 hover:text-orange-700 transition text-sm font-medium">
                            View Details →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            @if($recentOrders->count() >= 5)
            <div class="p-4 bg-gray-50 text-center">
                <a href="{{ route('orders.index') }}" class="text-orange-600 hover:text-orange-700 transition text-sm">
                    View all orders →
                </a>
            </div>
            @endif
        @else
            <div class="p-12 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <p class="text-gray-500">You haven't placed any orders yet.</p>
                <a href="{{ route('shop') }}" class="inline-block mt-4 text-orange-600 hover:text-orange-700 transition">
                    Start Shopping →
                </a>
            </div>
        @endif
    </div>
</div>

                <!-- Wishlist Tab -->
                <div id="tab-wishlist" class="profile-tab-content hidden">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-xl font-bold text-gray-900">My Wishlist</h2>
                        </div>
                        
                        @php
                            $wishlist = \App\Models\Wishlist::where('user_id', Auth::id())->with('product')->get();
                        @endphp
                        
                        @if($wishlist->count() > 0)
                            <div class="divide-y divide-gray-200">
                                @foreach($wishlist as $item)
                                <div class="p-6 hover:bg-gray-50 transition">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-4 flex-1">
                                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                                @if($item->product->images && is_array($item->product->images) && count($item->product->images) > 0)
                                                    <img src="{{ asset('storage/' . $item->product->images[0]) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                                @else
                                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                @endif
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900">{{ $item->product->name }}</h3>
                                                <p class="text-sm text-gray-500">{{ $item->product->sku }}</p>
                                                <p class="text-lg font-bold text-orange-600 mt-1">₦{{ number_format($item->product->price, 2) }}</p>
                                            </div>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button onclick="addToCart({{ $item->product->id }})" class="px-4 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:shadow-lg transition text-sm">
                                                Add to Cart
                                            </button>
                                            <button onclick="removeFromWishlist({{ $item->id }})" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="p-12 text-center">
                                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <p class="text-gray-500">Your wishlist is empty.</p>
                                <a href="{{ route('shop') }}" class="inline-block mt-4 text-orange-600 hover:text-orange-700 transition">
                                    Browse Products →
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Vendor Store Settings Tab -->
                @if(Auth::user()->isVendor())
                <div id="tab-vendor" class="profile-tab-content hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Store Settings</h2>
                        
                        <form id="vendor-form" method="POST" action="{{ route('profile.vendor.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="space-y-6">
                                <div>
                                    <label for="store_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Store Name *
                                    </label>
                                    <input type="text" name="store_name" id="store_name" value="{{ old('store_name', Auth::user()->store_name) }}" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                                        required>
                                </div>
                                
                                <div>
                                    <label for="store_description" class="block text-sm font-medium text-gray-700 mb-2">
                                        Store Description
                                    </label>
                                    <textarea name="store_description" id="store_description" rows="4" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">{{ old('store_description', Auth::user()->store_description) }}</textarea>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="store_logo" class="block text-sm font-medium text-gray-700 mb-2">
                                            Store Logo
                                        </label>
                                        <input type="file" name="store_logo" id="store_logo" accept="image/*"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                        <p class="mt-1 text-xs text-gray-500">Recommended size: 200x200px</p>
                                    </div>
                                    
                                    <div>
                                        <label for="store_banner" class="block text-sm font-medium text-gray-700 mb-2">
                                            Store Banner
                                        </label>
                                        <input type="file" name="store_banner" id="store_banner" accept="image/*"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                        <p class="mt-1 text-xs text-gray-500">Recommended size: 1920x400px</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:shadow-lg transition">
                                    Update Store Settings
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    // Tab switching functionality
    document.querySelectorAll('.profile-tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const tabId = this.dataset.tab;
            
            // Update active button state
            document.querySelectorAll('.profile-tab-btn').forEach(b => {
                b.classList.remove('active');
                b.classList.remove('bg-orange-50', 'text-orange-600');
                b.classList.add('text-gray-700');
            });
            this.classList.add('active');
            this.classList.add('bg-orange-50', 'text-orange-600');
            this.classList.remove('text-gray-700');
            
            // Hide all tab contents
            document.querySelectorAll('.profile-tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Show selected tab content
            document.getElementById(`tab-${tabId}`).classList.remove('hidden');
        });
    });
    
    // Add to cart function
    function addToCart(productId) {
        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ product_id: productId, quantity: 1 })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Product added to cart!', 'success');
                if (window.updateCartCount) {
                    window.updateCartCount(data.cart_count);
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Error adding to cart', 'error');
        });
    }
    
    // Remove from wishlist
    function removeFromWishlist(wishlistId) {
        if (confirm('Remove this item from your wishlist?')) {
            fetch('/wishlist/remove', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ wishlist_id: wishlistId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error removing from wishlist', 'error');
            });
        }
    }
    
    // View order details
    function viewOrder(orderId) {
        window.location.href = `/orders/${orderId}`;
    }
    
    // Notification function
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `fixed top-20 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300 translate-x-full ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        }`;
        notification.innerHTML = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
</script>

<style>
    .profile-tab-btn.active {
        background-color: rgb(255, 237, 213);
        color: rgb(249, 115, 22);
    }
    
    .profile-tab-btn:hover:not(.active) {
        background-color: rgb(249, 250, 251);
    }
</style>
@endsection