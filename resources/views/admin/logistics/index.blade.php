@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Logistics Applications</h1>
            <p class="text-gray-600 mt-2">Review and manage logistics partner applications</p>
        </div>
        
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-2xl font-bold text-orange-600">{{ $pendingCount }}</div>
                <div class="text-sm text-gray-500">Pending Applications</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-2xl font-bold text-green-600">{{ $approvedCount }}</div>
                <div class="text-sm text-gray-500">Approved Partners</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-2xl font-bold text-red-600">{{ $rejectedCount }}</div>
                <div class="text-sm text-gray-500">Rejected Applications</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-2xl font-bold text-blue-600">{{ $totalCount }}</div>
                <div class="text-sm text-gray-500">Total Applications</div>
            </div>
        </div>
        
        <!-- Applications Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Pending Applications</h2>
            </div>
            
            @if($applications->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applicant</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vehicle</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applied</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($applications as $app)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">{{ $app->user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $app->user->email }}</div>
                                    <div class="text-sm text-gray-500">{{ $app->phone }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 capitalize">{{ $app->vehicle_type }}</div>
                                    <div class="text-sm text-gray-500">{{ $app->vehicle_model }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $app->city }}</div>
                                    <div class="text-sm text-gray-500">{{ $app->state }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $app->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <button onclick="viewApplication({{ $app->id }})" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        View Details
                                    </button>
                                    <form action="{{ route('admin.logistics.approve', $app) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-green-600 hover:text-green-800 text-sm font-medium ml-2">
                                            Approve
                                        </button>
                                    </form>
                                    <button onclick="showRejectModal({{ $app->id }})" class="text-red-600 hover:text-red-800 text-sm font-medium ml-2">
                                        Reject
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4">
                    {{ $applications->links() }}
                </div>
            @else
                <div class="p-12 text-center">
                    <p class="text-gray-500">No pending applications</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- View Application Modal -->
<div id="view-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-3xl shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Application Details</h2>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div id="modal-content" class="space-y-4 max-h-96 overflow-y-auto">
            <!-- Content loaded dynamically -->
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div id="reject-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900">Reject Application</h3>
            <form id="reject-form" method="POST" class="mt-4">
                @csrf
                <textarea name="reason" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Provide reason for rejection..." required></textarea>
                <div class="flex justify-end space-x-3 mt-4">
                    <button type="button" onclick="closeRejectModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function viewApplication(id) {
    fetch(`/admin/logistics/${id}`)
        .then(response => response.json())
        .then(data => {
            const content = `
                <div class="grid grid-cols-2 gap-4">
                    <div><strong>Name:</strong> ${data.user.name}</div>
                    <div><strong>Email:</strong> ${data.user.email}</div>
                    <div><strong>Phone:</strong> ${data.phone}</div>
                    <div><strong>Alternate Phone:</strong> ${data.alternate_phone || 'N/A'}</div>
                    <div><strong>Address:</strong> ${data.address}</div>
                    <div><strong>City/State:</strong> ${data.city}, ${data.state}</div>
                    <div><strong>Vehicle Type:</strong> ${data.vehicle_type}</div>
                    <div><strong>Vehicle Model:</strong> ${data.vehicle_model}</div>
                    <div><strong>License Number:</strong> ${data.license_number}</div>
                    <div><strong>ID Type:</strong> ${data.id_card_type}</div>
                    <div><strong>ID Number:</strong> ${data.id_card_number}</div>
                    <div><strong>Bank:</strong> ${data.bank_name}</div>
                    <div><strong>Account:</strong> ${data.account_number} (${data.account_name})</div>
                </div>
                <div class="mt-4">
                    <strong>ID Card Image:</strong>
                    <a href="/storage/${data.id_card_image}" target="_blank" class="text-orange-600 ml-2">View Image</a>
                </div>
                ${data.driver_license_image ? `
                <div>
                    <strong>Driver's License:</strong>
                    <a href="/storage/${data.driver_license_image}" target="_blank" class="text-orange-600 ml-2">View Image</a>
                </div>
                ` : ''}
            `;
            document.getElementById('modal-content').innerHTML = content;
            document.getElementById('view-modal').classList.remove('hidden');
        });
}

function showRejectModal(id) {
    const form = document.getElementById('reject-form');
    form.action = `/admin/logistics/${id}/reject`;
    document.getElementById('reject-modal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('view-modal').classList.add('hidden');
}

function closeRejectModal() {
    document.getElementById('reject-modal').classList.add('hidden');
}
</script>
@endsection