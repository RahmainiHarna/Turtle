<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\menu;
use App\Models\Promo;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function menu()
    {
        $menus = menu::all();
        return view('pages.menu', compact('menus'));
    }

    public function home()
    {
        $promos = Promo::with('menus')->get();
        $testimoni = Testimoni::where('status', 1)->get();
        return view('pages.home', compact('testimoni', 'promos'));
    }


    public function booking()
    {
        $user = auth()->user();
        return view('pages.book-a-table', compact('user'));
    }

    public function testimoni()
    {
        return view('pages.testimonials');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.order')->with('success', 'Pesanan berhasil dihapus.');
    }

}
