<!-- Modal -->
<div id="modalAddLaundry"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Add Laundry"></x-modal-header>

        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Laundry Service Form</h2>

            <form action="{{ route('laundry-admin.add') }}" method="post" class="space-y-4" id="laundryAdminForm">
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
                                        <div class="w-40 relative item-container">
                                            <input
                                                type="checkbox"
                                                name="selected_types[]"
                                                id="item_{{ $itemType->id }}"
                                                value="{{ $itemType->name_item }}"
                                                class="peer hidden item-checkbox"
                                                data-price="{{ $itemType->price_item }}"
                                                data-name="{{ $itemType->name_item }}"
                                                {{ in_array($itemType->name_item, old('selected_types', [])) ? 'checked' : '' }} />
                                            <label
                                                for="item_{{ $itemType->id }}"
                                                class="block px-8 py-6 peer-checked:outline peer-checked:outline-2 peer-checked:outline-primary bg-secondary text-primary rounded-sm overflow-hidden shadow hover:shadow-lg transition cursor-pointer">
                                                <h1
                                                    class="md:text-lg lg:text-xl text-center font-bold">
                                                    {{ $itemType->name_item }}
                                                </h1>
                                                <span class="absolute top-0 right-0 text-xs font-bold text-primary p-1">
                                                    {{ Str::formatCurrency($itemType?->price_item) }}
                                                </span>
                                            </label>

                                            <!-- Amount input that appears when item is selected -->
                                            <div class="amount-input mt-2 {{ in_array($itemType->name_item, old('selected_types', [])) ? 'block' : 'hidden' }}">
                                                <div class="flex items-center bg-secondary rounded-sm">
                                                    <span class="text-primary font-semibold px-2 text-xs">Qty:</span>
                                                    <input type="number" name="amounts[{{ $itemType->name_item }}]"
                                                        class="w-full bg-secondary text-primary py-1 px-2 outline-none text-sm"
                                                        placeholder="Amount" min="1"
                                                        value="{{ old('amounts.' . $itemType->name_item, 1) }}">
                                                </div>
                                                @error('amounts.' . $itemType->name_item)
                                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @error('selected_types')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Selected Items Summary -->
                <div class="bg-secondary rounded-md p-3 mt-4">
                    <h3 class="text-sm font-bold text-primary mb-2">Selected Items:</h3>
                    <div id="selectedItemsList" class="space-y-2 max-h-32 overflow-y-auto">
                        <!-- Selected items will be displayed here via JavaScript -->
                        <p class="text-gray-500 italic text-sm" id="noItemsSelected">No items selected</p>
                    </div>

                    <div class="mt-3 pt-2 border-t border-gray-200">
                        <div class="flex justify-between font-bold text-primary">
                            <span>Total:</span>
                            <span id="totalDisplay">Rp 0,00</span>
                        </div>
                    </div>
                    <input type="hidden" name="total_price" id="totalPriceInput" value="{{ old('total_price', 0) }}">
                </div>

                <div class="mb-5">
                    <label class="text-sm font-bold text-primary">Retrieval Method</label>
                    <div class="relative inline-block w-full">
                        <select name="retrieval-method" id="retrievalMethod"
                            class="appearance-none bg-secondary font-bold rounded-sm text-primary py-2 pl-3 w-full outline-0">
                            <option value="" disabled selected class="text-primary">Retrieval Method</option>
                            <option value="delivery" class="text-primary" @selected(old('retrieval-method') === 'delivery')>Delivery</option>
                            <option value="take_away" class="text-primary" @selected(old('retrieval-method') === 'take_away')>Take Away</option>
                        </select>

                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                            </svg>
                        </div>
                    </div>
                    @error('retrieval-method')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-2" id="addressBox" style="{{ old('retrieval-method') === 'delivery' ? '' : 'display: none;' }}">
                    <label class="text-sm font-bold text-primary">Address</label>
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
                        <input type="text" name="destination" placeholder="Destination"
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
                        class="bg-secondary text-primary placeholder:text-primary px-4 py-2 w-full h-32 rounded-md resize-none outline-none text-sm">{{ old('notes') }}</textarea>
                </div>

                <div class="flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Submit"></x-submit-modal-btn>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addressBox = document.getElementById('addressBox');
        const retrievalMethod = document.getElementById('retrievalMethod');
        const itemCheckboxes = document.querySelectorAll('.item-checkbox');
        const selectedItemsList = document.getElementById('selectedItemsList');
        const noItemsSelected = document.getElementById('noItemsSelected');
        const totalDisplay = document.getElementById('totalDisplay');
        const totalPriceInput = document.getElementById('totalPriceInput');
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
                    itemRow.className = 'flex justify-between items-center text-sm';
                    itemRow.innerHTML = `
                        <div>
                            <span class="font-medium">${itemName}</span>
                            <span class="text-gray-600 text-xs ml-1">(${quantity} × ${formatRupiah(itemPrice)})</span>
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
                deliveryRow.className = 'flex justify-between items-center text-sm text-primary';
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

        // Toggle address box when retrieval method changes
        retrievalMethod.addEventListener('change', function() {
            if (this.value === 'delivery') {
                addressBox.style.display = 'grid';
            } else {
                addressBox.style.display = 'none';
            }

            calculateTotal();
        });

        // Initialize total calculation
        calculateTotal();

        // Modal functionality
        const modal = document.getElementById('modalAddLaundry');
        const closeButtons = document.querySelectorAll('.close-modal-btn');

        // Close modal when clicking close buttons
        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                modal.classList.add('opacity-0');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            });
        });

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.add('opacity-0');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        });
    });
</script>
