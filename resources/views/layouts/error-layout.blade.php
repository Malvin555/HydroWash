<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - HydroWash</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-primary min-h-screen">
    
    <nav class="bg-primary fixed top-0 left-0 right-0 z-[100]">
        <div class="max-w-screen-xl mx-auto px-[10%] lg:px-[5%] flex justify-between items-center py-3">
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-[40px] h-[40px]">

                <ul id="menu"
                    class="absolute top-[100%] left-0 h-screen w-[70%] bg-primary text-white font-bold transform -translate-x-full transition-transform duration-300 md:static md:translate-x-0 md:flex md:gap-6 md:bg-transparent md:h-auto md:w-auto md:items-center">
                    <li class="p-4 border-b md:p-0 md:border-none"><a class="nav__link border-b-2 border-white" href="#">Return To Home</a></li>
                    
                </ul>
            </div>



            <button id="menuToggle" class="md:hidden ml-4 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-6 h-6" viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Error Content -->
    <div class="container mx-auto px-4 py-24 max-w-4xl">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center mt-10">
            <div class="flex justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            
            <h1 class="text-4xl font-bold text-primary mb-4">
                @yield('code', 'Error')
            </h1>
            
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">
                @yield('message', 'Something went wrong')
            </h2>
            
            <p class="text-gray-600 mb-8">
                @yield('description', 'We apologize for the inconvenience. Please try again later or contact our support team for assistance.')
            </p>
            
            <div class="flex justify-center space-x-4">
                <a href="{{ route('home') }}" class="bg-primary hover:bg-secondary text-white font-medium py-2 px-6 rounded transition duration-300">
                    Return Home
                </a>
                <a href="javascript:history.back()" class="border border-primary text-primary hover:bg-gray-100 font-medium py-2 px-6 rounded transition duration-300">
                    Go Back
                </a>
            </div>
        </div>
    </div>
</body>
</html>