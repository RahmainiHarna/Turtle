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

    public function create()
    {
        return view('admin.createmenu');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'type' => 'required|in:makanan,minuman,snack',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = 'menu_' . time() . '.' . $image->getClientOriginalExtension();

            $category = $request->type;
            $destinationPath = public_path('assets/menu/' . $category);

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Pindahkan file (tanpa if)
            $image->move($destinationPath, $fileName);

            // Simpan path relatif
            $imagePath = 'assets/menu/' . $category . '/' . $fileName;
            \Log::info('Gambar yang disimpan: ' . $imagePath);
        } else {
            \Log::warning('Tidak ada file yang diupload!');
        }
        \Log::info('Path yang akan disimpan di DB: ' . $imagePath);
        // Simpan data
        Cart::create([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan.');
    }
}