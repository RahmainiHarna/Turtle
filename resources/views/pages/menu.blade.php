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

    </section>
<!-- /Menu Section -->
@endsection