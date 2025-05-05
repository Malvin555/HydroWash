<x-user-layout>
    {{-- complete added service --}}
    <section class="min-h-screen bg-gradient-to-b from-white via-[#e6f7f9] to-[#d0f0f5] relative py-16 md:py-24">
        <div class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            <!-- Success Card -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden animate-fadeIn relative z-10">
                <!-- Header -->
                <div class="bg-primary text-white p-6 text-center relative">

                    <div class="bg-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <h1 class="text-2xl md:text-3xl font-bold mb-2">Order Successfully Added!</h1>
                    <p class="text-white/80">Your service has been successfully added to our system</p>
                </div>

                <!-- Order Details -->
                <div class="p-6 md:p-8">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Left Column - Service Image -->
                        <div class="md:w-1/3 flex justify-center">
                            <div class="relative">
                                <img src="{{ asset('img/complete-added.png') }}" alt="Service Added Successfully"
                                    class="w-48 h-auto mx-auto animate-float">
                                <div class="absolute -bottom-4 w-full h-4 bg-black/5 rounded-full blur-md"></div>
                            </div>
                        </div>

                        <!-- Right Column - Service Details -->
                        <div class="md:w-2/3">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Service Details</h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div class="bg-gray-50 p-4 rounded-xl">
                                    <span class="text-gray-500 text-sm block mb-1">Service Type:</span>
                                    <p class="font-medium text-lg">{{ ucfirst($serviceType) }}</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-xl">
                                    <span class="text-gray-500 text-sm block mb-1">Service Name:</span>
                                    <p class="font-medium text-lg">{{ $data->name_ironing ?? $data->name_laundry }}</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-xl">
                                    <span class="text-gray-500 text-sm block mb-1">Order ID:</span>
                                    <p class="font-medium text-lg">#{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-xl">
                                    <span class="text-gray-500 text-sm block mb-1">Date:</span>
                                    <p class="font-medium text-lg">
                                        {{ \Carbon\Carbon::parse($data->created_at)->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            <div class="bg-blue-50 border border-blue-100 rounded-xl p-5 mb-6">
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
                                        <h3 class="text-sm font-medium text-blue-800">Next Steps</h3>
                                        <div class="mt-2 text-sm text-blue-700">
                                            <p>Please proceed to the payment page to complete your order. Your service
                                                will be processed once payment is confirmed.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <a href="{{ route('home') }}"
                                    class="flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 w-full hover:bg-primary-dark rounded-lg cursor-pointer py-4 px-6 font-bold text-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1 relative overflow-hidden group focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7m-14 0l2 2m0 0l7 7 7-7m-14 0l2-2" />
                                    </svg>
                                    Return to History
                                </a>
                                <a href="{{ route('transaction', ['slug' => Str::slug($data->name_ironing ?? $data->name_laundry)]) }}"
                                    class="flex items-center justify-center gap-2 w-full bg-primary hover:bg-primary-dark rounded-lg cursor-pointer text-white py-4 px-6 font-bold text-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1 relative overflow-hidden group focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Proceed to Payment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 p-6 border-t border-gray-100 text-center">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4 max-w-2xl mx-auto">
                        <div class="flex items-center gap-3">
                            <div class="bg-primary/10 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-sm text-gray-600">Estimated completion: <span
                                    class="font-medium">Estimation will be added after transaction</span></span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="bg-primary/10 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <span class="text-sm text-gray-600">Need help? <a href="#"
                                    class="text-primary hover:underline">Contact support</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Card -->
            <div class="mt-8 bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden animate-fadeIn animation-delay-300 relative z-10">
                <div class="bg-primary/5 px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Order Summary
                    </h2>
                </div>
                <div class="p-6">
                    <div class="flex flex-col md:flex-row justify-between gap-6">
                        <div class="md:w-2/3 space-y-4">
                            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                                <span class="text-gray-600">Service Type:</span>
                                <span class="font-medium">{{ ucfirst($serviceType) }}</span>
                            </div>
                            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                                <span class="text-gray-600">Item Type:</span>
                                <span class="font-medium">{{ $data->orderItems->pluck('itemType.name_item')->implode(', ') }}</span>
                            </div>
                            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                                <span class="text-gray-600">Quantity:</span>
                                <span class="font-medium">{{ $data->amount_item }} items</span>
                            </div>
                        </div>
                        <div class="md:w-1/3 bg-gray-50 p-4 rounded-xl">
                            <div class="text-center mb-3">
                                <span class="text-sm text-gray-500">Total Amount</span>
                                <div class="text-2xl font-bold text-primary">
                                    Rp {{ number_format($data->price_laundry ?? $data->price_ironing, 2, ',', '.') }}
                                </div>
                            </div>
                            <div class="text-xs text-gray-500 text-center">
                                *Price may change based on additional services
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative wave at bottom -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                class="w-full h-auto fill-primary opacity-20">
                <path
                    d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,261.3C960,256,1056,224,1152,208C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>
</x-user-layout>
