@extends('layouts.main-page')

@section('title', 'Invoice')

@section('content')
<section id="invoice" class="section">
  <div class="container" data-aos="fade-up">
    <h2>Invoice Pemesanan</h2>

    <!-- Booking Info -->
    <div class="mb-4">
      <h5>Informasi Pemesan</h5>
      <p><strong>Nama:</strong> {{ session('booking.name') }}</p>
      <p><strong>Email:</strong> {{ session('booking.email') }}</p>
      <p><strong>Telepon:</strong> {{ session('booking.phone') }}</p>
      <p><strong>Tanggal:</strong> {{ session('booking.date') }}</p>
      <p><strong>Waktu:</strong> {{ session('booking.time') }}</p>
      <p><strong>Jumlah Orang:</strong> {{ session('booking.people') }}</p>
      <p><strong>Pesan:</strong> {{ session('booking.message') }}</p>
    </div>

    <!-- Cart Info -->
    <div>
      <h5>Pesanan Menu</h5>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Menu</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @php $grandTotal = 0; @endphp
          @foreach ($cart as $menu)
          <tr>
            <td>{{ $menu['name'] }}</td>
            <td>{{ $menu['qty'] }}</td>
            <td>Rp{{ number_format($menu['price'], 0, ',', '.') }}</td>
            <td>Rp{{ number_format($menu['qty'] * $menu['price'], 0, ',', '.') }}</td>
            @php $grandTotal += $menu['qty'] * $menu['price']; @endphp
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3" class="text-end">Total</th>
            <th>Rp{{ number_format($grandTotal, 0, ',', '.') }}</th>
          </tr>
        </tfoot>
      </table>
    </div>

    <!-- Konfirmasi -->
    <form action="{{ route('invoice.confirm') }}" method="POST">
      @csrf
      <button class="btn btn-success mt-3" type="submit">Konfirmasi & Simpan</button>
    </form>
  </div>
</section>
@endsection
