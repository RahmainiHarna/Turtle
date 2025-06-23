@extends('layouts.main-page')

@section('title', 'Menu')

@section('content')
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
      @foreach ($menus as $menu)
      <div class="col-lg-6 menu-item isotope-item filter-{{ $menu->type }}">
      <img src="/assets/img/menu/{{ $menu->image }}" class="menu-img" alt="">
      <div class="menu-content">
      <a href="#">{{ $menu->name }}</a><span>{{ number_format($menu->price, 0, ',', '.') }}</span>
      </div>
      <div class="menu-ingredients">
      {{ $menu->description }}
      </div>
      </div><!-- Menu Item -->
    @endforeach
    </div>

    </div>

  </section>
  <!-- /Menu Section -->
@endsection