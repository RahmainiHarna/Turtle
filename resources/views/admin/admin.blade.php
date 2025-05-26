

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
			<li class="active">
				<a href="dashboard.html">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="akun.html">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Akun User</span>
				</a>
			</li>
            <li>
				<a href="menu.html">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Daftar Menu</span>
				</a>
			</li>
			<li>
				<a href="#orders">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Orders</span>
				</a>
			</li>
			<li>
				<a href="Testimoni.html">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Testimoni</span>
				</a>
			</li>
			<li>
				<a href="message.html">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="adminlogout.html" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
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
					<ul class="breadcrumb">
						<li><a href="#">Selamat datang di Halaman Admin</a></li>
					</ul>
				</div>
			</div>


			<div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Orders</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Pengguna</th>
                                <th>Tanggal Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                         

                        </tbody>
                    </table>
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