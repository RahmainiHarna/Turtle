
@extends('layouts.main-page')

@section('title', 'CartMenu')

@section('content')
    <section id="cartmenu" class="cartmenu section">
    <div class="container position-relative d-flex align-items-center justify-content-between" data-aos="fade-up">
        <div class="container" data-aos="fade-up">
            <h2>Choose Your Favorite Menu!</h2>
        </div>
        <div>
        <a href="#" onclick="cekSebelumInvoice(event)" class="btn btn-warning btn-md">
            <i class="bi bi-receipt me-2"></i>View Invoice</a>
        </div>
    </div>

    <div class="container position-relative d-flex align-items-center justify-content-between" data-aos="fade-up">
        <div class="row g-4">
            @foreach ($menus as $menu)
            <div class="col-md-3 col-sm-6">
                <div class="card card-menu p-4">
                <img src="{{ asset('assets/img/menu/' . $menu->image) }}" alt="{{ $menu->name }}">
                    <div class="card-body">
                        <h4 class="card-title">{{ $menu->name }}</h4>

                        <!-- <div class="row mb-2">
                            <div class="col">
                                <strong>{{ ucfirst($menu->type) }}</strong>
                            </div>
                        </div> -->

                        <h5 class="harga mb-3">Rp{{ number_format($menu->price, 0, ',', '.') }}</h5>
                        <div class="d-flex justify-content-center align-items-center mt-2">
                            <form method="POST" action="{{ route('cart.remove', $menu->id) }}">
                                @csrf
                                <button class="btn btn-warning btn-sm" type="submit">
                                    <i class="bi bi-dash"></i>
                                </button>
                            </form>
                            <div class="quantity-display">
                                {{ $cart[$menu->id] ?? 0 }}
                            </div>
                            <form method="POST" action="{{ route('cart.add', $menu->id) }}">
                                @csrf
                                <button class="btn btn-warning btn-sm" type="submit">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </section>

    <script>
        let cart = [];

        function addToCart(menuId, name, price) {
            let item = cart.find(i => i.menu_id === menuId);
            if (item) {
                item.quantity += 1;
            } else {
                cart.push({ menu_id: menuId, name: name, price: price, quantity: 1 });
            }

            document.getElementById('qty-' + menuId).innerText = cart.find(i => i.menu_id === menuId).quantity;
        }
        function decreaseQty(menuId) {
            let item = cart.find(i => i.menu_id === menuId);
            if (item && item.quantity > 0) {
                item.quantity -= 1;
                if (item.quantity === 0) {
                    cart = cart.filter(i => i.menu_id !== menuId); // hapus dari cart
                }
                document.getElementById('qty-' + menuId).innerText = item.quantity || 0;
            }
        }

        function submitBooking() {
            // Simulasi data booking - ganti dengan input form kalau ada
            const bookingData = {
                name: "Nama Dummy",
                date: "2025-04-29"
            };

            fetch('/booking-with-order', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    booking: bookingData,
                    cart: cart
                })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Pesanan berhasil disimpan!");
                        window.location.href = '/invoice/' + data.booking_id;
                    }
                });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function cekSebelumInvoice(e) {
            e.preventDefault();

            const hasBooking = "{{ session()->has('booking') ? 'true' : 'false' }}";
            const hasCart = "{{ session()->has('cart') && count(session('cart')) > 0 ? 'true' : 'false' }}";

            if (hasBooking !== "true" || hasCart !== "true") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops!',
                    text: 'Let’s pick your menu first.',
                    width: '400px',
                    customClass: {
                        title: 'cormorant-alert',
                        htmlContainer: 'poppins-alert'
                    }
                });
            } else {
                window.location.href = "{{ route('invoice.show', ['confirm' => 'yes']) }}";
            }
        }
    </script>
@endsection

