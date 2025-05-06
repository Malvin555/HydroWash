<!-- Modal -->
<div id="modalCancelService"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Cancel Service"></x-modal-header>


        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-gray-800 font-semibold mb-6">Are you sure you want to cancel this
                service?</h2>

            <form action="{{ route('cancel.order') }}" method="post" class="space-y-5"
                onsubmit="return confirm('Are you sure you want to cancel this order?')">
                @csrf

                <input type="hidden" name="order_id" value="{{ old('order_id') }}">
                <input type="hidden" name="service_type" value="{{ old('service_type') }}">

                <div class="flex flex-col">
                    <label for="notes" class="text-sm font-medium text-gray-700 mb-2">Please tell us the
                        reason:</label>
                    <div class="relative">
                        <textarea name="notes" id="notes" placeholder="Enter your reason for cancellation..."
                            class="w-full h-32 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 resize-none outline-none text-gray-700 placeholder-gray-400 transition-all duration-200">{{ old('notes') }}</textarea>
                        <div class="absolute bottom-3 right-3 text-xs text-gray-400 notes-counter">0/200</div>
                    </div>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('service_type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex space-x-3 pt-2">
                    <button type="button" data-close-icon
                        class="flex-1 px-4 py-3 bg-gray-100 hover:bg-gray-300 border border-gray-300 cursor-pointer text-gray-700 font-medium rounded-lg transition-colors duration-200">
                        Go Back
                    </button>
                    <button type="submit"
                        class="flex-1 px-4 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 cursor-pointer">
                        Confirm Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const textarea = document.getElementById('notes');
    const counter = document.querySelector('.notes-counter');

    textarea.addEventListener('input', () => {
        if (textarea.value.length > 200) {
            textarea.value = textarea.value.substring(0, 200);
        }
        
        counter.textContent = `${textarea.value.length}/200`;
    });
</script>