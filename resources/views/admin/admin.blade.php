<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Restoran</title>



	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
      <span class="text"><span class="octa">TUR</span><span class="prime">TLE RESTO</span></span>
    </a>
    <ul class="side-menu top">
      <li class="active"><a href="{{ route('admin') }}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a></li>
      <li><a href="{{ route('akun') }}"><i class='bx bxs-user'></i><span class="text">Akun User</span></a></li>
      <li><a href="{{ route('menuAdmin') }}"><i class='bx bxs-shopping-bag'></i><span class="text">Daftar Menu</span></a></li>
      <li><a href="{{ route('orders') }}"><i class='bx bxs-cart'></i><span class="text">Orders</span></a></li>
      <li><a href="{{ route('testimonialsAdmin') }}"><i class='bx bxs-message-dots'></i><span class="text">Testimoni</span></a></li>
      <li><a href="{{ route('messages') }}"><i class='bx bxs-envelope'></i><span class="text">Message</span></a></li>
      @auth
      <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">
          <i class='bx bxs-log-out-circle'></i><span class="text">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
      </li>
      @endauth
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
					<h1>DASBOARD</h1>
					<ul class="breadcrumb">
						<li><a href="#">selamat datang di Halaman Admin</a></li>
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
									<i class="fa-solid fa-circle-dollar-to-slot"></i>
								</div>
								<div class="card-info">
									<h3>{{ $totalMessages }}</h3>
									<p>Total Messages</p>
								</div>
							</div>

							<div class="card">
								<div class="card-icon">
									<i class="fa-solid fa-rupiah-sign"></i>
								</div>
								<div class="card-info">

									<h3>Rp{{ number_format($totalRevenue, 0, ',', '.') }}</h3>

									<p>Revenue</p>
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
										'rgba(153, 101, 21, 0.8)',  // makanan
	                                    'rgba(204, 153, 102, 0.8)', // snack
	                                    'rgba(92, 64, 51, 0.8)',    // minuman
	                                    'rgba(233, 196, 106, 0.8)'  // Total Menu
									],
									borderColor: [
										'rgba(153, 101, 21, 1)',
	                                    'rgba(204, 153, 102, 1)',
	                                    'rgba(92, 64, 51, 1)',
	                                    'rgba(233, 196, 106, 1)'
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
										'rgba(92, 64, 51, 0.5)',     // Coklat tua
	                                    'rgba(153, 101, 21, 0.5)',   // Karamel tua
	                                    'rgba(204, 153, 102, 0.5)',  // Coklat muda / krem gelap
	                                    'rgba(233, 196, 106, 0.5)',  // Kuning emas soft
	                                    'rgba(242, 233, 228, 0.5)',  // Krem terang
	                                    'rgba(189, 87, 73, 0.5)' 
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
	</div>
</main>
		<!-- END MAIN -->

			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- END CONTENT -->

	<script src="/assets/js/admin.js"></script>
</body>

</html>