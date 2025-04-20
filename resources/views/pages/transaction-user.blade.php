<x-user-layout>
    {{-- transaction --}}
  <section class="h-full relative py-24">

    <div class="px-[5%]">
      <h1 class="text-center text-xl md:text-2xl lg:text-4xl text-primary font-bold drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)] mb-15">Transaction {{ $serviceType . ' #' . ($transaction?->name_ironing ?? $transaction?->name_laundry) }}</h1>

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
          <div>
            <input type="radio" name="payment_method" value="debit" id="debit" class="peer hidden" />
            <label for="debit"
              class="block peer-checked:outline peer-checked:outline-2 peer-checked:outline-primary bg-secondary text-primary p-2 rounded-sm overflow-hidden shadow hover:shadow-lg transition cursor-pointer">
              <h1 class="md:text-lg lg:text-xl text-center">Debit</h1>
              <div class="flex flex-col items-center p-2">
                <img src="{{ asset('img/debit.svg') }}" alt="debit"
                  class="w-20 h-20 md:w-30 md:h-30 lg:w-40 lg:h-40" />
              </div>
            </label>
          </div>
        
          <div>
            <input type="radio" name="payment_method" value="cash" id="cash" class="peer hidden" />
            <label for="cash"
              class="block peer-checked:outline peer-checked:outline-2 peer-checked:outline-primary bg-secondary text-primary p-2 rounded-sm overflow-hidden shadow hover:shadow-lg transition cursor-pointer">
              <h1 class="md:text-lg lg:text-xl text-center">Cash</h1>
              <div class="flex flex-col items-center p-2">
                <img src="{{ asset('img/cash.svg') }}" alt="cash"
                  class="w-20 h-20 md:w-30 md:h-30 lg:w-40 lg:h-40" />
              </div>
            </label>
          </div>
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

  </section>
</x-user-layout>