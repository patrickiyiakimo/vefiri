<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of orders for the authenticated user
     */
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with(['items'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('orders.index', compact('orders'));
    }

    /**
     * Store a newly created order
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'notes' => 'nullable|string',
            'total' => 'required|numeric|min:0'
        ]);
        
        DB::beginTransaction();
        
        try {
            // Get user's cart
            $cart = Cart::where('user_id', auth()->id())->first();
            
            if (!$cart) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Your cart is empty'
                ], 400);
            }
            
            $cartItems = $cart->items()->with('product')->get();
            
            if ($cartItems->isEmpty()) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Your cart is empty'
                ], 400);
            }
            
            // Calculate totals
            $subtotal = 0;
            foreach ($cartItems as $item) {
                $subtotal += $item->product->price * $item->quantity;
            }
            
            $shipping = $subtotal > 50000 ? 0 : 3000;
            $tax = $subtotal * 0.075; // 7.5% VAT
            $total = $subtotal + $shipping + $tax;
            
            // Generate unique order number
            $orderNumber = 'ORD-' . strtoupper(uniqid());
            
            // Build full shipping address
            $fullShippingAddress = $request->address . ', ' . $request->city . ', ' . $request->state . ' ' . $request->zip_code;
            
            // Create order
            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => $orderNumber,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'shipping_address' => $fullShippingAddress,
                'notes' => $request->notes,
                'subtotal' => $subtotal,
                'shipping_cost' => $shipping,
                'tax' => $tax,
                'total' => $total,
                'payment_method' => 'paystack',
                'payment_status' => 'pending',
                'status' => 'pending'
            ]);
            
            // Create order items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'vendor_id' => $item->product->vendor_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'total' => $item->product->price * $item->quantity
                ]);
            }
            
            DB::commit();
            
            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'order_number' => $orderNumber,
                'total' => $total
            ]);
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order creation failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false, 
                'message' => 'Failed to create order. Please try again.'
            ], 500);
        }
    }

    /**
     * Display the specified order
     */
    public function show(Order $order)
    {
        // Ensure user owns this order or is admin
        if ($order->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }
        
        // Load relationships - only load payment if the model exists
        $order->load(['items.product', 'items.vendor']);
        
        // Try to load payment if the model exists
        if (class_exists('App\Models\Payment')) {
            $order->load('payment');
        }
        
        return view('orders.show', compact('order'));
    }
}