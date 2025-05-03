<x-user-layout>
    <section class="min-h-screen bg-gradient-to-b from-white via-[#e6f7f9] to-[#d0f0f5] relative py-16 md:py-24">
        <div class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
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
                    <div class="bg-primary text-white rounded-full h-10 w-10 flex items-center justify-center shadow-md">
                        <span class="font-medium">2</span>
                    </div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Payment</span>
                </div>
                <div class="h-1 flex-1 bg-primary mx-2"></div>
                <div class="flex flex-col items-center">
                    <div class="bg-primary text-white rounded-full h-10 w-10 flex items-center justify-center shadow-md relative">
                        <span class="font-medium">3</span>
                        <span class="absolute -top-1 -right-1 bg-white border-2 border-primary rounded-full w-4 h-4 flex items-center justify-center">
                            <span class="block w-2 h-2 bg-primary rounded-full"></span>
                        </span>
                    </div>
                    <span class="text-xs mt-2 font-medium text-gray-500">Complete</span>
                </div>
            </div>

            <!-- Success Message -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                <div class="bg-primary text-white p-6 text-center">
                    <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-white mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold mb-2">Transaction Complete!</h2>
                    <p>Your laundry order has been successfully processed.</p>
                </div>

                <!-- Transaction Details Card -->
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-800 mb-4 border-b pb-2">Transaction Details</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div>
                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-1">Transaction ID:</p>
                                <p class="font-medium">#N05BC2AC</p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-1">Date & Time:</p>
                                <p>23-04-2025 14:30</p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-1">Service Type:</p>
                                <p>Laundry & Ironing</p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-1">Items:</p>
                                <p>5 items</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div>
                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-1">Payment Method:</p>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                    </svg>
                                    <span>Cash</span>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-1">Total Amount:</p>
                                <p class="font-bold text-primary">Rp 55,000.00</p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-1">Status:</p>
                                <span class="bg-blue-100 text-green-800 px-3 py-1 rounded-full text-sm">Process</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delivery Information -->
                <div class="p-6 border-t border-gray-200">
                    <h3 class="text-lg font-medium text-gray-800 mb-4 border-b pb-2">Delivery Information</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div>
                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-1">Delivery Address:</p>
                                <p>Jln dauh kangin</p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-1">Contact:</p>
                                <p>Malvin</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div>
                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-1">Estimated Delivery:</p>
                                <p>25-04-2025 (2 days)</p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-1">Retrieval Method:</p>
                                <p>Delivery</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="p-6 border-t border-gray-200 flex flex-col sm:flex-row gap-4">
                    <a href="#" class="border border-primary text-primary hover:bg-gray-50 font-medium py-2 px-6 rounded transition duration-300 text-center">
                        View Receipt
                    </a>
                    <a href="{{ route('history') }}">
                        <button id="finishedBtn" class="bg-primary hover:bg-secondary text-white font-medium py-3 px-8 rounded transition duration-300 sm:ml-auto">
                            Finished
                        </button>
                    </a>
                </div>
            </div>
        </div>



                <!-- Decorative wave at bottom -->
                <div class="absolute bottom-0 left-0 w-full overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto fill-primary opacity-20">
                        <path d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,261.3C960,256,1056,224,1152,208C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                    </svg>
                </div>
    </section>
</x-user-layout>
