@extends('layouts.app')

@section('title', 'FAQ - Frequently Asked Questions - Vefiri')

@section('content')
<section class="bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
           
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Find answers to common questions about shopping, selling, and using Vefiri Marketplace.
            </p>
        </div>

        <!-- Search Bar -->
        <div class="mb-10">
            <div class="relative max-w-2xl mx-auto">
                <input type="text" id="faqSearch" placeholder="Search for answers..." 
                    class="w-full px-6 py-4 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-700 shadow-sm">
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Category Tabs -->
        <div class="flex flex-wrap justify-center gap-2 mb-8">
            <button class="faq-tab-btn active px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition text-sm font-medium" data-category="all">
                All Questions
            </button>
            <button class="faq-tab-btn px-4 py-2 bg-white text-gray-700 rounded-lg hover:bg-gray-100 transition text-sm font-medium" data-category="shopping">
                Shopping
            </button>
            <button class="faq-tab-btn px-4 py-2 bg-white text-gray-700 rounded-lg hover:bg-gray-100 transition text-sm font-medium" data-category="vendor">
                For Vendors
            </button>
            <button class="faq-tab-btn px-4 py-2 bg-white text-gray-700 rounded-lg hover:bg-gray-100 transition text-sm font-medium" data-category="payment">
                Payments
            </button>
            <button class="faq-tab-btn px-4 py-2 bg-white text-gray-700 rounded-lg hover:bg-gray-100 transition text-sm font-medium" data-category="delivery">
                Delivery
            </button>
            <button class="faq-tab-btn px-4 py-2 bg-white text-gray-700 rounded-lg hover:bg-gray-100 transition text-sm font-medium" data-category="account">
                Account
            </button>
        </div>

        <!-- FAQ Accordion -->
        <div class="space-y-4" id="faqContainer">
            <!-- Shopping Category -->
            <div class="faq-item" data-category="shopping">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">How do I place an order on Vefiri?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>Placing an order on Vefiri is easy:</p>
                        <ol class="list-decimal pl-5 mt-2 space-y-1">
                            <li>Browse our marketplace and add items to your cart</li>
                            <li>Click the cart icon and proceed to checkout</li>
                            <li>Fill in your shipping details</li>
                            <li>Choose your payment method (Paystack, Bank Transfer, or Cash on Delivery)</li>
                            <li>Confirm your order and complete payment</li>
                        </ol>
                        <p class="mt-2">You'll receive an order confirmation email with your order details.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="shopping">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">Can I cancel or modify my order?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>You can cancel or modify your order within 30 minutes of placing it. Here's how:</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Go to "My Orders" in your profile</li>
                            <li>Find the order and click "Cancel Order"</li>
                            <li>If the order has already been processed, please contact our support team immediately</li>
                        </ul>
                        <p class="mt-2">For modifications, please contact our support team at <a href="mailto:support@vefiri.com" class="text-orange-600 hover:underline">support@vefiri.com</a>.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="shopping">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">How do I track my order?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>You can track your order in two ways:</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li><strong>Via your account:</strong> Go to "My Orders" in your profile and click "View Details" on your order</li>
                            <li><strong>Via email:</strong> You'll receive tracking information once your order ships</li>
                        </ul>
                        <p class="mt-2">If you haven't received tracking information within 48 hours, please contact our support team.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="shopping">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">What is your return policy?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>We offer a <strong>30-day return policy</strong> on eligible items. Here's what you need to know:</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Items must be unused and in their original packaging</li>
                            <li>Return shipping costs are the responsibility of the buyer (unless the item is defective)</li>
                            <li>Refunds are processed within 5-7 business days after return is received</li>
                            <li>Some items (like perishables and custom orders) are not eligible for returns</li>
                        </ul>
                        <p class="mt-2">To initiate a return, go to "My Orders" and click "Return" on your order.</p>
                    </div>
                </div>
            </div>

            <!-- Vendor Category -->
            <div class="faq-item" data-category="vendor">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">How do I become a vendor on Vefiri?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>Becoming a vendor on Vefiri is simple:</p>
                        <ol class="list-decimal pl-5 mt-2 space-y-1">
                            <li>Create a Vefiri account or log in</li>
                            <li>Click "Become a Vendor" from your profile</li>
                            <li>Fill in your store details and upload required documents</li>
                            <li>Submit your application for review</li>
                            <li>Once approved, you can start listing products!</li>
                        </ol>
                        <p class="mt-2">The approval process typically takes 24-48 hours. You'll be notified via email once approved.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="vendor">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">How do I get paid as a vendor?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>As a vendor, you'll receive payments through our secure split-payment system:</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Payments are automatically split between Vefiri (commission) and you</li>
                            <li>Your funds are held securely and paid out on a regular schedule</li>
                            <li>You can track your earnings in your vendor dashboard</li>
                            <li>Withdrawals are processed to your registered bank account</li>
                        </ul>
                        <p class="mt-2">Make sure you've added your bank details in your vendor settings to receive payments.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="vendor">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">What commission does Vefiri charge?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>Vefiri charges a competitive commission on each successful sale. The standard commission rate is <strong>10%</strong> of the total order value. This covers:</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Platform maintenance and features</li>
                            <li>Customer support</li>
                            <li>Payment processing fees</li>
                            <li>Marketing and promotion</li>
                        </ul>
                        <p class="mt-2">Commission rates may vary for special promotions or high-volume vendors. Check your vendor dashboard for your specific rate.</p>
                    </div>
                </div>
            </div>

            <!-- Payment Category -->
            <div class="faq-item" data-category="payment">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">What payment methods are accepted?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>We accept multiple payment methods to make your shopping experience seamless:</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li><strong>Paystack:</strong> Card (Visa, Mastercard, Verve), Bank Transfer, USSD, QR Code</li>
                            <li><strong>Bank Transfer:</strong> Direct bank transfers (manual confirmation)</li>
                            <li><strong>Cash on Delivery:</strong> Pay when you receive your order</li>
                        </ul>
                        <p class="mt-2">All transactions are secured with industry-standard encryption.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="payment">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">Is my payment information secure?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>Yes! We take your security seriously:</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>All payments are processed through <strong>Paystack</strong>, a PCI-DSS compliant payment processor</li>
                            <li>Your card details are never stored on our servers</li>
                            <li>We use SSL encryption for all transactions</li>
                            <li>We comply with all industry security standards</li>
                        </ul>
                        <p class="mt-2">You can shop with confidence knowing your payment information is protected.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="payment">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">How do I get a refund?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>Refunds are processed based on the reason for return:</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li><strong>Defective/Damaged items:</strong> Full refund including shipping costs</li>
                            <li><strong>Wrong item received:</strong> Full refund including shipping costs</li>
                            <li><strong>Change of mind:</strong> Refund of product cost (shipping not included)</li>
                            <li><strong>Order cancellation:</strong> Full refund if cancelled before processing</li>
                        </ul>
                        <p class="mt-2">Refunds are processed within 5-7 business days after return is approved and received.</p>
                    </div>
                </div>
            </div>

            <!-- Delivery Category -->
            <div class="faq-item" data-category="delivery">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">How much does delivery cost?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>Delivery costs depend on your location and order value:</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Orders above <strong>₦50,000</strong> qualify for <strong>free delivery</strong></li>
                            <li>Standard delivery fee is <strong>₦3,000</strong> for orders below ₦50,000</li>
                            <li>Delivery fees may vary for remote or hard-to-reach locations</li>
                        </ul>
                        <p class="mt-2">The exact delivery fee will be calculated at checkout before you confirm your order.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="delivery">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">How long does delivery take?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>Delivery times vary based on your location:</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li><strong>Lagos:</strong> 1-2 business days</li>
                            <li><strong>Other major cities:</strong> 2-4 business days</li>
                            <li><strong>Remote areas:</strong> 4-7 business days</li>
                        </ul>
                        <p class="mt-2">You'll receive tracking information once your order ships, so you can monitor your delivery in real-time.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="delivery">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">Do you deliver internationally?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>Currently, Vefiri delivers exclusively within <strong>Nigeria</strong>. We're focused on providing the best service to our Nigerian customers and plan to expand to other countries in the future.</p>
                        <p class="mt-2">If you're outside Nigeria and wish to purchase from our vendors, please contact us to explore possible options.</p>
                    </div>
                </div>
            </div>

            <!-- Account Category -->
            <div class="faq-item" data-category="account">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">How do I create an account?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>Creating an account on Vefiri is quick and free:</p>
                        <ol class="list-decimal pl-5 mt-2 space-y-1">
                            <li>Click the <strong>"Sign Up"</strong> button at the top right of the page</li>
                            <li>Fill in your name, email address, and password</li>
                            <li>Verify your email address (check your inbox)</li>
                            <li>Complete your profile with additional details</li>
                        </ol>
                        <p class="mt-2">Once registered, you can start shopping immediately!</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="account">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">I forgot my password. How do I reset it?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>Resetting your password is easy:</p>
                        <ol class="list-decimal pl-5 mt-2 space-y-1">
                            <li>Go to the <strong>Login</strong> page</li>
                            <li>Click <strong>"Forgot Password?"</strong></li>
                            <li>Enter your registered email address</li>
                            <li>Check your email for a password reset link</li>
                            <li>Click the link and create a new password</li>
                        </ol>
                        <p class="mt-2">If you don't receive the reset email within 5 minutes, check your spam folder or contact support.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="account">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button class="faq-question w-full flex justify-between items-center px-6 py-4 text-left hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900">How do I update my account information?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4 text-gray-600 leading-relaxed">
                        <p>You can update your account information anytime:</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Go to <strong>"My Profile"</strong> in your account</li>
                            <li>Update your name, email, phone number, or address</li>
                            <li>Click <strong>"Update Profile"</strong> to save changes</li>
                            <li>To change your password, go to the <strong>"Security"</strong> tab</li>
                        </ul>
                        <p class="mt-2">Your updated information will be reflected immediately.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Still Have Questions? -->
        <div class="mt-12 bg-orange-50 border border-orange-200 rounded-2xl p-8 text-center">
            <h3 class="text-xl font-bold text-gray-900 mb-3">Still Have Questions?</h3>
            <p class="text-gray-600 mb-6">We're here to help. Contact our friendly support team.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="mailto:support@vefiri.com" class="inline-flex items-center px-6 py-3 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Email Support
                </a>
               
            </div>
        </div>
    </div>
</div>

<script>
    // FAQ Accordion Toggle
    document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');
            
            // Toggle answer visibility
            answer.classList.toggle('hidden');
            
            // Rotate icon
            icon.classList.toggle('rotate-180');
            
            // Close other open FAQs (optional - for accordion behavior)
            // Uncomment below for accordion style (only one open at a time)
            /*
            document.querySelectorAll('.faq-answer').forEach(otherAnswer => {
                if (otherAnswer !== answer && !otherAnswer.classList.contains('hidden')) {
                    otherAnswer.classList.add('hidden');
                    const otherIcon = otherAnswer.previousElementSibling.querySelector('.faq-icon');
                    otherIcon.classList.remove('rotate-180');
                }
            });
            */
        });
    });

    // Category Tab Filter
    document.querySelectorAll('.faq-tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Update active button styles
            document.querySelectorAll('.faq-tab-btn').forEach(b => {
                b.classList.remove('active', 'bg-orange-600', 'text-white');
                b.classList.add('bg-white', 'text-gray-700');
            });
            this.classList.add('active', 'bg-orange-600', 'text-white');
            this.classList.remove('bg-white', 'text-gray-700');
            
            // Filter FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Search Functionality
    document.getElementById('faqSearch').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        document.querySelectorAll('.faq-item').forEach(item => {
            const question = item.querySelector('.faq-question span').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
            
            if (searchTerm === '' || question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Expand FAQ when searching (auto-open matching answers)
    document.getElementById('faqSearch').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        document.querySelectorAll('.faq-item').forEach(item => {
            const question = item.querySelector('.faq-question span').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer');
            
            if (searchTerm !== '' && (question.includes(searchTerm) || answer.textContent.toLowerCase().includes(searchTerm))) {
                answer.classList.remove('hidden');
                const icon = item.querySelector('.faq-icon');
                icon.classList.add('rotate-180');
            }
        });
    });
</script>

<style>
    .faq-icon.rotate-180 {
        transform: rotate(180deg);
    }
    .faq-tab-btn.active {
        background-color: #f97316 !important;
        color: white !important;
    }
</style>
@endsection