<!-- Testimonials Section with Draggable Carousel (7 Testimonials) -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
           
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                What Our <span class="bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent">Community Says</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Join thousands of satisfied customers and vendors who trust Vefiri — a multi-vendor marketplace for everything you need
            </p>
            <div class="w-20 h-1 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full mx-auto mt-4"></div>
        </div>

        <!-- Drag Hint + Carousel Pagination (at the top of testimonial cards) -->
        <div class="flex flex-col items-center justify-center mb-6">
            <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm border border-orange-100 cursor-pointer transition-all hover:shadow-md">
               
                <span class="text-sm font-medium text-gray-700">← Drag to explore →</span>
                
            </div>
        </div>

        <!-- Carousel Pagination Dots (on top of cards) -->
        <div class="flex justify-center gap-2 mb-6 flex-wrap" id="carouselDots"></div>

        <!-- Draggable Carousel Container (Cursor: grab) -->
        <div class="testimonials-carousel-wrapper" id="testimonialCarousel">
            <div class="testimonials-track" id="testimonialTrack">
                <!-- Card 1 - Customer -->
                <div class="testimonial-card" data-index="0">
                    <div class="flex items-start justify-between mb-5">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center text-white font-bold shadow-md">SJ</div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-lg">Sarah Johnson</h4>
                                <div class="flex items-center gap-2 mt-0.5">
                                    <div class="flex text-yellow-400 text-sm">★★★★★</div>
                                    <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">Buyer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex-1">
                        <svg class="absolute -top-2 -left-2 w-7 h-7 text-orange-200/40" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                        <p class="text-gray-600 leading-relaxed pl-4 relative z-10 text-[0.95rem]">"Vefiri is my go-to marketplace. From authentic African wears to electronics, every purchase is seamless. The multi-vendor system gives me variety and trust."</p>
                    </div>
                    
                </div>

                <!-- Card 2 - Vendor -->
                <div class="testimonial-card" data-index="1">
                    <div class="flex items-start justify-between mb-5">
                        <div class="flex items-center gap-3"><div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center text-white font-bold shadow-md">MO</div><div><h4 class="font-bold text-gray-900 text-lg">Michael Okafor</h4><div class="flex items-center gap-2 mt-0.5"><div class="flex text-yellow-400 text-sm">★★★★★</div><span class="text-xs text-gray-500 bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full">Vendor</span></div></div></div>
                    </div>
                    <div class="relative flex-1"><svg class="absolute -top-2 -left-2 w-7 h-7 text-emerald-200/40" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg><p class="text-gray-600 leading-relaxed pl-4">"As a vendor, Vefiri empowered my business. The analytics, payout speed, and customer reach are unmatched. My sales grew 245% in just 4 months!"</p></div>
                   
                </div>

                <!-- Card 3 - Customer -->
                <div class="testimonial-card" data-index="2">
                    <div class="flex items-start justify-between mb-5"><div class="flex items-center gap-3"><div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center text-white font-bold shadow-md">AI</div><div><h4 class="font-bold text-gray-900 text-lg">Amara Ikeji</h4><div class="flex items-center gap-2 mt-0.5"><div class="flex text-yellow-400 text-sm">★★★★★</div><span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">Buyer</span></div></div></div></div>
                    <div class="relative flex-1"><svg class="absolute -top-2 -left-2 w-7 h-7 text-orange-200/40" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983z"/></svg><p class="text-gray-600 leading-relaxed pl-4">"I love the variety! From local artisans to global brands, Vefiri brings everything under one roof. Secure checkout & fast delivery always win."</p></div>
                   
                </div>

                <!-- Card 4 - Vendor Premium -->
                <div class="testimonial-card" data-index="3">
                    <div class="flex items-start justify-between mb-5"><div class="flex items-center gap-3"><div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center text-white font-bold shadow-md">TC</div><div><h4 class="font-bold text-gray-900 text-lg">Tolu Cole</h4><div class="flex items-center gap-2 mt-0.5"><div class="flex text-yellow-400 text-sm">★★★★★</div><span class="text-xs text-gray-500 bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full">Vendor</span></div></div></div></div>
                    <div class="relative flex-1"><svg class="absolute -top-2 -left-2 w-7 h-7 text-emerald-200/40" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983z"/></svg><p class="text-gray-600 leading-relaxed pl-4">"Vefiri's multi-vendor architecture helped me scale from local to national. Their support team is responsive and the platform is incredibly intuitive."</p></div>
                  
                </div>

                <!-- Card 5 - Customer Frequent -->
                <div class="testimonial-card" data-index="4">
                    <div class="flex items-start justify-between mb-5"><div class="flex items-center gap-3"><div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center text-white font-bold shadow-md">OO</div><div><h4 class="font-bold text-gray-900 text-lg">Oluwatobi O.</h4><div class="flex items-center gap-2 mt-0.5"><div class="flex text-yellow-400 text-sm">★★★★★</div><span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">Buyer</span></div></div></div></div>
                    <div class="relative flex-1"><svg class="absolute -top-2 -left-2 w-7 h-7 text-orange-200/40" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983z"/></svg><p class="text-gray-600 leading-relaxed pl-4">"The best part? Secure payments & buyer protection. I've recommended Vefiri to 10+ friends. It's like having the biggest mall in your pocket."</p></div>
                    
                </div>

                <!-- Card 6 - Vendor Specialist -->
                <div class="testimonial-card" data-index="5">
                    <div class="flex items-start justify-between mb-5"><div class="flex items-center gap-3"><div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center text-white font-bold shadow-md">AE</div><div><h4 class="font-bold text-gray-900 text-lg">Ada Eze</h4><div class="flex items-center gap-2 mt-0.5"><div class="flex text-yellow-400 text-sm">★★★★★</div><span class="text-xs text-gray-500 bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full">Vendor</span></div></div></div></div>
                    <div class="relative flex-1"><svg class="absolute -top-2 -left-2 w-7 h-7 text-emerald-200/40" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983z"/></svg><p class="text-gray-600 leading-relaxed pl-4">"Listing products takes minutes, and the integrated marketing tools helped my handmade accessories reach thousands. Vefiri truly cares about vendors."</p></div>
                    
                </div>

                <!-- Card 7 - Loyal Customer -->
                <div class="testimonial-card" data-index="6">
                    <div class="flex items-start justify-between mb-5"><div class="flex items-center gap-3"><div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center text-white font-bold shadow-md">KC</div><div><h4 class="font-bold text-gray-900 text-lg">Kunle C.</h4><div class="flex items-center gap-2 mt-0.5"><div class="flex text-yellow-400 text-sm">★★★★★</div><span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">Buyer</span></div></div></div></div>
                    <div class="relative flex-1"><svg class="absolute -top-2 -left-2 w-7 h-7 text-orange-200/40" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983z"/></svg><p class="text-gray-600 leading-relaxed pl-4">"From groceries to gadgets, Vefiri's multi-vendor ecosystem gives me competitive prices and authentic products. Delivery is always ahead of schedule!"</p></div>
                    
                </div>
            </div>
        </div>

       

    </div>
</section>

 <!-- Stats Row with Counter Animation - Professional Orange Theme -->
<div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8 py-16 px-6 bg-gradient-to-br from-orange-600 to-orange-700 shadow-xl">
    <!-- Stat 1: Rating -->
    <div class="text-center transform transition-all duration-300 hover:scale-105">
        <div class="text-5xl lg:text-6xl font-extrabold text-white mb-2">
            <span class="counter" data-target="4.9" data-suffix="">4.9</span>
        </div>
        <div class="flex justify-center mt-2 mb-2">
            <svg class="w-5 h-5 text-yellow-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            <svg class="w-5 h-5 text-yellow-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            <svg class="w-5 h-5 text-yellow-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            <svg class="w-5 h-5 text-yellow-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            <svg class="w-5 h-5 text-yellow-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
        </div>
        <p class="text-orange-100 font-medium text-sm uppercase tracking-wide">Average Rating</p>
    </div>

    <!-- Stat 2: Happy Customers -->
    <div class="text-center transform transition-all duration-300 hover:scale-105">
        <div class="text-4xl lg:text-5xl font-extrabold text-white mb-2">
            <span class="counter" data-target="10000" data-suffix="+">0</span>
        </div>
        <p class="text-orange-100 font-medium text-sm uppercase tracking-wide mt-2">Happy Customers</p>
        <div class="w-12 h-0.5 bg-orange-300 mx-auto mt-3 rounded-full"></div>
    </div>

    <!-- Stat 3: Satisfaction Rate -->
    <div class="text-center transform transition-all duration-300 hover:scale-105">
        <div class="text-4xl lg:text-5xl font-extrabold text-white mb-2">
            <span class="counter" data-target="98" data-suffix="%">0</span>
        </div>
        <p class="text-orange-100 font-medium text-sm uppercase tracking-wide mt-2">Satisfaction Rate</p>
        <div class="w-12 h-0.5 bg-orange-300 mx-auto mt-3 rounded-full"></div>
    </div>

    <!-- Stat 4: Verified Vendors -->
    <div class="text-center transform transition-all duration-300 hover:scale-105">
        <div class="text-4xl lg:text-5xl font-extrabold text-white mb-2">
            <span class="counter" data-target="500" data-suffix="+">0</span>
        </div>
        <p class="text-orange-100 font-medium text-sm uppercase tracking-wide mt-2">Verified Vendors</p>
        <div class="w-12 h-0.5 bg-orange-300 mx-auto mt-3 rounded-full"></div>
    </div>
</div>

<style>

       /* Smooth counter animation */
    @keyframes gentlePop {
        0% { opacity: 0; transform: translateY(10px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .counter {
        display: inline-block;
        animation: gentlePop 0.4s ease-out;
        font-variant-numeric: tabular-nums;
    }
    /* Carousel & Drag Styles */
    .testimonials-carousel-wrapper {
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        scroll-behavior: smooth;
        cursor: grab;
        user-select: none;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: thin;
        scrollbar-color: #f97316 #e9ecef;
        border-radius: 2rem;
    }
    .testimonials-carousel-wrapper:active {
        cursor: grabbing;
    }
    .testimonials-carousel-wrapper::-webkit-scrollbar {
        height: 6px;
    }
    .testimonials-carousel-wrapper::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 20px;
    }
    .testimonials-carousel-wrapper::-webkit-scrollbar-thumb {
        background: #fdba74;
        border-radius: 20px;
    }
    .testimonials-carousel-wrapper::-webkit-scrollbar-thumb:hover {
        background: #f97316;
    }
    .testimonials-track {
        display: flex;
        gap: 1.75rem;
        padding: 0.5rem 0.25rem 1rem 0.25rem;
        width: max-content;
    }
    .testimonial-card {
        width: 380px;
        flex-shrink: 0;
        background: white;
        border-radius: 1.75rem;
        padding: 1.8rem;
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0,0,0,0.02);
        transition: all 0.3s ease;
        border: 1px solid rgba(249, 115, 22, 0.08);
        display: flex;
        flex-direction: column;
        backdrop-filter: blur(0px);
        cursor: default;
    }
    .testimonial-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 30px 45px -15px rgba(249, 115, 22, 0.2);
        border-color: rgba(249, 115, 22, 0.2);
    }
    .pagination-dot {
        width: 36px;
        height: 4px;
        border-radius: 20px;
        background: #e2e8f0;
        transition: all 0.2s ease;
        cursor: pointer;
    }
    .pagination-dot.active {
        background: #f97316;
        width: 48px;
        box-shadow: 0 0 6px #f97316aa;
    }
    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(25px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .testimonial-card {
        animation: fadeSlideUp 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
        opacity: 0;
        animation-delay: calc(0.05s * var(--order, 1));
    }
    .testimonial-card:nth-child(1) { --order: 1; }
    .testimonial-card:nth-child(2) { --order: 2; }
    .testimonial-card:nth-child(3) { --order: 3; }
    .testimonial-card:nth-child(4) { --order: 4; }
    .testimonial-card:nth-child(5) { --order: 5; }
    .testimonial-card:nth-child(6) { --order: 6; }
    .testimonial-card:nth-child(7) { --order: 7; }
</style>

<script>
    (function() {
        const carousel = document.getElementById('testimonialCarousel');
        const track = document.getElementById('testimonialTrack');
        const dotsContainer = document.getElementById('carouselDots');
        const cards = document.querySelectorAll('.testimonial-card');
        const totalCards = cards.length;

        // Create dots
        function createDots() {
            if (!dotsContainer) return;
            dotsContainer.innerHTML = '';
            for (let i = 0; i < totalCards; i++) {
                const dot = document.createElement('div');
                dot.classList.add('pagination-dot');
                dot.setAttribute('data-index', i);
                dot.addEventListener('click', () => {
                    const cardElement = cards[i];
                    if (cardElement && carousel) {
                        const scrollLeft = cardElement.offsetLeft - (carousel.clientWidth / 2) + (cardElement.clientWidth / 2);
                        carousel.scrollTo({ left: Math.max(0, scrollLeft), behavior: 'smooth' });
                    }
                });
                dotsContainer.appendChild(dot);
            }
            updateActiveDot();
        }

        function updateActiveDot() {
            if (!carousel || !dotsContainer) return;
            const scrollPos = carousel.scrollLeft;
            let activeIndex = 0;
            let minDiff = Infinity;
            for (let i = 0; i < cards.length; i++) {
                const card = cards[i];
                const cardCenter = card.offsetLeft + card.clientWidth / 2;
                const viewCenter = scrollPos + carousel.clientWidth / 2;
                const diff = Math.abs(cardCenter - viewCenter);
                if (diff < minDiff) {
                    minDiff = diff;
                    activeIndex = i;
                }
            }
            const dots = dotsContainer.querySelectorAll('.pagination-dot');
            dots.forEach((dot, idx) => {
                if (idx === activeIndex) dot.classList.add('active');
                else dot.classList.remove('active');
            });
        }

        // drag to scroll with hand cursor
        let isDragging = false;
        let startX = 0;
        let scrollLeftStart = 0;

        if (carousel) {
            carousel.addEventListener('mousedown', (e) => {
                isDragging = true;
                carousel.style.cursor = 'grabbing';
                startX = e.pageX - carousel.offsetLeft;
                scrollLeftStart = carousel.scrollLeft;
                carousel.style.userSelect = 'none';
            });
            window.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - carousel.offsetLeft;
                const walk = (x - startX) * 1.5;
                carousel.scrollLeft = scrollLeftStart - walk;
            });
            window.addEventListener('mouseup', () => {
                isDragging = false;
                carousel.style.cursor = 'grab';
                carousel.style.userSelect = 'auto';
                updateActiveDot();
            });
            carousel.addEventListener('scroll', () => {
                updateActiveDot();
            });
            carousel.style.cursor = 'grab';
        }

        createDots();
        updateActiveDot();

        // optional resize re-center dot detection
        window.addEventListener('resize', () => updateActiveDot());
    })();

     (function() {
        // Counter animation using Intersection Observer
        const counters = document.querySelectorAll('.counter');
        
        const startCounter = (counter) => {
            const target = parseFloat(counter.getAttribute('data-target'));
            const suffix = counter.getAttribute('data-suffix') || '';
            const isDecimal = target % 1 !== 0;
            let current = 0;
            const duration = 2000; // 2 seconds for smooth counting
            const stepTime = 16; // ~60fps
            const steps = duration / stepTime;
            const increment = target / steps;
            
            let step = 0;
            const timer = setInterval(() => {
                step++;
                if (isDecimal) {
                    current = Math.min(target, (step * increment));
                    counter.innerText = current.toFixed(1) + suffix;
                } else {
                    current = Math.min(target, Math.floor(step * increment));
                    counter.innerText = Math.floor(current) + suffix;
                }
                if (step >= steps) {
                    counter.innerText = (isDecimal ? target.toFixed(1) : Math.floor(target)) + suffix;
                    clearInterval(timer);
                }
            }, stepTime);
        };
        
        // Intersection Observer to trigger counters when visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    // Only start if not already started
                    if (!counter.getAttribute('data-animated')) {
                        counter.setAttribute('data-animated', 'true');
                        startCounter(counter);
                    }
                    // Optional: unobserve after animation starts to save resources
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.3 });
        
        counters.forEach(counter => {
            observer.observe(counter);
        });
    })();
</script>