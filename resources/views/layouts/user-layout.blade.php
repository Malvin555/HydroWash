<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HydroWash</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    @vite('resources/css/app.css')
</head>

<body data-page="user">

    {{-- navbar --}}
    <nav class="bg-gradient-to-r from-[#6E91A2] to-primary fixed top-0 left-0 right-0 z-20">
        <div class="px-[5%] flex justify-between items-center py-3">
            <div class="flex items-center gap-2">
                <h1 class="font-bold text-lg md:text-xl">Hydro<span class="text-primary">Wash</span></h1>

                <a href="{{ route('history') }}" class="bg-primary rounded-sm w-15 text-center text-sm md:text-base text-white">
                    history
                </a>
            </div>


            <div class="flex items-center text-white gap-1">
                <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-6 h-6 md:w-8 md:h-8">
                <h1 class="text-sm md:text-base">{{ Auth::user()->name ?? 'user' }}</h1>
            </div>
        </div>
    </nav>

    {{ $slot }}

    {{-- modal information --}}
    {{-- @include('pages.modal-information-user') --}}

    <x-landing-footer></x-landing-footer>


    @vite('resources/js/app.js')
</body>
</html>

