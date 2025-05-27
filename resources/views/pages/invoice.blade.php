<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice | TURTLE'S</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Open+Sans&display=swap" rel="stylesheet">
    <style>
    
        body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        overflow-y: hidden;
        position: relative; /* supaya ::before bisa absolute relatif ke body */
        font-family: 'Open Sans', sans-serif;
        background: url('/assets/img/foto1.png') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        color: #fff;
        }

        body::before {
        content: "";
        position: fixed; /* biar overlay menutupi seluruh layar */
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(0, 0, 0, 0.6); /* overlay hitam transparan, sesuaikan */
        z-index: 0; /* pastikan di belakang konten */
        width: 100vw;
        height: 100vh;
        pointer-events: none;
        }

        .invoice-container {
        position: relative; /* supaya berada di atas overlay */
        max-width: 800px;
        background: rgba(20, 20, 20, 0.9);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(255, 204, 102, 0.4);
        backdrop-filter: none; /* hilangkan blur di konten */
        z-index: 1; /* di atas overlay */
        }

        .header {
            text-align: center;
            font-family: 'Playfair Display', serif;
            color: #ffcc66;
            font-size: 36px;
            margin-bottom: 10px;
        }
        .sub-header {
            text-align: center;
            font-size: 16px;
            margin-bottom: 40px;
            color: #ccc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #444;
        }
        th {
            color: #ffcc66;
            text-align: left;
        }
        .total {
            text-align: right;
            font-size: 18px;
            color: #ffcc66;
        }
        .btn-print {
            display: inline-block;
            padding: 10px 20px;
            color: #ffcc66;
            border: 1px solid #ffcc66;
            background: transparent;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s ease;
        }
        .btn-print:hover {
            background: #ffcc66;
            color: #1a1a1a;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">TURTLE'S INVOICE</div>
        <div class="sub-header">Eat, Feel, and Fall in Love with Indonesian Flavor</div>

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['qty'] }}</td>
                    <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($item['qty'] * $item['price'], 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <strong>Total: Rp{{ number_format($total, 0, ',', '.') }}</strong>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="#" class="btn-print" onclick="window.print()">Print Invoice</a>
        </div>
    </div>
</body>
</html>
