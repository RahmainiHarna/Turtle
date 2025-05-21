<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Menu Pilihan</title>
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">

    <style>
        .icon {
            color: #cda45e;
        }

        header {
            background-color: #1a1a1a;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-menu {
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            text-align: center;
        }

        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .card-menu img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .btn-plus {
            background-color: #f7c32e;
            color: white;
            font-weight: bold;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 20px;
            border: none;
        }

        .quantity-display {
            font-weight: bold;
            margin-top: 10px;
        }

        .star {
            color: orange;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <header>
        <h1 class="text-center text-white">Pilih Menu</h1>
        <a href="{{ route('invoice') }}" class="btn btn-warning">
            <i class="bi bi-cart"></i> Lihat Invoice
        </a>
    </header>

    <div class="container mt-5">
        <div class="row g-4">
            @foreach ($menus as $menu)
                <div class="col-md-4">
                    <div class="card card-menu p-4">
                        <img src="{{ asset('assets/img/menu/' . $menu->image) }}" alt="{{ $menu->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->name }}</h5>

                            <div class="row mb-2">
                                <div class="col">
                                    <small>Type</small><br>
                                    <strong>{{ ucfirst($menu->type) }}</strong>
                                </div>
                            </div>

                            <h5 class="harga mt-3 mb-3">Rp {{ number_format($menu->price, 0, ',', '.') }}</h5>
                            <div class="d-flex justify-content-center align-items-center mt-2">
                                <form method="POST" action="{{ url('/menu/add/' . $menu->id) }}">
                                    @csrf
                                    <button class="btn btn-warning btn-sm ms-2" type="submit">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </form>


                                <div class="quantity-display">
                                    {{ $cart[$menu->id] ?? 0 }}
                                </div>


                                <form method="POST" action="{{ url('/menu/remove/' . $menu->id) }}">
                                    @csrf
                                    <button class="btn btn-warning btn-sm me-2" type="submit">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer id="footer" class="footer mt-5">
        <div class="container footer-top d-flex justify-content-center">
            <div class="social-links d-flex mt-4 align-items-center">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="https://www.facebook.com/sajian.bhinneka/?locale=id_ID"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/sajianbhinneka/?hl=id"><i class="bi bi-instagram"></i></a>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Restaurantly</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>

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
</body>

</html>