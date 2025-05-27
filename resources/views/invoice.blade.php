<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Pemesanan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #111;
            color: #fff;
        }
        .card {
            background-color: #222;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Invoice Pemesanan</h2>

    {{-- Data Diri --}}
    <div class="card border-light mb-4">
        <div class="card-body">
            <h5 class="card-title">Informasi Reservasi</h5>
            <p><strong>Nama:</strong> {{ $booking['name'] }}</p>
            <p><strong>Email:</strong> {{ $booking['email'] }}</p>
            <p><strong>No. HP:</strong> {{ $booking['phone'] }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($booking['date'])->format('d M Y') }}</p>
            <p><strong>Tanggal Reservasi:</strong> {{ \Carbon\Carbon::parse($booking['date'])->format('d M Y') }}</p>
            <p><strong>Jam:</strong> {{ $booking['time'] }}</p>
            <p><strong>Jumlah Orang:</strong> {{ $booking['people'] }}</p>
            @if (!empty($booking['message']))
                <p><strong>Pesan Tambahan:</strong> {{ $booking['message'] }}</p>
            @endif
        </div>
    </div>

    {{-- Menu yang Dipesan --}}
    <div class="card border-light mb-4">
        <div class="card-body">
            <h5 class="card-title">Menu yang Dipesan</h5>
            <div class="card-body">
            @if (count($menus) > 0)
                <ul class="list-group">
                    @php $total = 0; @endphp
                    @foreach ($menus as $menu)
                        @php
                            $qty = $cart[$menu->id];
                            $subtotal = $menu->price * $qty;
                            $total += $subtotal;
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $menu->name }} x {{ $qty }}
                            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                        Total
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </li>
                </ul>
            @else
                <p>Tidak ada menu yang dipilih.</p>
            @endif
        </div>
        </div>
    </div>

    {{-- Konfirmasi --}}
    <form action="{{ url('/confirm') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success w-100 btn-lg">
            Konfirmasi & Simpan Booking
        </button>
    </form>
</div>
</body>
</html>
