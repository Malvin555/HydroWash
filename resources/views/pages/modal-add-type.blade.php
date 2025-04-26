<!-- Modal -->
<div id="modalAddType"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Add Item Type"></x-modal-header>


        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Add Type Form</h2>

            <form action="{{ route('item-types.add') }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div class="w-full">
                    <label for="image-upload" class="cursor-pointer">
                        <div
                            class="bg-secondary flex flex-col items-center justify-center w-full text-primary py-10 mt-1 rounded-md text-sm hover:opacity-90 transition">
                            <img src="{{ asset('img/upload.svg') }}" alt="upload" class="w-45 h-45">
                            <h1 class="text-2xl font-bold">Input Your Image</h1>
                        </div>
                    </label>
                    <input type="file" id="image-upload" name="image_item" accept="image/*" class="hidden">
                </div>
                @error('image_item')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div>
                    <label class="text-sm font-bold text-primary mb-1">Fill Field</label>
                    <input type="text" name="name_item" id="name_item" class="bg-secondary text-primary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="Input name" value="{{ old('name_item') }}">
                    @error('name_item')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <input type="number" name="price_item" id="price_item" class="bg-secondary text-primary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-5 rounded-md text-sm outline-0" placeholder="Input price" value="{{ old('price_item') }}">
                    @error('price_item')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <div class="relative inline-block w-full mt-4">
                        <select class="appearance-none bg-secondary text-primary w-full placeholder:text-primary font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0"
                            id="role" name="role">
                            <option value="" disabled selected>Choose service for item</option>
                            <option value="ironing" @selected(old('role') == 'ironing') class="font-bold">Ironing</option>
                            <option value="laundry" @selected(old('role') == 'laundry') class="font-bold">Laundry</option>
                        </select>

                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                            </svg>
                        </div>
                    </div>
                    @error('role')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div class=" flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Submit"></x-submit-modal-btn>
                </div>
            </form>
        </div>


    </div>
</div>
