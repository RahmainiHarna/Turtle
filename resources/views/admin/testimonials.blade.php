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
                <a href="{{ route('admin') }}">
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
            <li>
                <a href="{{route('orders')}}">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Orders</span>
                </a>
            </li>
            <li class="active">
                <a href="{{route('testimonialsAdmin')}}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Testimoni</span>
                </a>
            </li>
            <li id="message-link">
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
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Testimoni</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Testimoni</a></li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Testimoni</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th> ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimoni as $Testimoni)
                                <tr>
                                    <th>{{ $Testimoni->id }}</th>
                                    <th>
                                        {{ $Testimoni->name }}
                                    </th>
                                    <th>{{ $Testimoni->email }}</th>
                                    <th>{{ $Testimoni->subject }}</th>
                                    <th>{{ $Testimoni->message }}</th>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="js/admin.js"></script>
</body>

</html>