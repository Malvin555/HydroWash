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

        th, td {
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
        <p>Date: 30-07-2025</p>
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
          <tr>
              <td>01</td>
              <td>Ironing #234</td>
              <td>02-07-2025</td>
              <td>Delivery</td>
              <td>Clothes</td>
              <td>Completed</td>
          </tr>
      </tbody>
  </table>

</body>
</html>
