<x-admin-layout>
    <main class="p-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="font-bold text-lg md:text-2xl">Transaction</h1>
                <p class="text-black/50 text-[.8rem] md:text-base">Manage and respond to user reports.</p>
            </div>
        </div>

        <form action="" method="">
            <div class="mb-6 flex items-center justify-between gap-2">
                <div class="relative inline-block w-50">
                    <input type="month"
                        class="bg-primary text-white text-center font-bold rounded-sm py-2 w-full outline-0 pl-5 appearance-none">
                    <span class="absolute left-0 top-2.5 pointer-events-none">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M6 2a1 1 0 00-1 1v1H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2h-.002V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zM5 8h10v8H5V8z">
                            </path>
                        </svg>
                    </span>
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

        <x-table-admin>
            <x-slot name="thead">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Method</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Action</th>
                </tr>
            </x-slot>
        
            <x-slot name="tbody">
                <tr>
                    <td class="px-6 py-4 text-sm text-primary">01</td>
                    <td class="px-6 py-4 text-sm text-primary">Ironing #234</td>
                    <td class="px-6 py-4 text-sm text-primary">02-07-2025</td>
                    <td class="px-6 py-4 text-sm text-primary">$8,252</td>
                    <td class="px-6 py-4 text-sm text-primary">Lorem ipsum</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <button class="text-blue-500 hover:text-blue-700 cursor-pointer mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        </button>
                        <button class="text-gray-500 hover:text-gray-700 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 512 512"><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                        </button>
                    </td>
                </tr>
            </x-slot>
        </x-table-admin>
    </main>
</x-admin-layout>