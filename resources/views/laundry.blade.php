<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Receipt - HydroWash</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#009BAD',
                        secondary: '#6E91A2'
                    }
                }
            }
        }
    </script>
    <style>
        @media print {
            body {
                width: 80mm;
                margin: 0;
                padding: 0;
            }
            .no-print {
                display: none;
            }
            .receipt {
                border: none !important;
                box-shadow: none !important;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8 px-4">
        <!-- Print Button -->
        <div class="text-right mb-4 no-print">
            <button onclick="window.print()" class="bg-primary hover:bg-secondary text-white font-medium py-2 px-4 rounded">
                Print Receipt
            </button>
        </div>

        <!-- Receipt -->
        <div class="receipt bg-white rounded-lg shadow-lg max-w-md mx-auto p-6">
            <!-- Header -->
            <div class="text-center border-b border-gray-200 pb-4">
                <div class="flex justify-center mb-2">
                    <div class="bg-primary rounded-full h-12 w-12 flex items-center justify-center text-white font-bold">
                        HW
                    </div>
                </div>
                <h1 class="font-bold text-xl">
                    Hydro<span class="text-primary">Wash</span>
                </h1>
                <p class="text-gray-500 text-sm">Transaction Receipt</p>
                <p class="text-gray-500 text-sm">23-04-2025 14:30</p>
            </div>

            <!-- Transaction Details -->
            <div class="py-4 border-b border-gray-200">
                <h2 class="font-semibold text-center text-lg mb-3">Transaction #N05BC2AC</h2>

                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Transaction Date:</span>
                    <span class="font-medium">23-04-2025</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Customer:</span>
                    <span class="font-medium">Malvin</span>
                </div>
            </div>

            <!-- Address Information -->
            <div class="py-4 border-b border-gray-200">
                <div class="mb-3">
                    <h3 class="text-gray-600 mb-1">Address Taking:</h3>
                    <p class="bg-gray-50 p-2 rounded">Jln dauh kangin</p>
                </div>

                <div>
                    <h3 class="text-gray-600 mb-1">Address Delivery:</h3>
                    <p class="bg-gray-50 p-2 rounded">Jln dauh kangin</p>
                </div>
            </div>

            <!-- Service Details -->
            <div class="py-4 border-b border-gray-200">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-gray-600 mb-1">Amount Item:</h3>
                        <p class="font-medium">5 items</p>
                    </div>
                    <div>
                        <h3 class="text-gray-600 mb-1">Take Away:</h3>
                        <p class="font-medium">Yes</p>
                    </div>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="py-4 border-b border-gray-200">
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-center">
                        <h3 class="text-gray-600 mb-2">Payment Method:</h3>
                        <div class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                            </svg>
                            <span class="mt-1">Cash</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="text-gray-600 mb-2">Total Amount:</h3>
                        <p class="font-bold text-lg">Rp 55,000.00</p>
                    </div>
                </div>
            </div>

            <!-- Status -->
            <div class="py-4 border-b border-gray-200">
                <div class="flex justify-between">
                    <span class="text-gray-600">Status:</span>
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Completed</span>
                </div>
            </div>

            <!-- Notes -->
            <div class="py-4 border-b border-gray-200">
                <h3 class="text-gray-600 mb-1">Notes:</h3>
                <p class="bg-gray-50 p-2 rounded text-sm">Please handle with care. Contains delicate fabrics.</p>
            </div>

            <!-- Footer -->
            <div class="text-center pt-4 text-gray-500 text-sm">
                <p>Thank you for choosing HydroWash!</p>
                <p>For inquiries, please contact: 0812-3456-7890</p>
                <p class="mt-2">www.hydrowash.com</p>

                <!-- QR Code Placeholder -->
                <div class="flex justify-center mt-3">
                    <div class="border border-gray-200 p-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-xs">Scan to track your order</p>
            </div>
        </div>
    </div>
</body>
</html>
