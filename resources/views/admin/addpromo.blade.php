@extends('layouts.admin')

@section('title', 'add promo')

@section('content')
    <main>
        <div class="createmenu-header">
            <h1>Create<span>Promo</span></h1>
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
            <div class="form-grid">
                <div class="form-column">
                    <form action="{{ route('promo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="promo_price">Promo </label>
                        <input type="text" name="title" id="title" class="form-control" required>
                        <label for="promo_price">Harga Promo</label>
                        <input type="number" name="promo_price" class="form-control" required>
                        <label for="description"> Description</label>
                        <textarea type="text" name="description" id="description" class="form-control" required></textarea>
                </div>
                <div class="form-column">
                    <div id="menu-wrapper">
                        <div class="menu-group">
                            <label for="menu[]">Choose Menu</label>
                            <select name="menu_id[]" class="form-control" required>
                                <option value="">-- Menu --</option>
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>

                            <label for="quantity[]">Quantity </label>
                            <input type="number" name="quantity[]" class="form-control" min="1" required>
                        </div>
                    </div>
                    <button type="button" id="add-menu-btn" class="btn btn-sm btn-success mt-2">+ Add Menu</button>

                    <br><br>
                    <label for="image">Upload Image:</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save Promo</button>
            </form>
            <script>
                document.getElementById('add-menu-btn').addEventListener('click', function () {
                    const menuGroup = document.querySelector('.menu-group');
                    const clone = menuGroup.cloneNode(true); // clone elemen pertama
                    const select = clone.querySelector('select');
                    const input = clone.querySelector('input[type="number"]');

                    if (select) select.selectedIndex = 0; // reset dropdown
                    if (input) input.value = ''; // kosongkan jumlah
                    document.getElementById('menu-wrapper').appendChild(clone);
                });
            </script>


    </main>
@endsection