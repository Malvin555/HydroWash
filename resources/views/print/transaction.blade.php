<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Print Transaction - HydroWash</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 40px;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 2px solid #00879E;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 28px;
            color: #00879E;
            margin: 0;
        }

        .header p {
            font-size: 16px;
            color: #555;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background-color: #00879E;
            color: white;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        @media print {
            body {
                margin: 0;
            }

            .header {
                page-break-after: avoid;
            }
        }
    </style>
</head>

<body>
    <h1>HydroWash</h1>
    
    <div class="header">
        <h2>Print Transaction</h2>
        @if ($data['date'])
            <p>Date: {{ \Carbon\Carbon::parse($data['date'])->format('m-Y') }}</p>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Total</th>
                <th>Method</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data['transactions'] as $index => $item)
                <tr>
                    <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $item->ironing->name_ironing ?? $item->laundry->name_laundry }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                    <td>{{ Str::formatCurrency($item->price_transaction) }}</td>
                    <td>{{ ucfirst($item->method) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No transaction data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="max-w-md mx-auto bg-white border border-gray-200 rounded-lg shadow p-6 space-y-4 mt-6">
        <h2 class="text-xl font-semibold text-primary mb-2">Income Summary</h2>
        
        <div class="flex justify-between text-gray-700">
            <span>Total Income</span>
            <span class="font-bold">{{ Str::formatCurrency($data['income']) }}</span>
        </div>
    
        <div class="flex justify-between text-gray-600">
            <span>From Bedding</span>
            {{-- <span>Rp {{ number_format($data['income_bedding'], 2, ',', '.') }}</span> --}}
        </div>
    
        <div class="flex justify-between text-gray-600">
            <span>From Clothes</span>
            {{-- <span>Rp {{ number_format($data['income_clothes'], 2, ',', '.') }}</span> --}}
        </div>
    </div>
    

    <div style="width: 100%; display: flex; justify-content: flex-end; margin-top: 40px;">
        <div style="text-align: center;">
            <p>Denpasar, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
            <p>Hormat Kami,</p>
            <br><br><br>
            <p style="text-decoration: underline; font-weight: bold;">I Putu Sudipa Yasa</p>
        </div>
    </div>
</body>

</html>
