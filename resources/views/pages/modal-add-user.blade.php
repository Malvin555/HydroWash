<!-- Modal -->
<div id="modalAddUser"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0">

    <div
        class="modal-content bg-white rounded-md w-full max-w-md mx-4 shadow-xl transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden">

        <x-modal-header title="Add User"></x-modal-header>


        <div class="overflow-y-auto p-6 flex-1">
            <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Add User</h2>

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
                    <label for="password" class="text-sm font-bold text-primary">Password</label>
                    <input type="password" name="password" id="password" class="bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0">
                </div>

                <div class="flex gap-2 bg-white">
                    <x-close-modal-btn></x-close-modal-btn>
                    <x-submit-modal-btn text="Submit"></x-submit-modal-btn>
                </div>
            </form>
        </div>

        
    </div>
</div>
