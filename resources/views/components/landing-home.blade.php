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