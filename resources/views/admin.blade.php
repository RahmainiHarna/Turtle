<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Restoran</title>



	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<!-- CSS -->
	<link rel="stylesheet" href="/assets/css/admin.css">

	<style>
		.bold {
			font-weight: bold;
		}

		.action-btn {
			padding: 4px 10px;
			border-radius: 5px;
			color: white;
			cursor: pointer;
			font-size: 0.9em;
		}

		.action-btn.confirm {
			background-color: #28a745;
		}

		.action-btn.cancel {
			background-color: #dc3545;
		}
	</style>
</head>

<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-food-menu'></i>
			<span class="text"><span class="octa">TUR</span><span class="prime">TLE</span> RESTO</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="{{ route('admin.admin') }}">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li><a href="{{ route('akun') }}"><i class='bx bxs-user'></i><span class="text">Akun User</span></a></li>
			<li><a href="{{ route('menuAdmin') }}"><i class='bx bxs-food-menu'></i><span class="text">Menu Makanan</span></a></li>
			<li><a href="{{ route('orders') }}"><i class='bx bxs-receipt'></i><span class="text">Pesanan</span></a></li>
			<li><a href="{{ route('testimonialsAdmin') }}"><i class='bx bxs-comment-detail'></i><span class="text">Testimoni</span></a></li>
			<li><a href="{{ route('messages') }}"><i class='bx bxs-envelope'></i><span class="text">Pesan Masuk</span></a></li>
			@auth
			<li>
				<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">
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
	<!-- END SIDEBAR -->

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
					<h1>Pesanan</h1>
					<ul class="breadcrumb">
						<li><a href="#">Halaman Admin</a></li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li><a class="active" href="#">Pesanan</a></li>
					</ul>
				</div>
			</div>

            
	<!-- Statistik Ringkas -->
	<ul class="box-info">
		<li>
			<i class='bx bxs-user'></i>
			<span class="text">
				<h3>{{ $userCount }}</h3>
				<p>Total User</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-food-menu'></i>
			<span class="text">
				<h3>{{ $menuCount }}</h3>
				<p>Menu Tersedia</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-cart'></i>
			<span class="text">
				<h3>{{ $todayOrders }}</h3>
				<p>Pesanan Hari Ini</p>
			</span>
		</li>
	</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Daftar Pesanan Terbaru</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>Nama Pengguna</th>
								<th>Menu</th>
								<th>Jumlah</th>
								<th>Total</th>
								<th>Tanggal Pesan</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
    @foreach($recentOrders as $order)
    <tr>
        <td>{{ $order->nama_pemesan }}</td>
        <td>{{ $order->menu->nama }}</td>
        <td>{{ $order->jumlah }}</td>
        <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
        <td>{{ $order->created_at->format('d M Y') }}</td>
        <td><span class="status {{ strtolower($order->status) }}">{{ $order->status }}</span></td>
        <td>
            <button class="action-btn confirm">Konfirmasi</button>
            <button class="action-btn cancel">Tolak</button>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
<!-- TODO LIST / Pesan Masuk Singkat -->
		<div class="todo">
			<div class="head">
				<h3>Pesan Masuk</h3>
			</div>
			<ul class="todo-list">
				@foreach($recentMessages as $msg)
				<li class="not-completed">
					<span>{{ $msg->nama }}: "{{ Str::limit($msg->pesan, 30) }}"</span>
					<i class='bx bx-envelope'></i>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</main>
		<!-- END MAIN -->

	</section>
	<!-- END CONTENT -->

	<script src="/assets/js/admin.js"></script>
</body>

</html>
