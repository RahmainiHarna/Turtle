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
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Orders</h1>
                <p class="subtitle">Daftar reservasi terbaru dari pelanggan</p>
            </div>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Orders</h3>
                </div>
                <div class="table-container">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Jumlah Orang</th>
                                <th>Kontak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $data_diri)
                                <tr>
                                    <td>{{ $data_diri->name }}</td>
                                    <td>{{ $data_diri->date }}</td>
                                    <td>{{ $data_diri->time }}</td>
                                    <td>{{ $data_diri->people }}</td>
                                    <td>
                                        <div>{{ $data_diri->phone }}</div>
                                        <small style="color: #888;">{{ $data_diri->email }}</small>
                                    </td>
                                    <td style="display: flex; gap: 6px;">
                                        <a href="{{ route('admin.ordershow', $data_diri->id) }}" class="btn-more">More</a>
                                        <form action="{{ route('admin.orderdelete', $data_diri->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center;">Tidak ada pesanan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

<style>
    .subtitle {
        font-size: 14px;
        color: #999;
        margin-top: 5px;
    }

    .table-container {
        overflow-x: auto;
    }

    .styled-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .styled-table thead {
        background-color: #f5f5f5;
    }

    .styled-table th, .styled-table td {
        padding: 14px 18px;
        text-align: left;
        vertical-align: top;
    }

    .styled-table tbody tr:hover {
        background-color: #f9f9f9;
    }

    .btn-more,
    .btn-delete {
        padding: 6px 14px;
        font-size: 12px;
        border-radius: 20px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-more {
        background-color: #6C63FF;
        color: #fff;
    }

    .btn-more:hover {
        background-color: #5a52cc;
    }

    .btn-delete {
        background-color: #ff6b6b;
        color: #fff;
    }

    .btn-delete:hover {
        background-color: #e94b4b;
    }

    @media (max-width: 768px) {
        .styled-table th, .styled-table td {
            font-size: 13px;
            padding: 10px;
        }
    }
</style>






	<script src="js/admin.js"></script>

</body>

</html>