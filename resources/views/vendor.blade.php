@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Vendor Information</h1>
        <p class="text-xl text-gray-600 mb-8">Join our marketplace as a vendor and start selling your products</p>
        @auth
            @if(auth()->user()->isCustomer())
                <a href="{{ route('vendor.apply') }}" class="inline-block bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transition">
                    Apply to Become a Vendor
                </a>
            @elseif(auth()->user()->isVendor())
                <a href="{{ route('vendor.dashboard') }}" class="inline-block bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transition">
                    Go to Vendor Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="inline-block bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transition">
                    Login to Apply
                </a>
            @endif
        @else
            <a href="{{ route('login') }}" class="inline-block bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transition">
                Login to Apply
            </a>
        @endauth
    </div>
</div>
@endsection