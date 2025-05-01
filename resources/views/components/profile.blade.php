<div class="flex items-center">
    <div class="relative" id="profileDropdown">
        <button class="flex items-center gap-3 px-3 py-2 rounded-full hover:bg-white/10 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-white/30 focus-visible:ring-2" aria-expanded="false" aria-haspopup="true">
            <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center text-primary font-semibold uppercase shadow-md">
                {{ Str::substr(Auth::user()?->name, 0, 2) }}
            </div>
            <div class="flex items-center gap-2">
                <h1 class="text-sm text-white md:text-base font-medium">{{ Auth::user()?->name ?? 'User' }}</h1>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white transition-transform duration-200" id="dropdownArrow" fill="currentColor" viewBox="0 0 512 512">
                    <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                </svg>
            </div>
        </button>

        <div id="profileMenu" class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl py-2 hidden z-50 transform origin-top-right transition-all duration-200 border border-gray-100">
            @if (request()->is('admin*'))
            <a href="{{ route('profile-admin') }}" class="flex items-center gap-3 px-5 py-3 text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                <div class="bg-primary/10 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 448 512">
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                    </svg>
                </div>
                <span class="font-medium">Profile</span>
            </a>

            <a href="{{ route('admin') }}" class="flex items-center gap-3 px-5 py-3 text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                <div class="bg-primary/10 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 576 512">
                        <path d="M304 240V16.6c0-9 7-16.6 16-16.6C443.7 0 544 100.3 544 224c0 9-7.6 16-16.6 16H304zM32 272C32 150.7 122.1 50.3 239 34.3c9.2-1.3 17 6.1 17 15.4V288L412.5 444.5c6.7 6.7 6.2 17.7-1.5 23.1C371.8 495.6 323.8 512 272 512C139.5 512 32 404.6 32 272zm526.4 16c9.3 0 16.6 7.8 15.4 17c-7.7 55.9-34.6 105.6-73.9 142.3c-6 5.6-15.4 5.2-21.2-.7L320 288H558.4z" />
                    </svg>
                </div>
                <span class="font-medium">Dashboard</span>
            </a>
            @else
            @endif

            <div class="border-t border-gray-100 my-2"></div>

            <form action="{{ route('logout') }}" method="post" onsubmit="return confirm('Are you sure you want to logout?')">
                @csrf
                <button type="submit" class="w-full text-left flex items-center gap-3 px-5 py-3 text-red-600 hover:bg-red-50 transition-colors duration-150">
                    <div class="bg-red-100 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 512 512">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                        </svg>
                    </div>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileDropdown = document.getElementById('profileDropdown');
        const profileMenu = document.getElementById('profileMenu');
        const dropdownArrow = document.getElementById('dropdownArrow');

        // Function to toggle dropdown
        function toggleDropdown() {
            const isExpanded = profileDropdown.querySelector('button').getAttribute('aria-expanded') === 'true';

            if (isExpanded) {
                profileMenu.classList.add('hidden');
                profileMenu.classList.remove('opacity-100', 'scale-100');
                profileMenu.classList.add('opacity-0', 'scale-95');
                dropdownArrow.classList.remove('rotate-180');
                profileDropdown.querySelector('button').setAttribute('aria-expanded', 'false');
            } else {
                profileMenu.classList.remove('hidden', 'opacity-0', 'scale-95');
                profileMenu.classList.add('opacity-100', 'scale-100');
                dropdownArrow.classList.add('rotate-180');
                profileDropdown.querySelector('button').setAttribute('aria-expanded', 'true');
            }
        }

        // Toggle dropdown on button click
        profileDropdown.querySelector('button').addEventListener('click', function(e) {
            e.stopPropagation();
            toggleDropdown();
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!profileDropdown.contains(e.target)) {
                profileMenu.classList.add('hidden');
                dropdownArrow.classList.remove('rotate-180');
                profileDropdown.querySelector('button').setAttribute('aria-expanded', 'false');
            }
        });

        // Close dropdown when pressing escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && profileDropdown.querySelector('button').getAttribute('aria-expanded') === 'true') {
                toggleDropdown();
            }
        });

        // Prevent clicks inside dropdown from closing it
        profileMenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
</script>