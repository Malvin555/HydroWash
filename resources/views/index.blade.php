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
<body>

  {{-- navbar --}}
  <nav class="bg-primary fixed top-0 left-0 right-0">
    <div class="max-w-screen-xl mx-auto px-[10%] lg:px-[5%] flex justify-between items-center py-3">
      <div class="flex items-center gap-2">
        <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-[40px] h-[40px]">

        <ul id="menu" class="absolute top-[100%] left-0 h-screen w-[70%] bg-primary text-white font-bold transform -translate-x-full transition-transform duration-300 md:static md:translate-x-0 md:flex md:gap-6 md:bg-transparent md:h-auto md:w-auto md:items-center">
          <li class="p-4 border-b md:p-0 md:border-none"><a href="#">HOME</a></li>
          <li class="p-4 border-b md:p-0 md:border-none"><a href="#">SERVICE</a></li>
          <li class="p-4 md:p-0 md:border-none"><a href="#">REVIEW</a></li>
          <a href="login" class="bg-btn w-20 text-center ml-4 p-2 rounded-lg text-primary font-bold block md:hidden">Log in</a>
        </ul>
      </div>
  

  
      <button id="menuToggle" class="text-white text-2xl md:hidden ml-4 cursor-pointer">
        <i class="fas fa-bars"></i>
      </button>

      <a href="login" class="bg-btn p-2 rounded-lg text-primary font-bold hidden md:inline-block">Log in</a>
    </div>
  </nav>



  {{-- home section --}}
  <section class="h-screen bg-cover bg-center pt-24 after-gradient " style="background-image: url('{{ asset('img/main-img.png') }}');">
    <div class="max-w-screen-xl h-full mx-auto px-[10%] lg:px-[5%] flex items-center">
      <div class="text-center md:text-left space-y-6 md:max-w-[55%] lg:max-w-[65%] z-[9999]">
        <h1 class="text-white text-3xl md:text-6xl lg:text-8xl font-bold leading-tight">
          The best web for your laundry
        </h1>
        <p class="text-white text-lg md:text-2xl lg:text-4xl">
          Welcome to HydroWash Service, where we
          transform your laundry day into a breeze!
        </p>
        <a href="#"
          class="inline-block bg-white text-primary font-bold py-2 px-6  rounded-full shadow-md transition duration-300 hover:bg-gray-200">
          Start Cleaning
        </a>
      </div>
    </div>
  </section>
  



  <section class="h-screen">
    <div class="max-w-screen-xl h-full mx-auto px-[10%] lg:px-[5%] pt-24">
      <div class="w-full flex flex-col gap-3 md:flex-row md:justify-between md:items-center">
        <h1 class="font-bold text-lg md:text-2xl md:w-[50%]">your trusted partner in achieving pristine.</h1>
        <p class="text-sm md:w-[50%]">Established with the mission to simplify your life and elevate your laundry experience, we bring a blend of modern technology and eco-friendly practices.</p>
      </div>


    </div>
  </section>


  @vite('resources/js/app.js')
</body>
</html>