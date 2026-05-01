@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('logistics') }}" class="text-orange-600 hover:text-orange-700 transition flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Logistics
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Apply as Logistics Partner</h1>
                <p class="text-orange-100 mt-1">Fill in your details to join our delivery team</p>
            </div>
            
            <form action="{{ route('logistics.apply.submit') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                
                <!-- Personal Information -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Personal Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label for="alternate_phone" class="block text-sm font-medium text-gray-700 mb-2">Alternate Phone Number</label>
                            <input type="tel" name="alternate_phone" id="alternate_phone" value="{{ old('alternate_phone') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                            <textarea name="address" id="address" rows="2" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">{{ old('address', auth()->user()->address) }}</textarea>
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                            <input type="text" name="city" id="city" value="{{ old('city') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                            <input type="text" name="state" id="state" value="{{ old('state') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        </div>
                    </div>
                </div>

                <!-- Vehicle Information -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Vehicle Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="vehicle_type" class="block text-sm font-medium text-gray-700 mb-2">Vehicle Type *</label>
                            <select name="vehicle_type" id="vehicle_type" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                <option value="">Select vehicle type</option>
                                <option value="bicycle">Bicycle</option>
                                <option value="motorcycle">Motorcycle</option>
                                <option value="car">Car</option>
                                <option value="van">Van</option>
                            </select>
                        </div>
                        <div>
                            <label for="vehicle_model" class="block text-sm font-medium text-gray-700 mb-2">Vehicle Model *</label>
                            <input type="text" name="vehicle_model" id="vehicle_model" value="{{ old('vehicle_model') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                                placeholder="e.g., Toyota Camry, Bajaj Qute">
                        </div>
                        <div>
                            <label for="license_number" class="block text-sm font-medium text-gray-700 mb-2">Driver's License Number *</label>
                            <input type="text" name="license_number" id="license_number" value="{{ old('license_number') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        </div>
                    </div>
                </div>

                <!-- Identification -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Identification</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="id_card_type" class="block text-sm font-medium text-gray-700 mb-2">ID Card Type *</label>
                            <select name="id_card_type" id="id_card_type" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                                <option value="">Select ID type</option>
                                <option value="national_id">National ID Card</option>
                                <option value="driver_license">Driver's License</option>
                                <option value="passport">International Passport</option>
                                <option value="voter_card">Voter's Card</option>
                            </select>
                        </div>
                        <div>
                            <label for="id_card_number" class="block text-sm font-medium text-gray-700 mb-2">ID Card Number *</label>
                            <input type="text" name="id_card_number" id="id_card_number" value="{{ old('id_card_number') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label for="id_card_image" class="block text-sm font-medium text-gray-700 mb-2">Upload ID Card Image *</label>
                            <input type="file" name="id_card_image" id="id_card_image" accept="image/*" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                            <p class="mt-1 text-xs text-gray-500">Upload a clear image of your ID card (JPG, PNG, PDF)</p>
                        </div>
                        <div>
                            <label for="driver_license_image" class="block text-sm font-medium text-gray-700 mb-2">Upload Driver's License</label>
                            <input type="file" name="driver_license_image" id="driver_license_image" accept="image/*"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                            <p class="mt-1 text-xs text-gray-500">Upload a clear image of your driver's license (JPG, PNG)</p>
                        </div>
                    </div>
                </div>

                <!-- Banking Information -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Banking Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="bank_name" class="block text-sm font-medium text-gray-700 mb-2">Bank Name *</label>
                            <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label for="account_number" class="block text-sm font-medium text-gray-700 mb-2">Account Number *</label>
                            <input type="text" name="account_number" id="account_number" value="{{ old('account_number') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label for="account_name" class="block text-sm font-medium text-gray-700 mb-2">Account Name *</label>
                            <input type="text" name="account_name" id="account_name" value="{{ old('account_name', auth()->user()->name) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        </div>
                    </div>
                </div>

                <!-- Terms & Submit -->
                <div class="pt-4 border-t border-gray-200">
                    <label class="flex items-center mb-4">
                        <input type="checkbox" name="terms" required class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-700">
                            I confirm that all information provided is accurate and I agree to the 
                            <a href="#" class="text-orange-600 hover:underline">Terms of Service</a>
                        </span>
                    </label>
                    
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('logistics') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:shadow-lg transition">
                            Submit Application
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection