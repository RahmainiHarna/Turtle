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
            <li><a href="{{ url('/#about') }}">About</a></li>
<<<<<<< HEAD
            <li><a href="{{ url('/#best-sellers') }}">Specials</a></li>
=======
            <li><a href="{{ url('/#specials') }}">Specials</a></li>
>>>>>>> a3f59fe7584f24a20d9ec4420f07edd739fa600d
            <li><a href="{{ url('/#events') }}">Events</a></li>
            <li><a href="{{ url('/#testimonials') }}">Testimonials</a></li>
            <li><a href="{{ url('/#gallery') }}">Gallery</a></li>
            <li><a href="{{ url('/#contact') }}">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      @guest
      <a href="{{ route('login') }}" class="btn-login d-none d-xl-block">LOGIN</a>
      @endguest

      @auth
      <div class="user-dropdown">
        <button id="dropdownButton">{{ Auth::user()->username }}</button>
        <div id="dropdownContent" class="user-dropdown-content">
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        </div>
      </div>
      @endauth

      </div>

    </div>
  <!-- End Navbar -->