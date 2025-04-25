<x-admin-layout>
    <div class="mb-6 flex items-center justify-between" data-module="canceled">
        <div>
            <div class="flex gap-8 items-center">
                <h1 class="font-bold text-lg md:text-2xl">Canceled Service</h1>
                <x-loader></x-loader>
            </div>
            <p class="text-black/50 text-[.8rem] md:text-base">Manage and respond to user reports.</p>
        </div>
    </div>

    <form action="" method="" id="filterForm">
        <div class="mb-6 flex items-center justify-between gap-2">
            <div class="relative inline-block w-50">
                <select
                    class="appearance-none bg-primary text-white text-center font-bold rounded-sm py-2 w-full outline-0"
                    name="sort" onchange="document.getElementById('filterForm').submit()">
                    <option value="" disabled selected>Sort By</option>
                    <option value="desc" @selected(request('sort') === 'desc')>Newest</option>
                    <option value="asc" @selected(request('sort') === 'asc')>Oldest</option>
                </select>

                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                    <svg class="w-8 h-8 fill-current text-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                    </svg>
                </div>
            </div>

            <div class="relative">
                <input type="text" id="search" name="search"
                    class="bg-primary placeholder:text-white/50 text-white/50 rounded-sm outline-0 py-2 pl-10 w-full md:w-70 font-bold"
                    placeholder="Search..." value="{{ request('search') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white absolute left-2 bottom-1/4"
                    fill="currentColor" viewBox="0 0 512 512">
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
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Issue</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Action</th>
            </tr>
        </x-slot>

        <x-slot name="tbody">
            <tbody class="bg-white divide-y divide-primary" id="canceledList">
                @if (!$canceledServices->isEmpty())
                    @foreach ($canceledServices as $index => $canceled)
                        <tr>
                            <td class="px-6 py-4 text-sm text-primary">
                                {{ str_pad($canceledServices->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-6 py-4 text-sm text-primary">
                                {{ $canceled->ironing->name_ironing ?? $canceled->laundry->name_laundry }}</td>
                            <td class="px-6 py-4 text-sm text-primary">
                                {{ \Carbon\Carbon::parse($canceled->created_at)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 text-sm text-primary">{{ $canceled->issues }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button data-modal-target="modalInformationCanceled" data-id="{{ $canceled->id }}"
                                    data-modal-key="showModalInfoCanceled"
                                    class="text-blue-500 hover:text-blue-700 cursor-pointer mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="px-6 py-4 text-sm text-primary text-center" colspan="5">No canceled services</td>
                    </tr>
                @endif
            </tbody>
        </x-slot>
        <x-slot name="pagination">
            <div id="pagination-container">
                {{ $canceledServices->links('pagination.table-pagination') }}
            </div>
        </x-slot>
    </x-table-admin>


    @include('pages.canceled-information-admin')
</x-admin-layout>
