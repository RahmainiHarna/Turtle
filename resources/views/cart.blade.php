
@extends('layouts.main-page')

@section('title', 'CartMenu')

@section('content')
    <section id="cartmenu" class="cartmenu section">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <div class="container" data-aos="fade-up">
            <h2>Choose Your Favorite Menu!</h2>
        </div>
        <div><button class="btn btn-warning btn-md" onclick="showCartPopup()" style="margin-right: 10px;" data-aos="fade-up">
            <i class="bi bi-cart4" style="font-size: 20px;"></i></button>
        </div>
        <div><a href="#" onclick="cekSebelumInvoice(event)" class="btn btn-warning btn-md" data-aos="fade-up">
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showCartPopup() {
            const cartData = @json($cart);
            const menus = @json($menus);

            let cartHTML = '';
            let foundItem = false;

            menus.forEach(menu => {
                if (cartData[menu.id]) {
                    foundItem = true;
                    cartHTML += `
                        <div style="margin-bottom: 5px;">
                            ${menu.name} - <span>${cartData[menu.id]}x</span>
                        </div>
                    `;
                }
            });

            if (!foundItem) {
                cartHTML = `<p style="font-style: italic; color: #888;">Your cart is empty.</p>`;
            }

            Swal.fire({
                title: 'Your Menu',
                html: cartHTML,
                icon: 'info',
                width: 400,
                confirmButtonText: 'Close',
                customClass: {
                    popup: 'rounded-4',
                    title: 'cormorant-alert',
                    htmlContainer: 'poppins-alert'
                }
            });
        }
    </script>

@endsection

