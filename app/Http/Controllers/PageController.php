<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function menu()
    {
        return view('pages.menu');
    }

    public function booking()
    {
        return view('pages.book-a-table');
    }

    public function home()
    {
        $testimoni = Testimoni::where('status', 1)-> get();
        return view('pages.home', compact('testimoni'));
    }

    public function testimoni()
    {
        return view('pages.testimonials');
    }
}
