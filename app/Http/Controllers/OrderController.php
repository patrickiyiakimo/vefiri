<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'zip_code' => 'required|string',
        'total' => 'required|numeric'
    ]);
    
    DB::beginTransaction();
    
    try {
        $cart = Cart::where('user_id', auth()->id())->first();
        $cartItems = $cart->items()->with('product')->get();
        
        if ($cartItems->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Cart is empty'], 400);
        }
        
        // Generate unique order number
        $orderNumber = 'ORD-' . strtoupper(uniqid());
        
        // Create order
        $order = Order::create([
            'order_number' => $orderNumber,
            'user_id' => auth()->id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'notes' => $request->notes,
            'subtotal' => $request->total - ($request->total * 0.075) - 3000, // Approximate
            'shipping_cost' => 3000,
            'tax' => $request->total * 0.075,
            'total' => $request->total,
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
            'order_number' => $orderNumber
        ]);
        
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Order creation failed: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Failed to create order'], 500);
    }
}
}
