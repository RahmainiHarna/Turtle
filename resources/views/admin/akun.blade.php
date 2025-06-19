<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin - Akun User</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="/assets/css/admin.css">
  <!-- Google Font Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>

<body>
  <div id="main-wrapper">
  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="#" class="brand">
      <img src="assets/img/logo-turtles.png" alt="Turtle Resto Logo" style="height: 40px; margin-right: 20px;">
      <span class="text"><span class="octa">TUR</span><span class="prime">TLE RESTO</span></span>
    </a>
    <ul class="side-menu top">
      <li><a href="{{ route('admin') }}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a></li>
      <li class="active"><a href="{{ route('akun') }}"><i class='bx bxs-user'></i><span class="text">Akun
            User</span></a></li>
      <li><a href="{{ route('menuAdmin') }}"><i class='bx bxs-food-menu'></i><span class="text">Daftar
            Menu</span></a></li>
      <li><a href="{{ route('orders') }}"><i class='bx bxs-cart'></i><span class="text">Orders</span></a></li>
      <li><a href="{{ route('testimonialsAdmin') }}"><i class='bx bxs-message-dots'></i><span
            class="text">Testimoni</span></a></li>
      <li><a href="{{ route('messages') }}"><i class='bx bxs-envelope'></i><span class="text">Message</span></a></li>
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
  <!-- CONTENT -->
  <section id="content">
    <nav><i id="toggle-sidebar" class='bx bx-menu'></i></nav>
    <main>
      <div class="head">
        <h3>Daftar Akun User</h3>
        <div class="search-container">
          <input type="text" id="searchInput" placeholder="Cari username atau email...">
          <i class='bx bx-search'></i>
        </div>
      </div>
   
        <table id="userTable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>Phone number</th>
              <th>Date & Time</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->no_hp }}</td>
          <td>{{ $user->created_at }}</td>
        </tr>
      @endforeach
          </tbody>

        </table>
    


    </main>
  </section>
  </div>

  <script>
     const toggleBtn = document.getElementById('toggle-sidebar');
    const sidebar = document.getElementById('main-wrapper');

    toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('sidebar-collapsed');
    });
    // Filter pencarian
    document.getElementById('searchInput').addEventListener('keyup', function () {
      const value = this.value.toLowerCase();
      const rows = document.querySelectorAll('#userTable tbody tr');

      rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(value) ? '' : 'none';
      });
    });
  </script>
</body>

</html>