
    <!-- Modal information-->
    <div id="modal"
        class="fixed inset-0 hidden flex items-center justify-center bg-opacity-50 transition-opacity duration-300 opacity-0 z-50">
        <div
            class="bg-white pb-6 rounded-sm max-w-md w-full mx-4 shadow-xl transform scale-95 transition-transform duration-300 relative max-h-md">

            <div class="bg-secondary p-3 rounded-t-sm flex justify-between mb-6">
                <h1 class="text-xl font-bold text-center mb-1 text-primary">Laundry #22872</h1>
                <button id="closeModal" class="w-8 h-8 flex items-center justify-center cursor-pointer">
                    <img src="{{ asset('img/close.svg') }}" alt="close">
                </button>
            </div>

            <h2 class="text-xl font-medium text-center mb-6 text-primary tracking-wide">Laundry Information</h2>

            <div class="px-6 lg:space-y-2">

                <div>
                    <label class="text-sm font-semibold text-primary">Amount Item:</label>
                    <div class="bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm">12Pcs (Rp. 100.000,00)
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold text-primary">Retrieval Method:</label>
                    <div class="bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm">Delivery</div>
                </div>

                <div>
                    <label class="text-sm font-semibold text-primary">Address:</label>
                    <div class="flex items-start gap-2 bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-4" viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                        </svg>
                        <span>Jln. Tibungsari 31 kuanji, Dalung</span>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold text-primary">Address:</label>
                    <div class="flex items-center gap-2 bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-4" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M320 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM204.5 121.3c-5.4-2.5-11.7-1.9-16.4 1.7l-40.9 30.7c-14.1 10.6-34.2 7.7-44.8-6.4s-7.7-34.2 6.4-44.8l40.9-30.7c23.7-17.8 55.3-21 82.1-8.4l90.4 42.5c29.1 13.7 36.8 51.6 15.2 75.5L299.1 224l97.4 0c30.3 0 53 27.7 47.1 57.4L415.4 422.3c-3.5 17.3-20.3 28.6-37.7 25.1s-28.6-20.3-25.1-37.7L377 288l-70.3 0c8.6 19.6 13.3 41.2 13.3 64c0 88.4-71.6 160-160 160S0 440.4 0 352s71.6-160 160-160c11.1 0 22 1.1 32.4 3.3l54.2-54.2-42.1-19.8zM160 448a96 96 0 1 0 0-192 96 96 0 1 0 0 192z" />
                        </svg>
                        <span>Jln. Tibungsari 31 kuanji, Dalung</span>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold text-primary">Notes:</label>
                    <div class="bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm min-h-25">Nothing</div>
                </div>

                <div class="flex flex-col justify-center gap-2 mt-6">
                    <a href="{{ route('transaction') }}"
                        class="px-4 py-2 rounded-md bg-primary text-white text-center font-medium">Transaction</a>
                    <button
                        class="px-4 py-2 rounded-md bg-primary text-white font-medium cursor-pointer" onclick="return confirm('Are you sure to want cancle this order?')">Cancel
                        Order</button>
                </div>
            </div>
        </div>
    </div>
