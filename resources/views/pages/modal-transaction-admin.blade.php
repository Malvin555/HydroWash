<!-- Modal -->
<div id="modalTransaction"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Pay Transaction"></x-modal-header>


        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Pay Laundry #244</h2>

            <form action="" method="" class="space-y-4">

                <div>
                    <label class="text-sm font-bold text-primary">Detail</label>
                    <div>
                        <img src="{{ asset('img/bedding.png') }}" alt="bedding" class="rounded-md w-full h-75 my-4">
                        <input type="text" disabled class="bg-secondary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="12pcs (Rp 12.000.00)">
                    </div>
                </div>

                <div>
                    <label for="method" class="block text-sm font-bold text-primary mb-4">Transaction Method</label>
                    <div class="relative inline-block w-full">
                        <select name="method" id="method"
                            class="appearance-none bg-secondary font-bold rounded-sm text-primary py-2 pl-3 w-full outline-0">
                            <option value="" disabled selected class="text-primary">Choose Method
                            </option>
                            <option value="debit" class="text-primary">Debit</option>
                            <option value="cash" class="text-primary">Cash</option>
                        </select>

                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-2">
                    <input type="text" class="col-span-1 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="Visa">
                    <input type="text" class="col-span-3 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="Credit Card Number">
                    <input type="text" class="col-span-4 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="Postal Code">
                </div>

                <div class=" flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <a href="{{ route('transaction-admin') }}" class="block w-full px-4 py-2 rounded-md text-center bg-primary text-white font-medium cursor-pointer">
                        Pay
                    </a>
                </div>
            </form>
        </div>

        
    </div>
</div>
