<x-admin-layout>
    <div class="mb-6 flex items-center justify-between" data-module="transaction">
        <div>
            <div class="flex gap-8 items-center">
                <h1 class="font-bold text-lg md:text-2xl">Transaction</h1>
                <x-loader></x-loader>
            </div>
            <p class="text-black/50 text-[.8rem] md:text-base">Manage and respond to user reports.</p>
        </div>

        <button class="bg-primary text-white p-2 rounded-sm cursor-pointer">
            <a href="{{ route('admin.print', [
                'type' => 'transaction',
                'search' => request('search'),
                'time' => request('time'),
            ]) }}"
                target="_blank" id="printLink">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-7 md:h-7" fill="currentColor"
                    viewBox="0 0 512 512">
                    <path
                        d="M128 0C92.7 0 64 28.7 64 64l0 96 64 0 0-96 226.7 0L384 93.3l0 66.7 64 0 0-66.7c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0L128 0zM384 352l0 32 0 64-256 0 0-64 0-16 0-16 256 0zm64 32l32 0c17.7 0 32-14.3 32-32l0-96c0-35.3-28.7-64-64-64L64 192c-35.3 0-64 28.7-64 64l0 96c0 17.7 14.3 32 32 32l32 0 0 64c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-64zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                </svg>
            </a>
        </button>
    </div>

    <form action="" method="" id="filterForm">
        <div class="mb-6 flex items-center justify-between gap-2">
            <div class="relative inline-block w-64">
                <span onclick="const input = document.getElementById('monthInput'); input.focus(); input.click();"
                    class="absolute left-3 top-1/2 -translate-y-1/2 cursor-pointer z-10">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M6 2a1 1 0 00-1 1v1H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2h-.002V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zM5 8h10v8H5V8z" />
                    </svg>
                </span>
                <input id="monthInput" type="month" name="time"
                    class="bg-primary text-white text-center font-bold rounded-sm py-2 w-full pl-10 pr-4 outline-none appearance-none"
                    onchange="document.getElementById('filterForm').submit()" value="{{ request('time') }}" />
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
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Total</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Method</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Action</th>
            </tr>
        </x-slot>

        <x-slot name="tbody">
            <tbody class="bg-white divide-y divide-primary" id="transactionList">
                @if (!$transactions->isEmpty())
                    @foreach ($transactions as $index => $transaction)
                        <tr>
                            <td class="px-6 py-4 text-sm text-primary">
                                {{ str_pad($transactions->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-6 py-4 text-sm text-primary">
                                {{ $transaction?->ironing?->name_ironing ?? $transaction?->laundry?->name_laundry }}</td>
                            <td class="px-6 py-4 text-sm text-primary">
                                {{ \Carbon\Carbon::parse($transaction->created_at)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 text-sm text-primary">
                                {{ Str::formatCurrency($transaction->price_transaction) }}</td>
                            <td class="px-6 py-4 text-sm text-primary">{{ ucfirst($transaction->method) }}</td>
                            <td class="px-6 py-4 flex items-center gap-2 text-sm text-gray-500">
                                <button data-modal-target="modalInformationTransaction" data-id="{{ $transaction->id }}"
                                    data-modal-key="showModalInfoTransaction"
                                    class="text-blue-500 hover:text-blue-700 cursor-pointer mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                    </svg>
                                </button>
                                <a href="{{ route('admin.print', [
                                    'type' => 'transactionReceipt',
                                    ]) }}" target="_blank" id="printLink">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M128 0C92.7 0 64 28.7 64 64l0 96 64 0 0-96 226.7 0L384 93.3l0 66.7 64 0 0-66.7c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0L128 0zM384 352l0 32 0 64-256 0 0-64 0-16 0-16 256 0zm64 32l32 0c17.7 0 32-14.3 32-32l0-96c0-35.3-28.7-64-64-64L64 192c-35.3 0-64 28.7-64 64l0 96c0 17.7 14.3 32 32 32l32 0 0 64c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-64zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                    </svg>
                                </a>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="px-6 py-4 text-md text-primary text-center" colspan="6">No transaction data</td>
                    </tr>
                @endif
            </tbody>
        </x-slot>
        <x-slot name="pagination">
            <div id="pagination-container">
                {{ $transactions->links('pagination.table-pagination') }}
            </div>
        </x-slot>
    </x-table-admin>

    <script>
        document.getElementById('search').addEventListener('input', function() {
            const search = this.value;
            document.getElementById('printLink').href = 
            `{!! route("admin.print", [
                    "type" => "transaction", 
                    "search" => "SEARCH", 
                    "time" => request("time")
            ]) !!}`
            .replace('SEARCH', encodeURIComponent(search));
        });
    </script>

    @include('pages.transaction-information-admin')
</x-admin-layout>
