<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="/assets/css/admin.css" />

    <title>Admin</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="assets/img/logo-turtles.png" alt="Turtle Resto Logo" style="height: 40px; margin-right: 20px;">
            <span class="text"><span class="octa">TUR</span><span class="prime">TLE RESTO</span></span>
        </a>
        <ul class="side-menu top">
            <li><a href="{{ route('admin') }}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a>
            </li>
            <li><a href="{{ route('akun') }}"><i class='bx bxs-user'></i><span class="text">Akun User</span></a></li>
            <li><a href="{{ route('menuAdmin') }}"><i class='bx bxs-food-menu'></i><span class="text">Daftar
                        Menu</span></a></li>
            <li><a href="{{ route('orders') }}"><i class='bx bxs-cart'></i><span class="text">Orders</span></a></li>
            <li><a href="{{ route('testimonialsAdmin') }}"><i class='bx bxs-message-dots'></i><span
                        class="text">Testimoni</span></a></li>
            <li class="active" id="message-link"><a href="{{ route('messages') }}"><i class='bx bxs-envelope'></i><span
                        class="text">Message</span></a></li>

            @auth
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">
                        <i class='bx bxs-log-out-circle'></i><span class="text">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </li>
            @endauth
        </ul>
    </section>

    <!-- CONTENT -->
    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
        </nav>

        <main>
            <div class="head">
                <h3>Messages</h3>
                <div id="searchContainer">
                    <i class='bx bx-search' style="font-size: 20px; color: #888;"></i>
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari nama atau email...">
                </div>
            </div>

            <table id="userTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Waktu</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($message as $pesan)
                        <tr>
                            <td>{{ $pesan->id }}</td>
                            <td>{{ $pesan->name }}</td>
                            <td>{{ $pesan->email }}</td>
                            <td>{{ $pesan->message }}</td>
                            <td>{{ $pesan->created_at }}</td>
                            <td>
                                @if ($pesan->status == 0)
                                    <form action="{{ route('message.update', $pesan->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn-check">
                                            <i class='bx bx-check'></i>
                                        </button>
                                    </form>
                                @else
                                    <span class="badge-success"><i class='bx bx-check-double'></i> Dibaca</span>
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

    <script>
        function searchTable() {
            const input = document.getElementById("searchInput").value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");
            rows.forEach(row => {
                const name = row.cells[1].textContent.toLowerCase();
                const email = row.cells[2].textContent.toLowerCase();
                const message = row.cells[3].textContent.toLowerCase();
                row.style.display = (name.includes(input) || email.includes(input) || message.includes(input))? "" : "none";
            });
        }
    </script>
</body>

</html>