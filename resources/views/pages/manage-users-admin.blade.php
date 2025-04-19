<x-admin-layout>
    <main class="p-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="font-bold text-lg md:text-2xl">Manage User</h1>
                <p class="text-black/50 text-[.8rem] md:text-base">Manage and respond to user reports.</p>
            </div>

            <button id="" class="bg-primary text-white p-3 rounded-sm cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-7 md:h-7" fill="currentColor" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
            </button>
        </div>

        <form action="" method="">
            <div class="mb-6 flex items-center justify-between gap-2">
                <div class="relative inline-block w-50">
                    <select class="appearance-none bg-primary text-white text-center font-bold rounded-sm py-2 w-full outline-0">
                        <option value="" disabled selected>Sort By</option>
                        <option value="newest">Newest</option>
                        <option value="oldest">Oldest</option>
                    </select>
    
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                        <svg class="w-8 h-8 fill-current text-btn" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                        </svg>
                    </div>
                </div>
    
                <div class="relative">
                    <input type="text" id="search" name="search"
                        class="bg-primary placeholder:text-white/50 text-white/50 rounded-sm outline-0 py-2 pl-10 w-full md:w-70 font-bold"
                        placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white absolute left-2 bottom-1/4" fill="currentColor"
                        viewBox="0 0 512 512">
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>
                </div>
            </div>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-primary text-white w-full rounded-sm flex flex-col justify-center py-3 px-2 items-center">
                <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-25 h-25">
                <h1 class="text-2xl mb-4">MARIA</h1>
                <p class="text-sm text-white/50">Joined At</p>
                <p class="mb-2">30 Januari 2025</p>
                <div class="grid grid-cols-5 gap-4 w-full">
                    <button id="" class="bg-white cursor-pointer py-2 rounded-sm text-primary col-span-4">
                        View
                    </button>
                    <button id="" class="bg-white cursor-pointer rounded-sm p-2 text-primary flex items-center justify-center col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg"  class="w-5 h-5" fill="currentColor" viewBox="0 0 512 512"><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                    </button>
                </div>
            </div>
            <div class="bg-primary text-white w-full rounded-sm flex flex-col justify-center py-3 px-2 items-center">
                <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-25 h-25">
                <h1 class="text-2xl mb-4">MARIA</h1>
                <p class="text-sm text-white/50">Joined At</p>
                <p class="mb-2">30 Januari 2025</p>
                <div class="grid grid-cols-5 gap-4 w-full">
                    <button id="" class="bg-white cursor-pointer py-2 rounded-sm text-primary col-span-4">
                        View
                    </button>
                    <button id="" class="bg-white cursor-pointer rounded-sm p-2 text-primary flex items-center justify-center col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg"  class="w-5 h-5" fill="currentColor" viewBox="0 0 512 512"><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                    </button>
                </div>
            </div>
            <div class="bg-primary text-white w-full rounded-sm flex flex-col justify-center py-3 px-2 items-center">
                <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-25 h-25">
                <h1 class="text-2xl mb-4">MARIA</h1>
                <p class="text-sm text-white/50">Joined At</p>
                <p class="mb-2">30 Januari 2025</p>
                <div class="grid grid-cols-5 gap-4 w-full">
                    <button id="" class="bg-white cursor-pointer py-2 rounded-sm text-primary col-span-4">
                        View
                    </button>
                    <button id="" class="bg-white cursor-pointer rounded-sm p-2 text-primary flex items-center justify-center col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg"  class="w-5 h-5" fill="currentColor" viewBox="0 0 512 512"><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>