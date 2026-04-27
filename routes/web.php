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

// Shop page
Route::get('/shop', function () {
    $categories = Category::where('is_active', true)->get();
    return view('shop', compact('categories'));
})->name('shop');

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
        'products' => $products->items(),
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

// Logout route
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// ========== CART & WISHLIST ROUTES (Authenticated) ==========
Route::middleware(['auth'])->group(function () {
    // Cart routes
    Route::post('/cart/add', function (Request $request) {
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
        
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->first();
        
        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity ?? 1);
        } else {
            CartItem::create([
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
    
    // Wishlist routes
    Route::post('/wishlist/add', function (Request $request) {
        Wishlist::firstOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
        ]);
        
        return response()->json(['success' => true]);
    });
    
    Route::delete('/wishlist/remove', function (Request $request) {
        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->delete();
        
        return response()->json(['success' => true]);
    });
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