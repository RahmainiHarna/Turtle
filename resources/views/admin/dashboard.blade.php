@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Welcome to Turtle’s<span>Admin Dashboard!</span></h1>
		</div>
	</div>
	<div class="order">
		<div class="container">
			<div class="dashboard">
				<div class="card">
					<div class="card-icon">
						<i class="fas fa-utensils"></i>
					</div>
					<div class="card-info">
						<h3>{{ $totalMenus }}</h3>
						<p>Total Menu</p>
					</div>
				</div>

				<div class="card">
					<div class="card-icon">
						<i class="fas fa-book"></i>
					</div>
					<div class="card-info">
						<h3>{{ $totalBookings }}</h3>
						<p>Total Booking</p>
					</div>
				</div>

				<div class="card">
					<div class="card-icon">
						<i class="fa-solid fa-envelope"></i>
					</div>
					<div class="card-info">
						<h3>{{ $totalMessages }}</h3>
						<p>Total Messages</p>
					</div>
				</div>

				<div class="card">
					<div class="card-icon">
						<i class="fa-solid fa-circle-dollar-to-slot"></i>
					</div>
					<div class="card-info">

						<h3>Rp{{ number_format($totalRevenue, 0, ',', '.') }}</h3>

						<p>Revenue</p>
					</div>
				</div>
			</div>

			<div class="charts-row">
				<!-- Menu Chart -->
				<div class="chart-box">
					<canvas id="menuChart" width="400" height="300"></canvas>
				</div>

				<!-- Booking Chart -->
				<div class="chart-box">
					<canvas id="bookingChart" width="400" height="200"></canvas>
				</div>
			</div>
		</div>

		<!-- Chart.js Library -->
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script>
		const menuCtx = document.getElementById('menuChart').getContext('2d');
		const menuChart = new Chart(menuCtx, {
			type: 'bar',
			data: {
			labels: {!! json_encode($labels) !!},
			datasets: [{
				label: 'Jumlah Menu per Tipe',
				data: {!! json_encode($values) !!},
				backgroundColor: [
				'#3B2F2F', // deep coffee
				'#5A5A5A', // stone grey
				'#8E5A38', // copper brown
				'#C89F6A', // warm gold
				],
				borderColor: [
				'#3B2F2F',
				'#5A5A5A',
				'#8E5A38',
				'#C89F6A',
				],
				borderWidth: 1
			}]
			},
			options: {
			responsive: true,
			maintainAspectRatio: false,
			plugins: {
				legend: {
				labels: {
					color: '#0c0b09',
					font: {
					family: 'Poppins',
					size: 13,
					weight: '500'
					}
				}
				},
				tooltip: {
				bodyColor: '#fff',
				titleColor: '#fff',
				bodyFont: {
					family: 'Poppins',
					size: 12
				},
				titleFont: {
					family: 'Poppins',
					size: 13,
					weight: '500'
				}
				}
			},
			scales: {
				y: {
				beginAtZero: true,
				ticks: {
					stepSize: 1,
					color: '#0c0b09',
					font: {
					family: 'Poppins',
					size: 12,
					weight: '500'
					}
				}
				},
				x: {
				ticks: {
					color: '#0c0b09',
					font: {
					family: 'Poppins',
					size: 12,
					weight: '500'
					}
				}
				}
			}
			}
		});

		const bookingCtx = document.getElementById('bookingChart').getContext('2d');
		const bookingChart = new Chart(bookingCtx, {
			type: 'pie',
			data: {
			labels: {!! json_encode($dates) !!},
			datasets: [{
				data: {!! json_encode($totals) !!},
				backgroundColor: [
				'#3B2F2F', // deep coffee
				'#5A5A5A', // stone grey
				'#8E5A38', // copper brown
				'#C89F6A', // warm gold
				'#2C2C2C'  // charcoal
				],
				borderColor: '#fff',
				borderWidth: 1.5
			}]
			},
			options: {
			responsive: true,
			maintainAspectRatio: false,
			plugins: {
				legend: {
				labels: {
					color: '#0c0b09',
					font: {
					family: 'Poppins',
					size: 13,
					weight: '500'
					}
				}
				},
				tooltip: {
				bodyColor: '#fff',
				titleColor: '#fff',
				bodyFont: {
					family: 'Poppins',
					size: 12,
				},
				titleFont: {
					family: 'Poppins',
					size: 13,
					weight: '500'
				}
				}
			}
			}
		});
		</script>
	</div>
</main>
<!-- END MAIN -->
@endsection