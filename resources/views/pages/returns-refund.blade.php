@extends('layouts.app')

@section('title', 'Returns & Refund Policy - Vefiri')

@section('content')
<section class="bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
           
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Returns & Refund Policy</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Understand our return process, refund eligibility, and how we handle disputes.
            </p>
        </div>

        <!-- Content -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="divide-y divide-gray-200">
                <!-- 1. Return Policy Overview -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">Return Policy Overview</h2>
                            <p class="text-gray-600 leading-relaxed">
                                At Vefiri, we want you to be completely satisfied with your purchase. If you're not happy with your order, we're here to help. Our return policy is designed to be fair and straightforward for both buyers and vendors.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 2. Return Eligibility -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Return Eligibility</h2>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                To be eligible for a return, your item must meet the following conditions:
                            </p>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>Return window:</strong> Within <strong>30 days</strong> of delivery</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>Condition:</strong> Item must be <strong>unused, unworn, and in original packaging</strong></span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>Original tags:</strong> All tags and labels must be intact</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>Proof of purchase:</strong> Order number or receipt required</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 3. Non-Returnable Items -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Non-Returnable Items</h2>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                The following items are <strong>not eligible</strong> for return:
                            </p>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Perishable goods (food, flowers, etc.)</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Custom-made or personalized items</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Intimate items (underwear, swimwear, etc.) - for hygiene reasons</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Digital products (software, e-books, etc.)</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Items damaged due to misuse or improper handling</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Items without original packaging or tags</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 4. How to Initiate a Return -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">How to Initiate a Return</h2>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                Follow these steps to initiate a return:
                            </p>
                            <ol class="list-decimal pl-5 space-y-3 text-gray-600">
                                <li>
                                    <strong>Log in</strong> to your Vefiri account
                                </li>
                                <li>
                                    Go to <strong>"My Orders"</strong> and find the order containing the item
                                </li>
                                <li>
                                    Click <strong>"Return Item"</strong> on the specific item you want to return
                                </li>
                                <li>
                                    Select the <strong>reason for return</strong> from the dropdown menu
                                </li>
                                <li>
                                    Provide any <strong>additional details</strong> or photos to support your request
                                </li>
                                <li>
                                    Submit the return request for <strong>vendor review</strong>
                                </li>
                            </ol>
                            <div class="mt-3 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                <p class="text-sm text-blue-800 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Vendors typically respond to return requests within <strong>24-48 hours</strong>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Refund Process -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Refund Process</h2>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                Once your return is approved by the vendor, the refund process will follow these steps:
                            </p>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-orange-600 font-bold text-sm">1</span>
                                    </div>
                                    <div>
                                        <p class="text-gray-700"><strong>Vendor Approval</strong> - Vendor reviews and approves the return request</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-orange-600 font-bold text-sm">2</span>
                                    </div>
                                    <div>
                                        <p class="text-gray-700"><strong>Item Returned</strong> - You ship the item back to the vendor (if required)</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-orange-600 font-bold text-sm">3</span>
                                    </div>
                                    <div>
                                        <p class="text-gray-700"><strong>Inspection</strong> - Vendor inspects the returned item</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-orange-600 font-bold text-sm">4</span>
                                    </div>
                                    <div>
                                        <p class="text-gray-700"><strong>Refund Processed</strong> - Refund is issued to your original payment method</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-orange-600 font-bold text-sm">5</span>
                                    </div>
                                    <div>
                                        <p class="text-gray-700"><strong>Completion</strong> - Refund reflects in your account within 5-7 business days</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Refund Methods -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Refund Methods</h2>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                Refunds are issued based on the original payment method:
                            </p>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>Paystack (Card/Bank Transfer):</strong> Refunded to the same card or bank account</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>Bank Transfer:</strong> Refunded via bank transfer to your account</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>Cash on Delivery:</strong> Refunded via bank transfer (provide your bank details)</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>Vefiri Wallet:</strong> Refunded as store credit (optional)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 7. Dispute Resolution -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Dispute Resolution</h2>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                If you're unable to resolve a return issue directly with the vendor, Vefiri can mediate:
                            </p>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Contact our support team with your order number and issue details</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Provide supporting evidence (photos, communication records, etc.)</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Our team will review the case and work towards a fair resolution</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Vefiri's decision on disputes is final and binding</span>
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
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Need Help with a Return?</h2>
                            <p class="text-gray-600 mb-4">If you have any questions about our returns and refund policy, please contact our support team:</p>
                            <div class="space-y-2 text-gray-600">
                                <p class="flex items-center">
                                    <svg class="w-4 h-4 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <strong>Email:</strong> <a href="mailto:returns@vefiri.com" class="text-orange-600 hover:underline ml-1">returns@vefiri.com</a>
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