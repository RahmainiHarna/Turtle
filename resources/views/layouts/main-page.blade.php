<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title') - TURTLE'S</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="/assets/img/logo-turtles.png" rel="icon">
  <link href="/assets/img/logo-turtles.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">
  @stack('styles')


  <!-- Custom CSS -->
  <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header fixed-top">
    @include('partials.navbar-page')
  </header>

  <main id="main" class="main">
    @yield('content')
  </main>

  <footer id="footer" class="footer">
    @include('partials.footer')
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="/assets/js/main.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const button = document.getElementById('dropdownButton');
      const content = document.getElementById('dropdownContent');

      button.addEventListener('click', function () {
        content.style.display = (content.style.display === 'block') ? 'none' : 'block';
      });

      window.addEventListener('click', function (e) {
        if (!button.contains(e.target) && !content.contains(e.target)) {
          content.style.display = 'none';
        }
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- SweetAlert untuk Booking Success -->
  @if(session('booking_success'))
    <script>
    Swal.fire({
      icon: 'success',
      title: 'Reserved!',
      text: "{{ session('booking_success') }}",
      showConfirmButton: false,
      width: '400px',
      timer: 2500,
      customClass: {
      title: 'cormorant-alert',
      htmlContainer: 'poppins-alert'
      }
    });
    </script>
  @endif

  <!-- SweetAlert untuk Menambah / Mengurangi Menu -->
  @if(session('cart_success'))
    <script>
    Swal.fire({
      icon: 'success',
      title: 'Noted!',
      text: "{{ session('cart_success') }}",
      showConfirmButton: false,
      width: '400px',
      timer: 1500,
      customClass: {
      title: 'cormorant-alert',
      htmlContainer: 'poppins-alert'
      }
    });
    </script>
  @endif

  <!-- SweetAlert untuk Testimonials -->
  @if(session('testimonial_success'))
    <script>
    Swal.fire({
      icon: 'success',
      title: 'Thank you!',
      text: "{{ session('testimonial_success') }}",
      showConfirmButton: false,
      width: '400px',
      timer: 2500,
      customClass: {
      title: 'cormorant-alert',
      htmlContainer: 'poppins-alert'
      }
    });
    </script>
  @endif

  <!-- SweetAlert untuk Contact -->
  @if(session('contact_success'))
    <script>
    Swal.fire({
      icon: 'success',
      title: 'Sent!',
      text: "{{ session('contact_success') }}",
      showConfirmButton: false,
      width: '400px',
      timer: 2500,
      customClass: {
      title: 'cormorant-alert',
      htmlContainer: 'poppins-alert'
      }
    });
    </script>
  @endif
  @stack('scripts')

</body>

</html>