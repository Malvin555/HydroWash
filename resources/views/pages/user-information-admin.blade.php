<!-- Modal -->
<div id="modalInformationUser"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="User Information"></x-modal-header>


        <div class="modal-data overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">User Data</h2>

            <div class="space-y-4">

                <x-modal-profile></x-modal-profile>

                <div>
                    <label class="text-sm font-bold text-primary">Address User</label>
                    <input type="text" disabled class="bg-secondary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="Jln.Tibungsari 31 kuanji">
                </div>

                <div class="flex flex-col">
                    <label class="text-sm font-bold text-primary mb-1">Service History</label>
                    <div class="bg-secondary text-primary px-4 py-2 w-full rounded-md resize-none outline-none text-sm">
                        <div class="text-lg space-y-1">
                            <p>Service Created : 100</p>
                            <p>Feedback Created : 2</p>
                            <p>Canceled Service : 5</p>
                            <p>Amount Payed Total : Rp 90.000.00</p>
                        </div>
                        
                    </div>
                </div>

                <div class="flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-delete-modal-btn></x-delete-modal-btn>
                </div>
            </div>
        </div>

        
    </div>
</div>
