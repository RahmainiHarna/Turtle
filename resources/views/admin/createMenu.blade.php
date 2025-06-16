<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Create Mwnu</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/css/admin.css">
    <!-- Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/admin.css">

</head>

<body>
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
            <li class="active"><a href="{{ route('menuAdmin') }}"><i class='bx bxs-shopping-bag'></i><span
                        class="text">Daftar Menu</span></a></li>
            <li><a href="{{ route('orders') }}"><i class='bx bxs-cart'></i><span class="text">Orders</span></a></li>
            <li><a href="{{ route('testimonialsAdmin') }}"><i class='bx bxs-message-dots'></i><span
                        class="text">Testimoni</span></a></li>
            <li><a href="{{ route('messages') }}"><i class='bx bxs-envelope'></i><span class="text">Message</span></a>
            </li>
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
    <!-- CLOSE SIDEBAR -->

    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
        </nav>

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Daftar Menu</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Tambah Menu</a></li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Form Menu Baru</h3>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="name">Nama Menu</label>
                        <input type="text" name="name" id="name" class="form-control" required>

                        <label for="price">Harga</label>
                        <input type="number" name="price" id="price" class="form-control" required>

                        <label for="type">Tipe Menu</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="">-- Pilih Tipe --</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="snack">Snack</option>
                        </select>

                        <label for="image">Upload Gambar</label>
                        <input type="file" name="image" id="image" class="form-control">

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

            <a href="{{ route('menuAdmin') }}" class="color">&larr; Kembali ke Daftar Menu</a>
        </main>
    </section>

    <script src="js/admin.js"></script>
</body>

</html>