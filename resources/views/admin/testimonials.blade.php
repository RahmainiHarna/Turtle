@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<!-- MAIN -->
    <main>
        <div class="menu-header">
        <h1>Testimonials</h1>
          <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search by name or email..."
              onkeyup="searchTestimonials()">
            <i class='bx bx-search'></i>
          </div>
        </div>
        <table id="userTable">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">Message</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimoni as $Testimoni)
                    <tr>
                        <td class="text-center">{{ $Testimoni->id }}</td>
                        <td class="text-left">{{ $Testimoni->name }}</td>
                        <td class="text-left">{{ $Testimoni->email }}</td>
                        <td class="text-center">{{ $Testimoni->subject }}</td>
                        <td class="text-left">{{ $Testimoni->message }}</td>
                        <td class="text-center">
                            @if($Testimoni->status == 0)
                                <form action="{{ route('admin.testimoni.approve', $Testimoni->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn-danger">✔ Approve</button>
                                </form>
                            @else
                                <span class="badge bg-success">Approved</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
<!-- MAIN -->
@push('scripts')
<script>
    function searchTestimonials() {
        const input = document.getElementById("searchInput").value.toLowerCase();
        const rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            const name = row.cells[1].textContent.toLowerCase();
            const email = row.cells[2].textContent.toLowerCase();
            row.style.display = (name.includes(input) || email.includes(input)) ? "" : "none";
        });
    }
</script>
@endpush
@endsection