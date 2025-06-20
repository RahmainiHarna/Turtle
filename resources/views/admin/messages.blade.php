@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<!-- MAIN -->
    <main>
        <div class="menu-header">
        <h1>Messages</h1>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search by name or email..."
                onkeyup="searchMessages()">
                <i class='bx bx-search'></i>
            </div>
        </div>
        <table id="userTable">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Message</th>
                    <th class="text-left">Waktu</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($message as $pesan)
                    <tr>
                        <td class="text-center">{{ $pesan->id }}</td>
                        <td class="text-left">{{ $pesan->name }}</td>
                        <td class="text-left">{{ $pesan->email }}</td>
                        <td class="text-left">{{ $pesan->message }}</td>
                        <td class="text-left">{{ $pesan->created_at }}</td>
                        <td class="text-center">
                            @if ($pesan->status == 0)
                                <form action="{{ route('message.update', $pesan->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn-check">
                                        <i class='bx bx-check'></i>
                                    </button>
                                </form>
                            @else
                                <span class="badge-success"><i class='bx bx-check-double'></i> Dibaca</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
<!-- END MAIN -->

@push('scripts')
<script>
    function searchMessages() {
        const input = document.getElementById("searchInput").value.toLowerCase();
        const rows = document.querySelectorAll("tbody tr");
        rows.forEach(row => {
            const name = row.cells[1].textContent.toLowerCase();
            const email = row.cells[2].textContent.toLowerCase();
            const message = row.cells[3].textContent.toLowerCase();
            row.style.display = (name.includes(input) || email.includes(input) || message.includes(input)) ? "" : "none";
        });
    }
</script>
@endpush
@endsection