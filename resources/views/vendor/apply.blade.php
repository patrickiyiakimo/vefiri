@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-8">
            <h1 class="text-3xl font-bold text-white">Become a Vendor</h1>
            <p class="text-orange-100 mt-2">Join our marketplace and start selling your products</p>
        </div>
        
        <form action="{{ route('vendor.submit') }}" method="POST" class="p-6 space-y-6">
            @csrf
            
            <div>
                <label for="store_name" class="block text-sm font-medium text-gray-700">Store Name *</label>
                <input type="text" name="store_name" id="store_name" value="{{ old('store_name') }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('store_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="store_description" class="block text-sm font-medium text-gray-700">Store Description *</label>
                <textarea name="store_description" id="store_description" rows="5" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">{{ old('store_description') }}</textarea>
                <p class="mt-1 text-sm text-gray-500">Tell us about your business, products, and why you want to join.</p>
                @error('store_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number *</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Business Address *</label>
                <textarea name="address" id="address" rows="3" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">{{ old('address') }}</textarea>
                @error('address')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <h3 class="text-sm font-medium text-yellow-800">Important Notes:</h3>
                <ul class="mt-2 text-sm text-yellow-700 list-disc list-inside">
                    <li>Your application will be reviewed within 3-5 business days</li>
                    <li>You'll be notified via email once approved</li>
                    <li>Approved vendors can start uploading products immediately</li>
                    <li>All products must comply with our marketplace guidelines</li>
                </ul>
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('dashboard') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-md hover:shadow-lg transition">
                    Submit Application
                </button>
            </div>
        </form>
    </div>
</div>
@endsection