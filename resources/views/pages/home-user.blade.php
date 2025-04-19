<x-user-layout>
    {{-- home --}}
  <section class="h-full relative bg-cover py-24" style="background-image: url('{{ asset('img/bg-user.png') }}')">
    <div class="px-[5%]">
      <div class="text-white mb-10 md:max-w-[65%] lg:max-w-[50%]">
        <h1 class="text-2xl md:text-4xl lg:text-6xl font-bold leading-tight">HELLO, {{ Auth::user()->name ?? 'User' }}!</h1>
        <p class="md:text-lg lg:text-xl">Welcome to Hydrowash, Customer Comfort is Our Priority Enjoy Your Best Service Here</p>
      </div>
  
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-btn rounded-md shadow-md px-2 py-2 pb-5">
          <a href="{{ route('laundry') }}">
            <div class="w-full h-35 flex justify-center items-center mb-5  bg-primary rounded-md">
              <img src="{{ asset('img/laundry.svg') }}" alt="clothing" class="w-25 h-25">
            </div>
            <h1 class="text-center text-lg text-primary font-bold">Laundry</h1>
          </a>
        </div>

        <div class="bg-btn rounded-md shadow-md px-2 py-2 pb-5">
          <a href="{{ route('ironing') }}">
            <div class="w-full h-35 flex justify-center items-center mb-5 bg-primary rounded-md">
              <img src="{{ asset('img/ironing.svg') }}" alt="clothing" class="w-25 h-25">
            </div>
            <h1 class="text-center text-lg text-primary font-bold">Iron</h1>
          </a>
        </div>

        <div class="bg-btn rounded-md shadow-md px-2 py-2 pb-5">
          <a href="{{ route('feedback') }}">
            <div class="w-full h-35 flex justify-center items-center mb-5 bg-primary rounded-md">
              <img src="{{ asset('img/feedback.svg') }}" alt="clothing" class="w-25 h-25">
            </div>
            <h1 class="text-center text-lg text-primary font-bold">Feedback</h1>
          </a>
        </div>
        
        <div class="bg-btn rounded-md shadow-md px-2 py-2 pb-5">
          <a href="{{ route('profile') }}">
            <div class="w-full h-35 flex justify-center items-center mb-5 bg-primary rounded-md">
              <img src="{{ asset('img/profile.svg') }}" alt="clothing" class="w-25 h-25">
            </div>
            <h1 class="text-center text-lg text-primary font-bold">Profile</h1>
          </a>
        </div>
    </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
  </section>
</x-user-layout>