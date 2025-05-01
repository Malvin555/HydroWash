<x-user-layout>
    {{-- laundry service --}}
    <section class="h-full relative py-24">
        <div class="px-[5%]">
            <h1
                class="text-center text-2xl md:text-4xl text-primary font-bold drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)] mb-5">
                Ironing Service</h1>
            <form action="{{ route('ironing') }}" method="post">
                @csrf

                <h1 class="font-bold">Select Type : </h1>
                <div class="flex gap-4 w-full overflow-x-auto scrollbar-hide pb-2 mb-4">
                    @if ($itemTypes->isnotEmpty())
                    @foreach ($itemTypes as $item)
                    <div class="item-container flex-shrink-0">
                        <label class="cursor-pointer transition-all duration-150 border-4 rounded-lg block
                                    {{ in_array(Str::lower($item->name_item), old('selected_types', [])) ? 'border-primary' : 'border-transparent' }}"
                            for="item_{{ $item->id }}">
                            <div class="bg-cover bg-center rounded-sm h-40 flex items-end w-60 relative price-box"
                                style="background-image: url('{{ $item->image_item ? Storage::url($item->image_item) : asset('img/transaction-img.png') }}')">
                                <div class="absolute top-2 right-2 bg-black bg-opacity-50 text-white text-xs font-bold px-2 py-1 rounded-sm">
                                    Rp {{ number_format($item->price_item, 2, ',', '.') }}
                                </div>
                                <div class="flex items-center p-2 w-full justify-between bg-black bg-opacity-50">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="item_{{ $item->id }}" name="selected_types[]"
                                            value="{{ Str::lower($item->name_item) }}"
                                            data-price="{{ $item->price_item }}"
                                            data-name="{{ Str::title($item->name_item) }}"
                                            class="item-checkbox mr-2"
                                            {{ in_array(Str::lower($item->name_item), old('selected_types', [])) ? 'checked' : '' }}>
                                        <span class="text-sm text-white font-medium">{{ Str::title($item->name_item) }}</span>
                                    </div>
                                </div>
                            </div>
                        </label>

                        <!-- Amount input that appears when item is selected -->
                        <div class="amount-input mt-2 {{ in_array(Str::lower($item->name_item), old('selected_types', [])) ? 'block' : 'hidden' }}">
                            <div class="flex items-center bg-secondary rounded-sm">
                                <span class="text-primary font-semibold px-3">Qty:</span>
                                <input type="number" name="amounts[{{ Str::lower($item->name_item) }}]"
                                    class="w-full bg-secondary text-primary py-2 px-3 outline-none"
                                    placeholder="Amount" min="1"
                                    value="{{ old('amounts.' . Str::lower($item->name_item), 1) }}">
                            </div>
                            @error('amounts.' . Str::lower($item->name_item))
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="w-60 h-40 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 border-4 border-dashed">
                        <span class="text-sm font-medium">No items available</span>
                    </div>
                    @endif
                </div>

                @error('selected_types')
                <p class="text-sm mt-1 text-red-600">{{ $message }}</p>
                @enderror

                <!-- Selected Items Summary -->
                <div class="w-full bg-white bg-opacity-80 rounded-lg p-4 mb-5 shadow-sm" id="selectedItemsSummary">
                    <h2 class="font-bold text-primary mb-2">Selected Items:</h2>
                    <div id="selectedItemsList" class="space-y-2">
                        <!-- Selected items will be displayed here via JavaScript -->
                        <p class="text-gray-500 italic" id="noItemsSelected">No items selected</p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-gray-200">
                        <div class="flex justify-between font-bold">
                            <span>Total:</span>
                            <span id="totalDisplay" class="text-primary">Rp 0,00</span>
                        </div>
                    </div>
                    <input type="hidden" name="total_price" id="totalPriceInput" value="{{ old('total_price', 0) }}">
                </div>

                <div class="w-full mb-5">
                    <div class="relative inline-block w-full">
                        <select class="appearance-none bg-secondary font-bold rounded-sm py-2 pl-3 w-full"
                            name="retrieval-method" id="retrievalMethod">
                            <option value="" disabled selected>Retrieval Method</option>
                            <option value="delivery" @selected(old('retrieval-method')==='delivery' )>Delivery</option>
                            <option value="take_away" @selected(old('retrieval-method')==='take_away' )>Take Away</option>
                        </select>
                        @error('retrieval-method')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex items-start gap-2 mb-3 delivery-address-box" id="deliveryAddressBox"
                    style="{{ old('retrieval-method') === 'delivery' ? '' : 'display: none;' }}">
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

                <div class="flex gap-1 mb-3 text-primary" id="deliveryNoteBox"
                    style="{{ old('retrieval-method') === 'delivery' ? '' : 'display: none;' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 512 512">
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                    </svg>
                    <p class="text-[.8rem]">Choosing Delivery will cost you RP. 20.000.00</p>
                </div>

                <div class="w-full mb-5">
                    <label for="note" class="font-bold">Note : </label>
                    <textarea name="notes" id="note" rows="5" class="w-full bg-secondary rounded-sm p-2"
                        placeholder="Leave your notes here...">{{ old('notes') ?? '' }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-primary py-2 cursor-pointer text-white font-bold text-lg rounded-sm">Submit</button>
            </form>
        </div>

        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-0 pointer-events-none">
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const itemCheckboxes = document.querySelectorAll('.item-checkbox');
            const selectedItemsList = document.getElementById('selectedItemsList');
            const noItemsSelected = document.getElementById('noItemsSelected');
            const totalDisplay = document.getElementById('totalDisplay');
            const totalPriceInput = document.getElementById('totalPriceInput');
            const retrievalMethod = document.getElementById('retrievalMethod');
            const deliveryAddressBox = document.getElementById('deliveryAddressBox');
            const deliveryNoteBox = document.getElementById('deliveryNoteBox');
            const deliveryFee = 20000; // Rp 20,000.00

            // Format number to Indonesian Rupiah
            function formatRupiah(number) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 2
                }).format(number).replace('IDR', 'Rp');
            }

            // Calculate total price
            function calculateTotal() {
                let total = 0;
                let hasSelectedItems = false;

                // Clear the selected items list
                while (selectedItemsList.firstChild) {
                    selectedItemsList.removeChild(selectedItemsList.firstChild);
                }

                // Add each selected item to the list and calculate total
                itemCheckboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        hasSelectedItems = true;
                        const itemName = checkbox.dataset.name;
                        const itemPrice = parseFloat(checkbox.dataset.price);
                        const itemValue = checkbox.value;
                        const amountInput = document.querySelector(`input[name="amounts[${itemValue}]"]`);
                        const quantity = parseInt(amountInput.value) || 1;
                        const itemTotal = itemPrice * quantity;

                        total += itemTotal;

                        // Create item row in summary
                        const itemRow = document.createElement('div');
                        itemRow.className = 'flex justify-between items-center';
                        itemRow.innerHTML = `
                            <div>
                                <span class="font-medium">${itemName}</span>
                                <span class="text-gray-600 text-sm ml-2">(${quantity} × ${formatRupiah(itemPrice)})</span>
                            </div>
                            <span>${formatRupiah(itemTotal)}</span>
                        `;
                        selectedItemsList.appendChild(itemRow);
                    }
                });

                // Add delivery fee if delivery is selected
                if (retrievalMethod.value === 'delivery') {
                    total += deliveryFee;

                    // Add delivery fee row
                    const deliveryRow = document.createElement('div');
                    deliveryRow.className = 'flex justify-between items-center text-primary';
                    deliveryRow.innerHTML = `
                        <span class="font-medium">Delivery Fee</span>
                        <span>${formatRupiah(deliveryFee)}</span>
                    `;
                    selectedItemsList.appendChild(deliveryRow);
                }

                // Show "No items selected" if no items are selected
                if (!hasSelectedItems) {
                    selectedItemsList.appendChild(noItemsSelected);
                } else {
                    // If noItemsSelected is in the DOM, remove it
                    if (selectedItemsList.contains(noItemsSelected)) {
                        selectedItemsList.removeChild(noItemsSelected);
                    }
                }

                // Update total display and hidden input
                totalDisplay.textContent = formatRupiah(total);
                totalPriceInput.value = total;
            }

            // Toggle amount input visibility when checkbox is clicked
            itemCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const container = this.closest('.item-container');
                    const amountInput = container.querySelector('.amount-input');

                    if (this.checked) {
                        amountInput.classList.remove('hidden');
                        amountInput.classList.add('block');
                    } else {
                        amountInput.classList.remove('block');
                        amountInput.classList.add('hidden');
                    }

                    calculateTotal();
                });

                // Initialize amount inputs for checked items
                if (checkbox.checked) {
                    const container = checkbox.closest('.item-container');
                    const amountInput = container.querySelector('.amount-input');
                    amountInput.classList.remove('hidden');
                    amountInput.classList.add('block');
                }
            });

            // Listen for changes in amount inputs
            document.querySelectorAll('input[name^="amounts["]').forEach(input => {
                input.addEventListener('input', calculateTotal);
            });

            // Toggle delivery address box when retrieval method changes
            retrievalMethod.addEventListener('change', function() {
                if (this.value === 'delivery') {
                    deliveryAddressBox.style.display = 'flex';
                    deliveryNoteBox.style.display = 'flex';
                } else {
                    deliveryAddressBox.style.display = 'none';
                    deliveryNoteBox.style.display = 'none';
                }

                calculateTotal();
            });

            // Initialize total calculation
            calculateTotal();
        });
    </script>
</x-user-layout>