<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
           <img src="assets/img/logo-turtles.png"  style="height: 40px; margin-right: 20px;">
            <span class="text"><span class="octa">TUR</span><span class="prime">TLE RESTO</span></span>
        </a>
        <ul class="side-menu top">
            <li><a href="{{ route('admin') }}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a></li>
            <li><a href="{{ route('akun') }}"><i class='bx bxs-user'></i><span class="text">Akun User</span></a></li>
            <li><a href="{{ route('menuAdmin') }}"><i class='bx bxs-food-menu'></i><span class="text">Daftar Menu</span></a></li>
            <li class="active"><a href="{{ route('orders') }}"><i class='bx bxs-cart'></i><span class="text">Orders</span></a></li>
            <li><a href="{{ route('testimonialsAdmin') }}"><i class='bx bxs-comment'></i><span class="text">Testimoni</span></a></li>
            <li><a href="{{ route('messages') }}"><i class='bx bxs-envelope'></i><span class="text">Message</span></a></li>
            @auth
            <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">
                    <i class='bx bxs-log-out-circle'></i><span class="text">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </li>
            @endauth
        </ul>
    </section>
    <!-- END SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <nav><i class='bx bx-menu'></i></nav>

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Orders</h1>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Detail Orders</h3>
                    </div>

                    <h5>Data Diri Pemesan:</h5>
                    <ul>
                        <li><strong>Nama:</strong> {{ $booking->name }}</li>
                        <li><strong>Tanggal Pesan:</strong> {{ $booking->date }}</li>
                        <li><strong>Jam:</strong> {{ $booking->time }}</li>
                        <li><strong>Jumlah Orang:</strong> {{ $booking->people }}</li>
                        <li><strong>Telepon:</strong> {{ $booking->phone }}</li>
                        <li><strong>Email:</strong> {{ $booking->email }}</li>
                    </ul>

                    <table>
                        <thead>
                            <tr>
                                <th>Nama Menu</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($booking->orders as $order)
                            <tr>
                                <td>{{ $order->menu->name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('orders') }}" class="back-btn">&larr; Kembali</a>
                </div>
            </div>
        </main>
    </section>

    <script src="/js/admin.js"></script>
</body>

</html>
