<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="/assets/css/admin.css">

    <title>Admin</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <!-- unchanged sidebar content -->
        <a href="#" class="brand">
    <img src="assets/img/logo-turtles.png" alt="Turtle Resto Logo" style="height: 40px; margin-right: 20px;">
    <span class="text">
                <span class="octa">TUR</span><span class="prime">TLE RESTO</span>
            </span>
        </a>
        <ul class="side-menu top">
            <!-- unchanged sidebar links -->
            <li><a href="{{ route('admin') }}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a></li>
            <li><a href="{{ route('akun') }}"><i class='bx bxs-dashboard'></i><span class="text">Akun User</span></a></li>
            <li><a href="{{ route('menuAdmin') }}"><i class='bx bxs-shopping-bag-alt'></i><span class="text">Daftar Menu</span></a></li>
            <li><a href="{{route('orders')}}"><i class='bx bxs-shopping-bag-alt'></i><span class="text">Orders</span></a></li>
            <li class="active"><a href="{{route('testimonialsAdmin')}}"><i class='bx bxs-message-dots'></i><span class="text">Testimoni</span></a></li>
            <li id="message-link"><a href="{{ route('messages') }}"><i class='bx bxs-message-dots'></i><span class="text">Message</span></a></li>
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

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Testimoni</h1>
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
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimoni as $Testimoni)
                            <tr>
                                <td>{{ $Testimoni->id }}</td>
                                <td>{{ $Testimoni->name }}</td>
                                <td>{{ $Testimoni->email }}</td>
                                <td>{{ $Testimoni->subject }}</td>
                                <td>{{ $Testimoni->message }}</td>
                                <td>
                                    @if($Testimoni->status == 0)
                                    <form action="{{ route('admin.testimoni.approve', $Testimoni->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn-success">✔ Approve</button>
                                    </form>
                                    @else
                                    <span class="badge bg-success">Approved</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>
    <!-- CONTENT -->
</body>

</html>