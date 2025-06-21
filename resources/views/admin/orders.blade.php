@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<!-- MAIN -->
	<main>
		<div class="menu-header">
			<h1>Recent<span>Orders</span></h1>
					<div class="search-container">
						<input type="text" id="searchInput" placeholder="Search by name, email, or phone number..."
							onkeyup="searchTable()">
						<i class='bx bx-search'></i>
					</div>
		</div>
		<table id="userTable">
			<thead>
				<tr>
					<th class="text-center">Name</th>
					<th class="text-center">Date</th>
					<th class="text-center">Time</th>
					<th class="text-center">People</th>
					<th class="text-center">Contact</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($bookings as $data_diri)
					<tr>
						<td class="text-left">{{ $data_diri->name }}</td>
						<td class="text-center">{{ $data_diri->date }}</td>
						<td class="text-center">{{ $data_diri->time }}</td>
						<td class="text-center">{{ $data_diri->people }}</td>
						<td class="text-left">{{ $data_diri->phone }} / {{ $data_diri->email }}</td>
						<td class="text-center">
							<div class="action-buttons">
								<form action="{{ route('admin.ordershow', $data_diri->id) }}" method="GET">
									<button type="submit" class="crud-btn more">
										<i class='bx bx-show'></i>More
									</button>
								</form>

								<form action="{{ route('admin.orderdelete', $data_diri->id) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" class="crud-btn delete"
											onclick="return confirm('Yakin ingin menghapus?')">
										<i class='bx bxs-trash'></i>Delete
									</button>
								</form>
								</div>
						</td>

						</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</main>
<!-- END MAIN -->

@push('scripts')
	<script>
		function searchTable() {
			const input = document.getElementById("searchInput").value.toLowerCase();
			const rows = document.querySelectorAll("#userTable tbody tr");

			rows.forEach(row => {
				const name = row.cells[0].textContent.toLowerCase();
				const contact = row.cells[4].textContent.toLowerCase();

				if (name.includes(input) || contact.includes(input)) {
					row.style.display = "";
				} else {
					row.style.display = "none";
				}
			});
		}
	</script>
@endpush
@endsection