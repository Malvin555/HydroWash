<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HydroWash</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    @vite('resources/css/app.css')
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
    <section class="h-screen bg-cover bg-center pt-24" style="background-image: url('{{ asset('img/main-img.png') }}');">
        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>

        <div class="max-w-screen-xl h-full mx-auto px-[10%] lg:px-[5%] flex items-center z-50 relative">
            <div class="text-center md:text-left space-y-6 md:max-w-[55%] lg:max-w-[65%]"
                data-aos="fade-right" data-aos-duration="800" data-aos-once="false">
                <h1 class="text-white text-3xl md:text-6xl lg:text-8xl font-bold leading-tight"
                    data-aos="fade-down" data-aos-delay="100" data-aos-duration="1000">
                    The best web for your laundry
                </h1>
                <p class="text-white text-lg md:text-2xl lg:text-4xl"
                    data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                    Welcome to HydroWash Service, where we
                    transform your laundry day into a breeze!
                </p>
                <a href="{{ route('register') }}"
                    class="inline-block bg-btn text-center text-primary font-bold py-2 px-6 rounded-full shadow-md transition duration-300 hover:bg-gray-200"
                    data-aos="" data-aos-delay="500" data-aos-duration="800">
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
                <h1 data-aos="fade-up"
                    class="font-bold text-xl md:text-2xl lg:text-4xl md:w-[50%] drop-shadow-[0_5px_1px_rgba(0,0,0,0.2)]">
                    your trusted partner in achieving pristine.</h1>
                <p class="text-sm lg:text-base md:w-[50%]">Established with the mission to simplify your life and
                    elevate your laundry experience, we bring a blend of modern technology and eco-friendly practices.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mb-25 lg:mb-35 md:justify-center">
                <div class="w-full px-4">
                    <div class="bg-primary p-5 rounded-lg drop-shadow-[0_20px_4px_rgba(0,0,0,0.2)] mb-10">
                        <div class="bg-btn w-12 h-12 rounded-sm flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-6 h-6 fill-primary">
                                <path
                                    d="M112 0C85.5 0 64 21.5 64 48l0 48L16 96c-8.8 0-16 7.2-16 16s7.2 16 16 16l48 0 208 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L64 160l-16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l16 0 176 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L64 224l-48 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l48 0 144 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L64 288l0 128c0 53 43 96 96 96s96-43 96-96l128 0c0 53 43 96 96 96s96-43 96-96l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64 0-32 0-18.7c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7L416 96l0-48c0-26.5-21.5-48-48-48L112 0zM544 237.3l0 18.7-128 0 0-96 50.7 0L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z" />
                                </svg>
                        </div>
                        <h1 class="font-bold text-white mb-6">Convenient Pickup & Delivery</h1>
                        <p class="text-white">Enjoy the convenience of our pickup and delivery service, designed to fit
                            seamlessly into your schedule. Say goodbye to the hassle of laundry day and let us come to
                            you.</p>
                    </div>
                </div>

                <div class="w-full px-4">
                    <div class="bg-primary p-5 rounded-lg drop-shadow-[0_20px_4px_rgba(0,0,0,0.2)] mb-10">
                        <div class="bg-btn w-12 h-12 rounded-sm flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 fill-primary">
                                <path
                                    d="M272 96c-78.6 0-145.1 51.5-167.7 122.5c33.6-17 71.5-26.5 111.7-26.5l88 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-16 0-72 0s0 0 0 0c-16.6 0-32.7 1.9-48.3 5.4c-25.9 5.9-49.9 16.4-71.4 30.7c0 0 0 0 0 0C38.3 298.8 0 364.9 0 440l0 16c0 13.3 10.7 24 24 24s24-10.7 24-24l0-16c0-48.7 20.7-92.5 53.8-123.2C121.6 392.3 190.3 448 272 448l1 0c132.1-.7 239-130.9 239-291.4c0-42.6-7.5-83.1-21.1-119.6c-2.6-6.9-12.7-6.6-16.2-.1C455.9 72.1 418.7 96 376 96L272 96z" />
                                </svg>
                        </div>
                        <h1 class="font-bold text-white mb-6">Eco-Friendly Products</h1>
                        <p class="text-white">We prioritize your health and the environment by using only eco-friendly
                            detergents and cleaning agents, ensuring your clothes are safe and fresh without harmful
                            chemicals.</p>
                    </div>
                </div>

                <div class="w-full px-4">
                    <div class="bg-primary p-5 rounded-lg drop-shadow-[0_20px_4px_rgba(0,0,0,0.2)] mb-10">
                        <div class="bg-btn w-12 h-12 rounded-sm flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-6 h-6 fill-primary">
                                <path
                                    d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0l12.6 0c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7 480 448c0 35.3-28.7 64-64 64l-192 0c-35.3 0-64-28.7-64-64l0-250.3-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0l12.6 0z" />
                                </svg>
                        </div>

                        <h1 class="font-bold text-white mb-6">Profesional Dry Cleaning</h1>
                        <p class="text-white">Trust our expertise in dry cleaning to maintain the integrity and beauty
                            of your delicate and professional attire. We handle each item with precision to ensure a
                            flawless finish</p>
                    </div>
                </div>
            </div>



            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mb-15">
                <div class="w-full px-4">
                    <div class="border-b-2 pb-4 lg:border-b-0 mb-10">
                        <h1 class="text-6xl mb-3 font-bold">90%</h1>
                        <p class="text-base">Of our customers enjoy the time-saving convenience of our reliable pickup
                            and
                            delivery service.
                        </p>
                    </div>
                </div>

                <div class="w-full px-4">
                    <div class="border-b-2 pb-4 lg:border-b-0 lg:border-l-3 lg:pl-4 mb-10">
                        <h1 class="text-6xl mb-3 font-bold">99%</h1>
                        <p class="text-base">Customer satisfaction rate with our expert dry cleaning service, perfect
                            for
                            delicate and professional garments.
                        </p>
                    </div>
                </div>

                <div class="w-full px-4">
                    <div class="border-b-2 pb-4 md:border-b-0 lg:border-l-3 lg:pl-4 mb-10">
                        <h1 class="text-6xl mb-3 font-bold">100%</h1>
                        <p class="text-base">Of our detergents and cleaning agents are eco-friendly, ensuring safe and
                            gentle care for your clothes and the environment.
                        </p>
                    </div>
                </div>

                <div class="w-full px-4">
                    <div class="pb-4 lg:border-l-3 lg:pl-4 mb-10">
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

                    <div class="w-full bg-primary rounded-xl py-2.5 px-13 relative mb-10">
                        <div
                            class="w-10 h-10 rounded-full bg-btn absolute top-1.5 left-1 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-primary">
                                <path
                                    d="M256 8C119 8 8 119 8 256s111 248 248 248s248-111 248-248S393 8 256 8zm0 48c110.5 0 200 89.5 200 200s-89.5 200-200 200S56 366.5 56 256S145.5 56 256 56zm-8 72v120c0 4.4 1.8 8.6 5 11.7l72 72c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L288 230.6V128c0-8.8-7.2-16-16-16s-16 7.2-16 16z" />
                            </svg>
                        </div>
                        <h1 class="text-white font-bold">Time-Saving</h1>

                        <p class="text-white">Free up your valuable time for more important things while we handle your
                            laundry.</p>
                    </div>

                    <div class="w-full bg-primary rounded-xl py-2.5 px-13 relative mb-10">
                        <div
                            class="w-10 h-10 rounded-full bg-btn absolute top-1.5 left-1 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5 h-5 fill-primary">
                                <path
                                    d="M416 64a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm96 128a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM160 464a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM32 160l.1 72.6c.1 52.2 24 101 64 133.1c-.1-1.9-.1-3.8-.1-5.7l0-8c0-71.8 37-138.6 97.9-176.7l60.2-37.6c8.6-5.4 17.9-8.4 27.3-9.4l45.9-79.5c6.6-11.5 2.7-26.2-8.8-32.8s-26.2-2.7-32.8 8.8l-78 135.1c-3.3 5.7-10.7 7.7-16.4 4.4s-7.7-10.7-4.4-16.4l62-107.4c6.6-11.5 2.7-26.2-8.8-32.8S214 5 207.4 16.5l-68 117.8s0 0 0 0s0 0 0 0l-43.3 75L96 160c0-17.7-14.4-32-32-32s-32 14.4-32 32zM332.1 88.5L307.5 131c13.9 4.5 26.4 13.7 34.7 27c.9 1.5 1.8 2.9 2.5 4.4l28.9-50c6.6-11.5 2.7-26.2-8.8-32.8s-26.2-2.7-32.8 8.8zm46.4 63.7l-26.8 46.4c-.6 6-2.1 11.8-4.3 17.4l4.7 0 13.3 0s0 0 0 0l31.8 0 23-39.8c6.6-11.5 2.7-26.2-8.8-32.8s-26.2-2.7-32.8 8.8zM315.1 175c-9.4-15-29.1-19.5-44.1-10.2l-60.2 37.6C159.3 234.7 128 291.2 128 352l0 8c0 8.9 .8 17.6 2.2 26.1c35.4 8.2 61.8 40 61.8 77.9c0 6.3-.7 12.5-2.1 18.4C215.1 501 246.3 512 280 512l176 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-92 0c-6.6 0-12-5.4-12-12s5.4-12 12-12l124 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-124 0c-6.6 0-12-5.4-12-12s5.4-12 12-12l156 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-156 0c-6.6 0-12-5.4-12-12s5.4-12 12-12l124 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-136 0s0 0 0 0s0 0 0 0l-93.2 0L305 219.1c15-9.4 19.5-29.1 10.2-44.1z" />
                                </svg>
                        </div>

                        <h1 class="text-white font-bold">High-Quality Care</h1>

                        <p class="text-white">Our professional team treats your clothes with the utmost care, ensuring
                            they look and feel their best.</p>
                    </div>

                    <div class="w-full bg-primary rounded-xl py-2.5 px-13 relative mb-12">
                        <div
                            class="w-10 h-10 rounded-full bg-btn absolute top-1.5 left-1 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-primary">
                                <path
                                    d="M174.7 45.1C192.2 17 223 0 256 0s63.8 17 81.3 45.1l38.6 61.7 27-15.6c8.4-4.9 18.9-4.2 26.6 1.7s11.1 15.9 8.6 25.3l-23.4 87.4c-3.4 12.8-16.6 20.4-29.4 17l-87.4-23.4c-9.4-2.5-16.3-10.4-17.6-20s3.4-19.1 11.8-23.9l28.4-16.4L283 79c-5.8-9.3-16-15-27-15s-21.2 5.7-27 15l-17.5 28c-9.2 14.8-28.6 19.5-43.6 10.5c-15.3-9.2-20.2-29.2-10.7-44.4l17.5-28zM429.5 251.9c15-9 34.4-4.3 43.6 10.5l24.4 39.1c9.4 15.1 14.4 32.4 14.6 50.2c.3 53.1-42.7 96.4-95.8 96.4L320 448l0 32c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-64-64c-9.4-9.4-9.4-24.6 0-33.9l64-64c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2l0 32 96.2 0c17.6 0 31.9-14.4 31.8-32c0-5.9-1.7-11.7-4.8-16.7l-24.4-39.1c-9.5-15.2-4.7-35.2 10.7-44.4zm-364.6-31L36 204.2c-8.4-4.9-13.1-14.3-11.8-23.9s8.2-17.5 17.6-20l87.4-23.4c12.8-3.4 26 4.2 29.4 17L182 241.2c2.5 9.4-.9 19.3-8.6 25.3s-18.2 6.6-26.6 1.7l-26.5-15.3L68.8 335.3c-3.1 5-4.8 10.8-4.8 16.7c-.1 17.6 14.2 32 31.8 32l32.2 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-32.2 0C42.7 448-.3 404.8 0 351.6c.1-17.8 5.1-35.1 14.6-50.2l50.3-80.5z" />
                                </svg>
                        </div>

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


        <div
            class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10 pointer-events-none">
        </div>
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


    @vite('resources/js/app.js')
</body>

</html>
