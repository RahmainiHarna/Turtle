@extends('layouts.admin')

@section('title', 'Edit Prom0')

@section('content')
    <!-- MAIN -->
    <main>
        <div class="createmenu-header">
            <h1>Edit<span>Promo</span></h1>
            <a href="{{ route('promoAdmin') }}" class="btn-card-back">
                <i class='bx bx-left-arrow'></i> Back
            </a>
        </div>
        <div class="createmenu-order">
            <div class="head">
                <h3>Promo Details</h3>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('promo.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="title">Nama Promo:</label>
                <input type="text" name="title" value="{{ $promo->title }}" class="form-control" required>

                <label for="description">Deskripsi:</label>
                <textarea name="description" class="form-control" required>{{ $promo->description }}</textarea>

                <label for="promo_price">Harga Promo:</label>
                <input type="number" name="promo_price" value="{{ $promo->promo_price }}" class="form-control" required>

                <label for="image">Upload Gambar Baru (opsional):</label>
                <input type="file" name="image" class="form-control">
                @if ($promo->image)
                    <img src="{{ asset('assets/img/promo/' . $promo->image) }}" width="100" class="mt-2">
                @endif

                <hr>

                <div id="menu-wrapper">
                    @foreach($promo->menus as $index => $menu)
                        <div class="menu-group">
                            <label for="menu_id[]">Pilih Menu:</label>
                            <select name="menu_id[]" class="form-control" required>
                                <option value="">-- Pilih Menu --</option>
                                @foreach($menus as $m)
                                    <option value="{{ $m->id }}" {{ $menu->id == $m->id ? 'selected' : '' }}>
                                        {{ $m->name }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="quantity[]">Jumlah:</label>
                            <input type="number" name="quantity[]" value="{{ $menu->pivot->quantity }}" class="form-control"
                                required>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="add-menu-btn" class="btn btn-success mt-2">+ Tambah Menu</button>

                <br><br>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>

            <script>
                document.getElementById('add-menu-btn').addEventListener('click', function () {
                    const menuWrapper = document.getElementById('menu-wrapper');

                    // Buat elemen group baru
                    const menuGroup = document.createElement('div');
                    menuGroup.classList.add('menu-group');

                    menuGroup.innerHTML = `
                <label for="menu_id[]">Pilih Menu:</label>
                <select name="menu_id[]" class="form-control" required>
                    <option value="">-- Pilih Menu --</option>
                    @foreach($menus as $m)
                        <option value="{{ $m->id }}">{{ $m->name }}</option>
                    @endforeach
                </select>

                <label for="quantity[]">Jumlah:</label>
                <input type="number" name="quantity[]" class="form-control" required>
            `;

                    menuWrapper.appendChild(menuGroup);
                });
            </script>

        </div>
    </main>
    <!-- END MAIN -->
@endsection