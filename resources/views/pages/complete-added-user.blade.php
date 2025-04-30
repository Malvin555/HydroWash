<x-user-layout>
    {{-- complete added service --}}
  <section class="h-screen relative flex justify-center items-center">

    <div class="w-full max-w-md mx-auto p-4 text-center">
      <img src="{{ asset('img/complete-added.png') }}" alt="tes" class="w-1/2 h-auto mx-auto mb-4">
      <h1 class="text-primary font-bold text-base md:text-lg mb-7 drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)]">
        Data saved! Please proceed to the next step
      </h1>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        <a href="{{ route('home') }}" class="w-full text-white text-center bg-primary py-2 rounded-sm">Homepage</a>
        <a href="{{ route('transaction', ['slug' => Str::slug($service?->name_ironing ?? $service?->name_laundry)]) }}" class="w-full text-white text-center bg-primary py-2 rounded-sm">Transaction</a>
      </div>
    </div>
    

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
  </section>
</x-user-layout>
