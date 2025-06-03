@extends('layouts.main-page')

@section('title', 'Testimonials')

@section('content')

<!-- Testimonials Section -->
    <section id="testimonials" class="testimonials-new section">
      
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonial</h2>
        <p>What do you think about us</p>
      </div><!-- End Section Title -->
      
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <form action="{{route ( 'testimoni.store' )}}" method="POST" class="book" data-aos="fade-up" data-aos-delay="200">
          @csrf
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit">Send Testimonial</button>
            </div>

          </div>
        </form>
      </div><!-- End Testimonials Form -->


    </section>
<!-- /Testimonials Section -->
@endsection