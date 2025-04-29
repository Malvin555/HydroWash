<!-- Modal -->
<div id="modalTransaction"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Pay Transaction"></x-modal-header>

        <div class="modal-data overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Pay {{ old('service-type') }}</h2>

            <form action="{{ route('transaction-admin.add') }}" method="post" class="space-y-4">
                @csrf

                <input type="hidden" name="service-type" value="{{ old('service-type') }}">
                <div>
                    <label class="text-sm font-bold text-primary">Detail</label>
                    <div>
                        @php
                            $imageItem = null;
                            if (old('service-type') && str_contains(old('service-type'), 'Laundry')) {
                                $imageItem = DB::table('laundry')
                                    ->join('item_types', 'laundry.item_id', '=', 'item_types.id')
                                    ->where('name_laundry', old('service-type'))
                                    ->value('item_types.image_item');
                            } elseif (old('service-type') && str_contains(old('service-type'), 'Ironing')) {
                                $imageItem = DB::table('ironing')
                                    ->join('item_types', 'ironing.item_id', '=', 'item_types.id')
                                    ->where('name_ironing', old('service-type'))
                                    ->value('item_types.image_item');
                            }
                        @endphp

                        <img src="{{ Storage::url($imageItem) ?? '' }}" alt="{{ old('service-type') }}"
                            class="rounded-md w-full h-75 my-4">
                        <input type="text" id="amount" disabled
                            class="bg-secondary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0 text-primary font-bold"
                            placeholder="12pcs (Rp 12.000.00)">
                    </div>
                    @error('service-type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="method" class="block text-sm font-bold text-primary mb-4">Transaction Method</label>
                    <div class="relative inline-block w-full">
                        <select name="payment-method" id="payment-method"
                            class="appearance-none bg-secondary font-bold rounded-sm text-primary py-2 pl-3 w-full outline-0">
                            <option value="" disabled selected class="text-primary">Choose Method
                            </option>
                            <option value="debit" class="text-primary" @selected(old('payment-method') == 'debit')>Debit</option>
                            <option value="cash" class="text-primary" @selected(old('payment-method') == 'cash')>Cash</option>
                        </select>

                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                            </svg>
                        </div>
                    </div>
                    @error('payment-method')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-4 gap-2 items-center" id="debitBox">
                    <div class="col-span-1 md:col-span-1 inline-block w-full">
                        <div class="flex flex-col justify-center relative items-center">
                            <select
                                class="appearance-none bg-secondary text-primary placeholder:text-primary placeholder:font-bold font-bold rounded-sm py-2 pl-3 w-full"
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

                    <div class="col-span-3">
                        <input type="text"
                            class="bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0"
                            placeholder="Credit Card Number" name="card-number" value="{{ old('card-number') }}">
                        @error('card-number')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="text"
                        class="col-span-4 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0"
                        placeholder="Postal Code" name="postal-code" value="{{ old('postal-code') }}">
                    @error('postal-code')
                        <p class="mt-1 text-sm col-span-4 text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class=" flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Pay"></x-submit-modal-btn>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const debitBox = document.getElementById('debitBox');

    document.addEventListener('click', (e) => {
        if (e.target.closest('select[name="payment-method"]')) {
            const paymentMethod = e.target.closest('select[name="payment-method"]');
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
