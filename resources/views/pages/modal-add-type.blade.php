<!-- Modal -->
<div id="modalAddType"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Add Item Type"></x-modal-header>


        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Add Type Form</h2>

            <form action="" method="" enctype="multipart/form-data" class="space-y-4">

                <div class="w-full">
                    <label for="image-upload" class="cursor-pointer">
                        <div
                            class="bg-secondary flex flex-col items-center justify-center w-full text-primary py-10 mt-1 rounded-md text-sm hover:opacity-90 transition">
                            <img src="{{ asset('img/upload.svg') }}" alt="upload" class="w-45 h-45">
                            <h1 class="text-2xl font-bold">Input Your Image</h1>
                        </div>
                    </label>
                    <input type="file" id="image-upload" name="image" accept="image/*" class="hidden">
                </div>

                <div>
                    <label class="text-sm font-bold text-primary mb-1">Fill Field</label>
                    <input type="text" name="name_item" id="name_item" class="bg-secondary text-primary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0 mb-4" placeholder="Input name">
                    <input type="text" name="price_item" id="price_item" class="bg-secondary text-primary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="Input price">
                </div>


                <div class=" flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Submit"></x-submit-modal-btn>
                </div>
            </form>
        </div>


    </div>
</div>
