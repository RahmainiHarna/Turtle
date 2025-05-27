<?php

namespace App\Http\Controllers;

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

    public function testimoni()
    {
        return view('pages.testimonials');
    }
}
