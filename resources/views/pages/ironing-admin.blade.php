<x-admin-layout>
    <div class="mb-6 flex items-center justify-between" data-module="ironing">
        <div>
            <div class="flex gap-8 items-center">
                <h1 class="font-bold text-lg md:text-2xl">Manage Ironing</h1>
                <x-loader></x-loader>
            </div>
            <p class="text-black/50 text-[.8rem] md:text-base">Manage and respond to user reports.</p>
        </div>

        <div>
            <button class="bg-primary text-white p-2 rounded-sm cursor-pointer">
                <a href="{{ route('admin.print', [
                    'type' => 'ironing',
                    'sort' => request('sort'),
                    'status' => request('status'),
                    'search' => request('search'),
                ]) }}" target="_blank" id="printLink">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-7 md:h-7" fill="currentColor"
                        viewBox="0 0 512 512">
                        <path
                            d="M128 0C92.7 0 64 28.7 64 64l0 96 64 0 0-96 226.7 0L384 93.3l0 66.7 64 0 0-66.7c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0L128 0zM384 352l0 32 0 64-256 0 0-64 0-16 0-16 256 0zm64 32l32 0c17.7 0 32-14.3 32-32l0-96c0-35.3-28.7-64-64-64L64 192c-35.3 0-64 28.7-64 64l0 96c0 17.7 14.3 32 32 32l32 0 0 64c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-64zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                    </svg>
                </a>
            </button>
            <button data-modal-target="modalAddIroning" data-fetch="false" class="bg-primary text-white p-2 rounded-sm cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-7 md:h-7" fill="currentColor"
                    viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                </svg>
            </button>
        </div>
    </div>

    <form action="" method="" id="filterForm">
        <div class="mb-6 flex flex-wrap gap-3 items-center justify-between">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                <div class="relative inline-block w-40">
                    <select
                        class="appearance-none bg-primary text-white text-center font-bold rounded-sm py-2 w-full outline-0"
                        name="sort" onchange="document.getElementById('filterForm').submit()">
                        <option value="" disabled selected>Sort By</option>
                        <option value="desc" @selected(request('sort') === 'desc')>Newest</option>
                        <option value="asc" @selected(request('sort') === 'asc')>Oldest</option>
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                        <svg class="w-8 h-8 fill-current text-btn" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                        </svg>
                    </div>
                </div>

                <div class="relative inline-block w-45">
                    <select
                        class="appearance-none bg-primary text-white text-center font-bold rounded-sm py-2 w-full outline-0"
                        name="status" onchange="document.getElementById('filterForm').submit()">
                        <option value="" selected>All Status</option>
                        <option value="pending" @selected(request('status') === 'pending')>Pending</option>
                        <option value="process" @selected(request('status') === 'process')>Proccess</option>
                        <option value="completed" @selected(request('status') === 'completed')>Completed</option>
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                        <svg class="w-8 h-8 fill-current text-btn" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="relative">
                <input type="text" id="search" name="search" id="search"
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
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Method</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Action</th>
            </tr>
        </x-slot>

        <x-slot name="tbody">
            <tbody class="bg-white divide-y divide-primary" id="ironingList">

                @if (!$ironing->isEmpty())
                    @foreach ($ironing as $index => $iron)
                        <tr @class([
                            'line-through' => $iron->status_report === 'deleted',
                            'no-underline' => $iron->status_report != 'deleted',
                        ])>
                            <td class="px-6 py-4 text-sm text-primary">
                                {{ str_pad($ironing->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-6 py-4 text-sm text-primary">{{ $iron->name_ironing }}</td>
                            <td class="px-6 py-4 text-sm text-primary">
                                {{ \Carbon\Carbon::parse($iron->created_at)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 text-sm text-primary">{{ Str::formatSnakeCaseToLabel($iron->retrieval_method) }}</td>
                            <td class="px-6 py-4 text-sm text-primary">{{ $iron->orderItems->pluck('itemType.name_item')->implode(', ') }}</td>
                            <td class="px-6 py-4">
                                <span @class([
                                    'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                                    'bg-gray-300 text-gray-800' => $iron->status == 'pending',
                                    'bg-yellow-100 text-yellow-800' => $iron->status == 'process',
                                    'bg-green-100 text-green-800' => $iron->status == 'completed',
                                    'line-through' => $iron->status_report === 'deleted',
                                    'no-underline' => $iron->status_report != 'deleted',
                                ])>{{ Str::ucfirst($iron->status) }}</span>
                            </td>
                            <td class="px-6 py-4 flex items-center gap-2 text-sm text-gray-500">
                                @if ($iron->transaction->isEmpty() && $iron->status_report === 'normal')
                                    <button 
                                        data-modal-target="modalTransaction" 
                                        data-slug="{{ $iron->name_ironing }}"
                                        data-modal-key="showModalTransaction" class="cursor-pointer">
                                        <img src="{{ asset('img/cash.svg') }}" alt="cash" class="w-5 h-5">
                                    </button>
                                @endif
                                <button 
                                    data-modal-target="modalInformationIroning" 
                                    data-id="{{ $iron->id }}"
                                    data-modal-key="showModalInfoIroning"
                                    class="text-blue-500 hover:text-blue-700 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                    </svg>
                                </button>
                                <button 
                                    data-modal-target="modalEditIroning" 
                                    data-id="{{ $iron->id }}"
                                    data-modal-key="showModalEditIroning"
                                    class="text-gray-500 hover:text-gray-700 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                    </svg>
                                </button>
                                @if ($iron->transaction->count() > 0 && $iron->status_report === 'normal')
                                    <a href="{{ route('admin.print', [
                                        'type' => 'ironing-receipt',
                                        'service' => Str::slug($iron->name_ironing),
                                        ]) }}" target="_blank" id="printLink">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M128 0C92.7 0 64 28.7 64 64l0 96 64 0 0-96 226.7 0L384 93.3l0 66.7 64 0 0-66.7c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0L128 0zM384 352l0 32 0 64-256 0 0-64 0-16 0-16 256 0zm64 32l32 0c17.7 0 32-14.3 32-32l0-96c0-35.3-28.7-64-64-64L64 192c-35.3 0-64 28.7-64 64l0 96c0 17.7 14.3 32 32 32l32 0 0 64c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-64zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                        </svg>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="px-6 py-4 text-sm text-primary text-center" colspan="7">No ironing data</td>
                    </tr>
                @endif

            </tbody>
        </x-slot>
        <x-slot name="pagination">
            <div id="pagination-container">
                {{ $ironing->links('pagination.table-pagination') }}
            </div>
        </x-slot>
    </x-table-admin>

    <script>
        document.getElementById('search').addEventListener('input', function() {
            const search = this.value;
            document.getElementById('printLink').href = 
            `{!! route("admin.print", [
                    "type" => "ironing",
                    "sort" => request("sort"),
                    "status" => request("status"),
                    "search" => "SEARCH",
            ]) !!}`
            .replace('SEARCH', encodeURIComponent(search));
        });
    </script>

    @include('pages.modal-add-ironing')
    @include('pages.modal-edit-ironing')
    @include('pages.ironing-information-admin')
    @include('pages.modal-transaction-admin')
</x-admin-layout>