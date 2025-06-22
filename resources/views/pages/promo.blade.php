<!-- === Promotion Section on Home === -->
<section id="promotions" class="section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Promotions</h2>
    <p>Hot Deals</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-3">
        <ul class="nav nav-tabs flex-column">
          @foreach($promos as $index => $promo)
            <li class="nav-item">
              <a class="nav-link {{ $index === 0 ? 'active show' : '' }}" data-bs-toggle="tab" href="#promo-{{ $promo->id }}">
                {{ $promo->title }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <div class="col-lg-9 mt-5 mt-lg-0">
        <div class="tab-content">
          @foreach($promos as $index => $promo)
            <div class="tab-pane {{ $index === 0 ? 'active show' : '' }}" id="promo-{{ $promo->id }}">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>{{ $promo->menus->pluck('name')->implode(', ') }}</h3>
                  <p class="fst-italic">{{ $promo->description }}</p>
                  <h5><strong>Rp{{ number_format($promo->promo_price, 0, ',', '.') }}</strong></h5>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2 mb-5">
                  <img src="{{ asset('assets/img/promo/' . $promo->image) }}" alt=""
                    style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover">
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
