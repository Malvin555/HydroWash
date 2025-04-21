<!-- Modal -->
<div id="modalInformationType"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Item Information"></x-modal-header>


        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Type : Clothes</h2>

            <form action="" method="" enctype="multipart/form-data" class="space-y-4">

                <div class="flex flex-col justify-center space-y-4 items-center">
                    <img src="{{ asset('img/bedding.png') }}" alt="bedding" class="w-full h-70">
                    <input type="text" disabled class="bg-secondary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="Clothes [Rp 12.000.00]">
                </div>


                <div class=" flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-delete-modal-btn></x-delete-modal-btn>
                </div>
            </form>
        </div>


    </div>
</div>
