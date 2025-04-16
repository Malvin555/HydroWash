<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HydroWash</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-page="landing">

    {{-- navbar --}}

    <nav class="bg-primary fixed top-0 left-0 right-0 z-[100]">
        <div class="max-w-screen-xl mx-auto px-[10%] lg:px-[5%] flex justify-between items-center py-3">
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-[40px] h-[40px]">

                <ul id="menu"
                    class="absolute top-[100%] left-0 h-screen w-[70%] bg-primary text-white font-bold transform -translate-x-full transition-transform duration-300 md:static md:translate-x-0 md:flex md:gap-6 md:bg-transparent md:h-auto md:w-auto md:items-center">
                    <li class="p-4 border-b md:p-0 md:border-none"><a href="#">HOME</a></li>
                    <li class="p-4 border-b md:p-0 md:border-none"><a href="#services">SERVICE</a></li>
                    <li class="p-4 md:p-0 md:border-none"><a href="#review">REVIEW</a></li>
                    <a href="{{ route('login') }}"
                        class="bg-btn w-20 text-center ml-4 p-2 rounded-lg text-primary font-bold block md:hidden">Log
                        in</a>
                </ul>
            </div>



            <button id="menuToggle" class="md:hidden ml-4 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-6 h-6" viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
                </svg>
            </button>

            <a href="login" class="bg-btn p-2 rounded-lg text-primary font-bold hidden md:inline-block">Log in</a>
        </div>
    </nav>



    {{-- home section --}}
    <section class="h-screen bg-cover bg-center pt-24"
        style="background-image: url('{{ asset('img/main-img.png') }}');">
        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>

        <div class="max-w-screen-xl h-full mx-auto px-[10%] lg:px-[5%] flex items-center z-50 relative">
            <div class="text-center md:text-left space-y-6 md:max-w-[55%] lg:max-w-[65%]">
                <h1 class="text-white text-3xl md:text-6xl lg:text-8xl font-bold leading-tight">
                    The best web for your laundry
                </h1>
                <p class="text-white text-lg md:text-2xl lg:text-4xl">
                    Welcome to HydroWash Service, where we
                    transform your laundry day into a breeze!
                </p>
                <a href="{{ route('register') }}"
                    class="inline-block bg-btn text-center text-primary font-bold py-2 px-6  rounded-full shadow-md transition duration-300 hover:bg-gray-200">
                    Start Cleaning
                </a>
            </div>
        </div>
    </section>



    {{-- services section --}}
    <section class="h-full  relative pb-13" id="services">
        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-primary to-transparent z-10"></div>

        <div class="max-w-screen-xl h-full mx-auto px-[10%] lg:px-[5%]">
            <div class="w-full mb-15 md:mb-35 flex flex-col gap-5 md:flex-row md:justify-between md:items-center pt-24">
                <h1
                    class="font-bold text-xl md:text-2xl lg:text-4xl md:w-[50%] drop-shadow-[0_5px_1px_rgba(0,0,0,0.2)]">
                    your trusted partner in achieving pristine.</h1>
                <p class="text-sm lg:text-base md:w-[50%]">Established with the mission to simplify your life and
                    elevate your laundry experience, we bring a blend of modern technology and eco-friendly practices.
                </p>
            </div>

            <div class="flex flex-wrap mb-25 lg:mb-35 md:justify-center">
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3 ">
                    <div class="bg-primary p-5 rounded-lg drop-shadow-[0_20px_4px_rgba(0,0,0,0.2)] mb-10">
                        <div class="bg-btn w-12 h-12 rounded-sm">
                            <i class=""></i>
                        </div>
                        <h1 class="font-bold text-white mb-6">Convenient Pickup & Delivery</h1>
                        <p class="text-white">Enjoy the convenience of our pickup and delivery service, designed to fit
                            seamlessly into your schedule. Say goodbye to the hassle of laundry day and let us come to
                            you.</p>
                    </div>
                </div>

                <div class="w-full px-4 lg:w-1/2 xl:w-1/3 ">
                    <div class="bg-primary p-5 rounded-lg drop-shadow-[0_20px_4px_rgba(0,0,0,0.2)] mb-10">
                        <div class="bg-btn w-12 h-12 rounded-sm">
                            <i class=""></i>
                        </div>
                        <h1 class="font-bold text-white mb-6">Eco-Friendly Products</h1>
                        <p class="text-white">We prioritize your health and the environment by using only eco-friendly
                            detergents and cleaning agents, ensuring your clothes are safe and fresh without harmful
                            chemicals.</p>
                    </div>
                </div>

                <div class="w-full px-4 lg:w-1/2 xl:w-1/3 ">
                    <div class="bg-primary p-5 rounded-lg drop-shadow-[0_20px_4px_rgba(0,0,0,0.2)] mb-10">
                        <div class="bg-btn w-12 h-12 rounded-sm">
                            <i class=""></i>
                        </div>
                        <h1 class="font-bold text-white mb-6">Profesional Dry Cleaning</h1>
                        <p class="text-white">Trust our expertise in dry cleaning to maintain the integrity and beauty
                            of your delicate and professional attire. We handle each item with precision to ensure a
                            flawless finish</p>
                    </div>
                </div>
            </div>



            <div class="flex flex-wrap md:justify-center lg:justify-start mb-15">
                <div class="w-full px-4 md:w-1/2 lg:w-1/2 xl:w-1/4">
                    <div class="border-b-2 pb-4 lg:border-b-0 mb-10">
                        <h1 class="text-6xl mb-3 font-bold">90%</h1>
                        <p class="text-base">Of our customers enjoy the time-saving convenience of our reliable pickup
                            and
                            delivery service.
                        </p>
                    </div>
                </div>

                <div class="w-full px-4 md:w-1/2 lg:w-1/2 xl:w-1/4">
                    <div class="border-b-2 pb-4 lg:border-b-0 lg:border-l-3 lg:pl-4 mb-10">
                        <h1 class="text-6xl mb-3 font-bold">99%</h1>
                        <p class="text-base">Customer satisfaction rate with our expert dry cleaning service, perfect
                            for
                            delicate and professional garments.
                        </p>
                    </div>
                </div>

                <div class="w-full px-4 md:w-1/2 lg:w-1/2 xl:w-1/4">
                    <div class="border-b-2 pb-4 lg:border-b-0 lg:border-l-3 lg:pl-4 mb-10">
                        <h1 class="text-6xl mb-3 font-bold">100%</h1>
                        <p class="text-base">Of our detergents and cleaning agents are eco-friendly, ensuring safe and
                            gentle care for your clothes and the environment.
                        </p>
                    </div>
                </div>

                <div class="w-full px-4 md:w-1/2 lg:w-1/2 xl:w-1/4">
                    <div class="border-b-2 pb-4 lg:border-b-0 lg:border-l-3 lg:pl-4 mb-10">
                        <h1 class="text-6xl mb-3 font-bold">20%</h1>
                        <p class="text-base">Lower prices on average compared to other premium laundry services,
                            providing
                            exceptional value without compromising quality.
                        </p>
                    </div>
                </div>
            </div>


            <div class="flex flex-wrap gap-2 lg:gap-0 justify-center lg:justify-between">
                <div class="flex flex-col justify-center lg:w-[40%]">
                    <div class="mb-6 md:mb-8">
                        <h1 class="font-bold text-3xl md:text-4xl mb-1">Why Choose Us?</h1>
                        <p>Experience the ultimate in convenience and quality with Bubbles Laundry Services Wash & Fold.
                        </p>
                    </div>

                    <div class="w-full  bg-primary rounded-xl py-2.5 px-13 relative mb-10">
                        <div class="w-10 h-10 rounded-full bg-btn absolute top-1.5 left-1"></div>
                        <h1 class="text-white font-bold">Time-Saving</h1>

                        <p class="text-white">Free up your valuable time for more important things while we handle your
                            laundry.</p>
                    </div>

                    <div class="w-full  bg-primary rounded-xl py-2.5 px-13 relative mb-10">
                        <div class="w-10 h-10 rounded-full bg-btn absolute top-1.5 left-1"></div>
                        <h1 class="text-white font-bold">High-Quality Care</h1>

                        <p class="text-white">Our professional team treats your clothes with the utmost care, ensuring
                            they look and feel their best.</p>
                    </div>

                    <div class="w-full  bg-primary rounded-xl py-2.5 px-13 relative mb-12">
                        <div class="w-10 h-10 rounded-full bg-btn absolute top-1.5 left-1"></div>
                        <h1 class="text-white font-bold">Eco-Friendly Product</h1>

                        <p class="text-white">We use safe, environmentally friendly detergents that are tough on stains
                            but gentle on your clothes and skin.</p>
                    </div>

                    <div class="w-full flex justify-center mb-12">
                        <a href="{{ route('register') }}"
                            class="inline-block w-3xs bg-btn text-center border-1 text-primary font-bold py-2 px-6  rounded-full shadow-md transition duration-300 hover:bg-gray-200">
                            Start Cleaning
                        </a>
                    </div>
                </div>

                <div class="lg:w-[60%] flex justify-center">
                    <img src="{{ asset('img/service-img.png') }}" alt="service" class="">
                </div>
            </div>
        </div>


        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
    </section>



    {{-- review section --}}
    <section class="h-screen pt-25 bg-primary relative" id="review">
        <div class="max-w-screen-xl h-full mx-auto px-[10%] lg:px-[5%]">
            <div class="w-full flex justify-end mb-5 md:mb-20">
                <div class="w-35 md:w-75 bg-white py-3 rounded">
                    <h1 class="text-center text-primary text-sm md:text-2xl">What our clients say</h1>
                </div>
            </div>

            <div class="w-full relative">
                <div class="absolute left-[-3rem] top-1/2 z-10">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-10 h-10 md:w-15 md:h-15 lg:w-20 lg:h-20 text-white cursor-pointer"
                        viewBox="0 0 320 512" onclick="prevReview()">
                        <path fill="currentColor"
                            d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                    </svg>
                </div>

                <div class="overflow-hidden w-full">
                    <div id="reviewWrapper" class="flex mx-5 transition-transform duration-500 ease-in-out w-full">
                        @if ($feedbacks)
                            @foreach ($feedbacks as $feedback)
                                <div class="w-full flex-shrink-0 text-white px-4">
                                    <div class="flex items-center gap-2 mb-4">
                                        <img src="{{ asset('img/profile-img.png') }}" alt="profile"
                                            class="w-10 h-10 md:w-15 md:h-15">
                                        <div>
                                            <h1 class="text-lg md:text-xl">{{ $feedback->user->name }}</h1>
                                            <p class="text-[.7rem] md:text-sm">
                                                {{ \Carbon\Carbon::parse($feedback->created_at)->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                    <p class="text-[.9rem] md:text-lg lg:text-2xl">
                                        {{ $feedback->comment }}
                                    </p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="absolute right-[-3rem] top-1/2 z-10">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-10 h-10 md:w-15 md:h-15 lg:w-20 lg:h-20 text-white cursor-pointer"
                        viewBox="0 0 320 512" onclick="nextReview()">
                        <path fill="currentColor"
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                    </svg>
                </div>
            </div>
        </div>
    </section>




    {{-- services2 section --}}
    <section class="h-screen bg-cover bg-center bg-fixed relative flex items-center justify-center text-center px-4"
        style="background-image: url('{{ asset('img/second-img.png') }}');">

        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-primary to-transparent z-0"></div>


        <div class="relative z-10 max-w-3xl space-y-6">
            <h1 class="text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                Ready to Experience <br class="hidden sm:block" /> the Fresh & Clean Difference?
            </h1>
            <p class="text-white text-base sm:text-lg md:text-xl lg:text-2xl px-2">
                Take the hassle out of laundry day and enjoy pristine, professionally cleaned clothes with Bubbles
                Laundry Services.
            </p>
            <a href="{{ route('register') }}"
                class="inline-block bg-btn text-primary font-bold py-3 px-8 rounded-full shadow-md transition duration-300 hover:bg-gray-200">
                Start Cleaning
            </a>
        </div>


        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-0"></div>
    </section>



    {{-- footer --}}
    <x-landing-footer></x-landing-footer>


</body>

<script></script>



</html>
