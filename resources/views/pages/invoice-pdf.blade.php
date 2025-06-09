<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - Turtle's</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #000;
            font-size: 14px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            margin: 0;
        }

        .sub-header {
            text-align: center;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 2px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f7f7f7;
        }

        .total {
            text-align: right;
            font-size: 16px;
            margin-top: 10px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>TURTLE'S INVOICE</h1>
    </div>
    <div class="sub-header">
        Eat, Feel, and Fall in Love with Indonesian Flavor
    </div>

    <div class="info">
        <p><strong>Nama:</strong> {{ $booking->name }}</p>
        <p><strong>Email:</strong> {{ $booking->email }}</p>
        <p><strong>Telepon:</strong> {{ $booking->phone }}</p>
        <p><strong>Tanggal Booking:</strong> {{ $booking->booking_date }}</p>
        <p><strong>Jam:</strong> {{ $booking->time }}</p>
        <p><strong>Jumlah Tamu:</strong> {{ $booking->people }} orang</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                <td>Rp{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <p><strong>Total: Rp{{ number_format($total, 0, ',', '.') }}</strong></p>
        <p><strong>Deposit 10%: Rp{{ number_format($deposit, 0, ',', '.') }}</strong></p>
    </div>

    <div class="footer">
        Terima kasih atas reservasi Anda di Turtle's Restaurant.
    </div>
</body>
</html>
