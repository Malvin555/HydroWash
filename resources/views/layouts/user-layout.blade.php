<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HydroWash</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins bg-gray-50 min-h-screen" data-page="user">
    {{-- navbar --}}
    <nav class="bg-primary fixed top-0 left-0 right-0 z-20 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                            <span class="text-primary font-bold text-lg">HW</span>
                        </div>
                        <span class="ml-2 text-white font-bold text-xl">Hydro<span class="text-teal-200">Wash</span></span>
                    </a>
                    
                    <a href="{{ route('history') }}" class="hidden sm:flex">
                        <div class="bg-white/10 hover:bg-white/20 rounded-lg px-4 py-2 text-white font-medium transition duration-150 flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Order History</span>
                        </div>
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('history') }}" class="sm:hidden">
                        <div class="bg-white/10 hover:bg-white/20 backdrop-blur-sm rounded-lg p-2 text-white transition duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </a>
                    
                    <x-profile></x-profile>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu - can be expanded if needed -->
        <div class="sm:hidden border-t border-white/10" id="mobileMenu" style="display: none;">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="{{ route('history') }}" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-base font-medium">Order History</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        {{ $slot }}
    </main>


    {{-- modal information --}}
    {{-- @include('pages.modal-information-user') --}}

    @include('pages.alert')

    {{-- 
        This script is used to handle the scenario where a form input fails validation, 
        and a modal needs to be displayed again. The `show_modal` session variable 
        contains the ID of the modal that should be shown. The `Js::from` helper 
        is used to safely pass the modal ID from the server-side session to the 
        client-side JavaScript.
    --}}
    <script>
        window.modalToShow = {{ Js::from(session('show_modal')) }};
        
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menuToggle');
            const mobileMenu = document.getElementById('mobileMenu');
            
            if (menuButton && mobileMenu) {
                menuButton.addEventListener('click', function() {
                    const isMenuHidden = mobileMenu.style.display === 'none';
                    mobileMenu.style.display = isMenuHidden ? 'block' : 'none';
                });
            }
        });
    </script>
</body>

</html>