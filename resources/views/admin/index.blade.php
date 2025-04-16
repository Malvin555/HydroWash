<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HydroWash</title>

    <link rel="icon" type="images/png" href="{{ asset('img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100" data-page="admin">
    <div class="min-h-screen flex flex-col md:flex-row">

        <div id="sidebar"
            class="min-h-screen flex flex-col justify-between bg-white text-primary w-64 space-y-6 py-7 px-2 fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20">

            <div>
                <div class="flex items-center justify-between px-4">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-10 h-10">
                        <span class="text-xl font-bold sidebar-text">HydroWash</span>
                    </div>
    
                </div>
    
                <nav class="mt-10">
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200 text-primary">
                        <i class="fas fa-home mr-2"></i>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-users mr-2"></i>
                        <span class="sidebar-text">Users</span>
                    </a>
    
    
                    <div class="sidebar-dropdown">
                        <button id="toggleDropdownBtn"
                            class="w-full flex items-center justify-between py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200 focus:outline-none">
                            <div>
                                <i class="fas fa-chart-bar mr-2"></i>
                                <span class="sidebar-text">Analytics</span>
                            </div>
                            <i class="fas fa-chevron-down transition-transform duration-200" id="analyticsArrow"></i>
                        </button>
                        <div id="analyticsDropdown" class="pl-4 mt-1 hidden">
                            <a href="#" class="block py-2 px-4 rounded transition duration-200 hover:bg-gray-200">
                                <i class="fas fa-chart-line mr-2"></i>
                                <span class="sidebar-text">Performance</span>
                            </a>
                            <a href="#" class="block py-2 px-4 rounded transition duration-200 hover:bg-gray-200">
                                <i class="fas fa-chart-pie mr-2"></i>
                                <span class="sidebar-text">Reports</span>
                            </a>
                            <a href="#" class="block py-2 px-4 rounded transition duration-200 hover:bg-gray-200">
                                <i class="fas fa-chart-area mr-2"></i>
                                <span class="sidebar-text">Statistics</span>
                            </a>
                        </div>
                    </div>
    
    
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-box mr-2"></i>
                        <span class="sidebar-text">Products</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-cog mr-2"></i>
                        <span class="sidebar-text">Settings</span>
                    </a>
                </nav>
            </div>


            <div class="w-full border-gray-700 flex justify-center">
                <button class="w-full rounded-sm bg-primary py-2 text-center text-white cursor-pointer">
                    Input Offline
                </button>
            </div>
        </div>



        <div class="flex-1">
            <header class="bg-primary shadow-md py-4 px-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <button id="sidebarToggle" class="text-white focus:outline-none cursor-pointer">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="relative" id="profileDropdown">
                            <button class="flex items-center focus:outline-none">
                                <img src="{{ asset('img/profile-img.png') }}" alt="admin" class="rounded-full w-8 h-8">
                                <span class="ml-2 text-sm font-medium text-white hidden md:block">MARIA</span>
                                <i class="fas fa-chevron-down ml-1 text-xs text-white hidden md:block"></i>
                            </button>

                            <div id="profileMenu"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-10">
                                <div class="border-t border-gray-100"></div>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-6">
                <div class="mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-primary h-30 rounded-md shadow-md p-2">
                        <div class="bg-btn rounded-sm w-8 h-8"></div>
                    </div>

                    <div class="bg-primary h-30 rounded-md shadow-md p-2">
                        <div class="bg-btn rounded-sm w-8 h-8"></div>
                    </div>

                    <div class="bg-primary h-30 rounded-md shadow-md p-2">
                        <div class="bg-btn rounded-sm w-8 h-8"></div>
                    </div>

                    <div class="bg-primary h-30 rounded-md shadow-md p-2">
                        <div class="bg-btn rounded-sm w-8 h-8"></div>
                    </div>
                </div>
            </main>
        </div>
    </div>




    @vite('resources/js/app.js')
</body>

</html>
