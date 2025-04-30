<x-user-layout>
  <div class="container mx-auto px-4 pt-20 pb-10">
    <div class="max-w-2xl mx-auto">
        <!-- Payment Steps -->
        <div class="flex justify-between items-center mb-8 px-4">
            <div class="flex flex-col items-center">
                <div class="bg-primary text-white rounded-full h-8 w-8 flex items-center justify-center">
                    <span>1</span>
                </div>
                <span class="text-xs mt-1 text-gray-600">Order</span>
            </div>
            <div class="h-1 flex-1 bg-primary mx-2"></div>
            <div class="flex flex-col items-center">
                <div class="bg-primary text-white rounded-full h-8 w-8 flex items-center justify-center">
                    <span>2</span>
                </div>
                <span class="text-xs mt-1 text-gray-600">Payment</span>
            </div>
            <div class="h-1 flex-1 bg-primary mx-2"></div>
            <div class="flex flex-col items-center">
                <div class="bg-primary text-white rounded-full h-8 w-8 flex items-center justify-center">
                    <span>3</span>
                </div>
                <span class="text-xs mt-1 text-gray-600">Complete</span>
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
                <button id="finishedBtn" class="bg-primary hover:bg-secondary text-white font-medium py-3 px-8 rounded transition duration-300 sm:ml-auto">
                    Finished
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Simple JavaScript to handle the Finished button
    document.getElementById('finishedBtn').addEventListener('click', function() {
        // Redirect to home page or dashboard
        window.location.href = "index.html";
    });
</script>
</x-user-layout>