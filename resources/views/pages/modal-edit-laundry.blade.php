<!-- Modal -->
<div id="modalEditLaundry"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Laundry Edit Form"></x-modal-header>

        @php
            if (old('id')) {
                $laundry = DB::table('laundry')
                    ->join('item_types', 'laundry.item_id', '=', 'item_types.id')
                    ->select('laundry.*', 'item_types.image_item', 'item_types.price_item')
                    ->where('laundry.id', old('id'))
                    ->first();
            }
        @endphp

        <div class="modal-data overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">
                {{ $laundry?->name_laundry ?? 'Laundry Edit' }}</h2>

            <form action="{{ route('laundry-admin.update') }}" method="post" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ old('id') }}">
                <input type="hidden" name="type" value="{{ old('type') }}">
                <div>
                    <label class="text-sm font-bold text-primary">Order Information</label>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex flex-col items-center relative">
                            <img src="{{ Storage::url($laundry?->image_item ?? '') }}" alt="bedding">
                            <p class="text-primary text-xs font-bold mt-2 absolute bottom-0 start-0 bg-secondary px-2 py-1"
                                id="price-item" data-price="{{ $laundry?->price_item ?? '' }}">
                                {{ 'Rp ' . number_format($laundry?->price_item ?? 0, 2, ',', '.') }}
                            </p>
                        </div>
                        <div class="flex flex-col justify-between">
                            <input type="number" name="amount" id="amount"
                                class="bg-secondary text-primary placeholder:text-primary px-4 py-2 w-full rounded-md outline-0"
                                placeholder="Enter amount item" value="{{ old('amount') ?? '0' }}"
                                oninput="updatePriceTotal(this.value)">
                            @error('amount')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <input type="text" name="price-total" id="price-total-laundry-edit" readonly
                                class="bg-secondary text-primary placeholder:text-primary px-4 py-2 w-full rounded-md outline-0"
                                placeholder="Rp 0.00" value="{{ old('price-total') ?? 'Rp 0.00' }}">
                            @error('price-total')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <input type="text" name="status-transaction" id="status-transaction" disabled readonly
                                class="bg-secondary text-primary placeholder:text-primary px-4 py-2 w-full rounded-md outline-0" value="{{ $laundry?->status_transaction ?? '' }}">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-bold text-primary">Retrieval Method</label>

                    <div class="relative inline-block w-full">
                        <select name="retrieval-method" id="retrieval-method" onchange="toggleAddressFields(this.value)"
                            class="appearance-none bg-secondary font-bold rounded-sm text-primary py-2 pl-3 w-full outline-0">
                            <option value="delivery" class="text-primary" @selected(old('retrieval-method') === 'delivery')>Delivery</option>
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
                        <div class="w-full mt-3">
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        </div>
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-2">
                    <label for="address" class="text-sm font-bold text-primary">Address Information</label>
                    <div class="flex items-start gap-2 bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-4 mt-1" viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                        </svg>
                        <input type="text" name="address" id="address" placeholder="Address"
                            class="bg-transparent focus:outline-none w-full placeholder:text-primary"\
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
                        <input type="text" name="destination" id="destination" placeholder="Destination"
                            class="bg-transparent focus:outline-none w-full placeholder:text-primary"
                            value="{{ old('destination') }}" />
                    </div>
                    @error('destination')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="notes" class="text-sm font-bold text-primary mb-1">Notes</label>
                    <textarea name="notes" id="note" placeholder="Enter notes"
                        class="bg-secondary text-primary placeholder:text-primary px-4 py-2 w-full h-32 rounded-md resize-none outline-none text-sm">{{ old('note') ?? '' }}</textarea>
                </div>

                <div class="relative inline-block w-full">
                    <select name="status" id="status"
                        class="appearance-none bg-secondary font-bold rounded-sm text-primary py-2 pl-3 w-full outline-0">
                        <option value="" selected disabled>Laundry status</option>
                        <option value="pending" class="text-primary" @selected(old('status') == 'pending')>Pending</option>
                        <option value="process" class="text-primary" @selected(old('status') == 'process')>Process</option>
                        <option value="completed" class="text-primary" @selected(old('status') == 'completed')>Completed</option>
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                        </svg>
                    </div>
                </div>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class="flex flex-col">
                    <label for="estimation" class="text-sm font-bold text-primary mb-1">Estimation</label>
                    <input type="date" name="estimation" id="estimation"
                        class="bg-secondary text-primary placeholder:text-primary px-4 py-2 w-full rounded-md outline-0"
                        placeholder="Enter estimation" value="{{ old('estimation') }}">
                    @error('estimation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative inline-block w-full mb-0">
                    <div>
                        <label for="status-report" class="text-sm font-bold text-primary mb-1">Status Report</label>
                        <select name="status-report" id="status-report"
                            class="appearance-none bg-secondary font-bold rounded-sm text-primary py-2 pl-3 w-full outline-0">
                            <option value="" selected disabled class="text-primary">Choose status</option>
                            <option value="normal" class="text-primary" @selected(old('status-report') == 'normal')>Normal</option>
                            <option value="deleted" class="text-primary" @selected(old('status-report') == 'deleted')>Deleted</option>
                        </select>
                    </div>

                    <div class="pointer-events-none absolute bottom-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                        </svg>
                    </div>
                </div>
                @error('status-report')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class=" flex gap-2 bg-white mt-3">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Save"></x-submit-modal-btn>
                </div>
            </form>
        </div>

    </div>
</div>
