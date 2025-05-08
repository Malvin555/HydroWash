<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HydroWash</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body data-page="landing">
    <!-- Navbar -->
    <nav class="bg-primary fixed top-0 left-0 right-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                            <span class="text-primary font-bold text-lg">HW</span>
                        </div>
                        <span class="ml-2 text-white font-bold text-xl">Hydro<span class="text-teal-200">Wash</span></span>
                    </div>
                </div>

                <div class="nav-desktop hidden md:flex items-center space-x-8">
                    <a href="#home" class=" border-b-2 border-white text-white  px-3 py-2 text-sm font-medium transition duration-150">Home</a>
                    <a href="#services" class=" text-white  px-3 py-2 text-sm font-medium transition duration-150">Services</a>
                    <a href="#how-it-works" class=" text-white  px-3 py-2 text-sm font-medium transition duration-150">How It Works</a>
                    <a href="#testimonials" class=" text-white  px-3 py-2 text-sm font-medium transition duration-150">Testimonials</a>
                    <a href="{{ route('login') }}" class="bg-white text-primary hover:bg-teal-50 ml-3 px-4 py-2 rounded-lg text-sm font-medium transition duration-150">Log in</a>
                </div>

                <div class="flex md:hidden items-center">
                    <button id="menuToggle" class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-primary border-t border-teal-400">
            <div class="nav-mobile px-2 pt-2 pb-3 space-y-1">
                <a href="#home" class=" text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#services" class=" text-white block px-3 py-2 rounded-md text-base font-medium">Services</a>
                <a href="#how-it-works" class=" text-white block px-3 py-2 rounded-md text-base font-medium">How It Works</a>
                <a href="#testimonials" class=" text-white block px-3 py-2 rounded-md text-base font-medium">Testimonials</a>
                <a href="{{ route('login') }}" class="bg-white text-primary hover:bg-teal-50 block px-3 py-2 rounded-md text-base font-medium mt-4">Log in</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-24 pb-16 md:pt-32 md:pb-24 bg-primary relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-pattern"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-12 lg:mb-0" data-aos="fade-right">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white leading-tight mb-6">
                        Laundry Service <br>
                        <span class="text-white">Reimagined</span>
                    </h1>
                    <p class="text-white text-lg md:text-xl mb-8 max-w-lg">
                        Experience premium laundry service with free pickup and delivery.
                        We use eco-friendly products to keep your clothes fresh and the planet clean.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('register') }}" class="bg-white text-primary hover:bg-teal-50 px-8 py-3 rounded-lg font-medium text-center transition duration-150 shadow-lg">
                            Get Started
                        </a>
                        <a href="#services" class="border border-white text-white hover:bg-white hover:text-primary px-8 py-3 rounded-lg font-medium text-center transition duration-150">
                            Our Services
                        </a>
                    </div>
                </div>

                <div class="lg:w-1/2 flex justify-center" data-aos="fade-left">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-teal-200 rounded-full blur-lg opacity-70"></div>
                        <img src="{{ asset('img/main-img.png') }}" alt="Laundry Service" class="relative rounded-2xl shadow-2xl max-w-md lg:max-w-lg">
                    </div>
                </div>
            </div>

            <div class="mt-32 grid grid-cols-2 md:grid-cols-4 gap-8 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-primary shadow-2xl outline outline-white/50 rounded-lg p-6">
                    <h3 class="text-3xl font-bold text-white mb-1">90%</h3>
                    <p class="text-teal-100 text-sm">Time saved on laundry chores</p>
                </div>
                <div class="bg-primary shadow-2xl outline outline-white/50 rounded-lg p-6">
                    <h3 class="text-3xl font-bold text-white mb-1">100%</h3>
                    <p class="text-teal-100 text-sm">Eco-friendly products</p>
                </div>
                <div class="bg-primary shadow-2xl outline outline-white/50 backdrop-blur-sm rounded-lg p-6">
                    <h3 class="text-3xl font-bold text-white mb-1">24/7</h3>
                    <p class="text-teal-100 text-sm">Customer support</p>
                </div>
                <div class="bg-primary shadow-2xl outline outline-white/50 rounded-lg p-6">
                    <h3 class="text-3xl font-bold text-white mb-1">5000+</h3>
                    <p class="text-teal-100 text-sm">Happy customers</p>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Premium Services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    We offer a range of professional laundry and dry cleaning services tailored to meet your needs.
                    All services include free pickup and delivery.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <div class="h-48 bg-primary flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 15l-5-5L5 21M5 10l5 5 9-9" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Wash & Fold</h3>
                        <p class="text-gray-600 mb-4">
                            Our most popular service. We'll wash, dry, and fold your clothes with care,
                            using premium detergents and fabric softeners.
                        </p>

                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <div class="h-48 bg-primary flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Dry Cleaning</h3>
                        <p class="text-gray-600 mb-4">
                            Professional dry cleaning for your delicate items, suits, dresses, and other
                            garments that require special care.
                        </p>

                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <div class="h-48 bg-primary flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Express Service</h3>
                        <p class="text-gray-600 mb-4">
                            Need it fast? Our express service guarantees same-day or next-day delivery
                            for those urgent situations.
                        </p>

                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Our simple 4-step process makes laundry day a breeze. From scheduling to delivery,
                    we handle everything so you don't have to.
                </p>
            </div>

            <div class="relative">
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-primary hidden md:block"></div>

                <div class="space-y-12 relative">
                    <div class="flex flex-col md:flex-row items-center" data-aos="fade-right">
                        <div class="md:w-1/2 mb-8 md:mb-0 md:pr-12 text-center md:text-right">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Schedule Pickup</h3>
                            <p class="text-gray-600">
                                Book a pickup time that works for you through our website or mobile app.
                                We offer flexible scheduling to fit your busy lifestyle.
                            </p>
                        </div>
                        <div class="md:w-12 md:flex md:justify-center md:items-center relative">
                            <div class="hidden md:block absolute w-8 h-8 rounded-full bg-primary text-white text-xl text-center font-bold flex items-center justify-center">
                                1
                            </div>
                        </div>
                        <div class="md:w-1/2 md:pl-12">
                            <div class="bg-white rounded-xl shadow-lg">
                                <div class="w-12 h-12 rounded-full bg-primary text-white text-xl font-bold flex items-center justify-center mb-4 mx-auto md:hidden">
                                    1
                                </div>
                                <img src="{{ asset('img/schedule.jpg') }}" alt="Schedule Pickup" class="w-full h-48 object-cover rounded-lg">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center" data-aos="fade-left">
                        <div class="md:w-1/2 mb-8 md:mb-0 md:pr-12 md:order-2 text-center md:text-left">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">We Collect Your Laundry</h3>
                            <p class="text-gray-600">
                                Our friendly driver will arrive at your doorstep during your selected time slot
                                to collect your laundry in our special HydroWash bags.
                            </p>
                        </div>
                        <div class="md:w-12 md:flex md:justify-center md:items-center relative md:order-1">
                            <div class="hidden md:block absolute w-8 h-8 rounded-full bg-primary text-white text-xl text-center font-bold flex items-center justify-center">
                                2
                            </div>
                        </div>
                        <div class="md:w-1/2 md:pr-12 md:order-0">
                            <div class="bg-white rounded-xl shadow-lg">
                                <div class="w-12 h-12 rounded-full bg-primary text-white text-xl font-bold flex items-center justify-center mb-4 mx-auto md:hidden">
                                    2
                                </div>
                                <img src="{{ asset('img/pickup.jpg') }}" alt="We Collect" class="w-full h-48 object-cover rounded-lg">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center" data-aos="fade-right">
                        <div class="md:w-1/2 mb-8 md:mb-0 md:pr-12 text-center md:text-right">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">We Clean & Care</h3>
                            <p class="text-gray-600">
                                Your clothes are sorted, cleaned, and folded with care by our professional team
                                using eco-friendly products and state-of-the-art equipment.
                            </p>
                        </div>
                        <div class="md:w-12 md:flex md:justify-center md:items-center relative">
                            <div class="hidden md:block absolute w-8 h-8 rounded-full bg-primary text-white text-xl text-center font-bold flex items-center justify-center">
                                3
                            </div>
                        </div>
                        <div class="md:w-1/2 md:pl-12">
                            <div class="bg-white rounded-xl shadow-lg">
                                <div class="w-12 h-12 rounded-full bg-primary text-white text-xl font-bold flex items-center justify-center mb-4 mx-auto md:hidden">
                                    3
                                </div>
                                <img src="{{ asset('img/cleaning.jpg') }}" alt="We Clean" class="w-full h-48 object-cover rounded-lg">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose HydroWash?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    We're not just another laundry service. Here's what sets us apart and why thousands of customers trust us.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Time-Saving</h3>
                    <p class="text-gray-600">
                        Save up to 5 hours every week by letting us handle your laundry needs.
                        Use that time for things that matter more to you.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Quality Guaranteed</h3>
                    <p class="text-gray-600">
                        We treat your clothes with the utmost care. If you're not 100% satisfied,
                        we'll re-clean your items at no additional cost.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Free Pickup & Delivery</h3>
                    <p class="text-gray-600">
                        We come to you! Our convenient pickup and delivery service is always free
                        within our service areas.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Eco-Friendly</h3>
                    <p class="text-gray-600">
                        We use biodegradable, hypoallergenic detergents and energy-efficient machines
                        to minimize our environmental impact.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Affordable Pricing</h3>
                    <p class="text-gray-600">
                        Competitive rates with no hidden fees. We offer subscription plans for regular customers
                        with additional savings.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="600">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Secure Handling</h3>
                    <p class="text-gray-600">
                        Your clothes are individually tagged and tracked throughout the cleaning process
                        to ensure nothing gets lost or mixed up.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-primary relative">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-pattern"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">What Our Customers Say</h2>
                <p class="text-teal-100 max-w-2xl mx-auto">
                    Don't just take our word for it. Here's what our satisfied customers have to say about HydroWash.
                </p>
            </div>

            <div class="relative" data-aos="fade-up">
                <div class="absolute inset-0 flex items-center justify-between z-10 pointer-events-none">
                    <button id="prevTestimonial" class="bg-white text-primary p-3 rounded-full shadow-lg pointer-events-auto focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="nextTestimonial" class="bg-white text-primary p-3 rounded-full shadow-lg pointer-events-auto focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <div class="overflow-hidden">
                    <div id="testimonialSlider" class="flex transition-transform duration-500 ease-in-out">
                        <!-- Testimonial 1 -->
                        @forelse ($feedbacks as $feedback )
                        <div class="w-full flex-shrink-0 px-4 md:px-12">
                            <div class="bg-white rounded-xl shadow-lg p-8">
                                <div class="flex items-center mb-6">
                                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl mr-4">
                                        S
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900">{{ ucwords($feedback->user->name) }}</h4>
                                        <p class="text-gray-500 text-sm">{{ $feedback->user->email }}</p>
                                    </div>
                                    <div class="ml-auto flex">
                                        @for ($i = 0; $i < $feedback->star_rating; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                        @for ($i = $feedback->star_rating; $i < 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-4">
                                    {{ $feedback->comment }}
                                </p>
                            </div>
                        </div>

                        @empty
                        <div class="w-full flex-shrink-0 px-4 md:px-12">
                            <div class="bg-primary  p-8 flex flex-col items-center justify-center text-center">
                                <h3 class="text-lg font-semibold text-white mb-2">No Feedback Found</h3>
                                <p class="text-white text-sm">There are currently no testimonials available. Once users provide feedback, it will appear here.</p>
                            </div>
                        </div>
                        @endforelse

                    </div>
                </div>

                <div class="flex justify-center mt-8">
                    <div class="flex space-x-2">
                        <button class="w-3 h-3 rounded-full bg-white opacity-50 testimonial-dot active" data-index="0"></button>
                        <button class="w-3 h-3 rounded-full bg-white opacity-50 testimonial-dot" data-index="1"></button>
                        <button class="w-3 h-3 rounded-full bg-white opacity-50 testimonial-dot" data-index="2"></button>
                        <button class="w-3 h-3 rounded-full bg-white opacity-50 testimonial-dot" data-index="3"></button>
                        <button class="w-3 h-3 rounded-full bg-white opacity-50 testimonial-dot" data-index="4"></button>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div>
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-primary px-2 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">HW</span>
                        </div>
                        <span class="ml-2 text-primary font-bold text-xl">Hydro<span class="text-teal-400">Wash</span></span>
                    </div>
                    <p class="text-gray-400 mb-6">
                        Premium laundry and dry cleaning services with free pickup and delivery. Making laundry day a breeze since 2020.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-slate-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-slate-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-slate-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-6">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="#home" class="text-gray-400 hover:text-slate-600 transition">Home</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-slate-600 transition">Services</a></li>
                        <li><a href="#how-it-works" class="text-gray-400 hover:text-slate-600 transition">How It Works</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-slate-600 transition">Testimonials</a></li>
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-slate-600 transition">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-slate-600 transition">Register</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-6">Services</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-slate-600 transition">Wash & Fold</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-slate-600 transition">Dry Cleaning</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-slate-600 transition">Express Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-slate-600 transition">Subscription Plans</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-slate-600 transition">Business Services</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-slate-600 transition">Special Items</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-6">Contact Us</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-400 mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-400">123 Laundry Street<br>Clean City, 12345</span>
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-gray-400">(555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-400">info@hydrowash.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 mt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">
                        &copy; {{ date('Y') }} HydroWash. All rights reserved.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-slate-600 text-sm transition">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-slate-600 text-sm transition">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-slate-600 text-sm transition">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Clear localStorage
        if (localStorage.getItem('api_token')) {
            localStorage.removeItem('api_token');
        }

        if (localStorage.getItem('ref_id')) {
            localStorage.removeItem('ref_id');
        }
    </script>
</body>
</html>
