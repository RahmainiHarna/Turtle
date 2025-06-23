<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Promo;

class InvoiceController extends Controller
{

    public function index()
    {
        $items = [
            ['name' => 'Ayam Betutu', 'qty' => 2, 'price' => 45000],
            ['name' => 'Nasi Goreng Kampung', 'qty' => 1, 'price' => 35000],
        ];
        $promos = Promo::with('menus')->whereIn('id', array_keys($cart['promos'] ?? []))->get();
        $total = collect($items)->sum(fn($item) => $item['qty'] * $item['price']);
        $booking = Booking::find(1);
        return view('pages.invoice', compact('items', 'total', 'booking'));
    }
    public function showFromSession()
    {
        $booking = session('booking');
        $cart = session()->get('cart', []);

        if (!$booking || empty($cart)) {
            abort(400, 'Data booking/cart tidak ditemukan di session.');
        }

        $menus = [];
        $promos = [];
        $total = 0;

        if (isset($cart['menus']) && is_array($cart['menus'])) {
            $menuIds = array_keys($cart['menus']);
            $menus = Menu::whereIn('id', array_keys($cart['menus'] ?? []))->get()->map(function ($menu) use ($cart) {
                $menuId = $menu->id;

                if (isset($cart['menus'][$menuId])) {
                    $menu->qty = $cart['menus'][$menuId]['qty'];
                    $menu->subtotal = $menu->qty * $menu->price;
                } else {
                    $menu->qty = 0;
                    $menu->subtotal = 0;
                }

                return $menu;
            });
            $total += collect($menus)->sum('subtotal');
        }



        if (isset($cart['promos'])) {
            $promoIds = array_keys($cart['promos']);

            $promoList = Promo::with('menus')->whereIn('id', $promoIds)->get();

            foreach ($promoList as $promo) {
                $promoId = (int) $promo->id; // 🔥 penting!
                $data = $cart['promos'][$promoId];

                $promo->qty = $data['qty'] ?? 0;
                $promo->price = $data['price'] ?? $promo->promo_price;
                $promo->subtotal = $promo->qty * $promo->price;

                $promos[] = $promo;
            }
            $total += collect($promos)->sum('subtotal');
        }


        $deposit = $total * 0.10;


        return view('pages.invoice', compact('booking', 'menus', 'promos', 'total', 'deposit'));
    }


    public function confirm(Request $request)
    {
        $bookingData = session('booking');
        $cart = session('cart', []);

        if (!$bookingData || empty($cart)) {
            return redirect('/')->with('error', 'Data tidak ditemukan.');
        }

        $booking = Booking::create($bookingData);

        if (isset($cart['menus'])) {
            foreach ($cart['menus'] as $menuId => $item) {
                $menu = Menu::find($menuId);
                if ($menu) {
                    Order::create([
                        'booking_id' => $booking->id,
                        'menu_id' => $menu->id,
                        'promo_id' => null,
                        'quantity' => $item['qty'],
                        'price' => $menu->price,
                        'subtotal' => $menu->price * $item['qty'],
                    ]);
                }
            }
        }

        // ✅ Simpan ORDER untuk PROMO
        if (isset($cart['promos'])) {
            foreach ($cart['promos'] as $promoId => $item) {
                $promo = Promo::find($promoId);
                if ($promo) {
                    Order::create([
                        'booking_id' => $booking->id,
                        'menu_id' => null, // karena ini promo
                        'promo_id' => $promo->id,
                        'quantity' => $item['qty'],
                        'price' => $promo->promo_price,
                        'subtotal' => $promo->promo_price * $item['qty'],
                    ]);
                }
            }
        }

        // ✅ Hapus session
        session()->forget(['booking', 'cart']);

        return redirect('/')->with('success', 'Booking dan pesanan berhasil dikonfirmasi!');
    }


}


