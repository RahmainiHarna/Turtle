@extends('layouts.admin')

@section('title', 'Edit Menu')

@section('content')
<!-- MAIN -->
<main>
    <div class="createmenu-header">
        <h1>Edit<span>Menu</span></h1>
        <a href="{{ route('menuAdmin') }}" class="btn-card-back">
            <i class='bx bx-left-arrow'></i> Back
        </a>
    </div>
    <div class="createmenu-order">
        <div class="head">
            <h3>Menu Details</h3>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{  route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-grid">
            <div class="form-column">
                <label for="name">Menu</label>
                <input type="text" name="name" id="name" value="{{ $menu->name }}" class="form-control" required>

                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{ $menu->price }}" class="form-control"
                    required>
                    <label for="type">Category</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="">-- Choose Category --</option>
                        <option value="makanan" {{ $menu->type == 'makanan' ? 'selected' : '' }}>Makanan</option>
                        <option value="minuman" {{ $menu->type == 'minuman' ? 'selected' : '' }}>Minuman</option>
                        <option value="snack" {{ $menu->type == 'snack' ? 'selected' : '' }}>Dessert</option>
                    </select>
            </div>     
            <div class="form-column">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($menu->image)
                    <img src="{{ asset('assets/img/menu/' . $menu->image) }}" width="100" class="mt-2"><br><br>
                @endif
                <button type="submit" class="btn btn-primary-edit">Save Menu</button>
            </div>
            </div>
        </form>
    </div>
</main>
<!-- END MAIN -->
@endsection