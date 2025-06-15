@extends('layouts.main')

@section('title', 'Home')

@section('content')
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">

    <img src="/assets/img/foto1.png" alt="" data-aos="fade-in">

    <div class="container">
    <div class="row">
      <div class="col-lg-8 d-flex flex-column align-items-center align-items-lg-start">
      <h2 data-aos="fade-up" data-aos-delay="100">Welcome to <span>TURTLE’S</span></h2>
      <p data-aos="fade-up" data-aos-delay="200">— Eat, Feel, and Fall in Love with Indonesian Flavor.</p>
      <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
        <a href="{{ route('menu') }}" class="cta-btn">Our Menu</a>
        <a href="{{ route('book-a-table') }}" class="cta-btn">Book a Table</a>
      </div>
      </div>
      <div class="col-lg-4 d-flex align-items-center justify-content-center mt-5 mt-lg-0">
      <a href="https://youtu.be/Y9I70mlH-2c?si=9BKot2WF68Dhh1m1" class="glightbox pulsating-play-btn"></a>
      </div>
    </div>
    </div>

  </section>
  <!-- /Hero Section -->

  <!-- About Section -->
  <section id="about" class="about section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4 align-items-center">
      <div class="col-lg-6 order-1 order-lg-2">
      <img src="assets/img/gallery/foto3.jpeg" class="img-fluid about-img" alt="">
      </div>
      <div class="col-lg-6 order-2 order-lg-1 content">
      <h3>Every Bite Tells a <span>Story of Indonesia</span></h3>
      <p class="fst-italic">
        At Turtle’s, we believe that every traditional dish tells a story — of people, places, and generations.
      </p>
      <p>
        We’re all about bringing the vibrant flavors of Indonesia straight to your table. With recipes passed down
        through generations and only the
        freshest local ingredients, we create dishes that capture the heart and soul of Indonesian home cooking.
        Whether you’re trying these bold flavors
        for the first time or craving a taste of home, TURTLE’S is here to offer a warm and unforgettable experience —
        one plate at a time.
      </p>
      </div>
    </div>

    </div>

  </section>
  <!-- /About Section -->

  <!-- Specials Section -->
  <section id="best-sellers" class="best-sellers section">
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
        <h4>Sop Buntut</h4>
        <h5>Rp52.000</h5>
        <p><img src="/assets/img/menu/makanan/sop_buntut.png" alt=""
          style="width: 175px; height: 175px; border-radius: 50%; object-fit: cover;"></p>
        <p>Clear broth soup with tender oxtail, vegetables, and Indonesian spices.</p>
      </div>
      </div><!-- Card Item -->

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
      <div class="card-item">
        <h4>Cendol</h4>
        <h5>Rp25.000</h5>
        <p><img src="/assets/img/menu/minuman/cendol.png" alt=""
          style="width: 175px; height: 175px; border-radius: 50%; object-fit: cover;"></p>
        <p>Iced sweet dessert with pandan jelly, coconut milk, red beans, and palm sugar syrup.</p>
      </div>
      </div><!-- Card Item -->

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
      <div class="card-item">
        <h4>Roti Jala</h4>
        <h5>Rp20.000</h5>
        <p><img src="/assets/img/menu/snack/roti_jala.png" alt=""
          style="width: 175px; height: 175px; border-radius: 50%; object-fit: cover;"></p>
        <p>Lacy net-like crepes made from turmeric-flavored batter, often served with curry.</p>
      </div>
      </div><!-- Card Item -->

    </div>

    </div><!-- /Best Sellers Section -->

  </section>

  <section id="promotions" class="promotions section">

    <!-- Promotion Section -->
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
    <h2>Promotions</h2>
    <p>Hot Deals</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-3">
      <ul class="nav nav-tabs flex-column">
        <li class="nav-item">
        <a class="nav-link active show" data-bs-toggle="tab" href="#promotions-tab-0">Pocket Set</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#promotions-tab-1">Tropical Set</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#promotions-tab-2">Family Set</a>
        </li>
      </ul>
      </div>

      <div class="col-lg-9 mt-5 mt-lg-0">
      <div class="tab-content">
        <!-- Pocket Set -->
        <div class="tab-pane active show" id="promotions-tab-0">
        <div class="row">
          <div class="col-lg-8 details order-2 order-lg-1">
          <h3>Ayam Penyet, Lemon Tea, Perkedel Jagung</h3>
          <p class="fst-italic">Everyday favorite, easy on the budget, rich in flavor.</p>
          <h5><strong>Rp60.000</strong></h5>
          </div>
          <div class="col-lg-4 text-center order-1 order-lg-2 mb-5">
          <img src="/assets/img/promo/pocket_set.jpg" alt=""
            style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover">
          </div>
        </div>
        </div>

        <!-- Tropical Set -->
        <div class="tab-pane" id="promotions-tab-1">
        <div class="row">
          <div class="col-lg-8 details order-2 order-lg-1">
          <h3>Klepon, Rujak, Sop Buah</h3>
          <p class="fst-italic">Three iconic bites, one tropical vibe.</p>
          <h5><strong>Rp45.000</strong></h5>
          </div>
          <div class="col-lg-4 text-center order-1 order-lg-2 mb-5">
          <img src="/assets/img/promo/tropical_set.jpg" alt=""
            style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover">
          </div>
        </div>
        </div>

        <!-- Family Set -->
        <div class="tab-pane" id="promotions-tab-2">
        <div class="row">
          <div class="col-lg-8 details order-2 order-lg-1">
          <h3>4 Ice Tea, 4 Rice, Cah Kangkung, Grilled Fish, Tempe Mendoan</h3>
          <p class="fst-italic">Perfect for sharing, packed with bold flavors and heartwarming tastes.</p>
          <h5><strong>Rp130.000</strong></h5>
          </div>
          <div class="col-lg-4 text-center order-1 order-lg-2 mb-5">
          <img src="/assets/img/promo/family_set.jpg" alt=""
            style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover">
          </div>
        </div>
        </div>
      </div>
      </div>

    </div>
    </div><!-- /Promotion Section -->

  </section>
  <!-- /Specials Section -->

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
          <h6 class="fst-italic">Reconnect, reminisce, and celebrate togetherness over a table full of heartwarming
          local delicacies—wrapped in the charm of tradition.</h6>
          <ul>
          <li><i class="bi bi-check2-circle"></i>Private dining room for an intimate family experience</li>
          <li><i class="bi bi-check2-circle"></i>Curated selection of authentic Indonesian dishes</li>
          <li><i class="bi bi-check2-circle"></i>Refreshing welcome drinks: herbal jamu or traditional iced
            beverages</li>
          <li><i class="bi bi-check2-circle"></i>Optional live music performance to enhance the cozy ambiance</li>
          </ul>
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
          <h6 class="fst-italic">Where meaningful conversations meet comforting local flavors—served in a warm,
          professional setting that feels just right.</h6>
          <ul>
          <li><i class="bi bi-check2-circle"></i>Exclusive private dining area for business clients</li>
          <li><i class="bi bi-check2-circle"></i>Specially crafted menu of traditional Indonesian cuisine</li>
          <li><i class="bi bi-check2-circle"></i>Welcome drinks with herbal jamu or iced refreshments</li>
          <li><i class="bi bi-check2-circle"></i>Projector and screen available upon request</li>
          </ul>
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
          <p><span>Open Stage</span></p>
          </div>
          <h6 class="fst-italic">Liven up your evening with soulful sounds and warm flavors in a cozy, traditional
          setting.</h6>
          <ul>
          <li><i class="bi bi-check2-circle"></i>Live performances by our exclusive in-house band</li>
          <li><i class="bi bi-check2-circle"></i>Open slots for guest bands—an opportunity to showcase your talent
          </li>
          <li><i class="bi bi-check2-circle"></i>Professional sound system & mini stage provided</li>
          <li><i class="bi bi-check2-circle"></i>Relaxed atmosphere complemented by our signature dishes</li>
          </ul>
        </div>
        </div>
      </div><!-- End Slider item -->

      </div><!-- End swiper-wrapper -->
      <div class="swiper-pagination"></div>
    </div>

    </div>

  </section>
  <!-- /Events Section -->

  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section">

    <!-- Section Title -->
    <div class="container position-relative d-flex align-items-center justify-content-between" data-aos="fade-up">
    <div class="container section-title" data-aos="fade-up">
      <h2>Testimonials</h2>
      <p>What they're saying about us</p>
    </div>
    <a href="{{ route('testimonials') }}" class="cta-btn">Send Testimonial</a>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="swiper init-swiper" data-speed="600" data-delay="5000"
      data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
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

      @foreach($testimoni as $item)
      @if($item->status == 1)
        <div class="swiper-slide">
        <div class="testimonial-item">
        <p>
          <i class="bi bi-quote quote-icon-left"></i>
          <span>{{ $item->message }}</span>
          <i class="bi bi-quote quote-icon-right"></i>
        </p>
        {{-- Uncomment jika ada gambar --}}
        {{-- <img src="{{ asset('path/to/image.jpg') }}" class="testimonial-img" alt=""> --}}
        <h3>{{ $item->name }}</h3>
        <h4>{{ $item->subject ?? '' }}</h4>
        </div>
        </div><!-- End testimonial item -->
      @endif
      @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>
    </div>

  </section>
  <!-- /Testimonials Section -->

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

  </section>
  <!-- /Gallery Section -->

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

      <div class="col-lg-8">
      <form action="{{route('message.store')}}" method="post" class="book" data-aos="fade-up" data-aos-delay="200">
        @csrf
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

    <!-- /Events Section -->

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

  </section>
  <!-- /Contact Section -->
@endsection