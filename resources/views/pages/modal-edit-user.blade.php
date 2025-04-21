<!-- Modal -->
<div id="modalEditUser"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Edit Form User"></x-modal-header>


        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Edit User</h2>

            <form action="" method="" class="space-y-4">

                <div>
                    <label for="username" class="text-sm font-bold text-primary">Username</label>
                    <input type="text" name="username" id="username" class="bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0">
                </div>
                <div>
                    <label for="email" class="text-sm font-bold text-primary">Email</label>
                    <input type="email" name="email" id="email" class="bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0">
                </div>
                <div>
                    <label for="address" class="text-sm font-bold text-primary">Address</label>
                    <input type="text" name="address" id="address" class="bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0">
                </div>
                <div>
                    <label for="telp" class="text-sm font-bold text-primary">Telp Number</label>
                    <input type="text" name="telp" id="telp" class="bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0">
                </div>

                <div class="flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Submit"></x-submit-modal-btn>
                </div>
            </form>
        </div>

        
    </div>
</div>
