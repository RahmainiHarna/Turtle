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
    public function addToCart($id)
    {
        $cart = session()->get('cart', []);
        $cart[$id] = isset($cart[$id]) ? $cart[$id] + 1 : 1;
        session(['cart' => $cart]);
        return back();
    }

    // Kurangi item dari cartpublic function removeFromCart($id)
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]--;
            if ($cart[$id] <= 0) {
                unset($cart[$id]);
            }
        }
        session(['cart' => $cart]);
        return back();
    }
}
