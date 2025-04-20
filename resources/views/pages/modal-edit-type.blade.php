<!-- Modal -->
<div id="modalEditType"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Item Edit Form"></x-modal-header>


        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Type : Clothes</h2>

            <form action="" method="" enctype="multipart/form-data" class="space-y-4">

                <div class="p-4 w-full h-55 bg-cover bg-center bg-no-repeat rounded-md space-y-4" style="background-image: url('{{ asset('img/bedding.png') }}')">
                    <label for="file-upload" class="inline-block bg-primary p-2 rounded-md cursor-pointer">
                        <img src="{{ asset('img/upload2.svg') }}" alt="upload" class="w-5 h-5">
                    </label>
                    <input type="file" id="file-upload" name="image" accept="image/*" class="hidden">
                </div>

                <div class="space-y-4">
                    <label class="text-sm font-bold text-primary mb-1">Fill Field</label>
                    <input type="text" class="bg-secondary text-primary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="clothes">
                    <input type="text" class="bg-secondary text-primary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="Rp 12.000.00">
                </div>

                <div class=" flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Save"></x-submit-modal-btn>
                </div>
            </form>
        </div>


    </div>
</div>
