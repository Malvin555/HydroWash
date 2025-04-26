<!-- Modal -->
<div id="modalCancelService"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Cancel Service"></x-modal-header>


        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Cancel Service</h2>

            <form action="{{ route('cancel.order') }}" method="post" class="space-y-4"
                onsubmit="return confirm('Are you sure to want cancel this order?')">
                @csrf

                <input type="hidden" name="order_id" value="{{ old('order_id') }}">
                <input type="hidden" name="service_type" value="{{ old('service_type') }}">

                <div class="flex flex-col">
                    <label for="notes" class="text-sm font-bold text-primary mb-1">Issue</label>
                    <textarea name="notes" id="notes" placeholder="Notes"
                        class="bg-secondary text-primary placeholder:text-primary px-4 py-2 w-full h-32 rounded-md resize-none outline-none text-sm">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class=" flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Cancel"></x-submit-modal-btn>
                </div>
            </form>
        </div>


    </div>
</div>
