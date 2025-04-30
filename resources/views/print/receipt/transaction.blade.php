<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Receipt - HydroWash</title>
    <style>
        body {
            background: #f3f4f6;
            font-family: system-ui, sans-serif;
            margin: 0;
            padding: 1rem;
        }

        .print-button {
            background: #009BAD;
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            float: right;
            margin-bottom: 1rem;
        }

        .print-button:hover {
            background: #6E91A2;
        }

        .receipt {
            background: white;
            max-width: 400px;
            margin: auto;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .receipt h1 {
            text-align: center;
            font-size: 1.5rem;
            margin: 0;
        }

        .receipt h1 span {
            color: #009BAD;
        }

        .text-center {
            text-align: center;
        }

        .text-sm {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .section {
            border-bottom: 1px solid #e5e7eb;
            padding: 1rem 0;
        }

        .section:last-child {
            border-bottom: none;
        }

        .label {
            color: #4b5563;
        }

        .value {
            font-weight: 500;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .status {
            display: inline-block;
            background: #d1fae5;
            color: #065f46;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
        }

        .box {
            background: #f9fafb;
            padding: 0.5rem;
            border-radius: 0.25rem;
        }

        .footer {
            text-align: center;
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 1rem;
        }

        @media print {
            body {
                width: 80mm;
                background: white;
                padding: 0;
                margin: 0;
            }

            .print-button {
                display: none;
            }

            .receipt {
                box-shadow: none;
                border-radius: 0;
            }
        }

    </style>
</head>

<body>

    <div class="receipt">
        <h1>Hydro<span>Wash</span></h1>
        <p class="text-center text-sm">Transaction Receipt</p>
        <p class="text-center text-sm">23-04-2025 14:30</p>

        <div class="section text-center">
            <strong>Transaction #N05BC2AC</strong>
        </div>

        <div class="section">
            <div class="row"><span class="label">Date:</span><span class="value">23-04-2025</span></div>
            <div class="row"><span class="label">Customer:</span><span class="value">Malvin</span></div>
        </div>

        <div class="section">
            <div class="label">Address Taking:</div>
            <div class="box">Jln dauh kangin</div>
            <div class="label" style="margin-top: 0.5rem;">Address Delivery:</div>
            <div class="box">Jln dauh kangin</div>
        </div>

        <div class="section grid">
            <div>
                <div class="label">Amount Item:</div>
                <div class="value">5 items</div>
            </div>
            <div>
                <div class="label">Take Away:</div>
                <div class="value">Yes</div>
            </div>
        </div>

        <div class="section grid">
            <div class="text-center">
                <div class="label">Payment Method:</div>
                <div class="value">Cash</div>
            </div>
            <div class="text-center">
                <div class="label">Total Amount:</div>
                <div class="value">Rp 55,000.00</div>
            </div>
        </div>

        <div class="section row">
            <span class="label">Status:</span>
            <span class="status">Completed</span>
        </div>

        <div class="section">
            <div class="label">Notes:</div>
            <div class="box text-sm">Please handle with care. Contains delicate fabrics.</div>
        </div>

        <div class="footer">
            <p>Thank you for choosing HydroWash!</p>
            <p>Contact: 0812-3456-7890</p>
            <p>www.hydrowash.com</p>
        </div>
    </div>

</body>

</html>
