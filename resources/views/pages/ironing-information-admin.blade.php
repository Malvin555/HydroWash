<!-- Modal -->
<div id="modalInformationIroning"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Ironing Information"></x-modal-header>


        <div class="modal-data overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Ironing #23989</h2>

            <div class="space-y-4">

                <x-modal-profile></x-modal-profile>

                <div class="">
                    <label class="text-sm font-bold text-primary">Order Information</label>
                    <div class="bg-secondary rounded-md p-3 mt-4">
                        <h3 class="text-sm font-bold text-primary mb-2">Selected Items:</h3>
                        <div id="selectedItemsList-edit" class="space-y-2 max-h-32 overflow-y-auto"><div class="flex justify-between items-center text-sm">
                                <div>
                                    <span class="font-medium">Clothing</span>
                                    <span class="text-gray-600 text-xs ml-1">(1 × Rp&nbsp;12.000,00)</span>
                                </div>
                                <span>Rp&nbsp;12.000,00</span>
                            </div><div class="flex justify-between items-center text-sm">
                                <div>
                                    <span class="font-medium">Towels</span>
                                    <span class="text-gray-600 text-xs ml-1">(1 × Rp&nbsp;10.000,00)</span>
                                </div>
                                <span>Rp&nbsp;10.000,00</span>
                            </div></div>
        
                        <div class="mt-3 pt-2 border-t border-gray-200">
                            <div class="flex justify-between items-center font-medium text-gray-600">
                                <span>Subtotal</span>
                                <span id="subtotalDisplay-edit">Rp&nbsp;22.000,00</span>
                            </div>
                            <div class="flex justify-between items-center font-medium text-gray-600" id="deliveryFeeRow-edit" style="display: none;">
                                <span>Delivery Fee</span>
                                <span id="deliveryFeeDisplay">Rp 20.000,00</span>
                            </div>
                            <div class="flex justify-between items-center font-medium text-gray-600" id="taxRow-edit" style="display: none;">
                                <span>Tax (10%)</span>
                                <span id="taxDisplay-edit">Rp&nbsp;2.200,00</span>
                            </div>
                            <div class="flex justify-between font-bold text-primary">
                                <span>Total:</span>
                                <span id="totalDisplay-edit">Rp&nbsp;22.000,00</span>
                                </div>
                                <span>Rp&nbsp;22.000,00</span>
                        </div>
                        <input type="hidden" name="total_price" id="totalPriceInput-edit" value="22000">
                    </div>
                </div>

                <div>
                    <label class="text-sm font-bold text-primary">Retrieval Method</label>
                    <input type="text" disabled class="bg-secondary placeholder:text-primary px-4 py-2 w-full rounded-md outline-none text-sm" placeholder="Delivery">
                </div>

                <div class="grid grid-cols-1 gap-2">
                    <label for="address" class="text-sm font-bold text-primary">Address Information</label>
                    <div class="flex items-start gap-2 bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-4 mt-1" viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                        </svg>
                        <input type="text" disabled name="address" id="address" placeholder="Jln.Tibungsari 31 kuanji"
                            class="bg-transparent focus:outline-none w-full placeholder:text-primary" />
                    </div>
                    <div class="flex items-center gap-2 bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-4" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M320 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM204.5 121.3c-5.4-2.5-11.7-1.9-16.4 1.7l-40.9 30.7c-14.1 10.6-34.2 7.7-44.8-6.4s-7.7-34.2 6.4-44.8l40.9-30.7c23.7-17.8 55.3-21 82.1-8.4l90.4 42.5c29.1 13.7 36.8 51.6 15.2 75.5L299.1 224l97.4 0c30.3 0 53 27.7 47.1 57.4L415.4 422.3c-3.5 17.3-20.3 28.6-37.7 25.1s-28.6-20.3-25.1-37.7L377 288l-70.3 0c8.6 19.6 13.3 41.2 13.3 64c0 88.4-71.6 160-160 160S0 440.4 0 352s71.6-160 160-160c11.1 0 22 1.1 32.4 3.3l54.2-54.2-42.1-19.8zM160 448a96 96 0 1 0 0-192 96 96 0 1 0 0 192z" />
                        </svg>
                        <input type="text" disabled name="address" id="address" placeholder="Jln.Tibungsari 31 kuanji"
                            class="bg-transparent focus:outline-none w-full placeholder:text-primary" />
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="notes" class="text-sm font-bold text-primary mb-1">Notes</label>
                    <textarea name="notes" disabled id="notes" placeholder="Nothing"
                        class="bg-secondary placeholder:text-primary px-4 py-2 w-full h-32 rounded-md resize-none outline-none text-sm"></textarea>
                </div>

                <div class="flex items-center gap-2">
                    <p class="text-sm font-bold text-primary">Status</p>
                    <div class="bg-btn text-[#6D6969] py-1 px-6 rounded-md text-sm">Pending</div>
                </div>

                <div class="flex items-center gap-2">
                    <p class="text-sm font-bold text-primary">Status : </p>
                    <div class="text-primary font-bold">Null</div>
                </div>

                <div class="grid grid-cols-2 gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-delete-modal-btn></x-delete-modal-btn>
                </div>
            </div>
        </div>

        
    </div>
</div>
