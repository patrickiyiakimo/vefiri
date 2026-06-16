@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Orders Management</h1>
                <p class="text-gray-600 mt-1">Manage and track all customer orders</p>
            </div>
            <a href="{{ route('admin.orders.export') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Export Orders
            </a>
        </div>

        <!-- Order Statistics -->
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                <p class="text-sm text-gray-500">Total Orders</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-2xl font-bold text-yellow-600">{{ $stats['pending'] }}</p>
                <p class="text-sm text-gray-500">Pending</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-2xl font-bold text-blue-600">{{ $stats['processing'] }}</p>
                <p class="text-sm text-gray-500">Processing</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-2xl font-bold text-purple-600">{{ $stats['shipped'] }}</p>
                <p class="text-sm text-gray-500">Shipped</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-2xl font-bold text-green-600">{{ $stats['delivered'] }}</p>
                <p class="text-sm text-gray-500">Delivered</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-2xl font-bold text-green-700">{{ $stats['completed'] }}</p>
                <p class="text-sm text-gray-500">Completed</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-2xl font-bold text-red-600">{{ $stats['cancelled'] }}</p>
                <p class="text-sm text-gray-500">Cancelled</p>
            </div>
        </div>

        <!-- Payment Stats -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-2xl font-bold text-green-600">₦{{ number_format($stats['revenue'] ?? 0, 2) }}</p>
                <p class="text-sm text-gray-500">Total Revenue</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-2xl font-bold text-green-600">{{ $stats['paid'] }}</p>
                <p class="text-sm text-gray-500">Paid Orders</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-2xl font-bold text-yellow-600">{{ $stats['unpaid'] }}</p>
                <p class="text-sm text-gray-500">Unpaid Orders</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-lg shadow p-4 mb-6">
            <form method="GET" action="{{ route('admin.orders.index') }}" class="flex flex-wrap gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Order # or customer name" 
                           class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 w-64">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        <option value="all">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
                    <select name="payment_status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        <option value="all">All Payment</option>
                        <option value="pending" {{ request('payment_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ request('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="failed" {{ request('payment_status') == 'failed' ? 'selected' : '' }}>Failed</option>
                        <option value="refunded" {{ request('payment_status') == 'refunded' ? 'selected' : '' }}>Refunded</option>
                    </select>
                </div>
                <button type="submit" class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition">
                    Filter
                </button>
                <a href="{{ route('admin.orders.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Clear
                </a>
            </form>
        </div>

        <!-- Orders Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order #</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($orders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <span class="font-medium text-gray-900">{{ $order->order_number }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $order->first_name }} {{ $order->last_name }}</div>
                                <div class="text-sm text-gray-500">{{ $order->email }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-semibold text-gray-900">₦{{ number_format($order->total, 2) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full 
                                    {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : 
                                       ($order->status === 'processing' ? 'bg-blue-100 text-blue-700' : 
                                       ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                                       ($order->status === 'shipped' ? 'bg-purple-100 text-purple-700' : 
                                       ($order->status === 'delivered' ? 'bg-green-100 text-green-700' : 
                                       ($order->status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700'))))) }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full 
                                    {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-700' : 
                                       ($order->payment_status === 'failed' ? 'bg-red-100 text-red-700' : 
                                       ($order->payment_status === 'refunded' ? 'bg-gray-100 text-gray-700' : 'bg-yellow-100 text-yellow-700')) }}">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $order->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.orders.show', $order) }}" 
                                   class="text-orange-600 hover:text-orange-700 transition">
                                    View
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                No orders found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection