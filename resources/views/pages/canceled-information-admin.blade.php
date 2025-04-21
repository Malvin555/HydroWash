<!-- Modal -->
<div id="modalInformationCanceled"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Canceled Information"></x-modal-header>


        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Canceled [02]</h2>

            <form action="" method="" class="space-y-4">

                <x-modal-profile></x-modal-profile>

                <div>
                    <label class="text-sm font-bold text-primary">Fill Field</label>
                    <input type="text" disabled class="bg-secondary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="Ironing #234">
                </div>

                <div class="flex flex-col">
                    <label for="notes" class="text-sm font-bold text-primary mb-1">Fill Field</label>
                    <textarea name="notes" id="notes" disabled placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                        class="bg-secondary placeholder:text-primary px-4 py-2 w-full h-32 rounded-md resize-none outline-none text-sm"></textarea>
                </div>

                <div class=" bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                </div>
            </form>
        </div>

        
    </div>
</div>
