<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HydroWash</title>

  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body data-page="user">

  {{-- navbar --}}
  <nav class="bg-gradient-to-r from-[#6E91A2] to-primary fixed top-0 left-0 right-0 z-20">
    <div class="px-[5%] flex justify-between items-center py-3">
      <div class="flex items-center gap-2">
        <h1 class="font-bold text-lg md:text-xl">Hydro<span class="text-primary">Wash</span></h1>

        <a href="#" class="bg-primary rounded-sm w-15 text-center text-sm md:text-base text-white">
          history
        </a>
      </div>


      <div class="flex items-center text-white gap-1">
        <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-6 h-6 md:w-8 md:h-8">
        <h1 class="text-sm md:text-base">MARIA</h1>
      </div>
    </div>
  </nav>


  {{-- section --}}
  {{-- home --}}
  {{-- <section class="h-full relative bg-cover py-24" style="background-image: url('{{ asset('img/bg-user.png') }}')">
    <div class="px-[5%]">
      <div class="text-white mb-10 md:max-w-[65%] lg:max-w-[50%]">
        <h1 class="text-2xl md:text-4xl lg:text-6xl font-bold leading-tight">HELLO, MARIA!</h1>
        <p class="md:text-lg lg:text-xl">Welcome to Hydrowash, Customer Comfort is Our Priority Enjoy Your Best Service Here</p>
      </div>
  
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-btn rounded-md shadow-md px-2 py-2 pb-5">
          <a href="#">
            <div class="w-full h-35 flex justify-center items-center mb-5  bg-secondary rounded-md">
              <img src="{{ asset('img/laundry.svg') }}" alt="clothing" class="w-25 h-25">
            </div>
            <h1 class="text-center text-lg text-primary font-bold">Laundry</h1>
          </a>
        </div>

        <div class="bg-btn rounded-md shadow-md px-2 py-2 pb-5">
          <a href="#">
            <div class="w-full h-35 flex justify-center items-center mb-5 bg-secondary rounded-md">
              <img src="{{ asset('img/ironing.svg') }}" alt="clothing" class="w-25 h-25">
            </div>
            <h1 class="text-center text-lg text-primary font-bold">Iron</h1>
          </a>
        </div>

        <div class="bg-btn rounded-md shadow-md px-2 py-2 pb-5">
          <a href="#">
            <div class="w-full h-35 flex justify-center items-center mb-5 bg-secondary rounded-md">
              <img src="{{ asset('img/feedback.svg') }}" alt="clothing" class="w-25 h-25">
            </div>
            <h1 class="text-center text-lg text-primary font-bold">Feedback</h1>
          </a>
        </div>
        
        <div class="bg-btn rounded-md shadow-md px-2 py-2 pb-5">
          <a href="#">
            <div class="w-full h-35 flex justify-center items-center mb-5 bg-secondary rounded-md">
              <img src="{{ asset('img/profile.svg') }}" alt="clothing" class="w-25 h-25">
            </div>
            <h1 class="text-center text-lg text-primary font-bold">Profile</h1>
          </a>
        </div>
    </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
  </section> --}}


  {{-- history --}}
  <section class="h-screen pt-24">

    <div class="px-[5%]">
      <div class="mb-5">
        <h1 class="text-xl md:text-2xl lg:text-4xl text-primary font-bold drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)]">Your Service History</h1>
        <p class="text-sm md:text-lg lg:text-xl">Track Your Order Here</p>
      </div>

      <div class="w-full mb-7 grid grid-cols-1 md:grid-cols-3 gap-2 bg-secondary p-3 rounded-sm">
        <div class="relative inline-block w-full">
          <select class="appearance-none bg-btn font-bold rounded-sm py-2 pl-3 w-full outline-0">
            <option value="" disabled selected>All Types</option>
            <option value="test1">Test 1</option>
            <option value="test2">Test 2</option>
          </select>

          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
            </svg>
          </div>
        </div>
      
        <div class="relative inline-block w-full">
          <select class="appearance-none bg-btn font-bold rounded-sm py-2 pl-3 w-full outline-0">
            <option value="" disabled selected>All Status</option>
            <option value="test1">Test 1</option>
            <option value="test2">Test 2</option>
          </select>

          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
            </svg>
          </div>
        </div>

        <div class="w-full relative">
          <input type="text" id="search" name="search" class="bg-btn rounded-sm outline-0 placeholder:text-gray-900 py-2 pl-3 w-full font-bold" placeholder="Search...">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute right-2 bottom-1/4" viewBox="0 0 512 512">
            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
          </svg>
        </div>
      </div>

      <div class="w-full flex flex-col gap-3">
        <div id="openModal" class="w-full bg-secondary cursor-pointer rounded-sm flex items-center justify-between py-2 px-6">
          <div>
            <h1 class="text-primary md:text-lg font-semibold">Laundry #22872</h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 384 512">
                <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
              </svg>
              jln raya delod kangin
            </p>
          </div>

          <div class="flex flex-col items-end">
            <h1 class="bg-btn w-[6rem] md:w-[60%] rounded-sm text-[#6D6969] text-[.8rem] font-bold py-1 px-4 text-center">
              Pending
            </h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 448 512">
                <path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm80 64c-8.8 0-16 7.2-16 16l0 96c0 8.8 7.2 16 16 16l96 0c8.8 0 16-7.2 16-16l0-96c0-8.8-7.2-16-16-16l-96 0z"/>
              </svg>
              Submitted at 31 February 2090
            </p>
          </div>
        </div>


        <div id="openModal" class="w-full bg-secondary cursor-pointer rounded-sm flex items-center justify-between py-2 px-6">
          <div>
            <h1 class="text-primary md:text-lg font-semibold">Laundry #22872</h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 384 512">
                <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
              </svg>
              jln raya delod kangin
            </p>
          </div>

          <div class="flex flex-col items-end">
            <h1 class="bg-proccess w-[6rem] md:w-[60%] rounded-sm text-[#9F8D04] text-[.8rem] font-bold py-1 px-4 text-center">
              Proccess
            </h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 448 512">
                <path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm80 64c-8.8 0-16 7.2-16 16l0 96c0 8.8 7.2 16 16 16l96 0c8.8 0 16-7.2 16-16l0-96c0-8.8-7.2-16-16-16l-96 0z"/>
              </svg>
              Submitted at 31 February 2090
            </p>
          </div>
        </div>


        <div id="openModal" class="w-full bg-secondary cursor-pointer rounded-sm flex items-center justify-between py-2 px-6">
          <div>
            <h1 class="text-primary md:text-lg font-semibold">Laundry #22872</h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 384 512">
                <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
              </svg>
              jln raya delod kangin
            </p>
          </div>

          <div class="flex flex-col items-end">
            <h1 class="bg-success w-[6rem] md:w-[60%] rounded-sm text-[#399707] text-[.8rem] font-bold py-1 text-center">
              Completed
            </h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 448 512">
                <path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm80 64c-8.8 0-16 7.2-16 16l0 96c0 8.8 7.2 16 16 16l96 0c8.8 0 16-7.2 16-16l0-96c0-8.8-7.2-16-16-16l-96 0z"/>
              </svg>
              Submitted at 31 February 2090
            </p>
          </div>
        </div>

      </div>
    </div>



    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
  </section>


  {{-- profile  --}}
    {{-- <section class="h-full relative py-24">
      <div class="px-[5%]">
        <div class="mb-5">
          <h1 class="text-xl md:text-2xl lg:text-4xl text-primary font-bold drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)]">Your Profile</h1>
          <p class="text-sm md:text-lg lg:text-xl">Manage your account information and preferences.</p>
        </div>

        <div class="w-full border border-primary rounded-sm pb-5 mb-6">
          <div class="bg-primary mb-5 rounded-b-sm text-white flex justify-between items-center px-3 py-2">
            <div>
              <h1 class="font-bold md:text-lg lg:text-2xl">Personal Information</h1>
              <p class="font-light text-[.8rem] md:text-sm lg:text-base">Update your personal detail.</p>
            </div>

            <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-6 h-6 md:w-8 md:h-8">
          </div>

          <form action="" method="" class="px-3">
            <div class="w-full mb-5">
              <input type="email" id="email" name="email" value="Maria@gmail.com" class="w-full bg-secondary rounded-sm py-1 px-2 outline-0 text-white">
            </div>

            <div class="w-full mb-5">
              <input type="text" id="username" name="username" value="MARIA" class="w-full bg-secondary rounded-sm py-1 px-2 outline-0 text-white">
            </div>

            <div class="w-full flex gap-4 mb-5">
              <input type="text" class="w-full bg-secondary rounded-sm py-1 px-2 text-white outline-0" value="Jln Raya Kelod Kangin">
              <input type="text" class="w-full bg-secondary rounded-sm py-1 px-2 text-white outline-0" value="081234567891">
            </div>
            
            <div class="w-full flex justify-end">
              <button type="submit" class="bg-primary text-white py-1 px-4 rounded-sm">Submit</button>
            </div>
          </form>
        </div>


        <div class="w-full border border-primary rounded-sm pb-5">
          <div class="bg-primary mb-5 rounded-b-sm text-white flex justify-between items-center px-3 py-2">
            <div>
              <h1 class="font-bold md:text-lg lg:text-2xl">Password</h1>
              <p class="font-light text-[.8rem] md:text-sm lg:text-base">Update your password.</p>
            </div>

            <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-6 h-6 md:w-8 md:h-8">
          </div>

          <form action="" method="" class="px-3">
            <div class="w-full mb-5">
              <input type="password" id="password" name="password" placeholder="Password" class="w-full bg-secondary rounded-sm py-1 px-2 outline-0 text-white">
            </div>

            <div class="w-full mb-5">
              <input type="password" id="new-password" name="new-password" placeholder="New Password" class="w-full bg-secondary rounded-sm py-1 px-2 outline-0 text-white">
            </div>
        
            <div class="w-full mb-5">
              <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" class="w-full bg-secondary rounded-sm py-1 px-2 outline-0 text-white">
            </div>
            
            <div class="w-full flex justify-end">
              <button type="submit" class="bg-primary text-white py-1 px-4 rounded-sm">Submit</button>
            </div>
          </form>
        </div>

      </div>

      <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
    </section> --}}


  {{-- feedback --}}
  {{-- <section class="h-full bg-gradient-to-t from-primary to-btn relative py-24">


    <div class="w-full px-[2%] grid grid-cols-1 md:grid-cols-2 gap-2">

      <div class="bg-gradient-to-b mb-3 md:mb-0 from-[#6E91A2] via-[#8F8C8C] to-[#FFFDFD] py-10 px-2 rounded-md w-full">
        <div class="flex items-center gap-2 mb-3">
          <img src="{{ asset('img/laundry2.svg') }}" alt="laundry" class="w-12 h-12 md:w-14 md:h-14">

          <div>
            <h1 class="text-primary lg:text-xl font-bold">Send us your feedback!</h1>
            <p class="text-[.8rem] lg:text-sm">Let out all your opinions, because it can make us grow</p>
          </div>
        </div>

        <form action="" method="">
          <div class="w-full flex flex-col justify-center items-center">
            <div class="flex gap-2 md:gap-4 lg:gap-7 mb-3 items-center" id="stars">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5 h-5 md:w-7 md:h-7 text-primary cursor-pointer">
                <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5 h-5 md:w-7 md:h-7 text-primary cursor-pointer">
                <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5 h-5 md:w-7 md:h-7 text-primary cursor-pointer">
                <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5 h-5 md:w-7 md:h-7 text-primary cursor-pointer">
                <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5 h-5 md:w-7 md:h-7 text-primary cursor-pointer">
                <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
              </svg>
            </div>
  
            <textarea name="feedback" id="feedback" rows="10" class="bg-white w-full rounded-sm outline-0 placeholder:text-[.7rem] md:placeholder:text-sm placeholder:text-black pl-2 mb-3" placeholder="What can we do to improve your experience?"></textarea>

            <button type="submit" class="bg-primary text-white text-[.8rem] md:text-sm lg:text-lg py-2 w-full rounded-sm">Submit My Feedback</button>
          </div>
        </form>
      </div>

      <div class="max-h-[450px] overflow-y-auto">

        <div class="bg-white rounded-sm p-2 flex justify-between mb-3">
          <div class="flex gap-2">
            <img src="{{ asset("img/profile-img.png") }}" alt="profile" class="w-10 h-10 md:w-14 md:h-14">
            <div class="text-primary">
              <h1 class="text-sm font-bold">MARIA</h1>
              <p class="text-[.7rem]">08/07/2025</p>
              <p class="text-[.8rem]">I am very satisfied with your service</p>
            </div>
          </div>

          <div class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
          </div>
        </div>


        <div class="bg-white rounded-sm p-2 flex justify-between mb-3">
          <div class="flex gap-2">
            <img src="{{ asset("img/profile-img.png") }}" alt="profile" class="w-10 h-10 md:w-14 md:h-14">
            <div class="text-primary">
              <h1 class="text-sm font-bold">MARIA</h1>
              <p class="text-[.7rem]">08/07/2025</p>
              <p class="text-[.8rem]">I am very satisfied with your service</p>
            </div>
          </div>

          <div class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
          </div>
        </div>


        <div class="bg-white rounded-sm p-2 flex justify-between mb-3">
          <div class="flex gap-2">
            <img src="{{ asset("img/profile-img.png") }}" alt="profile" class="w-10 h-10 md:w-14 md:h-14">
            <div class="text-primary">
              <h1 class="text-sm font-bold">MARIA</h1>
              <p class="text-[.7rem]">08/07/2025</p>
              <p class="text-[.8rem]">I am very satisfied with your service</p>
            </div>
          </div>

          <div class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
          </div>
        </div>
        <div class="bg-white rounded-sm p-2 flex justify-between mb-3">
          <div class="flex gap-2">
            <img src="{{ asset("img/profile-img.png") }}" alt="profile" class="w-10 h-10 md:w-14 md:h-14">
            <div class="text-primary">
              <h1 class="text-sm font-bold">MARIA</h1>
              <p class="text-[.7rem]">08/07/2025</p>
              <p class="text-[.8rem]">I am very satisfied with your service</p>
            </div>
          </div>

          <div class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
          </div>
        </div>


        <div class="bg-white rounded-sm p-2 flex justify-between mb-3">
          <div class="flex gap-2">
            <img src="{{ asset("img/profile-img.png") }}" alt="profile" class="w-10 h-10 md:w-14 md:h-14">
            <div class="text-primary">
              <h1 class="text-sm font-bold">MARIA</h1>
              <p class="text-[.7rem]">08/07/2025</p>
              <p class="text-[.8rem]">I am very satisfied with your service</p>
            </div>
          </div>

          <div class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
          </div>
        </div>


        <div class="bg-white rounded-sm p-2 flex justify-between mb-3">
          <div class="flex gap-2">
            <img src="{{ asset("img/profile-img.png") }}" alt="profile" class="w-10 h-10 md:w-14 md:h-14">
            <div class="text-primary">
              <h1 class="text-sm font-bold">MARIA</h1>
              <p class="text-[.7rem]">08/07/2025</p>
              <p class="text-[.8rem]">I am very satisfied with your service</p>
            </div>
          </div>

          <div class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3 h-3 text-yellow-500 cursor-pointer">
              <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
            </svg>
          </div>
        </div>

      </div>

    </div>


    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
  </section> --}}


  {{-- ironing service --}}
  {{-- <section class="h-full relative py-24">

    <div class="px-[5%]">
      <h1 class="text-center text-2xl md:text-4xl text-primary font-bold drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)] mb-5">Ironing Service</h1>

      <form action="" method="">
        <h1 class="font-bold">Select Type : </h1>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-5">

          <label class="cursor-pointer">
            <div class="bg-cover bg-center rounded-sm h-40 flex items-end" style="background-image: url('{{ asset('img/transaction-img.png') }}')">
              <div class="flex items-center p-2">
                <input type="radio" name="type" value="clothing" />
                <span class="text-sm text-white font-medium">Clothing</span>
              </div>
            </div>
          </label>

          <label class="cursor-pointer">
            <div class="bg-cover bg-center rounded-sm h-40 flex items-end" style="background-image: url('{{ asset('img/towels.png') }}')">
              <div class="flex items-center p-2">
                <input type="radio" name="type" value="towels" />
                <span class="text-sm text-white font-medium">Towels</span>
              </div>
            </div>
          </label>

          <label class="cursor-pointer">
            <div class="bg-cover bg-center rounded-sm h-40 flex items-end" style="background-image: url('{{ asset('img/bedding.png') }}')">
              <div class="flex items-center p-2">
                <input type="radio" name="type" value="bedding" />
                <span class="text-sm text-white font-medium">Bedding</span>
              </div>
            </div>
          </label>

          <label class="cursor-pointer">
            <div class="bg-cover bg-center rounded-sm h-40 flex items-end" style="background-image: url('{{ asset('img/accessories.png') }}')">
              <div class="flex items-center p-2">
                <input type="radio" name="type" value="accessories" />
                <span class="text-sm text-white font-medium">Accessories</span>
              </div>
            </div>
          </label>

        </div>

        <div class="w-full flex flex-row gap-2 mb-5">
          <div class="w-full sm:w-1/2">
            <label for="amount" class="block mb-1 text-primary font-semibold">Amount:</label>
            <input
              type="text"
              id="amount"
              name="amount"
              class="w-full bg-secondary text-primary rounded-sm py-2 px-3 placeholder:text-primary outline-none focus:ring-2 focus:ring-white"
              placeholder="Amount item"
            />
          </div>
        
          <div class="w-full sm:w-1/2">
            <label class="block mb-1 invisible">Total</label>
            <input
              type="text"
              readonly
              value="Rp.000.000.000"
              class="w-full bg-secondary text-primary rounded-sm py-2 px-3 outline-none"
            />
          </div>
        </div>
        
        <div class="w-full mb-5">
          <div class="relative inline-block w-full">
            <select class="appearance-none bg-secondary font-bold rounded-sm py-2 pl-3 w-full">
              <option value="" disabled selected>Retrival Method</option>
              <option value="test1">Test 1</option>
              <option value="test2">Test 2</option>
            </select>
  
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
              </svg>
            </div>
          </div>
        </div>

        <div class="flex items-start gap-2 mb-7">
          <div class="pt-2">
            <svg class="w-8 h-8 text-[#194655]" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512">
              <path d="M541 229.16L512 204.28V96a16 16 0 0 0-16-16h-64a16 16 0 0 0-16 16v51.72L314.45 43.17c-13.8-12.41-35.1-12.4-48.9 0L35 229.16a12 12 0 0 0-1.6 17l25.5 28.3a12 12 0 0 0 17 1.6l27.1-24.3V464a48 48 0 0 0 48 48h112V336a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v176h112a48 48 0 0 0 48-48V251.76l27.1 24.3a12 12 0 0 0 17-1.6l25.5-28.3a12 12 0 0 0-1.6-17z"/>
            </svg>
          </div>
        
          <div class="flex flex-col w-full">
            <div class="flex items-center gap-2">
              <input
                type="text"
                placeholder="Address"
                class="bg-secondary text-primary placeholder-primary rounded-sm px-3 py-2 w-1/2 outline-none"
              />
              <span class="text-[#194655] font-bold">to:</span>
              <input
                type="text"
                placeholder="Destination"
                class="bg-secondary text-primary placeholder-primary rounded-sm px-3 py-2 w-1/2 outline-none"
              />
            </div>
          </div>
        </div>

        <div class="w-full mb-5">
          <label for="note" class="font-bold">Note : </label>
          <textarea name="note" id="note" rows="10" class="w-full bg-secondary rounded-sm p-2" placeholder="Leave your notes here..."></textarea>
        </div>

        <button type="submit" class="w-full bg-primary py-2 cursor-pointer text-white font-bold text-lg rounded-sm">Submit</button>
      </form>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-0 pointer-events-none"></div>
  </section> --}}


  {{-- transaction laundry --}}
  {{-- <section class="h-full relative py-24">

    <div class="px-[5%]">
      <h1 class="text-center text-xl md:text-2xl lg:text-4xl text-primary font-bold drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)] mb-15">Transaction Laundry #22872</h1>

      <form action="" method="">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mb-5 ">
          <div class="col-span-1 flex justify-center">
            <img src="{{ asset('img/transaction-img.png') }}" alt="transaction" class="object-contain md:w-full h-full">
          </div>

          <div class="col-span-2 h-full md:flex md:flex-col md:justify-between">
            <div class="mb-3">
              <label for="address-taking" class="text-sm font-bold">Address Taking : </label>
              <input type="text" disabled id="address-taking" value="Jln dauh kangin" name="address-taking" class="w-full p-2 bg-secondary rounded-sm text-primary/50 h-full">
            </div>
            <div class="mb-3">
              <label for="address-taking" class="text-sm font-bold">Address Delivery :</label>
              <input type="text" disabled id="address-taking" value="Jln dauh kangin" name="address-taking" class="w-full p-2 bg-secondary rounded-sm text-primary/50 h-full">
            </div>
            <div class="flex gap-2">
              <input type="text" disabled value="Amount item" id="amount-item" name="amount-item" class="w-full bg-secondary p-2 rounded-sm text-primary h-full">
              <input type="text" disabled value="Take away" id="take-away" name="take-away" class="w-full bg-secondary p-2 rounded-sm text-primary h-full">
            </div>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-5">
          <label class="cursor-pointer">
            <div class="bg-secondary text-white p-2 rounded-sm overflow-hidden shadow hover:shadow-lg transition">
              <h1 class="md:text-lg lg:text-xl">Debit</h1>
              <div class="flex flex-col items-center p-2">
                <img src="{{ asset('img/debit.svg') }}" alt="debit" class="w-20 h-20 md:w-30 md:h-30 lg:w-40 lg:h-40"/>
                <input type="checkbox" hidden name="debit" value="debit" class="" />
              </div>
            </div>
          </label>

          <label class="cursor-pointer">
            <div class="bg-secondary text-white p-2 rounded-sm overflow-hidden shadow hover:shadow-lg transition">
              <h1 class="md:text-lg lg:text-xl">Cash</h1>
              <div class="flex flex-col items-center p-2">
                <img src="{{ asset('img/cash.svg') }}" alt="debit" class="w-20 h-20 md:w-30 md:h-30 lg:w-40 lg:h-40"/>
                <input type="checkbox" hidden name="debit" value="debit" class=""/>
              </div>
            </div>
          </label>
        </div>

        <div class="grid grid-cols-10 gap-3 items-center mb-5">
          <div class="col-span-1 h-14">
            <img src="{{ asset('img/visa.png') }}" alt="visa" class="w-full h-full object-contain">
          </div>
        
          <div class="col-span-6">
            <input type="text" id="card-number" name="card-number" placeholder="Card Number"
              class="text-primary bg-secondary w-full p-2 rounded-sm outline-0">
          </div>
        
          <div class="col-span-3">
            <input type="text" id="postal-code" name="postal-code" placeholder="Postal code"
              class="text-primary bg-secondary w-full p-2 rounded-sm outline-0">
          </div>
        </div>
        
        <button type="submit" class="w-full bg-primary rounded-sm cursor-pointer text-white py-2">Pay ( Rp 12.000.0000000000.00 )</button>
      </form>

      <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-0 pointer-events-none"></div>
    </div>

  </section> --}}


  {{-- complete added service --}}
  {{-- <section class="h-screen relative flex justify-center items-center">

    <div>
      <img src="{{ asset('img/complete-added.png') }}" alt="tes" class="w-100 h-70 mb-2">
      <h1 class="text-primary font-bold md:text-lg mb-7 drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)]">Data saved! Please proceed to the next step</h1>
      <div class="grid grid-cols-2 gap-3">
        <a href="#" class="w-full text-white text-center bg-primary py-2 rounded-sm">Homepage</a>
        <a href="#" class="w-full text-white text-center bg-primary py-2 rounded-sm">Transaction</a>
      </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
  </section> --}}


  {{-- complete transaction --}}
  {{-- <section class="h-screen relative py-24 flex justify-center items-center">

    <div>
      <img src="{{ asset('img/complete-transaction.png') }}" alt="tes" class="w-100 h-70 mb-2">
      <h1 class="text-primary font-bold text-sm md:text-lg mb-7 drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)]">Transaction successful! Your payment has been received</h1>
      <div class="flex justify-center">
        <a href="#" class="w-[50%] text-white text-center bg-primary py-2 rounded-sm">Homepage</a>
      </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
  </section> --}}




  {{-- footer --}}
  <x-landing-footer></x-landing-footer>


  @vite('resources/js/app.js')
</body>
</html>


<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-opacity-50 hidden flex items-center justify-center transition-opacity duration-300 opacity-0 z-50 ">
  <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4 shadow-lg transform scale-95 transition-transform duration-300">
    <h2 class="text-lg font-bold">Modal Title</h2>
    <p>This is the modal content.</p>
    <button id="closeModal" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Close</button>
  </div>
</div>