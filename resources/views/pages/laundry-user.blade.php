<x-user-layout>
    {{-- Redesigned laundry service --}}
    <section class="min-h-screen py-16 md:py-24 relative bg-gradient-to-b from-white to-[#e6f7f9]">
        <div class="container mx-auto px-4 md:px-6 relative z-10">
            <!-- Header -->
            <div class="mb-10 text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-primary mb-3 drop-shadow-sm">
                    Laundry Service
                </h1>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Select your items, choose your preferences, and we'll take care of the rest.
                </p>
            </div>

            <form action="{{ route('laundry') }}" method="post" class="max-w-5xl mx-auto">
                @csrf
                
                <!-- Service Steps -->
                <div class="flex justify-between mb-10 relative">
                    <div class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-gray-200 -translate-y-1/2 z-0"></div>
                    <div class="flex flex-col md:flex-row justify-between w-full relative z-10">
                        <div class="flex flex-col items-center mb-4 md:mb-0">
                            <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold mb-2">1</div>
                            <span class="text-sm font-medium text-primary">Select Items</span>
                        </div>
                        <div class="flex flex-col items-center mb-4 md:mb-0">
                            <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center font-bold mb-2">2</div>
                            <span class="text-sm font-medium text-gray-600">Delivery Options</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center font-bold mb-2">3</div>
                            <span class="text-sm font-medium text-gray-600">Review & Submit</span>
                        </div>
                    </div>
                </div>

                <!-- Item Selection Section -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-bold text-primary mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Select Your Items
                    </h2>
                    <div class="h-[30rem] max-h-[30rem] p-5 overflow-auto">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                            @if ($itemTypes->isnotEmpty())
                                @foreach ($itemTypes as $item)
                                    <div class="item-container">
                                        <label class="cursor-pointer transition-all duration-200 block h-full">
                                            <div class="border rounded-lg overflow-hidden h-full hover:shadow-md
                                                {{ in_array(Str::lower($item->name_item), old('selected_types', [])) ? 'border-primary ring-2 ring-primary ring-opacity-50' : 'border-gray-200' }}">
                                                <div class="bg-cover bg-center h-40 relative"
                                                    style="background-image: url('{{ $item->image_item ? Storage::url($item->image_item) : asset('img/transaction-img.png') }}')">
                                                    <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">
                                                        Rp {{ number_format($item->price_item, 2, ',', '.') }}
                                                    </div>
                                                </div>
                                                <div class="p-4">
                                                    <div class="flex items-center justify-between mb-2">
                                                        <span class="font-medium text-gray-800">{{ Str::title($item->name_item) }}</span>
                                                        <div class="relative">
                                                            <input type="checkbox" id="item_{{ $item->id }}" name="selected_types[]"
                                                                value="{{ Str::lower($item->name_item) }}"
                                                                data-price="{{ $item->price_item }}"
                                                                data-name="{{ Str::title($item->name_item) }}"
                                                                class="item-checkbox sr-only"
                                                                {{ in_array(Str::lower($item->name_item), old('selected_types', [])) ? 'checked' : '' }}>
                                                            <div class="w-5 h-5 border-2 border-gray-300 rounded-md flex items-center justify-center
                                                                {{ in_array(Str::lower($item->name_item), old('selected_types', [])) ? 'bg-primary border-primary' : '' }}">
                                                                <svg class="w-3 h-3 text-white {{ in_array(Str::lower($item->name_item), old('selected_types', [])) ? 'block' : 'hidden' }}" 
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Amount input -->
                                                    <div class="amount-input mt-3 {{ in_array(Str::lower($item->name_item), old('selected_types', [])) ? 'block' : 'hidden' }}">
                                                        <label class="text-xs text-gray-500 mb-1 block">Quantity</label>
                                                        <div class="flex items-center border border-gray-200 rounded-md">
                                                            <button type="button" class="quantity-btn minus-btn px-3 py-1 text-gray-500 hover:text-primary focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                                                </svg>
                                                            </button>
                                                            <input type="number" name="amounts[{{ Str::lower($item->name_item) }}]"
                                                                class="w-full py-1 px-2 text-center text-gray-700 focus:outline-none"
                                                                min="1" value="{{ old('amounts.' . Str::lower($item->name_item), 1) }}">
                                                            <button type="button" class="quantity-btn plus-btn px-3 py-1 text-gray-500 hover:text-primary focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        @error('amounts.' . Str::lower($item->name_item))
                                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-span-full p-8 rounded-lg bg-gray-50 border-2 border-dashed border-gray-200 flex flex-col items-center justify-center text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                    <span class="text-sm font-medium">No items available</span>
                                    <p class="text-xs text-gray-400 mt-1">Please check back later</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    @error('selected_types')
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-700">{{ $message }}</p>
                                </div>
                            </div>
                        </div>
                    @enderror
                </div>

                <!-- Delivery Options Section -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-bold text-primary mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Delivery Options
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="retrieval-option cursor-pointer border rounded-lg p-4 transition-all duration-200 hover:shadow-md"
                            data-value="delivery">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-5 h-5 border-2 border-gray-300 rounded-full flex items-center justify-center">
                                        <div class="delivery-radio-dot w-3 h-3 rounded-full bg-primary hidden"></div>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-medium text-gray-800">Delivery</h3>
                                    <p class="text-sm text-gray-500">We'll pick up and deliver to your location</p>
                                    <div class="mt-2 text-xs bg-primary bg-opacity-10 text-white px-2 py-1 rounded inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Additional fee: Rp 20.000,00
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="retrieval-option cursor-pointer border rounded-lg p-4 transition-all duration-200 hover:shadow-md"
                            data-value="take_away">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-5 h-5 border-2 border-gray-300 rounded-full flex items-center justify-center">
                                        <div class="take-away-radio-dot w-3 h-3 rounded-full bg-primary hidden"></div>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-medium text-gray-800">Self Drop-off & Pickup</h3>
                                    <p class="text-sm text-gray-500">Drop off and pick up your items at our location</p>
                                    <div class="mt-2 text-xs bg-green-100 text-green-600 px-2 py-1 rounded inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        No additional fee
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="retrieval-method" id="retrievalMethod" value="{{ old('retrieval-method') }}">
                    
                    @error('retrieval-method')
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-700">{{ $message }}</p>
                                </div>
                            </div>
                        </div>
                    @enderror

                    <!-- Delivery Address (shown only when delivery is selected) -->
                    <div id="deliveryAddressBox" class="mt-6 border-t pt-6" style="{{ old('retrieval-method') === 'delivery' ? '' : 'display: none;' }}">
                        <h3 class="font-medium text-gray-800 mb-3">Delivery Address</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Pickup Address</label>
                                <input type="text" name="address" id="address" placeholder="Enter your address"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Delivery Address</label>
                                <input type="text" name="destination" id="destination" placeholder="Enter delivery address"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                                    value="{{ old('destination') }}">
                                @error('destination')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                
                    </div>
                </div>

                <!-- Order Summary Section -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-bold text-primary mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Order Summary
                    </h2>
                    
                    <div id="selectedItemsSummary" class="mb-6">
                        <div id="selectedItemsList" class="divide-y">
                            <!-- Selected items will be displayed here via JavaScript -->
                            <div class="py-3 text-center text-gray-500 italic" id="noItemsSelected">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <p>No items selected</p>
                                <p class="text-sm mt-1">Please select at least one item to continue</p>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex justify-between items-center font-medium text-gray-600">
                                <span>Subtotal</span>
                                <span id="subtotalDisplay">Rp 0,00</span>
                            </div>
                            <div class="flex justify-between items-center font-medium text-gray-600 mt-2" id="deliveryFeeRow" style="display: none;">
                                <span>Delivery Fee</span>
                                <span id="deliveryFeeDisplay">Rp 20.000,00</span>
                            </div>
                            <div class="flex justify-between items-center font-bold text-lg mt-3 pt-3 border-t border-gray-200">
                                <span>Total</span>
                                <span id="totalDisplay" class="text-primary">Rp 0,00</span>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="total_price" id="totalPriceInput" value="{{ old('total_price', 0) }}">
                    
                    <div class="mb-6">
                        <label for="note" class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                        <textarea name="notes" id="note" rows="3" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                            placeholder="Any notes for handling your laundry...">{{ old('notes') ?? '' }}</textarea>
                    </div>
                    
                    <button type="submit"
                        class="w-full bg-primary text-white py-3 px-4 rounded-md font-medium text-lg hover:bg-opacity-90 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Place Order
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Decorative wave at bottom -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto fill-primary opacity-20">
                <path d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,261.3C960,256,1056,224,1152,208C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const itemCheckboxes = document.querySelectorAll('.item-checkbox');
            const selectedItemsList = document.getElementById('selectedItemsList');
            const noItemsSelected = document.getElementById('noItemsSelected');
            const subtotalDisplay = document.getElementById('subtotalDisplay');
            const totalDisplay = document.getElementById('totalDisplay');
            const totalPriceInput = document.getElementById('totalPriceInput');
            const retrievalMethodInput = document.getElementById('retrievalMethod');
            const deliveryAddressBox = document.getElementById('deliveryAddressBox');
            const deliveryFeeRow = document.getElementById('deliveryFeeRow');
            const deliveryFeeDisplay = document.getElementById('deliveryFeeDisplay');
            const deliveryFee = 20000; // Rp 20,000.00
            const retrievalOptions = document.querySelectorAll('.retrieval-option');
            const deliveryRadioDot = document.querySelector('.delivery-radio-dot');
            const takeAwayRadioDot = document.querySelector('.take-away-radio-dot');
            
            // Initialize retrieval method if it was previously selected
            if (retrievalMethodInput.value === 'delivery') {
                deliveryRadioDot.classList.remove('hidden');
                deliveryAddressBox.style.display = 'block';
                deliveryFeeRow.style.display = 'flex';
            } else if (retrievalMethodInput.value === 'take_away') {
                takeAwayRadioDot.classList.remove('hidden');
            }

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
                let subtotal = 0;
                let total = 0;
                let hasSelectedItems = false;

                // Clear the selected items list
                while (selectedItemsList.firstChild) {
                    if (selectedItemsList.firstChild.id === 'noItemsSelected') {
                        break;
                    }
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

                        subtotal += itemTotal;

                        // Create item row in summary
                        const itemRow = document.createElement('div');
                        itemRow.className = 'py-3 flex justify-between items-center';
                        itemRow.innerHTML = `
                            <div>
                                <span class="font-medium text-gray-800">${itemName}</span>
                                <div class="text-gray-500 text-sm">${quantity} × ${formatRupiah(itemPrice)}</div>
                            </div>
                            <span class="font-medium">${formatRupiah(itemTotal)}</span>
                        `;
                        
                        // Insert before noItemsSelected if it exists
                        if (selectedItemsList.contains(noItemsSelected)) {
                            selectedItemsList.insertBefore(itemRow, noItemsSelected);
                        } else {
                            selectedItemsList.appendChild(itemRow);
                        }
                    }
                });

                // Calculate total
                total = subtotal;
                
                // Add delivery fee if delivery is selected
                if (retrievalMethodInput.value === 'delivery') {
                    total += deliveryFee;
                    deliveryFeeRow.style.display = 'flex';
                } else {
                    deliveryFeeRow.style.display = 'none';
                }

                // Show/hide "No items selected" message
                if (!hasSelectedItems) {
                    noItemsSelected.style.display = 'block';
                } else {
                    noItemsSelected.style.display = 'none';
                }

                // Update displays and hidden input
                subtotalDisplay.textContent = formatRupiah(subtotal);
                totalDisplay.textContent = formatRupiah(total);
                totalPriceInput.value = total;
            }

            // Toggle amount input visibility when checkbox is clicked
            itemCheckboxes.forEach(checkbox => {
                const container = checkbox.closest('.item-container');
                const label = container.querySelector('label');
                const amountInput = container.querySelector('.amount-input');
                const checkmark = container.querySelector('svg');
                
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        amountInput.classList.remove('hidden');
                        amountInput.classList.add('block');
                        label.querySelector('.border-2').classList.add('bg-primary', 'border-primary');
                        checkmark.classList.remove('hidden');
                    } else {
                        amountInput.classList.remove('block');
                        amountInput.classList.add('hidden');
                        label.querySelector('.border-2').classList.remove('bg-primary', 'border-primary');
                        checkmark.classList.add('hidden');
                    }

                    calculateTotal();
                });

                // Initialize amount inputs for checked items
                if (checkbox.checked) {
                    amountInput.classList.remove('hidden');
                    amountInput.classList.add('block');
                    label.querySelector('.border-2').classList.add('bg-primary', 'border-primary');
                    checkmark.classList.remove('hidden');
                }
            });

            // Quantity buttons functionality
            document.querySelectorAll('.quantity-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.parentNode.querySelector('input');
                    let value = parseInt(input.value) || 0;
                    
                    if (this.classList.contains('minus-btn')) {
                        value = Math.max(1, value - 1);
                    } else if (this.classList.contains('plus-btn')) {
                        value = Math.min(99, value + 1);
                    }
                    
                    input.value = value;
                    input.dispatchEvent(new Event('input'));
                });
            });

            // Listen for changes in amount inputs
            document.querySelectorAll('input[name^="amounts["]').forEach(input => {
                input.addEventListener('input', calculateTotal);
            });

            // Handle retrieval method selection
            retrievalOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const value = this.dataset.value;
                    retrievalMethodInput.value = value;
                    
                    // Update UI
                    if (value === 'delivery') {
                        deliveryRadioDot.classList.remove('hidden');
                        takeAwayRadioDot.classList.add('hidden');
                        deliveryAddressBox.style.display = 'block';
                    } else {
                        deliveryRadioDot.classList.add('hidden');
                        takeAwayRadioDot.classList.remove('hidden');
                        deliveryAddressBox.style.display = 'none';
                    }
                    
                    calculateTotal();
                });
            });

            // Initialize total calculation
            calculateTotal();
        });
    </script>
</x-user-layout>