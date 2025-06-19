<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="/assets/css/admin.css">

    <title>Admin</title>
</head>

<body>
    <div id="main-wrapper">
        <!-- SIDEBAR -->
        <section id="sidebar">
            <a href="#" class="brand">
                <img src="assets/img/logo-turtles.png" alt="Turtle Resto Logo"
                    style="height: 40px; margin-right: 20px;">
                <span class="text">
                    <span class="octa">TUR</span><span class="prime">TLE RESTO</span>
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
                        <i class='bx bxs-user'></i>
                        <span class="text">Akun User</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('menuAdmin') }}">
                        <i class='bx bxs-shopping-bag'></i>
                        <span class="text">List Menu</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('orders') }}">
                        <i class='bx bxs-cart'></i>
                        <span class="text">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('testimonialsAdmin') }}">
                        <i class='bx bxs-message-dots'></i>
                        <span class="text">Testimoni</span>
                    </a>
                </li>
                <li id="message-link">
                    <a href="{{ route('messages') }}">
                        <i class='bx bxs-envelope'></i>
                        <span class="text">Message</span>
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{route('logout')}}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="logout">
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
                <i id="toggle-sidebar" class='bx bx-menu'></i>
            </nav>
            <!-- NAVBAR -->

            <!-- MAIN -->
            <main>
                <div class="menu-header">
                    <h1>List Menu</h1>
                    <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Cari nama menu atau jenis"
                            onkeyup="searchMenu()">
                        <i class='bx bx-search'></i>
                    </div>
                    <a href="{{ route('admin.createmenu') }}" class="btn-card-add">
                        <i class='bx bx-plus'></i> Add Menu
                    </a>
                </div>
                <table id="userTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Menu</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->type }}</td>
                                <td>Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                                <td><img src="{{ asset('assets/img/menu/' . $menu->image) }}" alt="{{ $menu->name }}"
                                        class="menu-image"></td>
                                <td>
                                    <div class="crud-buttons">
                                        <a href="{{ route('menu.edit', $menu->id) }}" class="crud-btn edit">
                                            <i class='bx bxs-edit'></i>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST"
                                            class="inline-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="crud-btn delete"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class='bx bxs-trash'></i>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- <div class="pagination-container" >
                {{ $menus->links('') }}
            </div>  -->
            </main>
            <!-- MAIN -->
        </section>
    </div>
    <!-- CONTENT -->
    <script>

        const toggleBtn = document.getElementById('toggle-sidebar');
        const sidebar = document.getElementById('main-wrapper');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-collapsed');
        });
        function searchMenu() {
            const input = document.getElementById("searchInput").value.toLowerCase();
            const rows = document.querySelectorAll("#userTable tbody tr");

            rows.forEach(row => {
                const name = row.cells[1].textContent.toLowerCase();
                const type = row.cells[2].textContent.toLowerCase();
                const price = row.cells[3].textContent.toLowerCase();

                if (name.includes(input) || type.includes(input) || price.includes(input)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>

</body>

</html>