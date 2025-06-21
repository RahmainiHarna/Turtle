@extends('layouts.admin')

@section('title', 'Menu')

@section('content')
<!-- MAIN -->
<main>
    <div class="menu-header">
        <h1>Menu<span>List</span></h1>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Find menu or category..."
                onkeyup="searchMenu()">
            <i class='bx bx-search'></i>
        </div>
        <a href="{{ route('admin.createmenu') }}" class="btn-card-add">
            <i class='bx bx-plus'></i> Add Menu
        </a>
    </div>
    <table id="userTable">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Menu</th>
                <th class="text-left">Category</th>
                <th class="text-center">Price</th>
                <th class="text-center">Image</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td class="text-center">{{ $menu->id }}</td>
                    <td class="text-left">{{ $menu->name }}</td>
                    <td class="text-left">{{ $menu->type }}</td>
                    <td class="text-center">Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                    <td class="text-center"><img src="{{ asset('assets/img/menu/' . $menu->image) }}" alt="{{ $menu->name }}"
                            class="menu-image"></td>
                    <td class="text-center">
                        <div class="crud-buttons">
                            <a href="{{ route('menu.edit', $menu->id) }}" class="crud-btn edit">
                                <i class='bx bxs-edit'></i>Edit
                            </a>
                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST"
                                class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="crud-btn delete"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class='bx bxs-trash'></i>Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <div class="pagination-container" >{{ $menus->links('') }}</div>  -->
</main>
<!-- MAIN -->

@push('scripts')
<script>
    function searchMenu() {
        const input = document.getElementById("searchInput").value.toLowerCase();
        const rows = document.querySelectorAll("#userTable tbody tr");

        rows.forEach(row => {
            const name = row.cells[1].textContent.toLowerCase();
            const type = row.cells[2].textContent.toLowerCase();
            const price = row.cells[3].textContent.toLowerCase();

            if (name.includes(input) || type.includes(input) || price.includes(input)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>
@endpush
@endsection