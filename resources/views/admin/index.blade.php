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

<body class="bg-secondary" data-page="admin">
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
    
                <nav class="mt-10 text-primary">

                    <a href="#" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                

                    <div class="sidebar-dropdown">
                        <button id="toggleDropdownBtn"
                            class="w-full flex items-center justify-between py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200 focus:outline-none">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 512 512"><path d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z"/></svg>
                                <span class="sidebar-text">Management</span>
                            </div>
                            <svg id="analyticsArrow" class="w-5 h-5 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" />
                            </svg>
                        </button>
                
                        <div id="analyticsDropdown" class="pl-4 mt-1 hidden">

                            <a href="#" class="flex items-center py-2 px-4 rounded transition duration-200 hover:bg-gray-200">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 3h7v7H3V3zm0 11h7v7H3v-7zm11-11h7v7h-7V3zm0 11h7v7h-7v-7z" />
                                </svg>
                                <span class="sidebar-text">Item Types</span>
                            </a>
                

                            <a href="#" class="flex items-center py-2 px-4 rounded transition duration-200 hover:bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 576 512"><path d="M253.3 35.1c6.1-11.8 1.5-26.3-10.2-32.4s-26.3-1.5-32.4 10.2L117.6 192 32 192c-17.7 0-32 14.3-32 32s14.3 32 32 32L83.9 463.5C91 492 116.6 512 146 512L430 512c29.4 0 55-20 62.1-48.5L544 256c17.7 0 32-14.3 32-32s-14.3-32-32-32l-85.6 0L365.3 12.9C359.2 1.2 344.7-3.4 332.9 2.7s-16.3 20.6-10.2 32.4L404.3 192l-232.6 0L253.3 35.1zM192 304l0 96c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-96c0-8.8 7.2-16 16-16s16 7.2 16 16zm96-16c8.8 0 16 7.2 16 16l0 96c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-96c0-8.8 7.2-16 16-16zm128 16l0 96c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-96c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                                <span class="sidebar-text">Laundry</span>
                            </a>
                

                            <a href="#" class="flex items-center py-2 px-4 rounded transition duration-200 hover:bg-gray-200">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4 4h16v4H4V4zm0 6h16v2H4v-2zm0 4h10v6H4v-6z" />
                                </svg>
                                <span class="sidebar-text">Ironing</span>
                            </a>
                

                            <a href="#" class="flex items-center py-2 px-4 rounded transition duration-200 hover:bg-gray-200">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.54-11.46a.75.75 0 10-1.06-1.06L10 8.94 7.53 6.47a.75.75 0 00-1.06 1.06L8.94 10l-2.47 2.47a.75.75 0 001.06 1.06L10 11.06l2.47 2.47a.75.75 0 001.06-1.06L11.06 10l2.47-2.47z" clip-rule="evenodd"/>
                                </svg>
                                <span class="sidebar-text">Canceled</span>
                            </a>
                        </div>
                    </div>
                

                    <a href="#" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 4h16v2H4zm0 5h10v2H4zm0 5h16v2H4zm0 5h10v2H4z" />
                        </svg>
                        <span class="sidebar-text">Transactions</span>
                    </a>
                

                    <a href="#" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2 5a2 2 0 012-2h16a2 2 0 012 2v13.586l-4.707-4.707a1 1 0 00-1.414 0L12 18l-3.879-3.879a1 1 0 00-1.414 0L2 20.586V5z" />
                        </svg>
                        <span class="sidebar-text">Feedbacks</span>
                    </a>
                

                    <a href="#" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 640 512"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                        <span class="sidebar-text">Users</span>
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
                    <div class="relative h-30 bg-primary rounded-md shadow-md p-3 overflow-hidden">
                        <img src="{{ asset('img/service-icon.svg') }}" alt="Service Icon"
                            class="w-30 h-30 absolute top-2 left-2">
                        <h1 class="text-white text-xl font-semibold">Service</h1>
                        <div class="w-36 h-18 bg-white rounded-t-full absolute bottom-0 left-1/2 -translate-x-1/2 flex items-center justify-center">
                            <p class="text-5xl font-semibold">76</p>
                        </div>
                    </div>

                    <div class="relative h-30 bg-primary rounded-md shadow-md p-3 overflow-hidden">
                        <img src="{{ asset('img/users-icon.svg') }}" alt="Users Icon"
                            class="w-30 h-30 absolute top-2 left-2">
                        <h1 class="text-white text-xl font-semibold">Users</h1>
                        <div class="w-36 h-18 bg-white rounded-t-full absolute bottom-0 left-1/2 -translate-x-1/2 flex items-center justify-center">
                            <p class="text-5xl font-semibold">76</p>
                        </div>
                    </div>

                    <div class="relative h-30 bg-primary rounded-md shadow-md p-3 overflow-hidden">
                        <img src="{{ asset('img/pending-icon.svg') }}" alt="Pending Icon"
                            class="w-30 h-30 absolute top-2 left-2">
                        <h1 class="text-white text-xl font-semibold">Pending</h1>
                        <div class="w-36 h-18 bg-white rounded-t-full absolute bottom-0 left-1/2 -translate-x-1/2 flex items-center justify-center">
                            <p class="text-5xl font-semibold">76</p>
                        </div>
                    </div>

                    <div class="relative h-30 bg-primary rounded-md shadow-md p-3 overflow-hidden">
                        <img src="{{ asset('img/complete-icon.svg') }}" alt="Complete Icon"
                            class="w-30 h-30 absolute top-2 left-2">
                        <h1 class="text-white text-xl font-semibold">Completed</h1>
                        <div class="w-36 h-18 bg-white rounded-t-full absolute bottom-0 left-1/2 -translate-x-1/2 flex items-center justify-center">
                            <p class="text-5xl font-semibold">76</p>
                        </div>
                    </div>
        
                </div>
            </main>
        </div>
    </div>




    @vite('resources/js/app.js')
</body>

</html>
