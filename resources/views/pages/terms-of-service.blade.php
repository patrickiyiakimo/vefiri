@extends('layouts.app')

@section('title', 'Terms of Service - Vefiri')

@section('content')
<section class="bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-4 py-2 bg-orange-100 rounded-full mb-4">
                <svg class="w-4 h-4 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <span class="text-orange-600 text-sm font-semibold">Legal Agreement</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Terms of Service</h1>
            <p class="text-lg text-gray-600">Last Updated: {{ date('F j, Y') }}</p>
        </div>

       
        <!-- Content -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="divide-y divide-gray-200">
                <!-- 1. Introduction -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold text-lg">1</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">Introduction</h2>
                            <p class="text-gray-600 leading-relaxed">
                                Vefiri is an online marketplace that connects buyers with verified vendors. We provide a platform for discovering and purchasing quality products from trusted sellers across Nigeria. Our goal is to create a safe, transparent, and enjoyable shopping experience for all users.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 2. User Accounts -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold text-lg">2</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">User Accounts</h2>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>You must provide accurate and complete information when creating an account</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>You are responsible for maintaining the confidentiality of your account credentials</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Any activity that occurs under your account is your responsibility</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>You must notify us immediately of any unauthorized account access</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>We reserve the right to suspend or terminate accounts with inaccurate information</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 3. Vendor Verification -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold text-lg">3</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Vendor Verification</h2>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                Vefiri conducts thorough checks to verify vendors before onboarding to ensure product quality and authenticity. However, please note:
                            </p>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Vefiri does not manufacture or directly own the products listed</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Product descriptions and images are provided by vendors</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>We encourage buyers to review product details, reviews, and ratings before purchase</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Vendors are responsible for fulfilling orders accurately</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 4. Orders & Payments -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold text-lg">4</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Orders & Payments</h2>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>All payments must be made through approved channels on the platform</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Once an order is placed, it is subject to vendor confirmation and availability</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Prices are displayed in Nigerian Naira (₦) and include applicable taxes</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>We use secure payment processors to protect your financial information</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Vefiri does not store your full payment details on our servers</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 5. Delivery -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold text-lg">5</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Delivery</h2>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Delivery is handled by third-party logistics partners</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Estimated delivery times are provided as a guide and are not guaranteed</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Delivery fees are calculated based on location and order value</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Free shipping is available for orders above ₦50,000</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>You will receive tracking information once your order ships</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 6. Refunds & Disputes -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold text-lg">6</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Refunds & Disputes</h2>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Buyers may report issues with orders within 7 days of delivery</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Vefiri will review disputes and may intervene where necessary</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Refund eligibility depends on the nature of the complaint and evidence provided</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>We recommend contacting the vendor first to resolve any issues</span>
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

                <!-- 7. Prohibited Use -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-red-600 font-bold text-lg">7</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Prohibited Use</h2>
                            <p class="text-sm text-gray-500 mb-3">Users must not:</p>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Engage in fraudulent activities or misrepresent products</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Misuse the platform for illegal purposes</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Attempt to bypass Vefiri systems for direct vendor transactions</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Post false reviews or manipulate ratings</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Harass, abuse, or harm other users</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Violate any applicable laws or regulations</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 8. Limitation of Liability -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold text-lg">8</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Limitation of Liability</h2>
                            <p class="text-gray-600 leading-relaxed">
                                To the fullest extent permitted by law, Vefiri is not liable for indirect, incidental, or consequential losses arising from your use of the platform. Our total liability shall not exceed the amount paid for the specific order giving rise to the claim. We are not responsible for vendor misconduct, product defects, or delivery delays beyond our control.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 9. Termination -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold text-lg">9</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Termination</h2>
                            <p class="text-gray-600 leading-relaxed">
                                We reserve the right to suspend or terminate accounts that violate these terms, engage in fraudulent activities, or pose a risk to other users. You may also close your account at any time by contacting our support team.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 10. Intellectual Property -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold text-lg">10</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Intellectual Property</h2>
                            <p class="text-gray-600 leading-relaxed">
                                All content on Vefiri, including logos, designs, text, graphics, and software, is the property of Vefiri or its licensors and is protected by copyright and trademark laws. You may not copy, modify, or distribute our content without explicit permission.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 11. Changes to Terms -->
                <div class="p-6 md:p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold text-lg">11</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Changes to Terms</h2>
                            <p class="text-gray-600 leading-relaxed">
                                Vefiri may update these Terms of Service at any time to reflect changes in our practices or legal requirements. We will notify users of significant changes via email or platform notification. Continued use of the platform after changes means acceptance of the updated terms.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 12. Contact Us -->
                <div id="contact" class="p-6 md:p-8 bg-orange-50">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-orange-200 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3">Contact Us</h2>
                            <p class="text-gray-600 mb-4">If you have any questions about these Terms of Service, please contact us:</p>
                            <div class="space-y-2 text-gray-600">
                                <p class="flex items-center">
                                    <svg class="w-4 h-4 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <strong>Email:</strong> <a href="mailto:legal@vefiri.com" class="text-orange-600 hover:underline ml-1">legal@vefiri.com</a>
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
                            <div class="mt-6 p-4 bg-white rounded-lg border border-gray-200">
                                <p class="text-sm text-gray-500">
                                    By using Vefiri, you agree to our <a href="{{ route('privacy-policy') }}" class="text-orange-600 hover:underline">Privacy Policy</a>.
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