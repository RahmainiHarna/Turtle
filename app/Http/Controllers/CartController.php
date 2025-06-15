<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Booking;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


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
        return back()->with('cart_success', 'Menu locked in.');
    }

    // Kurangi item dari cart
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
        return back()->with('cart_success', 'Maybe next time.');
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

        $file = $request->file('image');

        $slug = Str::slug($request->name,'_'); 
        $ext = $file->getClientOriginalExtension(); // jpg/png
        $filename = $slug . '.' . $ext;

         $folder = 'assets/img/menu/' . $request->type;
        $destination = public_path($folder);

    
        if (file_exists($destination . '/' . $filename)) {
            $filename = $slug . '-' . time() . '.' . $ext;
        }

        // Pindahkan file
        $file->move($destination, $filename);

        $imagePath = $filename;

       

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