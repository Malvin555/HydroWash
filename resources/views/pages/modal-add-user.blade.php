<!-- Modal -->
<div id="modalAddUser"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] overflow-auto flex flex-col overflow-hidden">

        <x-modal-header title="Add User"></x-modal-header>

        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Add User</h2>

            <form action="{{ route('manage-users.add') }}" method="post" class="space-y-4">
                @csrf

                <div>
                    <label for="username" class="text-sm font-bold text-primary">Username</label>
                    <input type="text" name="username-add" id="username-add" class="bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" value="{{ old('username-add') }}">
                    @error('username-add')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="text-sm font-bold text-primary">Email</label>
                    <input type="email" name="email-add" id="email-add" class="bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0"
                        value="{{ old('email-add') }}">
                    @error('email-add')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="text-sm font-bold text-primary">Password</label>
                    <input type="password" name="password-add" id="password-add" class="bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0">
                    @error('password-add')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Submit"></x-submit-modal-btn>
                </div>
            </form>
        </div>

        
    </div>
</div>
