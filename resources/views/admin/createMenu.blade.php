@extends('layouts.admin')

@section('title', 'Create Menu')

@section('content')
<!-- MAIN -->
<main>
    <div class="createmenu-header">
        <h1>Create<span>Menu</span></h1>
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

        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
            <div class="form-column">
                <label for="name">Menu</label>
                <input type="text" name="name" id="name" class="form-control" required>

                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="form-column">
                <label for="type">Category</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="">-- Choose Category --</option>
                    <option value="makanan">Food</option>
                    <option value="minuman">Drinks</option>
                    <option value="snack">Snack</option>
                </select>

                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Menu</button>
        </form>
    </div>
</main>
<!-- END MAIN -->
@endsection