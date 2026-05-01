@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('admin.dashboard') }}" class="text-orange-600 hover:text-orange-700 transition flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Dashboard
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-orange-500 to-orange-600">
                <h1 class="text-2xl font-bold text-white">Pending Vendor Applications</h1>
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
                                <p class="text-sm text-gray-700 mt-2">{{ Str::limit($vendor->store_description, 200) }}</p>
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
                        
                        <!-- Reject Modal -->
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
                <div class="px-6 py-4">
                    {{ $pendingVendors->links() }}
                </div>
            @else
                <div class="p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-500">No pending vendor applications at this time.</p>
                    <a href="{{ route('admin.dashboard') }}" class="inline-block mt-4 text-orange-600 hover:text-orange-700">
                        Return to Dashboard
                    </a>
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

window.onclick = function(event) {
    if (event.target.classList.contains('bg-gray-600')) {
        document.querySelectorAll('[id^="reject-modal-"]').forEach(modal => {
            modal.classList.add('hidden');
        });
    }
}
</script>
@endsection