<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Promo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = Promo::with('menus')->get();
        return view('admin.promo', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.addPromo', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'menu_id' => 'required|array',
            'quantity' => 'required|array',
            'promo_price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $slug = Str::slug($request->title); // "Promo Makan Kenyang" → "promo-makan-kenyang"
        $extension = $request->image->getClientOriginalExtension();
        $imageName = $slug . '.' . $extension;
        $request->image->move(public_path('assets/img/promo'), $imageName);

        // Simpan promo
        $promo = Promo::create([
            'title' => $request->title,
            'description' => $request->description,
            'promo_price' => $request->promo_price,
            'image' => $imageName,
        ]);

        // Simpan relasi menu dan jumlah ke pivot menu_promo
        foreach ($request->menu_id as $index => $menuId) {
            $promo->menus()->attach($menuId, [
                'quantity' => $request->quantity[$index],
            ]);
        }

        return redirect()->back()->with('success', 'Promo berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promo = Promo::findOrFail($id);
        $menus = Menu::all();
        return view('admin.editPromo', compact('promo', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $id)
    {
        $promo = Promo::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'menu_id' => 'required|array',
            'quantity' => 'required|array',
            'promo_price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $promo->title = $request->title;
        $promo->promo_price = $request->promo_price;
        $promo->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $oldPath = public_path('assets/img/promo/' . $promo->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $slug = Str::slug($request->title, '-');
            $ext = $file->getClientOriginalExtension();
            $filename = $slug . '.' . $ext;

            $destination = public_path('assets/img/promo/');
            $file->move($destination, $filename);

            $promo->image = $filename;
        }

        $promo->save();
        $promo->menus()->detach();

        // Simpan ulang pivot menu_promo
        foreach ($request->menu_id as $i => $menuId) {
            $promo->menus()->attach($menuId, [
                'quantity' => $request->quantity[$i]
            ]);
        }

        return redirect()->route('promoAdmin')->with('success', 'Promo berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promo = promo::findOrFail($id);

        if ($promo->gambar && file_exists(public_path($promo->gambar))) {
            unlink(public_path('assets/img/promo/' . $promo->image));
        }

        $promo->delete();

        return redirect()->back()->with('success', 'promo berhasil dihapus.');
    }

    public function showPromotions()
    {
        $promos = Promo::with('menus')->get(); // ambil semua promo dan menu yang terkait
        return view('pages.promotions', compact('promos'));
    }

}
