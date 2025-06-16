<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="/assets/css/admin.css">

    <title>Admin</title>
</head>

<body>

    <style>
        .bold {
            font-weight: bold;
        }
    </style>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-car'></i>
            <span class="text">
                <span class="octa">TUR</span><span class="prime">TLE</span>
            </span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="{{route('admin')}}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('akun') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Akun User</span>
                </a>
            </li>
            <li>
                <a href="{{ route('menuAdmin') }}">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Daftar Menu</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('orders') }}">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Orders</span>
                </a>
            </li>
            <li>
                <a href="{{route('testimonialsAdmin')}}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Testimoni</span>
                </a>
            </li>
            <li>
                <a href="{{ route('messages') }}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Message</span>
                </a>
            </li>
            @auth
                <li>
                    <a href="{{route('logout')}}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">
                        <i class='bx bxs-log-out-circle'></i>
                        <span class="text">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endauth
        </ul>
    </section>
    <!-- SIDEBAR -->

<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <input type="checkbox" id="switch-mode" hidden>
    </nav>

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Orders</h1>
            </div>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="order-detail-card">
                    <h3>Detail Orders</h3>

                    <!-- Data Diri Pemesan -->
                    <div class="customer-info-grid">
                        <ul>
                            <li><strong>Nama:</strong> {{ $booking->name }}</li>
                            <li><strong>Telepon:</strong> {{ $booking->phone }}</li>
                            <li><strong>Email:</strong> {{ $booking->email }}</li>
                        </ul>
                        <ul>
                            <li><strong>Jam:</strong> {{ $booking->time }}</li>
                            <li><strong>Jumlah Orang:</strong> {{ $booking->people }}</li>
                            <li><strong>Tanggal Pesan:</strong> {{ $booking->date }}</li>
                        </ul>
                    </div>

                    <!-- Tabel Pesanan -->
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Nama Menu</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($booking->orders as $order)
                                @php $total += $order->subtotal; @endphp
                                <tr>
                                    <td>{{ $order->menu->name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>Rp. {{ number_format($order->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Harga Total -->
                    <div class="total-wrapper">
                        <span>Total Harga:</span>
                        <strong>Rp. {{ number_format($total, 0, ',', '.') }}</strong>
                    </div>

                    <!-- Tombol -->
                    <div class="btn-back-wrapper">
                        <a href="{{ route('orders') }}" class="btn-back">← Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f3efed;
        color: #3e2723;
    }

    .order-detail-card {
        background-color: #fff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        margin-top: 30px;
    }

    .order-detail-card h3 {
        font-size: 22px;
        margin-bottom: 20px;
        color: #3e2723;
    }

    .customer-info-grid {
        display: flex;
        justify-content: space-between;
        gap: 40px;
        margin-bottom: 25px;
    }

    .customer-info-grid ul {
        list-style: none;
        padding: 0;
        margin: 0;
        flex: 1;
    }

    .customer-info-grid li {
        margin-bottom: 10px;
        font-size: 14px;
        color: #4e342e;
    }

    .styled-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fefaf8;
        border-radius: 12px;
        overflow: hidden;
        margin-top: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    }

    .styled-table thead {
        background-color: #6d4c41;
        color: #fff;
        font-weight: 600;
    }

    .styled-table th, .styled-table td {
        padding: 14px 18px;
        border-bottom: 1px solid #eee;
        text-align: left;
    }

    .styled-table tbody tr:hover {
        background-color: #fbe9e7;
    }

    .total-wrapper {
        text-align: right;
        margin-top: 20px;
        font-size: 16px;
        color: #4e342e;
    }

    .total-wrapper strong {
        font-size: 18px;
        color: #3e2723;
        margin-left: 10px;
    }

    .btn-back-wrapper {
        margin-top: 30px;
        text-align: right;
    }

    .btn-back {
        background-color: #5d4037;
        color: #fff;
        padding: 10px 20px;
        font-weight: 500;
        border-radius: 25px;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #4e342e;
    }

    @media (max-width: 768px) {
        .customer-info-grid {
            flex-direction: column;
        }

        .styled-table th, .styled-table td {
            font-size: 13px;
            padding: 10px;
        }

        .total-wrapper, .btn-back-wrapper {
            text-align: center;
        }
    }
</style>


    <script src="js/admin.js"></script>

</body>

</html>