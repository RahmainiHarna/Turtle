  <!-- Navbar -->
    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center me-auto me-xl-0">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="/assets/img/logo-turtles.png" alt="">
          <h1 class="sitename">TURTLE’S</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
          <li><a href="{{ url('/#hero') }}" class="active">Home<br></a></li>
            <li><a href="{{ url('/#best-sellers') }}">Specials</a></li>
            <li><a href="{{ url('/#events') }}">Events</a></li>
            <li><a href="{{ url('/#testimonials') }}">Testimonials</a></li>
            <li><a href="{{ url('/#gallery') }}">Gallery</a></li>
            <li><a href="{{ url('/#contact') }}">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        {{-- Kalau belum login --}}
        @guest
        <div class="d-flex align-items-center gap-2">
          <img src="{{ asset('assets/img/default.png') }}" class="profile-img">
          <a href="{{ route('login') }}" class="btn-login d-none d-xl-block">LOGIN</a>
        </div>
        @endguest

        {{-- Kalau sudah login --}}
        @auth
        <div class="d-flex align-items-center gap-2 user-area" style="position: relative;">
          {{-- Foto profil --}}
          <img src="{{ asset(Auth::user()->photo ?? 'assets/img/default.png') }}" class="profile-img">

          {{-- Username + dropdown --}}
          <div class="user-dropdown">
            <button id="dropdownButton" onclick="toggleDropdown()">{{ Auth::user()->username }} <i class="fa-solid fa-chevron-down" style="margin-left: 5px;"></i></button>
            <div id="dropdownContent" class="user-dropdown-content">
              <a href="{{ route('profile.edit') }}">
                <i class="bi bi-person-circle me-2" style="margin-left: 5px;"></i> Profile
              </a>
              <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right me-2" style="margin-left: 5px;"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>
        </div>
        @endauth

      </div>

    </div>
  <!-- End Navbar -->