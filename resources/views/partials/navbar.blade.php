  <!-- Top Bar -->
    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:turtle@gmail.com">turtle@gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>0821 5577 4325</span></i>
        </div>
        <div class="languages d-none d-md-flex align-items-center">
          <ul>
            <li class="bi bi-globe d-flex align-items-center"></li>
            <li><a href="#">En</a></li>
          </ul>
        </div>
      </div>
    </div>
  <!-- End Top Bar -->

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
          <li><a href="#hero" class="active">Home<br></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#specials">Specials</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#testimonials">Testimonials</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#contact">Contact</a></li>
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