<x-user-layout>
    {{-- complete transaction --}}
  <section class="h-screen relative py-24 flex justify-center items-center">

    <div>
      <img src="{{ asset('img/complete-transaction.png') }}" alt="tes" class="w-100 h-70 mb-2">
      <h1 class="text-primary font-bold text-sm md:text-lg mb-7 drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)]">Transaction successful! Your payment has been received</h1>
      <div class="flex justify-center">
        <a href="#" class="w-[50%] text-white text-center bg-primary py-2 rounded-sm">Homepage</a>
      </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
  </section>
</x-user-layout>