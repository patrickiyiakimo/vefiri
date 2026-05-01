@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($application->status === 'pending')
                <!-- Pending Status -->
                <div class="bg-yellow-50 px-6 py-4 border-b border-yellow-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-yellow-800">Application Under Review</h2>
                            <p class="text-yellow-700">Your application is being processed. We'll notify you once a decision is made.</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-center">
                    <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-orange-500 mb-4"></div>
                    <p class="text-gray-600">Estimated review time: 2-3 business days</p>
                </div>
            @elseif($application->status === 'approved')
                <!-- Approved Status -->
                <div class="bg-green-50 px-6 py-4 border-b border-green-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-green-800">Congratulations! 🎉</h2>
                            <p class="text-green-700">Your application has been approved. You're now a Vefiri Logistics Partner!</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg p-6 text-white text-center mb-6">
                        <h3 class="text-2xl font-bold mb-2">Welcome to the Team!</h3>
                        <p>You can now start accepting delivery requests</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="border border-gray-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-gray-900">Start Earning</div>
                            <p class="text-gray-600 text-sm mt-1">Accept deliveries in your area</p>
                        </div>
                        <div class="border border-gray-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-gray-900">Get Paid Weekly</div>
                            <p class="text-gray-600 text-sm mt-1">Earnings deposited every Friday</p>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <a href="{{ route('logistics.dashboard') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:shadow-lg transition">
                            Go to Logistics Dashboard
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @elseif($application->status === 'rejected')
                <!-- Rejected Status -->
                <div class="bg-red-50 px-6 py-4 border-b border-red-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-red-800">Application Not Approved</h2>
                            <p class="text-red-700">We regret to inform you that your application was not approved at this time.</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Reason for rejection:</h3>
                        <p class="text-gray-600">{{ $application->rejection_reason ?? 'No specific reason provided.' }}</p>
                    </div>
                    <p class="text-gray-600 mb-4">You can reapply after 30 days or contact support for more information.</p>
                    <a href="{{ route('logistics') }}" class="inline-flex items-center px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Back to Logistics
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection