<x-user-layout>
    {{-- transaction --}}
    <section class="h-full relative py-24">

        <div class="px-[5%]">
            <x-back-to-home></x-back-to-home>

            <div class="flex justify-between items-center mb-8 mt-5 px-4">
                <div class="flex flex-col items-center">
                    <div class="bg-primary text-white rounded-full h-8 w-8 flex items-center justify-center">
                        <span>1</span>
                    </div>
                    <span class="text-xs mt-1 text-gray-600">Order</span>
                </div>
                <div class="h-1 flex-1 bg-primary mx-2"></div>
                <div class="flex flex-col items-center">
                    <div class="bg-primary text-white rounded-full h-8 w-8 flex items-center justify-center">
                        <span>2</span>
                    </div>
                    <span class="text-xs mt-1 text-gray-600">Payment</span>
                </div>
                <div class="h-1 flex-1 bg-gray-300 mx-2"></div>
                <div class="flex flex-col items-center">
                    <div class="bg-gray-300 text-gray-600 rounded-full h-8 w-8 flex items-center justify-center">
                        <span>3</span>
                    </div>
                    <span class="text-xs mt-1 text-gray-600">Complete</span>
                </div>
            </div>
            <h1
                class="text-center text-xl md:text-2xl lg:text-4xl text-primary font-bold drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)] mb-15">
                Transaction {{ $transaction?->name_ironing ?? $transaction?->name_laundry }}</h1>

            <form action="{{ route('transaction.add') }}" method="post">
                @csrf

                <input type="hidden" name="service-type"
                    value="{{ $transaction?->name_ironing ?? ($transaction?->name_laundry ?? old('service-type')) }}">
                <div class="grid grid-cols-1 gap-2 mb-5 ">
                    <div class=" bg-secondary rounded-sm flex justify-center w-full h-50 max-h-50">
                        <img src="{{ Storage::url($transaction?->itemType?->image_item) }}"
                            alt="transaction" class="w-full h-full">
                    </div>
                    @error('service-type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <div class="h-full">
                        @if ($transaction->retrieval_method === 'delivery')
                            <div class="grid grid-cols-2 gap-2 mb-10">
                                <div>
                                    <label for="address-taking" class="text-sm font-bold">Address Taking : </label>
                                    <input type="text" disabled id="address-taking"
                                        value="{{ $transaction->address_taking ?? old('address-taking') }}"
                                        name="address-taking"
                                        class="w-full p-2 bg-secondary rounded-sm text-primary h-full">
                                    @error('address-taking')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="address-taking" class="text-sm font-bold">Address Delivery :</label>
                                    <input type="text" disabled id="address-delivery"
                                        value="{{ $transaction->address_delivery ?? old('address-delivery') }}"
                                        name="address-delivery"
                                        class="w-full p-2 bg-secondary rounded-sm text-primary h-full">
                                    @error('address-delivery')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <div class="grid grid-cols-2 gap-2">
                            <input type="text" disabled id="amount-item" name="amount-item"
                                class="w-full bg-secondary p-2 rounded-sm text-primary h-full"
                                value="{{ $transaction->amount_item ?? old('amount-item') }}">
                            <input type="text" disabled id="retrieval-method" name="retrieval_method"
                                class="w-full bg-secondary p-2 rounded-sm text-primary h-full"
                                value="{{ $transaction->retrieval_method ?? old('retrieval-method') }}">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <input type="radio" name="payment-method" value="debit" id="debit" class="peer hidden"
                            @checked(old('payment-method') == 'debit') />
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
                        <input type="radio" name="payment-method" value="cash" id="cash" class="peer hidden"
                            @checked(old('payment-method') == 'cash') />
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
                @error('payment-method')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class="grid grid-cols-14 md:grid-cols-10 gap-3 items-center mt-5" id="debitBox">
                    <div class="col-span-4 md:col-span-1 inline-block w-full">
                        <div class="flex flex-col justify-center relative items-center">
                            <select class="appearance-none bg-secondary font-bold rounded-sm py-2 pl-3 w-full"
                                name="bank-name">
                                <option value="card" @selected(old('bank-name') == 'card')>Card</option>
                                <option value="visa" @selected(old('bank-name') == 'visa')>Visa</option>
                                <option value="dll" @selected(old('bank-name') == 'dll')>DLL</option>
                            </select>

                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                                </svg>
                            </div>
                        </div>
                        @error('bank-name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-span-6 md:col-span-7">
                        <input type="text" id="card-number" name="card-number" placeholder="Card Number"
                            class="text-primary bg-secondary w-full p-2 rounded-sm outline-0"
                            value="{{ old('card-number') }}">
                        @error('card-number')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-4 md:col-span-2">
                        <input type="text" id="postal-code" name="postal-code" placeholder="Postal code"
                            class="text-primary bg-secondary w-full p-2 rounded-sm outline-0"
                            value="{{ old('postal-code') }}">
                        @error('postal-code')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="mt-5 w-full bg-primary rounded-sm cursor-pointer text-white py-2">Pay (
                    Rp
                    {{ number_format($transaction->price_ironing ?? $transaction->price_laundry, 2, ',', '.') }}
                    )</button>
            </form>

            <div
                class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-0 pointer-events-none">
            </div>
        </div>

    </section>
    <script>
        const debitBox = document.getElementById('debitBox');

        document.addEventListener('click', (e) => {
            if (e.target.closest('input[name="payment-method"]')) {
                const paymentMethod = e.target.closest('input[name="payment-method"]');
                if (paymentMethod.value === 'cash') {
                    debitBox.classList.remove('grid');
                    debitBox.classList.add('hidden');
                } else {
                    debitBox.classList.remove('hidden');
                    debitBox.classList.add('grid');
                }
            }
        })
    </script>
</x-user-layout>
