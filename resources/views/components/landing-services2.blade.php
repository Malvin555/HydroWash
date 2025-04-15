<section class="h-screen bg-cover bg-center bg-fixed relative flex items-center justify-center text-center px-4"
style="background-image: url('{{ asset('img/second-img.png') }}');">

<!-- Gradient atas -->
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
