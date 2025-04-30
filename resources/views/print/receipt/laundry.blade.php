<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry & Ironing Receipt - HydroWash</title>
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
                <p class="text-gray-500 text-sm">Laundry & Ironing Service</p>
                <p class="text-gray-500 text-sm">23-04-2025 14:30</p>
            </div>

            <!-- Receipt Details -->
            <div class="py-4 border-b border-gray-200">
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Receipt No:</span>
                    <span class="font-medium">LI-20250423-001</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Customer:</span>
                    <span class="font-medium">Malvin</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Date:</span>
                    <span class="font-medium">23-04-2025</span>
                </div>
            </div>

            <!-- Service Details -->
            <div class="py-4 border-b border-gray-200">
                <h2 class="font-semibold mb-3">Service Details</h2>

                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-2">Item</th>
                            <th class="text-right py-2">Qty</th>
                            <th class="text-right py-2">Price</th>
                            <th class="text-right py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100">
                            <td class="py-2">Regular Wash</td>
                            <td class="text-right py-2">2</td>
                            <td class="text-right py-2">Rp 7,500.00</td>
                            <td class="text-right py-2">Rp 15,000.00</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-2">Ironing Service</td>
                            <td class="text-right py-2">5</td>
                            <td class="text-right py-2">Rp 5,000.00</td>
                            <td class="text-right py-2">Rp 25,000.00</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-2">Premium Wash</td>
                            <td class="text-right py-2">1</td>
                            <td class="text-right py-2">Rp 10,000.00</td>
                            <td class="text-right py-2">Rp 10,000.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Payment Summary -->
            <div class="py-4">
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Subtotal:</span>
                    <span>Rp 50,000.00</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Tax (10%):</span>
                    <span>Rp 5,000.00</span>
                </div>
                <div class="flex justify-between font-bold text-lg">
                    <span>Total:</span>
                    <span>Rp 55,000.00</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span class="text-gray-600">Payment Method:</span>
                    <span>Cash</span>
                </div>
            </div>

            <!-- Pickup Information -->
            <div class="py-4 border-t border-gray-200">
                <h2 class="font-semibold mb-2">Pickup Information</h2>
                <div class="flex justify-between mb-1">
                    <span class="text-gray-600">Estimated Ready:</span>
                    <span>25-04-2025</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Order Status:</span>
                    <span class="bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full text-xs">Processing</span>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center pt-4 text-gray-500 text-sm">
                <p>Thank you for choosing HydroWash!</p>
                <p>For inquiries, please contact: 0812-3456-7890</p>
                <p class="mt-2">www.hydrowash.com</p>
            </div>
        </div>
    </div>
</body>
</html>
