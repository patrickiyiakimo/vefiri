<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorApprovalController extends Controller
{
    public function pendingVendors()
    {
        $pendingVendors = User::where('role', 'vendor')
            ->where('vendor_status', 'pending')
            ->orderBy('created_at', 'asc')
            ->paginate(15);
            
        return view('admin.vendors.pending', compact('pendingVendors'));
    }
    
    public function approve(User $user)
    {
        if ($user->role !== 'vendor') {
            return back()->with('error', 'This user is not a vendor applicant.');
        }
        
        DB::transaction(function () use ($user) {
            $user->update([
                'vendor_status' => 'approved',
                'vendor_approved_at' => now(),
                'is_active' => true,
            ]);
        });
        
        return redirect()->route('admin.vendors.pending')
            ->with('success', "{$user->store_name} has been approved as a vendor!");
    }
    
    public function reject(User $user, Request $request)
    {
        $request->validate([
            'reason' => 'required|string|min:10',
        ]);
        
        if ($user->role !== 'vendor') {
            return back()->with('error', 'This user is not a vendor applicant.');
        }
        
        DB::transaction(function () use ($user, $request) {
            $user->update([
                'role' => 'customer',
                'vendor_status' => 'rejected',
                'store_name' => null,
                'store_description' => null,
            ]);
        });
        
        return redirect()->route('admin.vendors.pending')
            ->with('success', 'Vendor application has been rejected.');
    }
}