<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="/assets/css/admin.css">
	<title>Admin</title>
</head>

<body>
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="assets/img/logo-turtles.png" alt="Turtle Resto Logo" style="height: 40px; margin-right: 20px;">
			<span class="text"><span class="octa">TUR</span><span class="prime">TLE RESTO</span></span>
		</a>
		<ul class="side-menu top">
			<li><a href="{{route('admin')}}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a>
			</li>
			<li><a href="{{ route('akun') }}"><i class='bx bxs-dashboard'></i><span class="text">Akun User</span></a>
			</li>
			<li><a href="{{ route('menuAdmin') }}"><i class='bx bxs-shopping-bag-alt'></i><span class="text">Daftar
						Menu</span></a></li>
			<li class="active"><a href="{{ route('orders') }}"><i class='bx bxs-shopping-bag-alt'></i><span
						class="text">Orders</span></a></li>
			<li><a href="{{route('testimonialsAdmin')}}"><i class='bx bxs-message-dots'></i><span
						class="text">Testimoni</span></a></li>
			<li><a href="{{ route('messages') }}"><i class='bx bxs-message-dots'></i><span
						class="text">Message</span></a></li>
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
						<div class="head" style="display: flex; justify-content: space-between; align-items: center;">
							<h2>Recent Orders</h2>
							<div style="display: flex; align-items: center; gap: 8px">
								<i class='bx bx-search' style="font-size: 20px; color: #888;"></i>
								<input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari nama..."
									style="flex: 1; padding: 8px 14px; border-radius: 8px; border: 1px solid #ccc; outline: none; font-size: 14px;" />
							</div>

						</div>

					</div>
				</div>
				<table class="menu-table">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Tanggal Pesan</th>
							<th>Jam</th>
							<th>Jumlah Orang</th>
							<th>Kontak</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($bookings as $data_diri)
							<tr>
								<td>{{ $data_diri->name }}</td>
								<td>{{ $data_diri->date }}</td>
								<td>{{ $data_diri->time }}</td>
								<td>{{ $data_diri->people }}</td>
								<td>{{ $data_diri->phone }} / {{ $data_diri->email }}</td>
								<td>
									<a href="{{ route('admin.ordershow', $data_diri->id) }}" class="btn btn-more">
										<i class='bx bx-show'></i> More
									</a>
									<form action="{{ route('admin.orderdelete', $data_diri->id) }}" method="POST"
										style="display:inline;">
										@csrf
										@method('DELETE')
										<button type="submit" class="crud-btn delete"
											onclick="return confirm('Yakin ingin menghapus?')">
											<i class='bx bxs-trash'></i>
											<span>Hapus</span>
										</button>
									</form>
								</td>

								</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			</div>
		</main>
	</section>
>>>>>>> 4d1957696d6ca6b09358bab3ea4ab4e37f991239

	<script>
		function searchTable() {
			const input = document.getElementById("searchInput").value.toLowerCase();
			const rows = document.querySelectorAll(".menu-table tbody tr");
			rows.forEach(row => {
				const name = row.cells[0].textContent.toLowerCase();
				row.style.display = name.includes(input) ? "" : "none";
			});
		}
	</script>
	<script src="/js/admin.js"></script>
</body>

</html>