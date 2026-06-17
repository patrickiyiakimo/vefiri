@extends('layouts.app')

@section('title', 'Shipping Policy - Vefiri')

@section('content')
<section class="bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Shipping Policy</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Learn about our delivery process, shipping rates, and estimated delivery times.
            </p>
        </div>

        <!-- Content -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="divide-y divide-gray-200">
                <!-- 1. Shipping Overview -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">Shipping Overview</h2>
                            <p class="text-gray-600 leading-relaxed">
                                Vefiri partners with trusted logistics providers to ensure your orders are delivered safely and on time. We offer reliable delivery services across Nigeria with real-time tracking so you can monitor your package every step of the way.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 2. Delivery Areas -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Delivery Areas</h2>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                We currently deliver to all states across Nigeria. Our logistics network covers:
                            </p>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Lagos
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Abuja (FCT)
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Port Harcourt
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Ibadan
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Benin City
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Enugu
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Kano
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Kaduna
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Owerri
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Abeokuta
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Warri
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Jos
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-3">And many more locations across Nigeria.</p>
                        </div>
                    </div>
                </div>

                <!-- 3. Shipping Rates -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Shipping Rates</h2>
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Order Value</th>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Shipping Fee</th>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Note</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-4 py-3 text-gray-600">Below ₦50,000</td>
                                            <td class="px-4 py-3 font-medium text-gray-900">₦3,000</td>
                                            <td class="px-4 py-3 text-gray-500">Standard delivery</td>
                                        </tr>
                                        <tr class="bg-green-50">
                                            <td class="px-4 py-3 text-gray-600">₦150,000 and above</td>
                                            <td class="px-4 py-3 font-medium text-green-600">FREE</td>
                                            <td class="px-4 py-3 text-gray-500">Complimentary delivery</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 text-gray-600">Remote locations</td>
                                            <td class="px-4 py-3 font-medium text-gray-900">₦5,000 - ₦7,000</td>
                                            <td class="px-4 py-3 text-gray-500">May vary by location</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p class="text-sm text-gray-500 mt-3">* Shipping rates are calculated at checkout based on your delivery address.</p>
                        </div>
                    </div>
                </div>

                <!-- 4. Estimated Delivery Times -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Estimated Delivery Times</h2>
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Location</th>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Delivery Time</th>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Note</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-4 py-3 text-gray-600">Lagos</td>
                                            <td class="px-4 py-3 font-medium text-gray-900">1 - 2 business days</td>
                                            <td class="px-4 py-3 text-gray-500">Same-day available for some areas</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 text-gray-600">Abuja, Port Harcourt, Ibadan</td>
                                            <td class="px-4 py-3 font-medium text-gray-900">2 - 3 business days</td>
                                            <td class="px-4 py-3 text-gray-500">Major cities</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 text-gray-600">Other state capitals</td>
                                            <td class="px-4 py-3 font-medium text-gray-900">3 - 5 business days</td>
                                            <td class="px-4 py-3 text-gray-500">Standard delivery</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 text-gray-600">Remote areas</td>
                                            <td class="px-4 py-3 font-medium text-gray-900">5 - 7 business days</td>
                                            <td class="px-4 py-3 text-gray-500">May take longer</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                <p class="text-sm text-yellow-800 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    Delivery times are estimates and may vary due to weather, traffic, or other unforeseen circumstances.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Order Processing -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Order Processing</h2>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Orders are processed within <strong>24 hours</strong> of confirmation</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>You will receive a confirmation email with your order details</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>You'll receive tracking information once your order is dispatched</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Orders placed on weekends or holidays are processed the next business day</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 6. Order Tracking -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Order Tracking</h2>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                Stay informed about your order status with real-time tracking:
                            </p>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Track your order through your <strong>Vefiri account</strong> under "My Orders"</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Receive <strong>SMS and email updates</strong> at every stage of delivery</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Track your package directly through our <strong>logistics partner's portal</strong></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 7. Delivery Instructions -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Delivery Instructions</h2>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Provide accurate delivery address with landmark details for easy identification</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Ensure your phone number is correct for delivery notifications</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>If you won't be available, provide alternative contact details</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>All packages require a <strong>signature on delivery</strong></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 8. Contact -->
                <div id="contact" class="p-6 md:p-8 bg-orange-50">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-orange-200 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Shipping Questions?</h2>
                            <p class="text-gray-600 mb-4">If you have any questions about our shipping policy, please contact our support team:</p>
                            <div class="space-y-2 text-gray-600">
                                <p class="flex items-center">
                                    <svg class="w-4 h-4 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <strong>Email:</strong> <a href="mailto:shipping@vefiri.com" class="text-orange-600 hover:underline ml-1">shipping@vefiri.com</a>
                                </p>
                                <p class="flex items-center">
                                    <svg class="w-4 h-4 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <strong>Phone:</strong> <span class="ml-1">+234 800 000 0000</span>
                                </p>
                                <p class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <strong>Address:</strong> <span class="ml-1">Lagos, Nigeria</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection