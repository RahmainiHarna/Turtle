<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') - Admin</title>

	<!-- Favicons -->
	<link href="/assets/img/logo-turtles.png" rel="icon">
	<link href="/assets/img/logo-turtles.png" rel="apple-touch-icon">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<!-- Google Font Poppins -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

	<!-- My CSS -->
	<link rel="stylesheet" href="/assets/css/admin.css">
</head>

<body>
    <div id="main-wrapper" class="sidebar-collapsed">
        <!-- SIDEBAR -->
        @include('partials.sidebar')
        <!-- END SIDEBAR -->
        
        <!-- CONTENT -->
		<section id="content">

			<!-- NAVBAR -->
			<nav>
				<i id="toggle-sidebar" class='bx bx-menu'></i>
				<input type="checkbox" id="switch-mode" hidden>
			</nav>

			<!-- MAIN -->
            @yield('content')
            <!-- END MAIN -->
        
        </section>
        <!-- END CONTENT -->
    </div>

    <!-- Script JS -->
    <script src="/assets/js/admin.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggle-sidebar');
        const sidebar = document.getElementById('main-wrapper');

        toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('sidebar-collapsed');
        });
    </script>
    @stack('scripts')
</body>
</html>