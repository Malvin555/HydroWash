<x-admin-layout>
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="font-bold text-lg md:text-2xl">Manage Profile</h1>
            <p class="text-black/50 text-[.8rem] md:text-base">Manage and respond to user reports.</p>
        </div>
    </div>

    <div class="w-full border border-primary rounded-sm pb-5 mb-6">
        <div class="bg-primary mb-5 rounded-b-sm text-white flex justify-between items-center px-3 py-2">
            <div>
                <h1 class="font-bold md:text-lg lg:text-2xl">Personal Information</h1>
                <p class="font-light text-[.8rem] md:text-sm lg:text-base">Update your personal detail.</p>
            </div>

            <div class="h-8 w-8 rounded-full bg-btn flex items-center justify-center text-black font-medium uppercase">
                {{ Str::substr(Auth::user()->name ?? 'Admin', 0, 2) }}
            </div>
        </div>

        <form action="{{ route('profile-admin') }}" method="post" class="px-3">
            @csrf
            @method('PUT')

            <div class="w-full mb-5">
                <input type="email" id="email" name="email" value="{{ Auth::user()->email ?? old('email') }}"
                    placeholder="Enter your email"
                    class="w-full border border-primary rounded-sm py-1 px-2 outline-0 text-primary">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full mb-5">
                <input type="text" id="username" name="name" value="{{ Auth::user()->name ?? old('name') }}"
                    placeholder="Enter your name"
                    class="w-full border border-primary rounded-sm py-1 px-2 outline-0 text-primary">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full flex gap-4 mb-5">
                <div class="w-full">
                    <input type="text" name="address"
                        class="w-full border border-primary rounded-sm py-1 px-2 outline-0 text-primary"
                        value="{{ Auth::user()->address ?? old('address') }}" placeholder="Enter your addrees">
                    @error('address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full">
                    <input type="text" name="telp"
                        class="w-full border border-primary rounded-sm py-1 px-2 outline-0 text-primary"
                        value="{{ Auth::user()->telp ?? old('telp') }}" placeholder="Enter you phone number">
                    @error('telp')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="w-full flex justify-end">
                <button type="submit" class="bg-primary text-white py-1 px-4 rounded-sm">Submit</button>
            </div>
        </form>
    </div>


    <div class="w-full border border-primary rounded-sm pb-5">
        <div class="bg-primary mb-5 rounded-b-sm text-white flex justify-between items-center px-3 py-2">
            <div>
                <h1 class="font-bold md:text-lg lg:text-2xl">Password</h1>
                <p class="font-light text-[.8rem] md:text-sm lg:text-base">Update your password.</p>
            </div>

            <div class="h-8 w-8 rounded-full bg-btn flex items-center justify-center text-black font-medium uppercase">
                {{ Str::substr(Auth::user()->name ?? 'Admin', 0, 2) }}
            </div>
        </div>

        <form action="{{ route('profile-admin.password.update') }}" method="post" class="px-3">
            @csrf
            @method('PUT')

            <div class="w-full mb-5">
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="w-full border border-primary rounded-sm py-1 px-2 outline-0 text-primary">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full mb-5">
                <input type="password" id="new-password" name="new_password" placeholder="Enter your new password"
                    class="w-full border border-primary rounded-sm py-1 px-2 outline-0 text-primary">
                @error('new_password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full mb-5">
                <input type="password" id="confirm-password" name="new_password_confirmation"
                    placeholder="Confirm your password"
                    class="w-full border border-primary rounded-sm py-1 px-2 outline-0 text-primary">
            </div>

            <div class="w-full flex justify-end">
                <button type="submit" class="bg-primary text-white py-1 px-4 rounded-sm cursor-pointer">Submit</button>
            </div>
        </form>
    </div>
</x-admin-layout>
