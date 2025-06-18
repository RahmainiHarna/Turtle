<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function menu()
    {
        return view('pages.menu');
    }

    public function home()
    {
        $testimoni = Testimoni::where('status', 1)->get(); 
        return view('pages.home', compact('testimoni'));
    }


    public function booking()
    {
        return view('pages.book-a-table');
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
