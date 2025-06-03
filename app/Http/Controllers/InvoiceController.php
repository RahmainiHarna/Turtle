<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class InvoiceController extends Controller
{
    public function index()
    {
        $items = [
            ['name' => 'Ayam Betutu', 'qty' => 2, 'price' => 45000],
            ['name' => 'Nasi Goreng Kampung', 'qty' => 1, 'price' => 35000],
        ];

        $total = collect($items)->sum(fn($item) => $item['qty'] * $item['price']);
        $booking = Booking::find(1); // pastikan Booking model sudah di-import dan ada data dengan ID 1

        return view('pages.invoice', compact('items', 'total', 'booking'));
    }
}


