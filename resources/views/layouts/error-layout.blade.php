<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - HydroWash</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-primary min-h-screen">
    
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
            
            <div class="flex justify-center space-x-4 mb-8">
                <a href="{{ route('home') }}" class="bg-primary hover:bg-secondary text-white font-medium py-2 px-6 rounded transition duration-300">
                    Return Home
                </a>
                <a href="javascript:history.back()" class="border border-primary text-primary hover:bg-gray-100 font-medium py-2 px-6 rounded transition duration-300">
                    Go Back
                </a>
            </div>

            <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-15 h-15 mx-auto">
        </div>
    </div>
</body>
</html>