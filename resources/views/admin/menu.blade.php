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

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
           <img src="assets/img/logo-turtles.png" alt="Turtle Resto Logo" style="height: 40px; margin-right: 20px;">
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
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Akun User</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('menuAdmin') }}">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Daftar Menu</span>
                </a>
            </li>
            <li>
                <a href="{{ route('orders') }}">
                    <i class='bx bxs-shopping-bag-alt'></i>
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
           <div class="menu-header">
    <h1>Daftar Menu</h1>
     <div class="search-container">
              <input type="text" id="searchInput" placeholder="Cari nama menu atau jenis">
              <i class='bx bx-search'></i>
</div>
    <a href="{{ route('admin.createmenu') }}" class="btn-card-add">
        <i class='bx bx-plus'></i> Tambah Menu
    </a>
</div>


<div class="menu-table-container">
    <table class="menu-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Menu</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->type }}</td>
                <td>Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                <td><img src="{{ asset('assets/img/menu/' . $menu->image) }}" alt="{{ $menu->name }}" class="menu-image"></td>
                <td>
                    <div class="crud-buttons">
                        <a href="{{ route('admin', $menu->id) }}" class="crud-btn edit">
                            <i class='bx bxs-edit'></i>
                            <span>Edit</span>
                        </a>
                        <form action="{{ route('admin', $menu->id) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="crud-btn delete" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class='bx bxs-trash'></i>
                                <span>Hapus</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
<script>
     document.getElementById('searchInput').addEventListener('keyup', function () {
      const value = this.value.toLowerCase();
      const rows = document.querySelectorAll('#userTable tbody tr');

      rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(value) ? '' : 'none';
      });
    });
        
    </script>
</body>

</html>