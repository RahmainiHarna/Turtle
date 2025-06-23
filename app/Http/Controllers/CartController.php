<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Promo;
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
        $promos = Promo::with('menus')->get();
        $menus = Menu::all();
        $cart = session('cart', []);
        return view('cart', compact('menus', 'cart', 'promos'));
    }

    // menambah menu ke keranjang
    public function addToCart($id)
    {
         $menu = Menu::findOrFail($id);
    $cart = session()->get('cart', []);

    // Inisialisasi 'menus' jika belum ada
    if (!isset($cart['menus'])) {
        $cart['menus'] = [];
    }

    // Tambah quantity jika sudah ada
    if (isset($cart['menus'][$id])) {
        $cart['menus'][$id]['qty'] += 1;
    } else {
        // Tambah item baru
        $cart['menus'][$id] = [
            'id' => $menu->id,
            'name' => $menu->name,
            'qty' => 1,
            'price' => $menu->price,
            'type' => 'menu'
        ];
    }

    session()->put('cart', $cart);
    return back()->with('cart_success', 'Menu locked in.')->with('skip_preloader', true);
    }

    // Kurangi menu dari keranjang
    public function removeFromCart($id)
    {
      
    $cart = session()->get('cart', []);

    if (isset($cart['menus'][$id])) {
        $cart['menus'][$id]['qty'] -= 1;

        if ($cart['menus'][$id]['qty'] <= 0) {
            unset($cart['menus'][$id]);
        }
    }

    session()->put('cart', $cart);
    return back()->with('cart_success', 'Maybe next time.')->with('skip_preloader', true);
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
            'description' => 'required|text',
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

        Menu::create([
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
        $menu = Menu::findOrFail($id);
        return view('admin.editMenu', compact('menu'));
    }

    // menyimpan data menu yang sudah diupdate oleh admin
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'type' => 'required|in:makanan,minuman,snack',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string'
        ]);

        $menu->name = $request->name;
        $menu->type = $request->type;
        $menu->price = $request->price;
        $menu->description = $request->description;

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
        $menu = menu::findOrFail($id);

        if ($menu->gambar && file_exists(public_path($menu->gambar))) {
            unlink(public_path('assets/img/menu/' . $menu->image));
        }

        $menu->delete();

        return redirect()->back()->with('success', 'Menu berhasil dihapus.');
    }
    public function addPromo(Request $request, $id)
{
    $promo = Promo::findOrFail($id);
    $cart = session()->get('cart', ['menus' => [], 'promos' => []]);

    if(isset($cart['promos'][$id])) {
        $cart['promos'][$id]['qty'] += 1;
    } else {
        $cart['promos'][$id] = [
            'id' => $promo->id,
            'name' => $promo->title,
            'qty' => 1,
            'price' => $promo->promo_price,
            'type' => 'promo'
        ];
    }

    session()->put('cart', $cart);
    return back();
}


    public function removePromo($id)
    {
        $cart = session()->get('cart');

        if (isset($cart['promos'][$id])) {
            unset($cart['promos'][$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Promo dihapus dari keranjang!');
    }

}