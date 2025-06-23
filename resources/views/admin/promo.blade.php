@extends('layouts.admin')

@section('title', 'Promo')

@section('content')
@section('content')
    <main>
        <div class="menu-header">
            <h1>Promo<span>List</span></h1>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Find menu or category..." onkeyup="searchMenu()">
                <i class='bx bx-search'></i>
            </div>
            <a href="{{ route('promo.create') }}" class="btn-card-add">
                <i class='bx bx-plus'></i> Add Promo
            </a>
        </div>
        <table id="userTable">
            <thead>
                <tr>
                    <th class="text-center">Nama Promo</th>
                    <th class="text-center">Menu</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Harga Promo</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($promos as $promo)
                    <tr>
                        <td class="text-left">{{ $promo->title }}</td>
                        <td class="text-left">
                            
                                @foreach($promo->menus as $menu)
                                    <li>{{ $menu->name }}</li>
                                @endforeach
                            
                        </td>
                        <td class="text-center">
                            
                                @foreach($promo->menus as $menu)
                                    <li>{{ $menu->pivot->quantity }}</li>
                                @endforeach
                        
                        </td>
                        <td class="text-center">Rp{{ number_format($promo->promo_price, 0, ',', '.') }}</td>
                        <td class="text-center"><img src="{{ asset('assets/img/promo/' . $promo->image) }}"
                                alt="{{ $promo->name }}" class="menu-image"></td>
                        <td class="text-center">
                            <div class="crud-buttons">
                                <a href="{{ route('promo.edit', $promo->id) }}" class="crud-btn edit">
                                    <i class='bx bxs-edit'></i>Edit
                                </a>
                                <form action="{{ route('promo.destroy', $promo->id) }}" method="POST" class="inline-form">
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

    </main>

    @push('scripts')
<script>
    function searchMenu() {
        const input = document.getElementById("searchInput").value.toLowerCase();
        const rows = document.querySelectorAll("#userTable tbody tr");

        rows.forEach(row => {
            const title = row.cells[0].textContent.toLowerCase();
            const menu = row.cells[1].textContent.toLowerCase();
            const price = row.cells[3].textContent.toLowerCase();

            if (title.includes(input) || menu.includes(input) || price.includes(input)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>
@endpush
@endsection