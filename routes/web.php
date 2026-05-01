<?php

use App\Http\Controllers\VendorController;
use App\Http\Controllers\Admin\VendorApprovalController;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// ========== PUBLIC ROUTES ==========
Route::get('/', function () {
    return view('welcome');
})->name('home');

// About page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Shop page
Route::get('/shop', function () {
    $categories = Category::where('is_active', true)->get();
    return view('shop', compact('categories'));
})->name('shop');

// Logistics Partner Page
Route::get('/logistics', function () {
    return view('logistics');
})->name('logistics');

// API route for products (AJAX filtering)
Route::get('/api/products', function (Request $request) {
    $query = Product::where('is_active', true);
    
    // Category filter
    if ($request->category && $request->category !== 'all') {
        $query->where('category_id', $request->category);
    }
    
    // Price range filter
    if ($request->price_range && $request->price_range !== 'all') {
        if ($request->price_range === '5000+') {
            $query->where('price', '>=', 5000);
        } else {
            $range = explode('-', $request->price_range);
            if (count($range) == 2) {
                $query->whereBetween('price', [(float)$range[0], (float)$range[1]]);
            }
        }
    }
    
    // In stock filter
    if ($request->in_stock_only === 'true') {
        $query->where('stock_quantity', '>', 0);
    }
    
    // Search filter
    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
    }
    
    // Sorting
    switch ($request->sort_by) {
        case 'price_low':
            $query->orderBy('price', 'asc');
            break;
        case 'price_high':
            $query->orderBy('price', 'desc');
            break;
        case 'name_asc':
            $query->orderBy('name', 'asc');
            break;
        case 'popular':
            $query->orderBy('sales_count', 'desc');
            break;
        case 'newest':
        default:
            $query->orderBy('created_at', 'desc');
            break;
    }
    
    $products = $query->with('category')->paginate(12);
    
    // Ensure images are properly formatted
    $productsArray = $products->items();
    foreach ($productsArray as $product) {
        if ($product->images) {
            $product->images = is_array($product->images) ? $product->images : json_decode($product->images, true);
        }
    }
    
    // Get category counts for sidebar
    $allCategories = Category::where('is_active', true)->get();
    $categoryCounts = [];
    foreach ($allCategories as $category) {
        $categoryCounts[] = [
            'id' => $category->id,
            'name' => $category->name,
            'total' => Product::where('category_id', $category->id)->where('is_active', true)->count()
        ];
    }
    
    return response()->json([
        'products' => $productsArray,
        'current_page' => $products->currentPage(),
        'last_page' => $products->lastPage(),
        'total' => $products->total(),
        'category_counts' => [
            'all' => Product::where('is_active', true)->count(),
            'categories' => $categoryCounts
        ]
    ]);
})->name('api.products');

Route::get('/partner', function () {
    return view('partner');
})->name('partner');

Route::get('/vendor', function () {
    return view('vendor');
})->name('vendor');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// ========== AUTHENTICATION ROUTES ==========
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    
    Route::post('/login', function (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->isVendor()) {
                return redirect()->intended('/vendor/dashboard');
            } else {
                return redirect()->intended('/shop');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    })->name('login.post');
    
    Route::get('/signup', function () {
        return view('auth.signup');
    })->name('signup');
    
    Route::post('/signup', function (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
            'is_active' => true,
        ]);

        Auth::login($user);
        return redirect('/shop');
    })->name('signup.post');
});

// Profile routes
// create the get route for profile page
Route::get('/profile', function () {
    $user = auth()->user();
    return view('profile', compact('user'));
})->name('profile')->middleware('auth');

Route::put('/profile', function (Illuminate\Http\Request $request) {
    $user = auth()->user();
    
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
    ]);
    
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);
    
    return back()->with('success', 'Profile updated successfully!');
})->name('profile.update');

Route::put('/profile/password', function (Illuminate\Http\Request $request) {
    $request->validate([
        'current_password' => 'required|current_password',
        'password' => 'required|string|min:8|confirmed',
    ]);
    
    auth()->user()->update([
        'password' => Illuminate\Support\Facades\Hash::make($request->password),
    ]);
    
    return back()->with('success', 'Password updated successfully!');
})->name('profile.password');

// Vendor profile update
Route::put('/profile/vendor', function (Illuminate\Http\Request $request) {
    $user = auth()->user();
    
    if (!$user->isVendor()) {
        return back()->with('error', 'Unauthorized access.');
    }
    
    $request->validate([
        'store_name' => 'required|string|max:255',
        'store_description' => 'nullable|string',
        'store_logo' => 'nullable|image|max:2048',
        'store_banner' => 'nullable|image|max:2048',
    ]);
    
    $data = [
        'store_name' => $request->store_name,
        'store_description' => $request->store_description,
    ];
    
    if ($request->hasFile('store_logo')) {
        $logoPath = $request->file('store_logo')->store('stores/logos', 'public');
        $data['store_logo'] = $logoPath;
    }
    
    if ($request->hasFile('store_banner')) {
        $bannerPath = $request->file('store_banner')->store('stores/banners', 'public');
        $data['store_banner'] = $bannerPath;
    }
    
    $user->update($data);
    
    return back()->with('success', 'Store settings updated successfully!');
})->name('profile.vendor.update');

// Vendor listing API (public - no authentication required)
Route::get('/api/vendors', function (Request $request) {
    $query = App\Models\User::where('role', 'vendor')
        ->where('vendor_status', 'approved')
        ->where('is_active', true);
    
    // Search filter
    if ($request->search) {
        $query->where(function($q) use ($request) {
            $q->where('store_name', 'like', '%' . $request->search . '%')
              ->orWhere('name', 'like', '%' . $request->search . '%');
        });
    }
    
    // Sorting
    switch ($request->sort_by) {
        case 'name_desc':
            $query->orderBy('store_name', 'desc');
            break;
        case 'newest':
            $query->orderBy('created_at', 'desc');
            break;
        case 'oldest':
            $query->orderBy('created_at', 'asc');
            break;
        case 'products_high':
            $query->withCount('products')->orderBy('products_count', 'desc');
            break;
        case 'products_low':
            $query->withCount('products')->orderBy('products_count', 'asc');
            break;
        case 'name_asc':
        default:
            $query->orderBy('store_name', 'asc');
            break;
    }
    
    $vendors = $query->withCount('products')->paginate(12);
    
    return response()->json([
        'vendors' => $vendors->items(),
        'current_page' => $vendors->currentPage(),
        'last_page' => $vendors->lastPage(),
        'total' => $vendors->total()
    ]);
})->name('api.vendors');

// Get single vendor details with products
Route::get('/api/vendors/{id}', function ($id) {
    $vendor = App\Models\User::where('role', 'vendor')
        ->where('vendor_status', 'approved')
        ->where('is_active', true)
        ->withCount('products')
        ->findOrFail($id);
    
    $products = App\Models\Product::where('vendor_id', $id)
        ->where('is_active', true)
        ->where('stock_quantity', '>', 0)
        ->take(10)
        ->get();
    
    return response()->json([
        'vendor' => $vendor,
        'products' => $products
    ]);
})->name('api.vendors.show');

// Logout route
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// ========== CART ROUTES (Authenticated) ==========
Route::middleware(['auth'])->group(function () {
    // Add to cart
    Route::post('/cart/add', function (Request $request) {
        $cart = \App\Models\Cart::firstOrCreate(['user_id' => auth()->id()]);
        
        $cartItem = \App\Models\CartItem::where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->first();
        
        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity ?? 1);
        } else {
            \App\Models\CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity ?? 1,
            ]);
        }
        
        $cartCount = $cart->items()->sum('quantity');
        session(['cart_count' => $cartCount]);
        
        return response()->json([
            'success' => true,
            'cart_count' => $cartCount
        ]);
    });
    
    // Update cart item quantity
    Route::post('/cart/update', function (Request $request) {
        $cartItem = \App\Models\CartItem::findOrFail($request->item_id);
        
        // Check if cart belongs to current user
        $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
        if ($cartItem->cart_id != $cart->id) {
            return response()->json(['success' => false], 403);
        }
        
        $cartItem->update(['quantity' => $request->quantity]);
        
        $newSubtotal = $cartItem->product->price * $cartItem->quantity;
        $cartCount = $cart->items()->sum('quantity');
        session(['cart_count' => $cartCount]);
        
        return response()->json([
            'success' => true,
            'new_subtotal' => $newSubtotal,
            'cart_count' => $cartCount
        ]);
    });
    
    // Remove item from cart
    Route::post('/cart/remove', function (Request $request) {
        $cartItem = \App\Models\CartItem::findOrFail($request->item_id);
        
        $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
        if ($cartItem->cart_id != $cart->id) {
            return response()->json(['success' => false], 403);
        }
        
        $cartItem->delete();
        
        $cartCount = $cart->items()->sum('quantity');
        session(['cart_count' => $cartCount]);
        
        return response()->json([
            'success' => true,
            'cart_count' => $cartCount
        ]);
    });
    
    // Clear entire cart
    Route::post('/cart/clear', function (Request $request) {
        $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
        if ($cart) {
            $cart->items()->delete();
            session(['cart_count' => 0]);
        }
        
        return response()->json(['success' => true]);
    });
    
    // Get cart totals
    Route::get('/cart/totals', function (Request $request) {
        $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
        $subtotal = 0;
        
        if ($cart) {
            foreach ($cart->items as $item) {
                $subtotal += $item->product->price * $item->quantity;
            }
        }
        
        return response()->json([
            'success' => true,
            'subtotal' => $subtotal,
            'total' => $subtotal
        ]);
    });
});

// Logistics Routes
Route::middleware(['auth'])->prefix('logistics')->group(function () {
    Route::get('/apply', [App\Http\Controllers\LogisticsController::class, 'showApplicationForm'])->name('logistics.apply');
    Route::post('/apply', [App\Http\Controllers\LogisticsController::class, 'submitApplication'])->name('logistics.apply.submit');
    Route::get('/status', [App\Http\Controllers\LogisticsController::class, 'showStatus'])->name('logistics.status');
    Route::get('/dashboard', [App\Http\Controllers\LogisticsController::class, 'dashboard'])->name('logistics.dashboard');
});

// Admin Logistics Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/logistics', [App\Http\Controllers\Admin\LogisticsController::class, 'index'])->name('admin.logistics.index');
    Route::get('/logistics/{id}', [App\Http\Controllers\Admin\LogisticsController::class, 'show'])->name('admin.logistics.show');
    Route::post('/logistics/{id}/approve', [App\Http\Controllers\Admin\LogisticsController::class, 'approve'])->name('admin.logistics.approve');
    Route::post('/logistics/{id}/reject', [App\Http\Controllers\Admin\LogisticsController::class, 'reject'])->name('admin.logistics.reject');
});

// ========== VENDOR ROUTES ==========
Route::middleware(['auth', 'role:vendor'])->prefix('vendor')->group(function () {
    Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
    Route::get('/products/create', [App\Http\Controllers\Vendor\ProductController::class, 'create'])->name('vendor.products.create');
    Route::post('/products', [App\Http\Controllers\Vendor\ProductController::class, 'store'])->name('vendor.products.store');
    Route::get('/products/{product}/edit', [App\Http\Controllers\Vendor\ProductController::class, 'edit'])->name('vendor.products.edit');
    Route::put('/products/{product}', [App\Http\Controllers\Vendor\ProductController::class, 'update'])->name('vendor.products.update');
});

// ========== ADMIN ROUTES ==========
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/vendors/pending', [VendorApprovalController::class, 'pendingVendors'])->name('admin.vendors.pending');
    Route::post('/vendors/{user}/approve', [VendorApprovalController::class, 'approve'])->name('admin.vendors.approve');
    Route::post('/vendors/{user}/reject', [VendorApprovalController::class, 'reject'])->name('admin.vendors.reject');
});

// ========== VENDOR APPLICATION ROUTES ==========
Route::middleware(['auth'])->group(function () {
    Route::get('/become-vendor', [VendorController::class, 'showApplicationForm'])->name('vendor.apply');
    Route::post('/become-vendor', [VendorController::class, 'submitApplication'])->name('vendor.submit');
});

// ========== FALLBACK ROUTES ==========
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user && $user->isAdmin()) {
        return redirect('/admin/dashboard');
    } elseif ($user && $user->isVendor()) {
        return redirect('/vendor/dashboard');
    } else {
        return redirect('/shop');
    }
})->middleware('auth')->name('dashboard');