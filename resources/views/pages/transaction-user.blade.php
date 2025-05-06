<x-user-layout>
    {{-- transaction --}}
    <section class="min-h-screen bg-gradient-to-b from-white via-[#e6f7f9] to-[#d0f0f5] relative py-16 md:py-24">
        <div class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">

            <x-back-to-home></x-back-to-home>

            <!-- Header -->
            <div class="mb-10 mt-5 text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-primary mb-3 drop-shadow-sm">
                    Transaction {{ $transaction?->name_ironing ?? $transaction?->name_laundry }}
                </h1>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ab et blanditiis au
                </p>
            </div>

            <!-- Progress Tracker -->
            <div class="flex justify-between items-center mb-10 mt-6">
                <div class="flex flex-col items-center">
                    <div class="bg-primary text-white rounded-full h-10 w-10 flex items-center justify-center shadow-md">
                        <span class="font-medium">1</span>
                    </div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Order</span>
                </div>
                <div class="h-1 flex-1 bg-primary mx-2"></div>
                <div class="flex flex-col items-center">
                    <div
                        class="bg-primary text-white rounded-full h-10 w-10 flex items-center justify-center shadow-md relative">
                        <span class="font-medium">2</span>
                        <span
                            class="absolute -top-1 -right-1 bg-white border-2 border-primary rounded-full w-4 h-4 flex items-center justify-center">
                            <span class="block w-2 h-2 bg-primary rounded-full"></span>
                        </span>
                    </div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Payment</span>
                </div>
                <div class="h-1 flex-1 bg-gray-300 mx-2"></div>
                <div class="flex flex-col items-center">
                    <div
                        class="bg-gray-200 text-gray-500 rounded-full h-10 w-10 flex items-center justify-center shadow-sm">
                        <span class="font-medium">3</span>
                    </div>
                    <span class="text-xs mt-2 font-medium text-gray-500">Complete</span>
                </div>
            </div>

            <!-- Transaction Header -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8 border border-gray-100">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                    <h1 class="text-2xl md:text-3xl text-primary font-bold">
                        Transaction: {{ $transaction?->name_ironing ?? $transaction?->name_laundry }}
                    </h1>
                    <div class="mt-2 md:mt-0 bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                        Service ID: #{{ str_pad($transaction->id, 4, '0', STR_PAD_LEFT) }}
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                    <div>
                        <span class="text-gray-500 block">Transaction Date:</span>
                        <span
                            class="font-medium">{{ \Carbon\Carbon::parse($transaction->created_at ?? now())->format('d M Y, H:i') }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block">Status:</span>
                        <span class="font-medium text-yellow-600">Awaiting Payment</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block">Estimated Completion:</span>
                        <span
                            class="font-medium">{{ \Carbon\Carbon::parse($transaction->created_at ?? now())->addWeek()->format('d M Y') }}</span>
                    </div>
                </div>
            </div>

            <form action="{{ route('transaction.add') }}" method="post">
                @csrf
                <input type="hidden" name="service-type"
                    value="{{ $transaction?->name_ironing ?? ($transaction?->name_laundry ?? old('service-type')) }}">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 relative z-10">
                    <!-- Left Column - Item Details -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Item Details Card -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
                            <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                                <h2 class="text-lg font-bold text-gray-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Item Details
                                </h2>
                            </div>

                            <div class="p-6 pt-4">
                                <h3 class="text-xl font-bold text-gray-800 mb-3">
                                    {{ $transaction?->name_ironing ?? $transaction?->name_laundry }}
                                </h3>

                                @if ($transaction->orderItems->count() > 1)
                                    <div class="relative">
                                        <div class="cursor-pointer absolute -left-3 top-1/2 -translate-y-1/2 bg-primary text-white p-2 rounded-full shadow-md hover:bg-primary-dark transition z-10"
                                            id="prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </div>
                                @endif
                                <div class="flex flex-row overflow-x-auto gap-5 w-full {{ $transaction->orderItems->count() > 1 ? 'px-8' : 'px-0 md:pl-5' }} scrollbar-hide"
                                    id="slider">
                                    @foreach ($transaction->orderItems as $orderItem)
                                        <div
                                            class="item-card flex flex-col md:flex-row gap-6 justify-center items-center w-full min-w-full px-0 pt-5 pb-4">
                                            <div class="w-full md:w-[40%]">
                                                <div
                                                    class="bg-secondary rounded-lg flex justify-center w-full h-40 overflow-hidden">
                                                    <img src="{{ Storage::url($orderItem?->itemType?->image_item) }}"
                                                        alt="transaction"
                                                        class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                                </div>
                                            </div>

                                            <div class="w-full md:w-[60%] pl-5 md:pl-0">
                                                <div class="grid grid-cols-2 gap-4 mb-4">
                                                    <div>
                                                        <span class="text-gray-500 text-sm">Item Type:</span>
                                                        <p class="font-medium">
                                                            {{ $orderItem?->itemType?->name_item ?? 'Standard' }}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <span class="text-gray-500 text-sm">Service Type:</span>
                                                        <p class="font-medium">
                                                            {{ ucfirst($serviceType) }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-2 gap-4 mb-4">
                                                    <div>
                                                        <span class="text-gray-500 text-sm">Amount:</span>
                                                        <p class="font-medium">
                                                            {{ $orderItem->quantity }}
                                                            items
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <span class="text-gray-500 text-sm">Unit Price:</span>
                                                        <p class="font-medium">{{ Str::formatCurrency($orderItem->itemType?->price_item ?? 0) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($transaction->orderItems->count() > 1)
                                    <div class="cursor-pointer absolute -right-3 top-1/2 -translate-y-1/2 bg-primary text-white p-2 rounded-full shadow-md hover:bg-primary-dark transition z-10"
                                        id="next">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                            </div>
                            @endif

                            @error('service-type')
                                <p class="mt-4 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Delivery Information -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                            <h2 class="text-lg font-bold text-gray-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                    <path
                                        d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1v-5h2.05a2.5 2.5 0 014.9 0H19a1 1 0 001-1v-4a1 1 0 00-.293-.707l-2-2A1 1 0 0017 2h-1V1a1 1 0 00-2 0v1h-2V1a1 1 0 00-2 0v1H8V1a1 1 0 00-2 0v1H5a1 1 0 00-.707.293l-2 2A1 1 0 002 5v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1v-5h2.05a2.5 2.5 0 014.9 0H19a1 1 0 001-1v-4a1 1 0 00-.293-.707l-2-2A1 1 0 0017 2h-1V1a1 1 0 00-2 0v1h-2V1a1 1 0 00-2 0v1H8V1a1 1 0 00-2 0v1H5a1 1 0 00-.707.293l-2 2A1 1 0 002 5v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1v-5h2.05a2.5 2.5 0 014.9 0H19a1 1 0 001-1v-4a1 1 0 00-.293-.707l-2-2A1 1 0 0017 2h-1V1a1 1 0 00-2 0v1h-2V1a1 1 0 00-2 0v1H8V1a1 1 0 00-2 0v1H5a1 1 0 00-.707.293l-2 2A1 1 0 002 5v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zm12 10.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                </svg>
                                Delivery Information
                            </h2>
                        </div>

                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="bg-primary/10 rounded-full p-2 mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-gray-500 text-sm">Retrieval Method:</span>
                                    <p class="font-medium capitalize">
                                        {{ Str::formatSnakeCaseToLabel($transaction->retrieval_method ?? old('retrieval-method')) }}</p>
                                </div>
                            </div>

                            @if ($transaction->retrieval_method === 'delivery')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                    <div>
                                        <label for="address-taking"
                                            class="text-sm font-bold text-gray-700 block mb-2">Pickup
                                            Address</label>
                                        <div
                                            class="bg-secondary rounded-md p-4 text-primary border border-gray-200 min-h-[80px]">
                                            {{ $transaction->address_taking ?? old('address-taking') }}
                                        </div>
                                        @error('address-taking')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="address-delivery"
                                            class="text-sm font-bold text-gray-700 block mb-2">Delivery
                                            Address</label>
                                        <div
                                            class="bg-secondary rounded-md p-4 text-primary border border-gray-200 min-h-[80px]">
                                            {{ $transaction->address_delivery ?? old('address-delivery') }}
                                        </div>
                                        @error('address-delivery')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-4 bg-yellow-50 border border-yellow-100 rounded-md p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-yellow-800">Delivery Information
                                            </h3>
                                            <div class="mt-2 text-sm text-yellow-700">
                                                <p>Estimated pickup time:
                                                    {{ \Carbon\Carbon::parse($transaction->created_at ?? now())->addHours(2)->format('d M Y, H:i') }}
                                                </p>
                                                <p>Estimated delivery time:
                                                    {{ \Carbon\Carbon::parse($transaction->created_at ?? now())->addDays(2)->format('d M Y, H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="bg-blue-50 border border-blue-100 rounded-md p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-blue-800">Take Away Information
                                            </h3>
                                            <div class="mt-2 text-sm text-blue-700">
                                                <p>Please bring your receipt when picking up your items.</p>
                                                <p>Estimated completion time:
                                                    {{ \Carbon\Carbon::parse($transaction->created_at ?? now())->addDays(1)->format('d M Y, H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Customer Information -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                            <h2 class="text-lg font-bold text-gray-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Customer Information
                            </h2>
                        </div>

                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <span class="text-gray-500 text-sm">Customer Name:</span>
                                    <p class="font-medium">{{ auth()->user()->name ?? 'Customer Name' }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-500 text-sm">Email:</span>
                                    <p class="font-medium">{{ auth()->user()->email ?? 'customer@example.com' }}
                                    </p>
                                </div>
                                <div>
                                    <span class="text-gray-500 text-sm">Phone Number:</span>
                                    <p class="font-medium">{{ auth()->user()->telp ?? '(Not provided)' }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-500 text-sm">Customer Since:</span>
                                    <p class="font-medium">
                                        {{ \Carbon\Carbon::parse(auth()->user()->created_at ?? now())->format('M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Payment Information -->
                <div class="lg:col-span-1 space-y-8">
                    <!-- Order Summary -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 sticky top-8">
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                            <h2 class="text-lg font-bold text-gray-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm4.707 3.707a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L8.414 9H10a3 3 0 013 3v1a1 1 0 102 0v-1a5 5 0 00-5-5H8.414l1.293-1.293z"
                                        clip-rule="evenodd" />
                                </svg>
                                Order Summary
                            </h2>
                        </div>

                        @php
                            $price = $transaction->price_ironing ?? $transaction->price_laundry;
                            $deliveryFee = $transaction->retrieval_method === 'delivery' ? 20000 : 0;
                            $subTotal = $transaction->retrieval_method === 'delivery' ? ($price - $deliveryFee) / 1.1 : $price;
                            $tax = $transaction->retrieval_method === 'delivery' ? $subTotal * 0.1 : 0;
                        @endphp
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-medium">{{ Str::formatCurrency($subTotal) }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="text-gray-600">Delivery Fee</span>
                                    <span class="font-medium">{{ Str::formatCurrency($deliveryFee) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tax (10%)</span>
                                    <span class="font-medium">{{ Str::formatCurrency($tax) }}</span>
                                </div>

                                <div class="border-t border-gray-200 pt-4 mt-4">
                                    <div class="flex justify-between">
                                        <span class="text-lg font-bold text-gray-800">Total</span>
                                        <span class="text-lg font-bold text-primary">
                                            {{ Str::formatCurrency($price) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method Selection -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                            <h2 class="text-lg font-bold text-gray-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                    <path fill-rule="evenodd"
                                        d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                Payment Method
                            </h2>
                        </div>

                        <div class="p-6">
                            <div class="grid grid-cols-2 gap-4">
                                @if ($transaction->retrieval_method === 'delivery')
                                    <div class="col-span-2 mx-5">
                                        <input type="radio" name="payment-method" value="debit" id="debit"
                                            class="peer hidden" @checked(old('payment-method') == 'debit') checked />
                                        <label for="debit"
                                            class="block peer-checked:ring-2 peer-checked:ring-primary peer-checked:bg-primary/5 bg-white text-primary p-4 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 cursor-pointer border border-gray-200 hover:border-primary">
                                            <h3 class="text-base font-bold text-center mb-2">Debit</h3>
                                            <div class="flex flex-col items-center p-1">
                                                <img src="{{ asset('img/debit.svg') }}" alt="debit"
                                                    class="w-16 h-16 transition-transform duration-300 hover:scale-105" />
                                            </div>
                                        </label>
                                    </div>
                                @elseif ($transaction->retrieval_method === 'take_away')
                                    <div>
                                        <input type="radio" name="payment-method" value="debit" id="debit"
                                            class="peer hidden" @checked(old('payment-method') == 'debit') />
                                        <label for="debit"
                                            class="block peer-checked:ring-2 peer-checked:ring-primary peer-checked:bg-primary/5 bg-white text-primary p-4 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 cursor-pointer border border-gray-200 hover:border-primary">
                                            <h3 class="text-base font-bold text-center mb-2">Debit</h3>
                                            <div class="flex flex-col items-center p-1">
                                                <img src="{{ asset('img/debit.svg') }}" alt="debit"
                                                    class="w-16 h-16 transition-transform duration-300 hover:scale-105" />
                                            </div>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" name="payment-method" value="cash" id="cash"
                                            class="peer hidden" @checked(old('payment-method') == 'cash') />
                                        <label for="cash"
                                            class="block peer-checked:ring-2 peer-checked:ring-primary peer-checked:bg-primary/5 bg-white text-primary p-4 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 cursor-pointer border border-gray-200 hover:border-primary">
                                            <h3 class="text-base font-bold text-center mb-2">Cash</h3>
                                            <div class="flex flex-col items-center p-1">
                                                <img src="{{ asset('img/cash.svg') }}" alt="cash"
                                                    class="w-16 h-16 transition-transform duration-300 hover:scale-105" />
                                            </div>
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @error('payment-method')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Debit Card Details -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100" id="debitBox">
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                            <h2 class="text-lg font-bold text-gray-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                                </svg>
                                Card Details
                            </h2>
                        </div>

                        <div class="p-6">
                            <div class="space-y-4">
                                <div>
                                    <label for="bank-name" class="text-sm font-medium text-gray-700 block mb-1">Card
                                        Type</label>
                                    <div class="relative">
                                        <select
                                            class="appearance-none bg-secondary font-medium rounded-md py-3 px-4 w-full border border-gray-200 focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
                                            name="bank-name">
                                            <option value="card" @selected(old('bank-name') == 'card')>Card</option>
                                            <option value="visa" @selected(old('bank-name') == 'visa')>Visa</option>
                                            <option value="mastercard" @selected(old('bank-name') == 'mastercard')>Mastercard
                                            </option>
                                            <option value="amex" @selected(old('bank-name') == 'amex')>American Express
                                            </option>
                                            <option value="dll" @selected(old('bank-name') == 'dll')>Other</option>
                                        </select>

                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="w-5 h-5 fill-current text-primary"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                                            </svg>
                                        </div>
                                    </div>
                                    @error('bank-name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="card-number" class="text-sm font-medium text-gray-700 block mb-1">Card
                                        Number</label>
                                    <input type="text" id="card-number" name="card-number"
                                        placeholder="XXXX XXXX XXXX XXXX"
                                        class="text-primary bg-secondary w-full p-3 rounded-md outline-0 border border-gray-200 focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
                                        value="{{ old('card-number') }}">
                                    @error('card-number')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="postal-code"
                                        class="text-sm font-medium text-gray-700 block mb-1">Postal
                                        Code</label>
                                    <input type="text" id="postal-code" name="postal-code" placeholder="12345"
                                        class="text-primary bg-secondary w-full p-3 rounded-md outline-0 border border-gray-200 focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
                                        value="{{ old('postal-code') }}">
                                    @error('postal-code')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Button -->
                    <button type="submit"
                        class="w-full bg-primary hover:bg-primary-dark rounded-lg cursor-pointer text-white py-4 font-bold text-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1 relative overflow-hidden group focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        <span class="relative z-10">Pay Now</span>
                        <span
                            class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></span>
                    </button>

                    <!-- Payment Terms -->
                    <div class="text-xs text-gray-500 text-center">
                        By clicking "Pay Now", you agree to our <a href="#"
                            class="text-primary hover:underline">Terms
                            of Service</a> and <a href="#" class="text-primary hover:underline">Privacy
                            Policy</a>. For
                        questions, contact our <a href="#" class="text-primary hover:underline">Support
                            Team</a>.
                    </div>
                </div>
            </div>
            </form>
        </div>

        <!-- Decorative waves -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                class="w-full h-auto fill-primary opacity-20">
                <path
                    d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,261.3C960,256,1056,224,1152,208C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>

    <script>
        const debitBox = document.getElementById('debitBox');

        // Initialize based on any pre-selected value
        document.addEventListener('DOMContentLoaded', () => {
            const selectedMethod = document.querySelector('input[name="payment-method"]:checked');
            if (selectedMethod && selectedMethod.value === 'cash') {
                debitBox.classList.add('hidden');
            }
        });

        document.addEventListener('click', (e) => {
            if (e.target.closest('input[name="payment-method"]')) {
                const paymentMethod = e.target.closest('input[name="payment-method"]');
                if (paymentMethod.value === 'cash') {
                    debitBox.classList.add('hidden');
                } else {
                    debitBox.classList.remove('hidden');
                }
            }
        });

        //  For slider in Item Details
        document.addEventListener('DOMContentLoaded', () => {
            const slider = document.getElementById('slider');
            const prev = document.getElementById('prev');
            const next = document.getElementById('next');
            const item = document.querySelector('.item-card').getBoundingClientRect().width + 22;
            let autoScrollDirection = "next";
            let autoSlideInterval;
            let timeOut;

            function updateSlide(type, slide, item) {
                if (type == "next") {
                    let newScroll = slide.scrollLeft + item;
                    slide.scrollTo({
                        left: Math.round(newScroll),
                        behavior: "smooth"
                    });
                }

                if (type == "prev") {
                    let newScroll = slide.scrollLeft - item + 5;
                    slide.scrollTo({
                        left: Math.round(newScroll),
                        behavior: "smooth"
                    });
                }
            }

            function startAutoSlide() {
                autoSlideInterval = setInterval(() => {
                    if (autoScrollDirection === "next" && slider.scrollLeft + slider.offsetWidth >= slider
                        .scrollWidth) {
                        autoScrollDirection = "prev";
                    } else if (autoScrollDirection === "prev" && slider.scrollLeft <= 0) {
                        autoScrollDirection = "next";
                    }
                    updateSlide(autoScrollDirection, slider, item);
                }, 3000);
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
                clearTimeout(timeOut);
            }

            prev.addEventListener('click', () => {
                stopAutoSlide();
                updateSlide("prev", slider, item);
                timeOut = setTimeout(startAutoSlide, 5000); // Restart auto-slide after 5 seconds
            });

            next.addEventListener('click', () => {
                stopAutoSlide();
                updateSlide("next", slider, item);
                timeOut = setTimeout(startAutoSlide, 5000); // Restart auto-slide after 5 seconds
            });

            // Start auto-slide on page load
            startAutoSlide();
        });
    </script>
</x-user-layout>
