@extends('layouts.admin')

@section('title', 'Galery')

@section('content')
<!-- MAIN -->
<main>
    <div class="menu-header">
        <h1><span>Gallery</span></h1>
    </div>
    <table id="userTable">
        <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Image</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($galery as $image)
                <tr>
                    <td class="text-center">{{ $image->name }}</td>
                    <td class="text-center"><img src="{{ asset('assets/img/gallery/' . $image->image) }}" alt="{{ $image->name }}"
                            class="menu-image"></td>
                    <td class="text-center">
                        <div class="crud-buttons">
                            <a href="{{ route('galery.edit', $image->id) }}" class="crud-btn edit">
                                <i class='bx bxs-edit'></i>Edit
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
<!-- MAIN -->

@endsection