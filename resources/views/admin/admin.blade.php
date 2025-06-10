<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
			<li class="active">
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
				<a href="{{ route('orders') }}">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Orders</span>
				</a>
			</li>
			<li>
				<a href="{{ route('testimonialsAdmin') }}">
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
					<h1>DASBOARD</h1>
					<ul class="breadcrumb">
						<li><a href="#">Selamat datang di Halaman Admin</a></li>
					</ul>
				</div>
			</div>


			<div class="table-data">
				<div class="order">
					<div class="container">
						<div class="dashboard">
							<div class="card">
								<div class="card-icon">
									<i class="fas fa-utensils"></i>
								</div>
								<div class="card-info">
									<h3>{{ $totalMenus }}</h3>
									<p>Total Menu</p>
								</div>
							</div>

							<div class="card">
								<div class="card-icon">
									<i class="fas fa-book"></i>
								</div>
								<div class="card-info">
									<h3>{{ $totalBookings }}</h3>
									<p>Total Booking</p>
								</div>
							</div>

							<div class="card">
								<div class="card-icon">
									<i class="fas fa-envelope"></i>
								</div>
								<div class="card-info">
									<h3>{{ $totalMessages }}</h3>
									<p>Total Messages</p>
								</div>
							</div>

							<div class="card">
								<div class="card-icon">
									<i class="fas fa-shopping-cart"></i>
								</div>
								<div class="card-info">
									<h3>{{ $totalOrders }}</h3>
									<p>Total Orders</p>
								</div>
							</div>
						</div>

						<div class="charts-row">
							<!-- Menu Chart -->
							<div class="chart-box">
								<canvas id="menuChart" width="400" height="300"></canvas>
							</div>

							<!-- Booking Chart -->
							<div class="chart-box">
								<canvas id="bookingChart" width="400" height="200"></canvas>
							</div>
						</div>
					</div>

					<!-- Chart.js Library -->
					<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

					<script>
						const menuCtx = document.getElementById('menuChart').getContext('2d');
						const menuChart = new Chart(menuCtx, {
							type: 'bar',
							data: {
								labels: {!! json_encode($labels) !!},
								datasets: [{
									label: 'Jumlah Menu per Tipe',
									data: {!! json_encode($values) !!},
									backgroundColor: [
										'rgba(255, 99, 132, 0.7)', // makanan
										'rgba(54, 162, 235, 0.7)', // snack
										'rgba(255, 206, 86, 0.7)', // minuman
										'rgba(75, 192, 192, 0.7)'  // Total Menu
									],
									borderColor: [
										'rgba(255, 99, 132, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(75, 192, 192, 1)'
									],
									borderWidth: 1
								}]
							},

							options: {
								responsive: true,
								maintainAspectRatio: false,
								scales: {
									y: {
										beginAtZero: true,
										precision: 0
									}
								}
							}
						});

						const bookingCtx = document.getElementById('bookingChart').getContext('2d');
						const bookingChart = new Chart(bookingCtx, {
							type: 'pie',
							data: {
								labels: {!! json_encode($dates) !!},
								datasets: [{
									data: {!! json_encode($totals) !!},
									backgroundColor: [
										'rgba(255, 99, 132, 0.5)',
										'rgba(54, 162, 235, 0.5)',
										'rgba(255, 206, 86, 0.5)',
										'rgba(75, 192, 192, 0.5)',
										'rgba(153, 102, 255, 0.5)',
										'rgba(255, 159, 64, 0.5)'
									],
									borderWidth: 1
								}]
							},
							options: {
								responsive: true,
								maintainAspectRatio: false
							}
						});
					</script>
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