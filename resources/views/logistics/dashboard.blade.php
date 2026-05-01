@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Logistics Dashboard</h1>
            <p class="text-gray-600 mt-2">Welcome back, {{ Auth::user()->name }}!</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-orange-100 rounded-full">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Deliveries</p>
                        <p class="text-2xl font-semibold text-gray-900">0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Completed</p>
                        <p class="text-2xl font-semibold text-gray-900">0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Pending</p>
                        <p class="text-2xl font-semibold text-gray-900">0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Earnings</p>
                        <p class="text-2xl font-semibold text-gray-900">₦0</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Partner Information -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white">Your Information</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Store Name:</span>
                            <span class="font-semibold text-gray-900">{{ $application->user->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Phone:</span>
                            <span class="font-semibold text-gray-900">{{ $application->phone }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Alternate Phone:</span>
                            <span class="font-semibold text-gray-900">{{ $application->alternate_phone ?? 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Address:</span>
                            <span class="font-semibold text-gray-900">{{ $application->address }}, {{ $application->city }}, {{ $application->state }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status:</span>
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-sm">Active</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white">Vehicle & Banking Info</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Vehicle Type:</span>
                            <span class="font-semibold text-gray-900 capitalize">{{ $application->vehicle_type }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Vehicle Model:</span>
                            <span class="font-semibold text-gray-900">{{ $application->vehicle_model }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">License Number:</span>
                            <span class="font-semibold text-gray-900">{{ $application->license_number }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Bank:</span>
                            <span class="font-semibold text-gray-900">{{ $application->bank_name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Account Number:</span>
                            <span class="font-semibold text-gray-900">{{ $application->account_number }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h2 class="text-xl font-bold text-white">Quick Actions</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="#" class="block p-4 border border-gray-200 rounded-lg hover:border-orange-500 hover:shadow-lg transition group">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-orange-100 rounded-lg group-hover:bg-orange-500 transition">
                                <svg class="w-5 h-5 text-orange-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">View Available Deliveries</h3>
                                <p class="text-sm text-gray-500">Check and accept new delivery requests</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="block p-4 border border-gray-200 rounded-lg hover:border-orange-500 hover:shadow-lg transition group">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-orange-100 rounded-lg group-hover:bg-orange-500 transition">
                                <svg class="w-5 h-5 text-orange-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">My Delivery History</h3>
                                <p class="text-sm text-gray-500">View all your completed deliveries</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="block p-4 border border-gray-200 rounded-lg hover:border-orange-500 hover:shadow-lg transition group">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-orange-100 rounded-lg group-hover:bg-orange-500 transition">
                                <svg class="w-5 h-5 text-orange-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Earnings Report</h3>
                                <p class="text-sm text-gray-500">View your payment history and earnings</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Deliveries -->
        <div class="mt-8 bg-white rounded-lg shadow overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h2 class="text-xl font-bold text-white">Recent Deliveries</h2>
            </div>
            <div class="p-6 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <p class="text-gray-500">No deliveries yet. Check back for available deliveries.</p>
            </div>
        </div>
    </div>
</div>
@endsection