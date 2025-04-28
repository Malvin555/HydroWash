<!-- Modal -->
<div id="modalAddLaundry"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Add Laundry"></x-modal-header>


        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Laundry Service Form</h2>

            <form action="{{ route('laundry-admin.add') }}" method="post" class="space-y-4">
                @csrf

                <div>
                    @php
                        $itemTypes = DB::table('item_types')
                            ->where('role', 'laundry')
                            ->select('id', 'name_item', 'price_item')
                            ->get();
                    @endphp
                    <label class="text-sm font-bold text-primary">Choose Item Types ({{ count($itemTypes) }})</label>

                    <div class="overflow-x-auto py-4 px-2 scrollbar-hide">
                        <div class="flex gap-5" style="width: max-content;">
                            @foreach ($itemTypes->chunk(4) as $chunk)
                                <div class="grid grid-cols-2 gap-3 min-w-[300px]">
                                    @foreach ($chunk as $itemType)
                                        <div class="w-40 relative">
                                            <input 
                                                type="radio" 
                                                name="type" 
                                                id="{{ $itemType->id }}"
                                                value="{{ $itemType->name_item }}" 
                                                class="peer hidden"
                                                data-price="{{ $itemType->price_item }}"
                                                @checked(old('type') === $itemType->name_item) />
                                            <label 
                                                for="{{ $itemType->id }}"
                                                class="block px-8  py-6 peer-checked:outline peer-checked:outline-2 peer-checked:outline-primary bg-secondary text-primary rounded-sm overflow-hidden shadow hover:shadow-lg transition cursor-pointer">
                                                <h1 
                                                    class="md:text-lg lg:text-xl text-center font-bold">
                                                    {{ $itemType->name_item }}
                                                </h1>
                                                <span class="absolute top-0 right-0 text-xs font-bold text-primary">
                                                    Rp {{ number_format($itemType?->price_item, 2, ',', '.') }}
                                                </span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-5">
                    <label class="text-sm font-bold text-primary">Fill Field</label>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <input type="number" name="amount" placeholder="Enter amount item"
                                class="bg-secondary text-primary placeholder:text-primary  px-4 py-2 mt-1 rounded-md text-sm outline-0"
                                value="{{ old('amount') }}"
                                @disabled(!$errors->any())>
                            @error('amount')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <input type="text" name="price-total" placeholder="Rp 0.00" readonly
                                class="bg-secondary text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0"
                                value="{{ old('price-total') ?? 'Rp 0.00' }}">
                            @error('price-total')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="relative inline-block col-span-2 w-full">
                            <select name="retrieval-method" id="retrieval-method"
                                class="appearance-none bg-secondary font-bold rounded-sm text-primary py-2 pl-3 w-full outline-0">
                                <option value="" disabled selected class="text-primary">Retrieval Method
                                </option>
                                <option value="delivery" class="text-primary" @selected(old('retrieval-method') === 'delivery')>Delivery
                                </option>
                                <option value="take_away" class="text-primary" @selected(old('retrieval-method') === 'take_away')>Take Away
                                </option>
                            </select>

                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                                </svg>
                            </div>
                        </div>
                        @error('retrieval-method')
                            <div class="w-full col-span-2">
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-2" id="addressBox">
                    <label for="address" class="text-sm font-bold text-primary">Address</label>
                    <div class="flex items-start gap-2 bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-4 mt-1" viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                        </svg>
                        <input type="text" name="address" id="address" placeholder="Address"
                            class="bg-transparent focus:outline-none w-full placeholder:text-primary"
                            value="{{ old('address') }}" />
                    </div>
                    @error('address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="flex items-center gap-2 bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-4" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M320 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM204.5 121.3c-5.4-2.5-11.7-1.9-16.4 1.7l-40.9 30.7c-14.1 10.6-34.2 7.7-44.8-6.4s-7.7-34.2 6.4-44.8l40.9-30.7c23.7-17.8 55.3-21 82.1-8.4l90.4 42.5c29.1 13.7 36.8 51.6 15.2 75.5L299.1 224l97.4 0c30.3 0 53 27.7 47.1 57.4L415.4 422.3c-3.5 17.3-20.3 28.6-37.7 25.1s-28.6-20.3-25.1-37.7L377 288l-70.3 0c8.6 19.6 13.3 41.2 13.3 64c0 88.4-71.6 160-160 160S0 440.4 0 352s71.6-160 160-160c11.1 0 22 1.1 32.4 3.3l54.2-54.2-42.1-19.8zM160 448a96 96 0 1 0 0-192 96 96 0 1 0 0 192z" />
                        </svg>
                        <input type="text" name="destination" id="address" placeholder="Destination"
                            class="bg-transparent focus:outline-none w-full placeholder:text-primary"
                            value="{{ old('destination') }}" />
                    </div>
                    @error('destination')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="notes" class="text-sm font-bold text-primary mb-1">Notes</label>
                    <textarea name="notes" id="notes" placeholder="Notes"
                        class="bg-secondary text-primary placeholder:text-primary px-4 py-2 w-full h-32 rounded-md resize-none outline-none text-sm">{{ old('note') }}</textarea>
                </div>

                <div class=" flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Submit"></x-submit-modal-btn>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const addressBox = document.getElementById('addressBox');
    const retrievalMethod = document.querySelector('select[name="retrieval-method"]');

    retrievalMethod.addEventListener('click', (e) => {
        if (retrievalMethod.value === 'take_away') {
            addressBox.classList.remove('grid');
            addressBox.classList.add('hidden');
        } else {
            addressBox.classList.remove('hidden');
            addressBox.classList.add('grid');
        }
    })
</script>
