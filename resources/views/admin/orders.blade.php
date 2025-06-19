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
	 <div id="main-wrapper">
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="assets/img/logo-turtles.png" alt="Turtle Resto Logo" style="height: 40px; margin-right: 20px;">
			<span class="text"><span class="octa">TUR</span><span class="prime">TLE RESTO</span></span>
		</a>
		<ul class="side-menu top">
			<li><a href="{{route('admin')}}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a>
			</li>
			<li><a href="{{ route('akun') }}"><i class='bx bxs-user'></i><span class="text">Akun User</span></a>
			</li>
			<li><a href="{{ route('menuAdmin') }}"><i class='bx bxs-food-menu'></i><span class="text">Daftar
						Menu</span></a></li>
			<li class="active"><a href="{{ route('orders') }}"><i class='bx bxs-cart'></i><span
						class="text">Orders</span></a></li>
			<li><a href="{{route('testimonialsAdmin')}}"><i class='bx bxs-message-dots'></i><span
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

	<section id="content">
		<nav><i id="toggle-sidebar" class='bx bx-menu'></i></nav>
		<main>

			<div class="menu-header">
				<h1>Recent Orders<h1>
						<div class="search-container">
							<input type="text" id="searchInput" placeholder="Cari nama email atau nomor handphone"
								onkeyup="searchTable()">
							<i class='bx bx-search'></i>
						</div>
			</div>
			<table id="userTable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Date</th>
						<th>Time</th>
						<th>People</th>
						<th>Contact</th>
						<th>Action</th>
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
    							<div class="action-buttons">
        							<form action="{{ route('admin.ordershow', $data_diri->id) }}" method="GET">
            							<button type="submit" class="crud-btn more">
                							<i class='bx bx-show'></i> More
            							</button>
        							</form>

        							<form action="{{ route('admin.orderdelete', $data_diri->id) }}" method="POST">
            							@csrf
            							@method('DELETE')
            							<button type="submit" class="crud-btn delete"
                    							onclick="return confirm('Yakin ingin menghapus?')">
                							<i class='bx bxs-trash'></i> Delete
            							</button>
        							</form>
   								 </div>
							</td>

							</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			</div>

		</main>
	</section>
</div>
	    <script>
        const toggleBtn = document.getElementById('toggle-sidebar');
        const sidebar = document.getElementById('main-wrapper');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-collapsed');
        });
		function searchTable() {
			const input = document.getElementById("searchInput").value.toLowerCase();
			const rows = document.querySelectorAll("#userTable tbody tr");

			rows.forEach(row => {
				const name = row.cells[0].textContent.toLowerCase();
				const contact = row.cells[4].textContent.toLowerCase();

				if (name.includes(input) || contact.includes(input)) {
					row.style.display = "";
				} else {
					row.style.display = "none";
				}
			});
		}
	</script>
	<script src="/js/admin.js"></script>
</body>

</html>