@extends('layouts.admin')

@section('title', 'Detail Orders')

@section('content')
    <!-- MAIN -->
    <main>
        <div class="showmenu-order">
            <div class="head">
                <h3>Customer Information</h3>
                <a href="{{ route('orders') }}" class="btn-card-back"><i class='bx bx-left-arrow'></i> Back</a>
            </div>
            <h5>Reservation & Order Details</h5>
            <div class="order-detail-container">
                <div class="order-detail-column">
                    <div class="detail-item"><strong>Name :</strong> {{ $booking->name }}</div>
                    <div class="detail-item"><strong>Phone :</strong> {{ $booking->phone }}</div>
                    <div class="detail-item"><strong>Email :</strong> {{ $booking->email }}</div>
                    <div class="detail-item"><strong>Message :</strong> {{ $booking->message }}</div>
                </div>
                <div class="order-detail-column">
                    <div class="detail-item"><strong>Date reservation :</strong> {{ $booking->date }}</div>
                    <div class="detail-item"><strong>Time :</strong> {{ $booking->time }}</div>
                    <div class="detail-item"><strong>People :</strong> {{ $booking->people }}</div>

                    <div class="detail-item"><strong>Total price :</strong>
                        Rp{{ number_format($booking->orders->sum('subtotal'), 0, ',', '.') }}
                    </div>
                </div>
            </div>
            <h5 class="mt-4">Menu Orders</h5>
            <table id="invoice">
                <thead>
                    <tr>
                        <th class="text-center">Menu</th>
                        <th class="text-center">Total items</th>
                        <th class="text-center">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($booking->orders->whereNotNull('menu_id') as $order)
                        @php $total += $order->subtotal; @endphp
                        <tr>
                            <td class="text-left">{{ $order->menu->name }}</td>
                            <td class="text-center">{{ $order->quantity }}</td>
                            <td class="text-center">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            @if ($booking->orders->whereNotNull('promo_id')->count())
                <h5 class="mt-4">Promo Orders</h5>
                <table id="invoice">
                    <thead>
                        <tr>
                            <th class="text-center">Promo</th>
                            <th class="text-center">Total items</th>
                            <th class="text-center">Subtotal</th>
                            <th class="text-center">Isi Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking->orders->whereNotNull('promo_id') as $order)
                            @php $total += $order->subtotal; @endphp
                            <tr>
                                <td class="text-left">{{ $order->promo->title }}</td>
                                <td class="text-center">{{ $order->quantity }}</td>
                                <td class="text-center">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</td>
                                <td class="text-left">

                                    @foreach ($order->promo->menus as $menu)
                                        <li>{{ $menu->name }}</li>
                                    @endforeach

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </main>
    <!-- END MAIN -->
@endsection