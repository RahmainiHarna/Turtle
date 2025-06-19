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
    // menampilkan halaamn untuk menambah menu yang dipesan setelah user booking
    public function index()
    {
        if (!session()->has('booking')) {
            return redirect('/booking')->with('error', 'Isi form booking terlebih dahulu.');
        }

        $menus = Cart::all();
        $cart = session('cart', []);
        return view('cart', compact('menus', 'cart'));
    }

    // menambah menu ke keranjang
    public function addToCart($id)
    {
        $cart = session()->get('cart', []);
        $cart[$id] = isset($cart[$id]) ? $cart[$id] + 1 : 1;
        session(['cart' => $cart]);
        return back()->with('cart_success', 'Menu locked in.');
    }

    // Kurangi menu dari keranjang
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

    // memanpilakn halaman untuk menambahakan daftar menu oleh admin
    public function create()
    {
        return view('admin.createmenu');
    }

    // menyimpan data menu tambahan yang diinut oleh admin
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'type' => 'required|in:makanan,minuman,snack',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('image');

        $slug = Str::slug($request->name, '_');
        $ext = $file->getClientOriginalExtension(); // jpg/png
        $filename = $slug . '.' . $ext;

        $folder = 'assets/img/menu/' . $request->type;
        $destination = public_path($folder);

        $file->move($destination, $filename);

        $imagePath = $request->type . '/' . $filename;

        Cart::create([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan.');
    }

    // menampilkan halamnn untuk mengupdate/mengedit menu yang sudah ada oleh admin
    public function edit($id)
    {
        $menu = Cart::findOrFail($id);
        return view('admin.editMenu', compact('menu'));
    }

    // menyimpan data menu yang sudah diupdate oleh admin
    public function update(Request $request, $id)
    {
        $menu = Cart::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'type' => 'required|in:makanan,minuman,snack',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $menu->name = $request->name;
        $menu->type = $request->type;
        $menu->price = $request->price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $oldPath = public_path('assets/img/menu/' . $menu->type . '/' . $menu->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $file = $request->file('image');
            $slug = Str::slug($request->name, '_');
            $ext = $file->getClientOriginalExtension();
            $filename = $slug . '.' . $ext;

            $folder = 'assets/img/menu/' . $request->type;
            $destination = public_path($folder);

            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            if (file_exists($destination . '/' . $filename)) {
                $filename = $slug . '-' . '.' . $ext;
            }

            $file->move($destination, $filename);
            $menu->image = $request->type . '/' . $filename;
            ;
        }

        $menu->save();

        return redirect()->route('menuAdmin')->with('success', 'Menu berhasil diperbarui!');
    }

    // menghapus daftar menu
    public function destroy($id)
    {
        $menu = Cart::findOrFail($id);

        if ($menu->gambar && file_exists(public_path($menu->gambar))) {
            unlink(public_path('assets/img/menu/' . $menu->image));
        }

        $menu->delete();

        return redirect()->back()->with('success', 'Menu berhasil dihapus.');
    }

}