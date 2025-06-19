@extends('layouts.main-page')

@section('title', 'Book')

@section('content')
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
        <input type="text" name="phone" maxlength="13" class="form-control" required
       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
       placeholder="Your Phone">
      </div>
      <div class="col-lg-4 col-md-6">
        <input type="date" name="date" class="form-control" id="date" min="{{ date('Y-m-d') }}" placeholder="Date" required="">
      </div>
      <div class="col-lg-4 col-md-6">
        <select class="form-control" name="time" type="time" id="time" required>
        <option value="">Select Time</option>
        <option value="11:00:00" >11:00 - 13:00</option>
        <option value="13:15:00" >13:15 - 15-15</option>
        <option value="15:30:00">15:30 - 17:30</option>
        <option value="17:45:00">17:45 - 19:45</option>
        <option value="20:00:00">20:00 - 22:00</option>
        </select>
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

  </section>
  <!-- /Book A Table Section -->
@endsection
<!-- Flatpickr CSS -->

@push('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const timeSelect = document.getElementById('time');

    fetch("{{ route('book.fullybooked') }}")
      .then(res => res.json())
      .then((fullDates) => {
        console.log("Full Booked Dates:", fullDates); // cek di console

        flatpickr("#date", {
          minDate: "today",
          dateFormat: "Y-m-d",
          disable: fullDates,
          onChange: function(selectedDates, dateStr) {
            fetch("{{ route('check.availability') }}", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
              },
              body: JSON.stringify({ date: dateStr })
            })
            .then(res => res.json())
            .then(disabledTimes => {
              Array.from(timeSelect.options).forEach(opt => {
                if (opt.value) {
                  opt.disabled = disabledTimes.includes(opt.value);
                  opt.style.color = opt.disabled ? "#aaa" : "#000";
                }
              });
            });
          },
          onDayCreate: function(dObj, dStr, fp, dayElem) {
            // Format: "2025-07-17"
            const dateFormatted =  flatpickr.formatDate(dayElem.dateObj, "Y-m-d");

            if (fullDates.includes(dateFormatted)) {
              dayElem.style.background = "#ffdddd";
              dayElem.style.color = "#a00";
            }
          }
        });
      });
  });
</script>

@endpush
