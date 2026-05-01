@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Admin Dashboard</h1>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
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
                    <div class="p-3 bg-red-100 rounded-full">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Pending Vendors</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $pendingVendorsCount ?? 0 }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-full">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Pending Logistics</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $pendingLogisticsCount ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tabs for Applications -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px">
                    <button class="tab-button active px-6 py-4 text-sm font-medium text-orange-600 border-b-2 border-orange-600 hover:text-orange-700" data-tab="vendors">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Vendor Applications
                        <span class="ml-2 px-2 py-0.5 text-xs rounded-full bg-orange-100 text-orange-600">{{ $pendingVendorsCount ?? 0 }}</span>
                    </button>
                    <button class="tab-button px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="logistics">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                        </svg>
                        Logistics Applications
                        <span class="ml-2 px-2 py-0.5 text-xs rounded-full bg-purple-100 text-purple-600">{{ $pendingLogisticsCount ?? 0 }}</span>
                    </button>
                </nav>
            </div>
            
            <!-- Pending Vendors Tab Content -->
            <div id="vendors-tab" class="tab-content">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800">Pending Vendor Applications</h2>
                    <p class="text-sm text-gray-500 mt-1">Review and manage vendor applications</p>
                </div>
                
                @if(isset($pendingVendors) && $pendingVendors->count() > 0)
                    <div class="divide-y divide-gray-200">
                        @foreach($pendingVendors as $vendor)
                        <div class="p-6 hover:bg-gray-50">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-900">{{ $vendor->store_name }}</h3>
                                    <p class="text-sm text-gray-500 mt-1">Owner: {{ $vendor->name }}</p>
                                    <p class="text-sm text-gray-500">Email: {{ $vendor->email }}</p>
                                    <p class="text-sm text-gray-500">Phone: {{ $vendor->phone }}</p>
                                    <p class="text-sm text-gray-700 mt-2">{{ \Illuminate\Support\Str::limit($vendor->store_description, 200) }}</p>
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
                                    <button onclick="showRejectModal({{ $vendor->id }}, 'vendor')" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                                        Reject
                                    </button>
                                    <button onclick="viewVendorDetails({{ $vendor->id }})" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                        View Details
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Reject Modal for Vendor -->
                            <div id="vendor-reject-modal-{{ $vendor->id }}" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                                    <div class="mt-3">
                                        <h3 class="text-lg font-medium text-gray-900">Reject Vendor Application</h3>
                                        <form action="{{ route('admin.vendors.reject', $vendor) }}" method="POST" class="mt-4">
                                            @csrf
                                            <textarea name="reason" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Please provide a reason for rejection..." required></textarea>
                                            <div class="flex justify-end space-x-3 mt-4">
                                                <button type="button" onclick="hideRejectModal({{ $vendor->id }}, 'vendor')" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Reject</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="px-6 py-4">
                        {{ $pendingVendors->links() }}
                    </div>
                @else
                    <div class="p-12 text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-500">No pending vendor applications at this time.</p>
                    </div>
                @endif
            </div>
            
            <!-- Pending Logistics Tab Content -->
            <div id="logistics-tab" class="tab-content hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800">Pending Logistics Applications</h2>
                    <p class="text-sm text-gray-500 mt-1">Review and manage logistics partner applications</p>
                </div>
                
                @if(isset($pendingLogistics) && $pendingLogistics->count() > 0)
                    <div class="divide-y divide-gray-200">
                        @foreach($pendingLogistics as $logistic)
                        <div class="p-6 hover:bg-gray-50">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-900">{{ $logistic->user->name }}</h3>
                                    <p class="text-sm text-gray-500 mt-1">Email: {{ $logistic->user->email }}</p>
                                    <p class="text-sm text-gray-500">Phone: {{ $logistic->phone }}</p>
                                    <p class="text-sm text-gray-500">Alternate Phone: {{ $logistic->alternate_phone ?? 'N/A' }}</p>
                                    <p class="text-sm text-gray-500">Address: {{ $logistic->address }}, {{ $logistic->city }}, {{ $logistic->state }}</p>
                                    <p class="text-sm text-gray-500 mt-2">Vehicle: {{ ucfirst($logistic->vehicle_type) }} - {{ $logistic->vehicle_model }}</p>
                                    <p class="text-sm text-gray-500">License Number: {{ $logistic->license_number }}</p>
                                    <p class="text-sm text-gray-500">Bank: {{ $logistic->bank_name }} - {{ $logistic->account_number }}</p>
                                    <p class="text-xs text-gray-400 mt-2">Applied: {{ $logistic->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="flex space-x-3 ml-4">
                                    <form action="{{ route('admin.logistics.approve', $logistic) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                            Approve
                                        </button>
                                    </form>
                                    <button onclick="showLogisticsRejectModal({{ $logistic->id }})" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                                        Reject
                                    </button>
                                    <button onclick="viewLogisticsDetails({{ $logistic->id }})" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                        View Details
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Reject Modal for Logistics -->
                            <div id="logistics-reject-modal-{{ $logistic->id }}" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                                    <div class="mt-3">
                                        <h3 class="text-lg font-medium text-gray-900">Reject Logistics Application</h3>
                                        <form action="{{ route('admin.logistics.reject', $logistic) }}" method="POST" class="mt-4">
                                            @csrf
                                            <textarea name="reason" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Please provide a reason for rejection..." required></textarea>
                                            <div class="flex justify-end space-x-3 mt-4">
                                                <button type="button" onclick="hideLogisticsRejectModal({{ $logistic->id }})" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Reject</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="px-6 py-4">
                        {{ $pendingLogistics->links() }}
                    </div>
                @else
                    <div class="p-12 text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-500">No pending logistics applications at this time.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Vendor Details Modal -->
<div id="vendor-details-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Vendor Application Details</h2>
            <button onclick="closeVendorModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div id="vendor-modal-content" class="space-y-4 max-h-96 overflow-y-auto">
            <!-- Content loaded dynamically -->
        </div>
    </div>
</div>

<!-- Logistics Details Modal -->
<div id="logistics-details-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Logistics Application Details</h2>
            <button onclick="closeLogisticsModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div id="logistics-modal-content" class="space-y-4 max-h-96 overflow-y-auto">
            <!-- Content loaded dynamically -->
        </div>
    </div>
</div>

<script>
    // Tab switching
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.dataset.tab;
            
            // Update active tab styling
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active', 'text-orange-600', 'border-orange-600');
                btn.classList.add('text-gray-500');
            });
            button.classList.add('active', 'text-orange-600', 'border-orange-600');
            button.classList.remove('text-gray-500');
            
            // Show/hide tab content
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.getElementById(`${tabId}-tab`).classList.remove('hidden');
        });
    });
    
    // Vendor functions
    function showRejectModal(vendorId, type) {
        document.getElementById(`${type}-reject-modal-${vendorId}`).classList.remove('hidden');
    }
    
    function hideRejectModal(vendorId, type) {
        document.getElementById(`${type}-reject-modal-${vendorId}`).classList.add('hidden');
    }
    
    function viewVendorDetails(vendorId) {
        fetch(`/admin/vendors/${vendorId}`)
            .then(response => response.json())
            .then(data => {
                const content = `
                    <div class="grid grid-cols-2 gap-4">
                        <div><strong>Store Name:</strong> ${data.store_name}</div>
                        <div><strong>Owner Name:</strong> ${data.name}</div>
                        <div><strong>Email:</strong> ${data.email}</div>
                        <div><strong>Phone:</strong> ${data.phone || 'N/A'}</div>
                        <div class="col-span-2"><strong>Store Description:</strong> ${data.store_description || 'N/A'}</div>
                        <div class="col-span-2"><strong>Address:</strong> ${data.address || 'N/A'}</div>
                        <div><strong>Status:</strong> <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full">${data.vendor_status}</span></div>
                        <div><strong>Applied:</strong> ${new Date(data.created_at).toLocaleDateString()}</div>
                    </div>
                `;
                document.getElementById('vendor-modal-content').innerHTML = content;
                document.getElementById('vendor-details-modal').classList.remove('hidden');
            });
    }
    
    function closeVendorModal() {
        document.getElementById('vendor-details-modal').classList.add('hidden');
    }
    
    // Logistics functions
    function showLogisticsRejectModal(logisticsId) {
        document.getElementById(`logistics-reject-modal-${logisticsId}`).classList.remove('hidden');
    }
    
    function hideLogisticsRejectModal(logisticsId) {
        document.getElementById(`logistics-reject-modal-${logisticsId}`).classList.add('hidden');
    }
    
    function viewLogisticsDetails(logisticsId) {
        fetch(`/admin/logistics/${logisticsId}`)
            .then(response => response.json())
            .then(data => {
                const content = `
                    <div class="grid grid-cols-2 gap-4">
                        <div><strong>Full Name:</strong> ${data.user.name}</div>
                        <div><strong>Email:</strong> ${data.user.email}</div>
                        <div><strong>Phone:</strong> ${data.phone}</div>
                        <div><strong>Alternate Phone:</strong> ${data.alternate_phone || 'N/A'}</div>
                        <div class="col-span-2"><strong>Address:</strong> ${data.address}, ${data.city}, ${data.state}</div>
                        <div><strong>Vehicle Type:</strong> ${data.vehicle_type}</div>
                        <div><strong>Vehicle Model:</strong> ${data.vehicle_model}</div>
                        <div><strong>License Number:</strong> ${data.license_number}</div>
                        <div><strong>ID Card Type:</strong> ${data.id_card_type}</div>
                        <div><strong>ID Card Number:</strong> ${data.id_card_number}</div>
                        <div class="col-span-2">
                            <strong>ID Card Image:</strong>
                            <a href="/storage/${data.id_card_image}" target="_blank" class="text-orange-600 ml-2">View Image</a>
                        </div>
                        ${data.driver_license_image ? `
                        <div class="col-span-2">
                            <strong>Driver's License:</strong>
                            <a href="/storage/${data.driver_license_image}" target="_blank" class="text-orange-600 ml-2">View Image</a>
                        </div>
                        ` : ''}
                        <div><strong>Bank:</strong> ${data.bank_name}</div>
                        <div><strong>Account:</strong> ${data.account_number} (${data.account_name})</div>
                        <div><strong>Status:</strong> <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full">${data.status}</span></div>
                        <div><strong>Applied:</strong> ${new Date(data.created_at).toLocaleDateString()}</div>
                    </div>
                `;
                document.getElementById('logistics-modal-content').innerHTML = content;
                document.getElementById('logistics-details-modal').classList.remove('hidden');
            });
    }
    
    function closeLogisticsModal() {
        document.getElementById('logistics-details-modal').classList.add('hidden');
    }
    
    // Close modals when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('bg-gray-600')) {
            document.querySelectorAll('[id$="-details-modal"]').forEach(modal => {
                modal.classList.add('hidden');
            });
            document.querySelectorAll('[id$="-reject-modal-"]').forEach(modal => {
                modal.classList.add('hidden');
            });
        }
    }
</script>

<style>
    .tab-button.active {
        color: #f97316;
        border-bottom-color: #f97316;
    }
    .tab-button:hover:not(.active) {
        color: #374151;
        border-bottom-color: #d1d5db;
    }
</style>
@endsection