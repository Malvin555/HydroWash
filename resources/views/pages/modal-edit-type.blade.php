<!-- Modal -->
<div id="modalEditType"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Item Edit Form"></x-modal-header>

        <div class="modal-data overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Type : {{ old('name_item') ?? DB::table('item_types')->where('id', old('id'))->value('name_item')}}</h2>

            <form action="{{ route('item-types.update') }}" method="post" enctype="multipart/form-data" class="space-y-4 flex flex-col gap-2">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ old('id') }}">
                <div class="p-4 w-full mb-0 h-55 bg-cover bg-center bg-no-repeat rounded-md space-y-4"
                    style="background-image: url('{{ Storage::url(old('image_item') ??  DB::table('item_types')->where('id', old('id'))->value('image_item')) }}')">
                    <label for="file-upload" class="inline-block bg-primary p-2 rounded-md cursor-pointer">
                        <img src="{{ asset('img/upload2.svg') }}" alt="upload" class="w-5 h-5">
                    </label>
                    <input type="file" id="file-upload" name="image_item" accept="image/*" class="hidden">
                </div>
                @error('image_item')
                    <p class="mt-1 mb-0 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class="space-y-4 flex flex-col gap-2">
                    <label class="text-sm font-bold text-primary mb-1">Fill Field</label>
                    <input type="text"
                        class="bg-secondary text-primary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0 mb-0"
                        placeholder="Enter item name" name="name_item" value="{{ old('name_item') }}">
                    @error('name_item')
                        <p class="mt-1 mb-0 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <input type="number"
                        class="bg-secondary text-primary w-full placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0 mb-0"
                        placeholder="Enter item price" name="price_item" value="{{ old('price_item') }}">
                    @error('price_item')
                        <p class="mt-1 mb-0 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <div class="relative inline-block w-full">
                        <select
                            class="appearance-none bg-secondary text-primary w-full placeholder:text-primary font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0 mb-0"
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
                        <p class="mt-1 mb-0 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class=" flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Save"></x-submit-modal-btn>
                </div>
            </form>
        </div>


    </div>
</div>
