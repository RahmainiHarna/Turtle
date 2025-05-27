<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>TURTLE'S</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="/assets/img/logo-turtles.png" rel="icon">
  <link href="/assets/img/logo-turtles.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
        rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header fixed-top">
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
            <li><a href="">Testimonials</a></li>
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

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="/assets/img/foto1.png" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-8 d-flex flex-column align-items-center align-items-lg-start">
            <h2 data-aos="fade-up" data-aos-delay="100">Welcome to <span>TURTLE’S</span></h2>
            <p data-aos="fade-up" data-aos-delay="200">— Eat, Feel, and Fall in Love with Indonesian Flavor.</p>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
              <a href="#menu" class="cta-btn">Our Menu</a>
              <a href="#book-a-table" class="cta-btn">Book a Table</a>
            </div>
          </div>
          <div class="col-lg-4 d-flex align-items-center justify-content-center mt-5 mt-lg-0">
            <a href="https://youtu.be/Y9I70mlH-2c?si=9BKot2WF68Dhh1m1" class="glightbox pulsating-play-btn"></a>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="assets/img/about.jpg" class="img-fluid about-img" alt="">
          </div>
          <div class="col-lg-6 order-2 order-lg-1 content">
            <h3>Every Bite Tells a Story of Indonesia.</h3>
            <p class="fst-italic">
              At TURTLE’S, we believe that every traditional dish tells a story — of people, places, and generations.
            </p>
            <p>
              We’re all about bringing the vibrant flavors of Indonesia straight to your table. With recipes passed down through generations and only the 
              freshest local ingredients, we create dishes that capture the heart and soul of Indonesian home cooking. Whether you’re trying these bold flavors 
              for the first time or craving a taste of home, TURTLE’S is here to offer a warm and unforgettable experience — one plate at a time.
            </p>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Menu Section -->
    <section id="menu" class="menu section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Menu</h2>
        <p>Check our Tasty Menu</p>
      </div><!-- End Section Title -->

      <div class="container isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul class="menu-filters isotope-filters">
              <li data-filter="*" class="filter-active">ALL</li>
              <li data-filter=".filter-makanan">FOOD</li>
              <li data-filter=".filter-minuman">DRINKS</li>
              <li data-filter=".filter-snack">SNACK</li>
            </ul>
          </div>
        </div><!-- Menu Filters -->

        <div class="row isotope-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/ayam_batokok.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Ayam Batokok</a><span>38.000</span>
            </div>
            <div class="menu-ingredients">
              West Sumatran-style smashed grilled chicken topped with spicy green chili sambal.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/ayam_betutu.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Ayam Betutu</a><span>48.000</span>
            </div>
            <div class="menu-ingredients">
              Balinese seasoned chicken slow-cooked in banana leaves with rich spices.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/ayam_penyet.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Ayam Penyet</a><span>35.000</span>
            </div>
            <div class="menu-ingredients">
              Crispy fried chicken smashed and served with spicy sambal and rice.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/ayam_rica.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Ayam Rica-Rica</a><span>38.000</span>
            </div>
            <div class="menu-ingredients">
              Manado-style spicy chicken cooked with rich chili and herb seasoning.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/avocado_juice.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Avocado Juice</a><span>22.000</span>
            </div>
            <div class="menu-ingredients">
              Creamy and rich avocado smoothie, often sweetened with chocolate syrup.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/bebek_matah.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Bebek Sambal Matah</a><span>43.000</span>
            </div>
            <div class="menu-ingredients">
              Crispy fried duck served with fresh Balinese raw sambal made of shallots, lemongrass, and chili.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/cah_kangkung.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Cah Kangkung</a><span>20.000</span>
            </div>
            <div class="menu-ingredients">
              Stir-fried water spinach with garlic and savory oyster sauce.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/cendol.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Cendol</a><span>25.000</span>
            </div>
            <div class="menu-ingredients">
              Iced sweet dessert with pandan jelly, coconut milk, red beans, and palm sugar syrup.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-snack">
            <img src="/assets/img/menu/snack/chococheese_banana.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Choco Cheese Banana</a><span>18.000</span>
            </div>
            <div class="menu-ingredients">
              Grilled banana topped with melted chocolate and shredded cheese.
            </div>
          </div><!-- Menu Item -->
          
          <div class="col-lg-6 menu-item isotope-item filter-snack">
            <img src="/assets/img/menu/snack/crispy_mushrooms.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Crispy Mushrooms</a><span>18.000</span>
            </div>
            <div class="menu-ingredients">
              Battered and deep-fried mushrooms with a crunchy texture.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/dragonfruit_juice.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Dragon Fruit Juice</a><span>20.000</span>
            </div>
            <div class="menu-ingredients">
              Vibrant and mildly sweet juice from fresh red dragon fruit.
            </div>
          </div><!-- Menu Item -->
          
          <div class="col-lg-6 menu-item isotope-item filter-snack">
            <img src="/assets/img/menu/snack/french_fries.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">French Fries</a><span>18.000</span>
            </div>
            <div class="menu-ingredients">
              Classic deep-fried potato sticks, crispy on the outside and soft inside.
            </div>
          </div><!-- Menu Item -->
          
          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/fried_shrimp.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Fried Shrimp</a><span>38.000</span>
            </div>
            <div class="menu-ingredients">
              Crispy deep-fried shrimp served with dipping sauce.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-snack">
            <img src="/assets/img/menu/snack/fried_springrolls.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Fried Spring Rolls</a><span>18.000</span>
            </div>
            <div class="menu-ingredients">
              Crispy rolls filled with vegetables or meat, served with dipping sauce.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/fried_squid.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Fried Squid</a><span>38.000</span>
            </div>
            <div class="menu-ingredients">
              Battered squid rings fried until golden and crispy.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-snack">
            <img src="/assets/img/menu/snack/fried_tofu.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Fried Tofu</a><span>15.000</span>
            </div>
            <div class="menu-ingredients">
              Crispy golden tofu cubes, lightly seasoned and deep-fried.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/grilled_chicken.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Grilled Chicken</a><span>38.000</span>
            </div>
            <div class="menu-ingredients">
              Marinated chicken grilled to perfection with smoky flavor.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/grilled_fish.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Grilled Fish</a><span>48.000</span>
            </div>
            <div class="menu-ingredients">
              Fresh fish marinated in spices and grilled over charcoal.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/guava_juice.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Guava Juice</a><span>20.000</span>
            </div>
            <div class="menu-ingredients">
              Sweet and slightly tangy juice made from pink guava.
            </div>
          </div><!-- Menu Item -->
          
          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/iced_tea.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Iced Tea</a><span>12.000</span>
            </div>
            <div class="menu-ingredients">
              Chilled black tea served over ice.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-snack">
            <img src="/assets/img/menu/snack/klepon.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Klepon</a><span>12.000</span>
            </div>
            <div class="menu-ingredients">
              Traditional glutinous rice balls filled with palm sugar and coated in grated coconut.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/lemon_tea.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Lemon Tea</a><span>18.000</span>
            </div>
            <div class="menu-ingredients">
              Iced black tea infused with fresh lemon juice.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/lychee_tea.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Lychee Tea</a><span>18.000</span>
            </div>
            <div class="menu-ingredients">
              Iced tea flavored with sweet lychee fruit syrup.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/mango_juice.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Mango Juice</a><span>22.000</span>
            </div>
            <div class="menu-ingredients">
              Smooth and fragrant tropical juice from ripe mangoes.
            </div>
          </div><!-- Menu Item -->
          
          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/melon_juice.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Melon Juice</a><span>20.000</span>
            </div>
            <div class="menu-ingredients">
              Cool and subtly sweet juice made from fresh honeydew melon.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/mineral_water.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Mineral Water</a><span>8.000</span>
            </div>
            <div class="menu-ingredients">
              Pure bottled drinking water.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/nasi_goreng_kampung.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Nasi Goreng Kampung</a><span>30.000</span>
            </div>
            <div class="menu-ingredients">
              Traditional Indonesian fried rice with anchovies, vegetables, and chili.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/orange_juice.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Orange Juice</a><span>20.000</span>
            </div>
            <div class="menu-ingredients">
              Refreshing citrus juice from fresh oranges.
            </div>
          </div><!-- Menu Item -->
          
          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/passionfruit_juice.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Passion Fruit Juice</a><span>22.000</span>
            </div>
            <div class="menu-ingredients">
              Aromatic and tangy juice made from tropical passion fruit.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-snack">
            <img src="/assets/img/menu/snack/perkedel_jagung.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Perkedel Jagung</a><span>15.000</span>
            </div>
            <div class="menu-ingredients">
              Savory fritters made from sweet corn and light spices, deep-fried until crispy.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/pineapple_juice.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Pineapple Juice</a><span>20.000</span>
            </div>
            <div class="menu-ingredients">
              Zesty and sweet juice from juicy pineapples.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/rendang.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Rendang</a><span>43.000</span>
            </div>
            <div class="menu-ingredients">
              Slow-cooked beef in rich coconut and spice mixture, deeply flavorful and tender.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-snack">
            <img src="/assets/img/menu/snack/roti_jala.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Roti Jala</a><span>20.000</span>
            </div>
            <div class="menu-ingredients">
              Lacy net-like crepes made from turmeric-flavored batter, often served with curry.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-snack">
            <img src="/assets/img/menu/snack/rujak.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Rujak</a><span>15.000</span>
            </div>
            <div class="menu-ingredients">
              Spicy Indonesian fruit salad with a tangy-sweet peanut sauce.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/sate.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Sate</a><span>30.000</span>
            </div>
            <div class="menu-ingredients">
              Grilled skewered chicken served with rich peanut sauce.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/sayur_asam.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Sayur Asam</a><span>20.000</span>
            </div>
            <div class="menu-ingredients">
              Tamarind-based vegetable soup with a refreshing sweet-sour taste.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/sop_buah.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Sop Buah</a><span>25.000</span>
            </div>
            <div class="menu-ingredients">
              Refreshing mix of fresh fruits in sweet milky ice syrup.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/sop_buntut.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Sop Buntut</a><span>52.000</span>
            </div>
            <div class="menu-ingredients">
              Clear broth soup with tender oxtail, vegetables, and Indonesian spices.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/soursop_juice.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Soursop Juice</a><span>22.000</span>
            </div>
            <div class="menu-ingredients">
              Sweet and tangy tropical juice made from fresh soursop fruit.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-snack">
            <img src="/assets/img/menu/snack/tempe_mendoan.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Tempe Mendoan</a><span>15.000</span>
            </div>
            <div class="menu-ingredients">
              Thinly sliced fermented soybeans, battered and fried until soft and golden.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/tongseng_kambing.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Tongseng Kambing</a><span>45.000</span>
            </div>
            <div class="menu-ingredients">
              Spicy and savory goat meat stew with cabbage and sweet soy sauce.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-minuman">
            <img src="/assets/img/menu/minuman/watermelon_juice.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Watermelon Juice</a><span>20.000</span>
            </div>
            <div class="menu-ingredients">
              Light and hydrating juice from fresh watermelon.
            </div>
          </div><!-- Menu Item -->

          <div class="col-lg-6 menu-item isotope-item filter-makanan">
            <img src="/assets/img/menu/makanan/white_rice.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">White Rice</a><span>8.000</span>
            </div>
            <div class="menu-ingredients">
             Steamed fluffy white rice, a staple side dish served with almost any main course.
            </div>
          </div><!-- Menu Item -->

        </div><!-- Menu Container -->

      </div>

    </section><!-- /Menu Section -->

    <!-- Specials Section -->
    <section id="specials" class="specials section">
      
      <!-- Promotion Section -->
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Promotion</h2>
        <p>Hot Deals</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#specials-tab-0">Pocket Set</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#specials-tab-1">Family Set</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#specials-tab-2">Tropical Set</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <!-- Pocket Set -->
              <div class="tab-pane active show" id="specials-tab-0">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Ayam Penyet, Lemon Tea, and Perkedel Jagung</h3>
                    <p class="fst-italic">A simple, budget-friendly combo that hits the spot!</p>
                    <p><strong>Rp60.000</strong></p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="/assets/img/promo/pocket_set.jpg" alt=""
                        style="width: 175px; height: 175px; border-radius: 50%; object-fit: cover;">
                  </div>
                </div>
              </div>

              <!-- Family Set -->
              <div class="tab-pane" id="specials-tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>4 Ice Tea, 4 Rice, Cah Kangkung, Grilled Fish, and Tempe Mendoan</h3>
                    <p class="fst-italic">Perfect for sharing, packed with bold flavors and good vibes only.</p>
                    <p><strong>Rp130.000</strong></p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="/assets/img/promo/family_set.jpg" alt=""
                        style="width: 175px; height: 175px; border-radius: 50%; object-fit: cover;">
                  </div>
                </div>
              </div>

              <!-- Tropical Set -->
              <div class="tab-pane" id="specials-tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Klepon, Rujak, and Sop Buah</h3>
                    <p class="fst-italic">Three iconic bites, one tropical vibe.</p>
                    <p><strong>Rp45.000</strong></p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="/assets/img/promo/tropical_set.jpg" alt=""
                        style="width: 175px; height: 175px; border-radius: 50%; object-fit: cover;">
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div><!-- /Promotion Section -->

    </section>

    <section id="why-us" class="why-us section">
      <!-- Best Sellers Section -->
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Best Sellers</h2>
        <p>Hot Picks</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card-item">
              <h4><a href="" class="stretched-link">Sop Buntut</a></h4>
              <p><strong>Rp52.000</strong></p><br>
              <p><img src="/assets/img/menu/makanan/sop_buntut.png" alt=""
                  style="width: 175px; height: 175px; border-radius: 50%; object-fit: cover;"></p><br>
              <p>Clear broth soup with tender oxtail, vegetables, and Indonesian spices.</p>
            </div>
          </div><!-- Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card-item">
              <h4><a href="" class="stretched-link">Cendol</a></h4>
              <p><strong>Rp25.000</strong></p><br>
              <p><img src="/assets/img/menu/minuman/cendol.png" alt=""
                  style="width: 175px; height: 175px; border-radius: 50%; object-fit: cover;"></p><br>
              <p>Iced sweet dessert with pandan jelly, coconut milk, red beans, and palm sugar syrup.</p>
            </div>
          </div><!-- Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card-item">
              <h4><a href="" class="stretched-link">Roti Jala</a></h4>
              <p><strong>Rp20.000</strong></p><br>
              <p><img src="/assets/img/menu/snack/roti_jala.png" alt=""
                  style="width: 175px; height: 175px; border-radius: 50%; object-fit: cover;"></p><br>
              <p>Lacy net-like crepes made from turmeric-flavored batter, often served with curry.</p>
            </div>
          </div><!-- Card Item -->

        </div>

      </div><!-- /Best Sellers Section -->

    </section><!-- /Specials Section -->

    <!-- Events Section -->
    <section id="events" class="events section">
      <!-- <img class="slider-bg" src="/assets/img/events-bg.jpg" alt="" data-aos="fade-in"> -->

      <div class="container">

        <div class="swiper init-swiper" data-aos="fade-up" data-aos-delay="100">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
            <div class="row gy-4 event-item">
              <div class="col-lg-6">
                <img src="/assets/img/events-slider/family_gathering.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0 content">
                <h3>Family Gathering Package</h3>
                <div class="price">
                  <p><span>Rp4.000.000</span></p>
                </div>
                <p class="fst-italic">Celebrate family togetherness with authentic local flavors in a warm, traditional setting!</p>
                <ul>
                  <li><i class="bi bi-check2-circle"></i>Exclusive private dining room for your family</li>
                  <li><i class="bi bi-check2-circle"></i>Special selection of local dishes (Nasi Liwet, Grilled Chicken, Sambal, etc.)</li>
                  <li><i class="bi bi-check2-circle"></i>Welcome drinks with herbal jamu or traditional iced beverages</li>
                  <li><i class="bi bi-check2-circle"></i>Exclusive live music available for family gatherings</li>
                </ul>
                <p>Experience the warmth of home in a truly Indonesian dining atmosphere at Turtle’s Traditional Resto!</p>
              </div>
            </div>
          </div><!-- End Slider item -->

          <div class="swiper-slide">
            <div class="row gy-4 event-item">
              <div class="col-lg-6">
                <img src="/assets/img/events-slider/bussiness_lunch.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0 content">
                <h3>Business Lunch Package</h3>
                <div class="price">
                  <p><span>Rp3.200.000</span></p>
                </div>
                <p class="fst-italic">Host productive midday meetings over delicious traditional cuisine in a warm and professional setting.</p>
                <ul>
                  <li><i class="bi bi-check2-circle"></i>Exclusive private dining area for business clients</li>
                  <li><i class="bi bi-check2-circle"></i>Special selection of local dishes (Nasi Liwet, Grilled Chicken, Sambal, etc.)</li>
                  <li><i class="bi bi-check2-circle"></i>Welcome drinks with herbal jamu or traditional iced beverages</li>
                  <li><i class="bi bi-check2-circle"></i>Projector & screen available on request</li>
                </ul>
                <p>Make your business lunch both productive and memorable at Turtle’s Traditional Resto.</p>
              </div>
            </div>
          </div><!-- End Slider item -->

          <div class="swiper-slide">
            <div class="row gy-4 event-item">
              <div class="col-lg-6">
                <img src="/assets/img/events-slider/live_music.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0 content">
                <h3>Live Music Event</h3>
                <div class="price">
                  <p><span>Rp1.600.000</span></p>
                </div>
                <p class="fst-italic">Bring your nights to life with live music filling the air!</p>
                <ul>
                  <li><i class="bi bi-check2-circle"></i>Special In-House Band Performances</li>
                  <li><i class="bi bi-check2-circle"></i>Slots Available for External Bands</li>
                  <li><i class="bi bi-check2-circle"></i>Sound System & Mini Stage Provided</li>
                  <li><i class="bi bi-check2-circle"></i>Relaxed Atmosphere with Special Dishes</li>
                </ul>
                <p>Enjoy a night of rhythm or take the stage with your own band at our restaurant. Book your performance slot now!</p>
              </div>
            </div>
          </div><!-- End Slider item -->

          </div><!-- End swiper-wrapper -->
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Events Section -->

    <!-- Book A Table Section -->
    <section id="book-a-table" class="book-a-table section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>RESERVATION</h2>
        <p>Book a Table</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

          <form action="{{ route('book.store') }}" method="post" role="form" class="book">
            @csrf
          <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required="">
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="date" name="date" class="form-control" id="date" placeholder="Date" required="">
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="time" class="form-control" name="time" id="time" placeholder="Time" required="">
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="number" class="form-control" name="people" id="people" placeholder="# of people" required="">
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
          </div>

          <div class="text-center mt-3">
            <div class="loading">Loading</div>
            <!-- <div class="error-message"></div>
            <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div> -->
            <button type="submit">Book a Table</button>
          </div>
        </form><!-- End Reservation Form -->

      </div>

    </section><!-- /Book A Table Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>What they're saying about us</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
            <p>
              <i class=" bi bi-quote quote-icon-left"></i>
                <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="/assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <p>Some photos from our Restaurant</p>
      </div><!-- End Section Title -->

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="/assets/img/gallery/foto1.jpeg" class="glightbox" data-gallery="images-gallery">
                <img src="/assets/img/gallery/foto1.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="/assets/img/gallery/foto2.jpeg" class="glightbox" data-gallery="images-gallery">
                <img src="/assets/img/gallery/foto2.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="/assets/img/gallery/foto3.jpeg" class="glightbox" data-gallery="images-gallery">
                <img src="/assets/img/gallery/foto3.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="/assets/img/gallery/foto4.jpeg" class="glightbox" data-gallery="images-gallery">
                <img src="/assets/img/gallery/foto4.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="/assets/img/gallery/foto5.jpeg" class="glightbox" data-gallery="images-gallery">
                <img src="/assets/img/gallery/foto5.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="/assets/img/gallery/foto6.jpeg" class="glightbox" data-gallery="images-gallery">
                <img src="/assets/img/gallery/foto6.jpeg" alt=" " class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="/assets/img/gallery/foto7.jpeg" class="glightbox" data-gallery="images-gallery">
                <img src="/assets/img/gallery/foto7.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="/assets/img/gallery/foto8.jpeg" class="glightbox" data-gallery="images-gallery">
                <img src="/assets/img/gallery/foto8.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

        </div>

      </div>

    </section><!-- /Gallery Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div><!-- End Section Title -->

      <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 400px;" 
          src="https://www.google.com/maps/place/Program+Studi+Teknologi+Informasi,+Fasilkom-TI,+Universitas+Sumatera+Utara/@3.5626522,98.6571451,17z/data=!3m1!4b1!4m6!3m5!1s0x30312fdf837c0b1b:0xa5ef19b5b1fb64a5!8m2!3d3.5626468!4d98.65972!16s%2Fg%2F11g8w8lt4g?entry=ttu&g_ep=EgoyMDI1MDQyMi4wIKXMDSoASAFQAw%3D%3D"></iframe>
      </div><!-- End Google Maps -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Location</h3>
                <p>Jl. Babura Lama No.4, Darat, Kec. Medan Baru, Kota Medan, Sumatera Utara 20153</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Open Hours</h3>
                <p>Monday-Sunday<br>11:00 AM - 23:00 PM</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>0821 5577 4325</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>turtle@gmail.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>
          @if(session ( 'succes'))
          <script>
            alert("{{ session('succes') }}");
          </script>
          @endif


          <div class="col-lg-8">
            <form action="{{route ( 'massage.store' )}}" method="post" class="book" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <!-- <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div> -->

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top d-flex justify-content-center">
      <!-- <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about"> -->
      
          <div class="social-links d-flex mt-4 align-items-center">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href="https://www.facebook.com/sajian.bhinneka/?locale=id_ID"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/sajianbhinneka/?hl=id"><i class="bi bi-instagram"></i></a>
          </div>
        
        <!-- </div>
      </div> -->
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Restaurantly</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>