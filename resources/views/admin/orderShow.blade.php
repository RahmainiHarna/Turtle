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
    <div id="main-wrapper">
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="{{ asset('assets/img/logo-turtles.png')}}" style="height: 40px; margin-right: 20px;">
            <span class="text"><span class="octa">TUR</span><span class="prime">TLE RESTO</span></span>
        </a>
        <ul class="side-menu top">
            <li><a href="{{ route('admin') }}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a>
            </li>
            <li><a href="{{ route('akun') }}"><i class='bx bxs-user'></i><span class="text">Akun User</span></a></li>
            <li><a href="{{ route('menuAdmin') }}"><i class='bx bxs-food-menu'></i><span class="text">Daftar
                        Menu</span></a></li>
            <li class="active"><a href="{{ route('orders') }}"><i class='bx bxs-cart'></i><span
                        class="text">Orders</span></a></li>
            <li><a href="{{ route('testimonialsAdmin') }}"><i class='bx bxs-message-dots'></i><span
                        class="text">Testimoni</span></a></li>
            <li><a href="{{ route('messages') }}"><i class='bx bxs-envelope'></i><span class="text">Message</span></a>
            </li>
            @auth
                <li>
                    <a href="{{route('logout')}}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">
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
        <nav><i id="toggle-sidebar" class='bx bx-menu'></i></nav>

        <main>
            <div class="order">
                <div class="head">
                    <h3>Detail Orders</h3>
                    <a href="{{ route('orders') }}" class="btn-card-back">&larr; Kembali</a>
                </div>
                <h5>Data Diri Pemesan:</h5>
                <div class="order-detail-container">
                    <div class="order-detail-column">
                        <div class="detail-item"><strong>Name:</strong> {{ $booking->name }}</div>
                        <div class="detail-item"><strong>Phone:</strong> {{ $booking->phone }}</div>
                        <div class="detail-item"><strong>Email:</strong> {{ $booking->email }}</div>
                        <div class="detail-item"><strong>Message:</strong>{{ $booking->message }}</div>
                    </div>
                    <div class="order-detail-column">
                        <div class="detail-item"><strong>Date reservation:</strong>
                            {{ $booking->date }}</div>
                        <div class="detail-item"><strong>Time:</strong> {{ $booking->time }}</div>
                        <div class="detail-item"><strong>People:</strong> {{ $booking->people }}</div>

                        <div class="detail-item"><strong>Total price:</strong>Rp {{ number_format($booking->orders->sum(function ($order) {
    return $order->menu->price * $order->quantity;
}), 0, ',', '.') }}
                        </div>
                    </div>
                </div>


                <table id="invoice">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Total items</th>
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
                                <td>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </section>
</div>
    <script src="/js/admin.js"></script>
        <script>
        const toggleBtn = document.getElementById('toggle-sidebar');
        const sidebar = document.getElementById('main-wrapper');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-collapsed');
        });
    </script>
</body>

</html>