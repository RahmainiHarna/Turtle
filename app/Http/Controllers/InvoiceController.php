<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Order;

class InvoiceController extends Controller
{
    public function index()
    {
        $items = [
            ['name' => 'Ayam Betutu', 'qty' => 2, 'price' => 45000],
            ['name' => 'Nasi Goreng Kampung', 'qty' => 1, 'price' => 35000],
        ];

        $total = collect($items)->sum(fn($item) => $item['qty'] * $item['price']);
        $booking = Booking::find(1); // pastikan Booking model sudah di-import dan ada data dengan ID 1

        return view('pages.invoice', compact('items', 'total', 'booking'));
    }
    public function showFromSession()
    {
        $booking = session('booking');
        $cart = session('cart', []);

        if (!$booking || empty($cart)) {
            abort(400, 'Data booking/cart tidak ditemukan di session.');
        }

        $menus = [];
        $total = 0;

        foreach ($cart as $menu_id => $qty) {
            $menu = Cart::find($menu_id);
            $subtotal = $menu->price * $qty;
            $menus[] = [
                'name' => $menu->name,
                'price' => $menu->price,
                'quantity' => $qty,
                'subtotal' => $subtotal,
            ];
            $total += $subtotal;
        }

        $deposit = $total * 0.10;

        return view('pages.invoice', compact('booking', 'menus', 'total', 'deposit'));
    }

    public function confirm(Request $request)
    {
        $booking = session('booking');
        $cart = session('cart', []);

        if (!$booking|| empty($cart)) {
            return redirect('/')->with('error', 'Data tidak ditemukan.');
        }

        // Simpan booking
        $booking = Booking::create($booking);

        // Simpan pesanan (orders)
        foreach ($cart as $menu_id => $qty) {
            $menu = Cart::find($menu_id);
            $subtotal = $menu->price * $qty;

            Order::create([
                'booking_id' => $booking->id,
                'menu_id' => $menu_id,
                'quantity' => $qty,
                'price' => $menu->price,
                'subtotal' => $subtotal,
            ]);
        }

        // Hapus session
        session()->forget(['booking', 'cart']);

        return redirect('/')->with('success', 'Booking dan pesanan berhasil dikonfirmasi!');
    }

}


