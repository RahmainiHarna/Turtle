<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Booking;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        if (!session()->has('booking')) {
            return redirect('/booking')->with('error', 'Isi form booking terlebih dahulu.');
        }

        $menus = Cart::all();
        $cart = session('cart', []);
        return view('cart', compact('menus', 'cart'));
    }

    // Tambah item ke cart
    public function addToCart($menuId)
    {
        $cart = session('cart', []);
        $cart[$menuId] = ($cart[$menuId] ?? 0) + 1;
        session(['cart' => $cart]);
        return back();
    }

    // Kurangi item dari cart
    public function removeFromCart($menuId)
    {
        $cart = session('cart', []);
        if (isset($cart[$menuId])) {
            $cart[$menuId]--;
            if ($cart[$menuId] <= 0) {
                unset($cart[$menuId]);
            }
        }
        session(['cart' => $cart]);
        return back();
    }

    // Tampilkan halaman invoice
    public function invoice()
    {
        $booking = session('booking');
        $cart = session('cart', []);

        // if (!$booking) {
        //     return redirect()->route('booking.form')->with('error', 'Silakan booking dulu.');
        // }

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Keranjang masih kosong.');
        }

        $menuIds = array_keys($cart);
        $menus = Cart::whereIn('id', $menuIds)->get();

        return view('invoice', compact('booking', 'cart', 'menus'));
    }

    // Proses konfirmasi pemesanan
    public function confirm()
    {
        $booking = session('booking');
        $cart = session('cart',[]);

        if (!$booking || !$cart) {
            return redirect('/')->with('error', 'Data belum lengkap.');
        }

        $newBooking = Booking::create($booking);
       
        foreach ($cart as $menuId => $qty) {
            $menu = Cart::find($menuId);

            Order::create([
                'booking_id' => $newBooking->id,
                'menu_id' => $menuId,
                'qty' => $qty,
                'subtotal' => $menu->price * $qty,
            ]);
        }

        session()->forget(['booking', 'cart']);

        return redirect('/')->with('success', 'Booking berhasil! Terima kasih 😊');
    }
}
