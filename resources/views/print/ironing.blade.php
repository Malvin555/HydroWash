<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Print Ironing - HydroWash</title>

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

        .header h1 {
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
    <h2>Print Ironing</h2>

    <div class="header">
        <h1>HydroWash</h1>
        <p>Date: {{ $data['time'] }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Method</th>
                <th>Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data['items'] as $index => $item)
                <tr>
                    <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $item->name_ironing }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $item->retrieval_method)) }}</td>
                    <td>{{ $item->itemType->name_item }}</td>
                    <td>
                        <span style="
                            padding: 2px 6px; 
                            font-size: 12px; 
                            font-weight: 600; 
                            border-radius: 4px; 
                            background-color: {{ 
                                $item->status == 'pending' ? '#E5E7EB' : 
                                ($item->status == 'process' ? '#FEF3C7' : 
                                ($item->status == 'completed' ? '#D1FAE5' : '#DBEAFE')) 
                            }}; 
                            color: {{ 
                                $item->status == 'pending' ? '#374151' : 
                                ($item->status == 'process' ? '#92400E' : 
                                ($item->status == 'completed' ? '#065F46' : '#1E40AF')) 
                            }};">
                            {{ Str::ucfirst($item->status) }}
                        </span>
                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="6">No ironing data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
