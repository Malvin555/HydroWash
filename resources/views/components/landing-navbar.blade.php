
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