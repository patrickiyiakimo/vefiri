<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaystackService;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $paystack;

    public function __construct(PaystackService $paystack)
    {
        $this->paystack = $paystack;
    }

    /**
     * Initialize payment for an order
     * Called after order is created, before redirecting to Paystack
     */
    public function initialize(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:100'
        ]);

        $order = Order::with('items.vendor')->findOrFail($request->order_id);
        
        // Ensure order belongs to authenticated user
        if ($order->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Check if payment already exists and is pending
        $existingPayment = Payment::where('order_id', $order->id)
            ->where('status', 'pending')
            ->first();
        
        if ($existingPayment) {
            return response()->json([
                'success' => true,
                'authorization_url' => route('payment.callback', ['reference' => $existingPayment->reference])
            ]);
        }

        // Get the primary vendor (for single-vendor orders)
        // For multi-vendor, you would need to handle multiple subaccounts
        $vendor = $order->items->first()->vendor ?? null;
        
        // Get commission rate from config (default 10%)
        $commissionPercentage = config('marketplace.commission_rate', 10);
        
        $splitAmounts = $this->paystack->calculateSplitAmounts($order->total, $commissionPercentage);

        // Prepare split data for Paystack
        $splitData = [
            'split_code' => null,
            'subaccount_code' => $vendor && $vendor->paystack_subaccount_code ? $vendor->paystack_subaccount_code : null,
            'vendor_amount' => $splitAmounts['vendor_amount'],
            'admin_amount' => $splitAmounts['admin_amount'],
            'vendor_percentage' => $splitAmounts['vendor_percentage'],
            'admin_percentage' => $splitAmounts['admin_percentage'],
            'admin_fee' => $splitAmounts['admin_amount'] * 100, // Convert to kobo for Paystack
        ];

        // Initialize payment with Paystack
        $response = $this->paystack->initializePayment($order, Auth::user(), $vendor, $splitData);

        if ($response['success']) {
            return response()->json([
                'success' => true,
                'authorization_url' => $response['authorization_url'],
                'reference' => $response['reference']
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $response['message'] ?? 'Payment initialization failed'
        ], 400);
    }

    /**
     * Handle payment callback from Paystack
     * User is redirected here after completing payment on Paystack
     */
    public function callback(Request $request)
    {
        $reference = $request->query('reference');

        if (!$reference) {
            return redirect()->route('checkout')->with('error', 'Invalid payment reference');
        }

        // Verify payment with Paystack
        $verification = $this->paystack->verifyPayment($reference);

        if ($verification['success']) {
            $payment = $verification['payment'];
            $order = $payment->order;
            
            // Clear cart after successful payment
            Cart::where('user_id', Auth::id())->delete();
            
            // Redirect to success page
            return redirect()->route('order.success', ['reference' => $reference])
                ->with('success', 'Payment successful! Your order has been confirmed.');
        }

        // Payment failed or verification failed
        return redirect()->route('checkout')
            ->with('error', $verification['message'] ?? 'Payment verification failed. Please contact support.');
    }

    /**
     * Order success page
     * Shows order confirmation after successful payment
     */
    public function success(Request $request, $reference)
    {
        $payment = Payment::with(['order', 'order.items.product'])
            ->where('reference', $reference)
            ->firstOrFail();
        
        $order = $payment->order;
        
        // Ensure user owns this order
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('order-success', compact('order', 'reference'));
    }

    /**
     * Webhook endpoint for Paystack
     * Handles background events from Paystack (charge.success, transfer.success, etc.)
     * No authentication required - IP whitelisted for security
     */
    public function webhook(Request $request)
    {
        $signature = $request->header('x-paystack-signature');
        $payload = $request->all();

        Log::info('Paystack webhook received', ['event' => $payload['event'] ?? 'unknown']);

        $handled = $this->paystack->handleWebhook($payload, $signature);

        if ($handled) {
            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'failed'], 400);
    }

    /**
     * Get payment status for an order
     * Used for AJAX polling or order status page
     */
    public function status(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        
        if ($order->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        $payment = Payment::where('order_id', $orderId)->first();
        
        return response()->json([
            'order_status' => $order->status,
            'payment_status' => $order->payment_status,
            'payment_reference' => $payment ? $payment->reference : null,
            'paid_at' => $payment ? $payment->paid_at : null
        ]);
    }

    /**
     * Retry a failed payment
     * Creates a new payment reference for the same order
     */
    public function retry(Request $request, $orderId)
    {
        $order = Order::with('items.vendor')->findOrFail($orderId);
        
        if ($order->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        if ($order->payment_status === 'paid') {
            return redirect()->route('order.success', ['order' => $orderId])
                ->with('error', 'Order already paid');
        }
        
        // Get the primary vendor
        $vendor = $order->items->first()->vendor ?? null;
        
        $commissionPercentage = config('marketplace.commission_rate', 10);
        $splitAmounts = $this->paystack->calculateSplitAmounts($order->total, $commissionPercentage);
        
        $splitData = [
            'split_code' => null,
            'subaccount_code' => $vendor && $vendor->paystack_subaccount_code ? $vendor->paystack_subaccount_code : null,
            'vendor_amount' => $splitAmounts['vendor_amount'],
            'admin_amount' => $splitAmounts['admin_amount'],
            'vendor_percentage' => $splitAmounts['vendor_percentage'],
            'admin_percentage' => $splitAmounts['admin_percentage'],
            'admin_fee' => $splitAmounts['admin_amount'] * 100,
        ];
        
        // Initialize new payment
        $response = $this->paystack->initializePayment($order, Auth::user(), $vendor, $splitData);
        
        if ($response['success']) {
            return redirect()->away($response['authorization_url']);
        }
        
        return back()->with('error', $response['message'] ?? 'Payment initialization failed');
    }

    /**
     * Vendor: Create subaccount for split payments
     * Vendors need to add their bank details to receive payments
     */
    public function createSubaccount(Request $request)
    {
        $request->validate([
            'bank_code' => 'required|string',
            'account_number' => 'required|string|size:10',
            'bank_name' => 'required|string',
        ]);

        $user = Auth::user();

        if (!$user->isVendor()) {
            return response()->json(['error' => 'Only vendors can create subaccounts'], 403);
        }

        // Validate bank account first
        $validation = $this->paystack->validateBankAccount(
            $request->account_number,
            $request->bank_code
        );

        if (!$validation['success']) {
            return back()->with('error', $validation['message']);
        }

        // Create subaccount
        $bankDetails = [
            'bank_code' => $request->bank_code,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name' => $validation['account_name']
        ];

        $result = $this->paystack->createSubaccount($user, $bankDetails);

        if ($result['success']) {
            return redirect()->route('vendor.settings')
                ->with('success', 'Bank account added successfully. You can now receive split payments.');
        }

        return back()->with('error', $result['message']);
    }

    /**
     * Get list of banks for vendor onboarding
     * Used in the vendor bank account form
     */
    public function getBanks()
    {
        $response = $this->paystack->getBankList();

        if ($response['success']) {
            return response()->json($response['banks']);
        }

        return response()->json(['error' => $response['message']], 500);
    }

    /**
     * Get vendor subaccount status
     * For vendors to check their payout settings
     */
    public function subaccountStatus()
    {
        $user = Auth::user();
        
        if (!$user->isVendor()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        return response()->json([
            'has_subaccount' => !is_null($user->paystack_subaccount_code),
            'subaccount_code' => $user->paystack_subaccount_code,
            'is_active' => $user->is_subaccount_active,
            'bank_name' => $user->bank_name,
            'account_number' => $user->bank_account_number,
            'account_name' => $user->bank_account_name
        ]);
    }

    /**
     * Admin: Get all payments (for admin dashboard)
     */
    public function adminPayments(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }
        
        $payments = Payment::with(['order', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        $summary = [
            'total_processed' => Payment::where('status', 'success')->sum('amount'),
            'total_commission' => Payment::where('status', 'success')->sum('admin_commission'),
            'total_payouts' => Payment::where('status', 'success')->sum('vendor_amount'),
            'pending_payouts' => Payment::where('status', 'success')
                ->where('paid_to_vendor', false)
                ->sum('vendor_amount')
        ];
        
        return view('admin.payments.index', compact('payments', 'summary'));
    }

    /**
     * Admin: Mark vendor payout as completed
     */
    public function markPayoutCompleted(Request $request, $paymentId)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }
        
        $payment = Payment::findOrFail($paymentId);
        
        $payment->update([
            'paid_to_vendor' => true,
            'paid_to_vendor_at' => now()
        ]);
        
        return response()->json(['success' => true]);
    }

    /**
     * Get transaction details from Paystack
     * Useful for debugging or viewing detailed transaction info
     */
    public function transactionDetails($reference)
    {
        $payment = Payment::where('reference', $reference)->firstOrFail();
        
        // Only allow admin or the order owner
        if (!Auth::user()->isAdmin() && $payment->user_id !== Auth::id()) {
            abort(403);
        }
        
        $transaction = $this->paystack->verifyPayment($reference);
        
        return view('payments.details', [
            'payment' => $payment,
            'transaction' => $transaction['data'] ?? null
        ]);
    }
}