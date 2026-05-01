<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogisticsPartner;
use Illuminate\Http\Request;

class LogisticsController extends Controller
{
    public function index()
    {
        $applications = LogisticsPartner::with('user')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
            
        $pendingCount = LogisticsPartner::where('status', 'pending')->count();
        $approvedCount = LogisticsPartner::where('status', 'approved')->count();
        $rejectedCount = LogisticsPartner::where('status', 'rejected')->count();
        $totalCount = LogisticsPartner::count();
        
        return view('admin.logistics.index', compact('applications', 'pendingCount', 'approvedCount', 'rejectedCount', 'totalCount'));
    }
    
    public function show($id)
    {
        $application = LogisticsPartner::with('user')->findOrFail($id);
        return response()->json($application);
    }
    
    public function approve($id)
    {
        $application = LogisticsPartner::findOrFail($id);
        $application->update([
            'status' => 'approved',
            'approved_at' => now(),
            'is_active' => true,
        ]);
        
        return redirect()->back()->with('success', 'Application approved successfully!');
    }
    
    public function reject(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|string|min:10',
        ]);
        
        $application = LogisticsPartner::findOrFail($id);
        $application->update([
            'status' => 'rejected',
            'rejection_reason' => $request->reason,
            'rejected_at' => now(),
            'is_active' => false,
        ]);
        
        return redirect()->back()->with('success', 'Application rejected successfully!');
    }
}