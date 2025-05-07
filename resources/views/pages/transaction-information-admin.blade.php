<!-- Modal -->
<div id="modalInformationTransaction"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Pay Transaction"></x-modal-header>


        <div class="modal-data overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Pay Laundry #244</h2>

            <form action="" method="" class="space-y-4">

                <div class="bg-secondary rounded-md p-3 mt-4">
                    <h3 class="text-sm font-bold text-primary mb-2">Selected Items:</h3>
                    <div class="space-y-2 max-h-40 overflow-y-auto">
                        <div class="flex justify-between items-center text-sm">
                            <div>
                                <span class="font-medium">Cuci Kering</span>
                                <span class="text-gray-600 text-xs ml-1">(2 × Rp 10.000,00)</span>
                            </div>
                            <span>Rp 20.000,00</span>
                        </div>

                        <div class="mt-3 pt-2 border-t border-gray-200">
                            <div class="flex justify-between items-center font-medium text-gray-600">
                                <span>Subtotal</span>
                                <span>Rp 20.000,00</span>
                            </div>
                            <div class="flex justify-between items-center font-medium text-gray-600">
                                <span>Delivery Fee</span>
                                <span>Rp 20.000,00</span>
                            </div>
                            <div class="flex justify-between items-center font-medium text-gray-600">
                                <span>Tax (10%)</span>
                                <span>Rp 2.000,00</span>
                            </div>
                            <div class="flex justify-between font-bold text-primary">
                                <span>Total:</span>
                                <span>Rp 42.000,00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="method" class="block text-sm font-bold text-primary mb-4">Transaction Method</label>
                    <input type="text" disabled
                        class="col-span-1 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 rounded-md text-sm outline-0"
                        placeholder="Delivery">
                </div>

                <div class="grid grid-cols-4 gap-2">
                    <input type="text" disabled
                        class="col-span-1 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0"
                        placeholder="Visa">
                    <input type="text" disabled
                        class="col-span-3 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0"
                        placeholder="1234567891232">
                    <input type="text" disabled
                        class="col-span-4 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0"
                        placeholder="84941">
                </div>

                <div class=" flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-delete-modal-btn></x-delete-modal-btn>
                </div>
            </form>
        </div>


    </div>
</div>
