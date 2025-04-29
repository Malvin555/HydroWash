<x-user-layout>

    {{-- laundry service --}}
    <section class="h-full relative py-24">

        <div class="px-[5%]">
            <h1
                class="text-center text-2xl md:text-4xl text-primary font-bold drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)] mb-5">
                Laundry Service</h1>
            <form action="{{ route('laundry') }}" method="post">
                @csrf

                <h1 class="font-bold">Select Type : </h1>
                <div class="flex gap-4 w-full overflow-x-auto scrollbar-hide">

                    @if ($itemTypes->isnotEmpty())
                        @foreach ($itemTypes as $item)
                            <label
                                class="cursor-pointer flex-shrink-0  transition-all duration-150 border-4 rounded-lg
                                    {{ old('type') === Str::lower($item->name_item) ? 'border-primary' : 'border-transparent' }}">
                                <div class="bg-cover bg-center rounded-sm h-40 flex items-end w-60 relative price-box"
                                    style="background-image: url('{{ $item->image_item ? Storage::url($item->image_item) : asset('img/transaction-img.png') }}')">
                                    <div
                                        class="absolute top-2 right-2 bg-black bg-opacity-50 text-white text-xs font-bold px-2 py-1 rounded-sm">
                                        Rp {{ number_format($item->price_item, 2, ',', '.') }}
                                    </div>
                                    <div class="flex items-center p-2">
                                        <input type="radio" name="type"
                                            value="{{ Str::lower($item->name_item) ?? old('type') }}"
                                            data-price="{{ $item->price_item }}" 
                                            @checked(old('type') === Str::lower($item->name_item)) />
                                        <span
                                            class="text-sm text-white font-medium">{{ Str::title($item->name_item) }}</span>
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    @else
                        <div class="w-60 h-40 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 border-4 border-dashed">
                            <span class="text-sm font-medium">No items available</span>
                        </div>
                    @endif

                </div>
                @error('type')
                    <p class="text-sm mt-1 text-red-600">{{ $message }}</p>
                @enderror

                <div class="w-full mt-5 flex flex-row gap-2 mb-5">
                    <div class="w-full sm:w-1/2">
                        <label for="amount" class="block mb-1 text-primary font-semibold">Amount:</label>
                        <input type="number" id="amount" name="amount"
                            class="w-full bg-secondary text-primary rounded-sm py-2 px-3 placeholder:text-primary outline-none focus:ring-2 focus:ring-white"
                            placeholder="Amount item" 
                            value="{{ old('amount') }}" 
                            @disabled(!$errors->any()) >
                        @error('amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full sm:w-1/2">
                        <label class="block mb-1 text-primary font-semibold">Total:</label>
                        <input type="text" name="price-total" readonly value="{{ old('price-total') ?? 'Rp 0.00' }}"
                            class="w-full bg-secondary text-primary rounded-sm py-2 px-3 outline-none" />
                        @error('price-total')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-full mb-5">
                    <div class="relative inline-block w-full">
                        <select class="appearance-none bg-secondary font-bold rounded-sm py-2 pl-3 w-full"
                            name="retrieval-method">
                            <option value="" disabled selected>Retrieval Method</option>
                            <option value="delivery" @selected(old('retrieval-method') === 'delivery')>Delivery</option>
                            <option value="take_away" @selected(old('retrieval-method') === 'take_away')>Take Away</option>
                        </select>
                        @error('retrieval-method')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex items-start gap-2 mb-3 delivery-address-box">
                    <div class="pt-2">
                        <svg class="w-8 h-8 text-[#194655]" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 576 512">
                            <path
                                d="M541 229.16L512 204.28V96a16 16 0 0 0-16-16h-64a16 16 0 0 0-16 16v51.72L314.45 43.17c-13.8-12.41-35.1-12.4-48.9 0L35 229.16a12 12 0 0 0-1.6 17l25.5 28.3a12 12 0 0 0 17 1.6l27.1-24.3V464a48 48 0 0 0 48 48h112V336a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v176h112a48 48 0 0 0 48-48V251.76l27.1 24.3a12 12 0 0 0 17-1.6l25.5-28.3a12 12 0 0 0-1.6-17z" />
                        </svg>
                    </div>

                    <div class="flex flex-col w-full">
                        <div class="grid grid-cols-2 items-center gap-2">

                            <div class="block w-full">
                                <input type="text" name="address" placeholder="Address"
                                    class="bg-secondary text-primary placeholder-primary rounded-sm px-3 py-2 w-full outline-none"
                                    value="{{ old('address') }}" />
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="block w-full">
                                <div class="flex items-center gap-3">
                                    <span class="text-[#194655] font-bold">to:</span>
                                    <input type="text" name="destination" placeholder="Destination"
                                        class="bg-secondary text-primary placeholder-primary rounded-sm px-3 py-2 w-full outline-none"
                                        value="{{ old('destination') }}" />
                                </div>
                                @error('destination')
                                    <p class="mt-1 ml-8 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                <div class="flex gap-1 mb-3 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                    <p class="text-[.8rem]">Choosing Delivery will cost you RP. 20.000.00</p>
                </div>

                <div class="w-full mb-5">
                    <label for="note" class="font-bold">Note : </label>
                    <textarea name="notes" id="note" rows="10" class="w-full bg-secondary rounded-sm p-2"
                        placeholder="Leave your notes here...">{{ old('note') ?? '' }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-primary py-2 cursor-pointer text-white font-bold text-lg rounded-sm">Submit</button>
            </form>
        </div>

        <div
            class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-0 pointer-events-none">
        </div>
    </section>
</x-user-layout>
