<div class="flex items-center space-x-4">
    <div class="relative" id="profileDropdown">
        <button class="flex gap-1 items-center cursor-pointer focus:outline-none">
            <div class="h-8 w-8 rounded-full bg-btn flex items-center justify-center text-black font-medium uppercase">
                {{ Str::substr(Auth::user()->name, 0, 2) }}
            </div>
            <h1 class="text-sm text-white md:text-base">{{ Auth::user()->name ?? 'user' }}</h1>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 512 512">
                <path
                    d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
            </svg>
        </button>

        <div id="profileMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-10">
            @if (request()->is('admin*'))
                <a href="{{ route('profile-admin') }}"
                    class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 448 512">
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                    </svg> Profile
                </a>
            @endif
            <div class="border-t border-gray-100"></div>
            <form action="{{ route('logout') }}" method="post">
                @csrf

                <button type="submit" class="w-full cursor-pointer flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 512 512">
                        <path
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                    </svg>Logout
                </button>
            </form>
        </div>
    </div>
</div>
