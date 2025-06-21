@extends('layouts.admin')

@section('title', 'User Accounts')

@section('content')
<!-- MAIN -->
  <main>
      <div class="menu-header">
      <h1>User<span>Accounts</span></h1>
          <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search by username or email..."
              onkeyup="searchTable()">
            <i class='bx bx-search'></i>
          </div>
      </div>
      <table id="userTable">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Username</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone number</th>
            <th class="text-center">Date & Time</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td class="text-center">{{ $user->id }}</td>
            <td class="text-left">{{ $user->username }}</td>
            <td class="text-left">{{ $user->email }}</td>
            <td class="text-center">{{ $user->no_hp }}</td>
            <td class="text-center">{{ $user->created_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </main>
<!-- END MAIN -->

@push('scripts')
  <script>
    // Filter pencarian
    document.getElementById('searchInput').addEventListener('keyup', function () {
      const value = this.value.toLowerCase();
      const rows = document.querySelectorAll('#userTable tbody tr');

      rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(value) ? '' : 'none';
      });
    });
  </script>
@endpush
@endsection