@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Admin Dashboard</h1>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-orange-100 rounded-full">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Vendors</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalVendors ?? 0 }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Customers</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalCustomers ?? 0 }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Products</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalProducts ?? 0 }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Pending Approvals</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $pendingVendors->count() ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pending Vendors Section -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Pending Vendor Applications</h2>
            </div>
            
            @if($pendingVendors->count() > 0)
                <div class="divide-y divide-gray-200">
                    @foreach($pendingVendors as $vendor)
                    <div class="p-6 hover:bg-gray-50">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900">{{ $vendor->store_name }}</h3>
                                <p class="text-sm text-gray-500 mt-1">Owner: {{ $vendor->name }}</p>
                                <p class="text-sm text-gray-500">Email: {{ $vendor->email }}</p>
                                <p class="text-sm text-gray-500">Phone: {{ $vendor->phone }}</p>
                                <p class="text-sm text-gray-700 mt-2">{{ $vendor->store_description }}</p>
                                <p class="text-sm text-gray-500 mt-2">Address: {{ $vendor->address }}</p>
                                <p class="text-xs text-gray-400 mt-2">Applied: {{ $vendor->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex space-x-3 ml-4">
                                <form action="{{ route('admin.vendors.approve', $vendor) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                        Approve
                                    </button>
                                </form>
                                <button onclick="showRejectModal({{ $vendor->id }})" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                                    Reject
                                </button>
                            </div>
                        </div>
                        
                        <!-- Reject Modal for this vendor -->
                        <div id="reject-modal-{{ $vendor->id }}" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                                <div class="mt-3">
                                    <h3 class="text-lg font-medium text-gray-900">Reject Vendor Application</h3>
                                    <form action="{{ route('admin.vendors.reject', $vendor) }}" method="POST" class="mt-4">
                                        @csrf
                                        <textarea name="reason" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Please provide a reason for rejection..." required></textarea>
                                        <div class="flex justify-end space-x-3 mt-4">
                                            <button type="button" onclick="hideRejectModal({{ $vendor->id }})" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Reject</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="p-6 text-center text-gray-500">
                    No pending vendor applications at this time.
                </div>
            @endif
        </div>
    </div>
</div>

<script>
function showRejectModal(vendorId) {
    document.getElementById(`reject-modal-${vendorId}`).classList.remove('hidden');
}

function hideRejectModal(vendorId) {
    document.getElementById(`reject-modal-${vendorId}`).classList.add('hidden');
}

// Close modal when clicking outside
window.onclick = function(event) {
    if (event.target.classList.contains('bg-gray-600')) {
        document.querySelectorAll('[id^="reject-modal-"]').forEach(modal => {
            modal.classList.add('hidden');
        });
    }
}
</script>
@endsection