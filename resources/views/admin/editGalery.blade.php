@extends('layouts.admin')

@section('title', 'Edit Galery')

@section('content')
    <!-- MAIN -->
    <main>
        <div class="createmenu-header">
            <h1>Edit<span>Gallery</span></h1>
            <a href="{{ route('galeryAdmin') }}" class="btn-card-back">
                <i class='bx bx-left-arrow'></i> Back
            </a>
        </div>
        <div class="createmenu-order">
            <div class="head">
                <h3>Galery</h3>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{  route('galery.update', $galery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-grid">
                    <div class="form-column">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" value="{{ $galery->name }}" class="form-control" readonly>
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if($galery->image)
                            <img src="{{ asset('assets/img/gallery/' . $galery->image) }}" width="100" class="mt-2"><br><br>
                        @endif
                        <button type="submit" class="btn btn-primary-edit">Save Menu</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!-- END MAIN -->
@endsection