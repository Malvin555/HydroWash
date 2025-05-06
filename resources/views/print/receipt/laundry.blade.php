<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Receipt - HydroWash</title>

    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #1f2937;
        }
    
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
    
        .text-center {
            text-align: center;
        }
    
        .mb-4 {
            margin-bottom: 1rem;
        }
    
        .print-button {
            background-color: #00879E;
            color: #ffffff;
            font-weight: 600;
            padding: 0.6rem 1.2rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
    
        .print-button:hover {
            background-color: #00879E;
        }
    
        .receipt {
            background-color: #ffffff;
            border-radius: 0.75rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            margin: 0 auto;
            padding: 2rem;
        }
    
        .header {
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 1.25rem;
            margin-bottom: 1rem;
        }
    
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 0.5rem;
        }
    
        .logo {
            background-color: #2563eb;
            border-radius: 9999px;
            height: 3.25rem;
            width: 3.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: bold;
            font-size: 1.2rem;
        }
    
        .brand-name {
            font-weight: 700;
            font-size: 1.5rem;
        }
    
        .brand-highlight {
            color: #00879E;
        }
    
        .text-sm {
            font-size: 0.875rem;
            color: #6b7280;
        }
    
        .section {
            padding: 1rem 0;
            border-bottom: 1px solid #e5e7eb;
        }
    
        .flex-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
    
        .label {
            color: #374151;
        }
    
        .value {
            font-weight: 500;
        }
    
        .section-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.75rem;
            color: #111827;
        }
    
        table {
            width: 100%;
            font-size: 0.9rem;
            border-collapse: collapse;
        }
    
        th {
            text-align: left;
            padding: 0.75rem 0;
            border-bottom: 1px solid #d1d5db;
            color: #4b5563;
        }
    
        td {
            padding: 0.65rem 0;
            border-bottom: 1px solid #f3f4f6;
        }
    
        th:nth-child(2),
        th:nth-child(3),
        th:nth-child(4),
        td:nth-child(2),
        td:nth-child(3),
        td:nth-child(4) {
            text-align: right;
        }
    
        .total-row {
            font-weight: 700;
            font-size: 1.05rem;
            color: #111827;
        }
    
        .status-badge {
            background-color: #fef3c7;
            color: #92400e;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
    
        .footer {
            text-align: center;
            padding-top: 1.25rem;
            font-size: 0.875rem;
            color: #6b7280;
        }
    
        .mt-2 {
            margin-top: 0.5rem;
        }
    
        @media print {
            body {
                background: none;
                width: 80mm;
                margin: 0;
                padding: 0;
            }
            .no-print {
                display: none;
            }
            .receipt {
                box-shadow: none !important;
                border: none !important;
            }
        }
    </style>
    
</head>
<body>
    <div class="container">
        <!-- Receipt -->
        <div class="receipt">
            <!-- Header -->
            <div class="header">
                <h1 class="brand-name">
                    Hydro<span class="brand-highlight">Wash</span>
                </h1>
                <p class="text-sm text-gray">Laundry Service</p>
                <p class="text-sm text-gray">{{ $data->created_at->format('d-m-Y H:i') }}</p>
            </div>

            <!-- Receipt Details -->
            <div class="section">
                <div class="flex-row">
                    <span class="label">Receipt No:</span>
                    <span class="value">{{ $data->receipt_no }}</span>
                </div>
                <div class="flex-row">
                    <span class="label">Customer:</span>
                    <span class="value">{{ $data->user->name }}</span>
                </div>
                <div class="flex-row">
                    <span class="label">Date:</span>
                    <span class="value">{{ $data->created_at->format('d-m-Y') }}</span>
                </div>
            </div>

            <!-- Service Details -->
            <div class="section">
                <h2 class="section-title">Service Details</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data->orderItems as $item)
                            <tr>
                                <td>{{ $item->itemType->name_item }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ Str::formatCurrency($item->itemType->price_item) }}</td>
                                <td>{{ Str::formatCurrency($item->price_total) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No Ironing Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Payment Summary -->
            <div class="section" style="border-bottom: none;">
                <div class="flex-row">
                    <span class="label">Subtotal:</span>
                    <span>{{ Str::formatCurrency($data->sub_total) }}</span>
                </div>
                <div class="flex-row">
                    <span class="label">Delivery Fee:</span>
                    <span>{{ Str::formatCurrency($data->delivery_fee) }}</span>
                </div>
                <div class="flex-row">
                    <span class="label">Tax (10%):</span>
                    <span>{{ Str::formatCurrency($data->tax) }}</span>
                </div>
                <div class="flex-row total-row">
                    <span>Total:</span>
                    <span>{{ Str::formatCurrency($data->price_total) }}</span>
                </div>
                <div class="flex-row" style="margin-top: 0.5rem;">
                    <span class="label">Payment Method:</span>
                    <span>{{ Str::formatSnakeCaseToLabel($data->retrieval_method) }}</span>
                </div>
            </div>

            <!-- Pickup Information -->
            <div class="section" style="border-top: 1px solid #e5e7eb; border-bottom: none;">
                <h2 class="section-title">Pickup Information</h2>
                <div class="flex-row" style="margin-bottom: 0.25rem;">
                    <span class="label">Estimated Ready:</span>
                    <span>{{ \Carbon\Carbon::parse($data->estimation)->format('d-m-Y') }}</span>
                </div>
                <div class="flex-row">
                    <span class="label">Order Status:</span>
                    <span class="status-badge">{{ ucfirst($data->status) }}</span>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <p>Thank you for choosing HydroWash!</p>
                <p>For inquiries, please contact: 0812-3456-7890</p>
                <p class="mt-2">www.hydrowash.com</p>
            </div>
        </div>
    </div>
</body>
</html>