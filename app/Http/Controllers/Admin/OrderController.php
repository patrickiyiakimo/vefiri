<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of all orders for admin
     */
    public function index(Request $request)
    {
        $query = Order::with(['user', 'items']);

        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // Filter by payment status
        if ($request->has('payment_status') && $request->payment_status != 'all') {
            $query->where('payment_status', $request->payment_status);
        }

        // Search by order number or customer name
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'LIKE', "%{$search}%")
                  ->orWhere('first_name', 'LIKE', "%{$search}%")
                  ->orWhere('last_name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        $orders = $query->orderBy('created_at', 'desc')->paginate(20);
        
        // Get order statistics
        $stats = [
            'total' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'shipped' => Order::where('status', 'shipped')->count(),
            'delivered' => Order::where('status', 'delivered')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
            'paid' => Order::where('payment_status', 'paid')->count(),
            'unpaid' => Order::where('payment_status', 'pending')->count(),
        ];

        return view('admin.orders.index', compact('orders', 'stats'));
    }

    /**
     * Display the specified order
     */
    public function show(Order $order)
    {
        $order->load(['user', 'items.product', 'items.vendor', 'payment']);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update order status
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,completed,cancelled',
            'notes' => 'nullable|string'
        ]);

        DB::beginTransaction();

        try {
            $oldStatus = $order->status;
            $order->update([
                'status' => $request->status,
                'notes' => $request->notes ? $order->notes . "\n\nAdmin Note: " . $request->notes : $order->notes
            ]);

            // If order is delivered or completed, update payment status if needed
            if (in_array($request->status, ['delivered', 'completed']) && $order->payment_status === 'pending') {
                $order->update(['payment_status' => 'paid']);
            }

            // If order is cancelled, restore product stock
            if ($request->status === 'cancelled' && $oldStatus !== 'cancelled') {
                foreach ($order->items as $item) {
                    $item->product->increment('stock_quantity', $item->quantity);
                }
            }

            DB::commit();

            return redirect()->back()->with('success', 'Order status updated successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order status update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update order status.');
        }
    }

    /**
     * Update payment status
     */
    public function updatePaymentStatus(Request $request, Order $order)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,paid,failed,refunded'
        ]);

        $order->update([
            'payment_status' => $request->payment_status
        ]);

        return redirect()->back()->with('success', 'Payment status updated successfully!');
    }

    /**
     * Delete an order (soft delete or force delete)
     */
    public function destroy(Order $order)
    {
        try {
            // Restore product stock before deleting
            foreach ($order->items as $item) {
                $item->product->increment('stock_quantity', $item->quantity);
            }

            $order->items()->delete();
            $order->delete();

            return redirect()->route('admin.orders.index')
                ->with('success', 'Order deleted successfully!');

        } catch (\Exception $e) {
            Log::error('Order deletion failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete order.');
        }
    }

    /**
     * Export orders report
     */
    public function export(Request $request)
    {
        $query = Order::with(['user', 'items']);
        
        // Apply filters
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('date_from') && $request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->has('date_to') && $request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $orders = $query->orderBy('created_at', 'desc')->get();

        // Return as CSV
        $filename = 'orders_export_' . date('Y-m-d') . '.csv';
        $handle = fopen('php://output', 'w');
        
        // CSV Headers
        fputcsv($handle, [
            'Order #', 'Customer', 'Email', 'Phone', 'Total', 
            'Status', 'Payment Status', 'Payment Method', 
            'Date', 'Items'
        ]);

        foreach ($orders as $order) {
            fputcsv($handle, [
                $order->order_number,
                $order->first_name . ' ' . $order->last_name,
                $order->email,
                $order->phone,
                number_format($order->total, 2),
                $order->status,
                $order->payment_status,
                $order->payment_method,
                $order->created_at->format('Y-m-d H:i'),
                $order->items->count()
            ]);
        }

        fclose($handle);
        
        return response()->stream(
            function() use ($handle) {
                // Stream already happened
            },
            200,
            [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]
        );
    }

    /**
     * Bulk update order status
     */
    public function bulkUpdateStatus(Request $request)
    {
        $request->validate([
            'order_ids' => 'required|array',
            'order_ids.*' => 'exists:orders,id',
            'status' => 'required|in:pending,processing,shipped,delivered,completed,cancelled'
        ]);

        $count = Order::whereIn('id', $request->order_ids)->update(['status' => $request->status]);

        return redirect()->back()->with('success', "{$count} orders updated successfully!");
    }

    /**
     * Get order statistics for dashboard widget
     */
    public function getStats()
    {
        return response()->json([
            'total' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'shipped' => Order::where('status', 'shipped')->count(),
            'delivered' => Order::where('status', 'delivered')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
            'revenue' => Order::where('payment_status', 'paid')->sum('total'),
        ]);
    }
}