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
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
        <nav class="admin-navbar">
            <div class="navbar-left">
                <i id="toggle-sidebar" class='bx bx-menu'></i>
                <span class="page-title">@yield('page-title')</span>
            </div>
            <div class="navbar-right">
                @auth
                <div class="admin-profile-wrapper">
                <!-- Foto -->
                <img src="{{ asset(Auth::user()->photo ?? 'assets/img/profile/default.png') }}" alt="Admin" class="profile-img">
                
                <!-- Dropdown -->
                <div class="user-dropdown">
                    <button id="dropdownButton" onclick="toggleDropdown()">
                    {{ Auth::user()->username }} <i class="fa-solid fa-chevron-down" style="margin-left: 5px; margin-right: 5px;"></i>
                    </button>
                    <div id="dropdownContent" class="user-dropdown-content">
                    <a href="{{ route('admin.profile.edit') }}">
                        <i class="bi bi-person-circle me-2" style="margin-left: 5px; margin-right: 7px;"></i> Profile
                    </a>
                    </div>
                </div>
                </div>
                @endauth
            </div>
        </nav>
        <!-- END NAVBAR -->

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
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownContent');
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        }

        window.addEventListener('click', function (e) {
            if (!e.target.closest('.user-dropdown')) {
            const dropdown = document.getElementById('dropdownContent');
            if (dropdown) dropdown.style.display = 'none';
            }
        });
    </script>
    @stack('scripts')
</body>
</html>