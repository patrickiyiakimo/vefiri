<?php

namespace App\Http\Controllers;

use App\Models\LogisticsPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LogisticsController extends Controller
{
    public function showApplicationForm()
    {
        // Check if user already has an application
        $existingApplication = LogisticsPartner::where('user_id', Auth::id())->first();
        
        if ($existingApplication) {
            return redirect()->route('logistics.status')->with('info', 'You already have an application.');
        }
        
        return view('logistics.apply');
    }
    
    public function submitApplication(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:20',
            'alternate_phone' => 'nullable|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'vehicle_type' => 'required|in:bicycle,motorcycle,car,van',
            'vehicle_model' => 'required|string|max:255',
            'license_number' => 'required|string|max:100',
            'id_card_type' => 'required|in:national_id,driver_license,passport,voter_card',
            'id_card_number' => 'required|string|max:100',
            'id_card_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'driver_license_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bank_name' => 'required|string|max:100',
            'account_number' => 'required|string|max:20',
            'account_name' => 'required|string|max:255',
            'terms' => 'required',
        ]);
        
        // Upload ID Card Image
        $idCardPath = $request->file('id_card_image')->store('logistics/id_cards', 'public');
        
        // Upload Driver License Image (if provided)
        $driverLicensePath = null;
        if ($request->hasFile('driver_license_image')) {
            $driverLicensePath = $request->file('driver_license_image')->store('logistics/licenses', 'public');
        }
        
        // Create application
        LogisticsPartner::create([
            'user_id' => Auth::id(),
            'phone' => $request->phone,
            'alternate_phone' => $request->alternate_phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_model' => $request->vehicle_model,
            'license_number' => $request->license_number,
            'id_card_type' => $request->id_card_type,
            'id_card_number' => $request->id_card_number,
            'id_card_image' => $idCardPath,
            'driver_license_image' => $driverLicensePath,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'status' => 'pending',
        ]);
        
        return redirect()->route('logistics.status')->with('success', 'Application submitted successfully!');
    }
    
    public function showStatus()
    {
        $application = LogisticsPartner::where('user_id', Auth::id())->firstOrFail();
        return view('logistics.status', compact('application'));
    }
    
    public function dashboard()
    {
        $application = LogisticsPartner::where('user_id', Auth::id())->firstOrFail();
        
        if (!$application->isApproved()) {
            return redirect()->route('logistics.status');
        }
        
        return view('logistics.dashboard', compact('application'));
    }
}