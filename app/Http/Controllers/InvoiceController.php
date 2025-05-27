<?php

namespace App\Http\Controllers;
use App\Models\Booking;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function showInvoice()
{
    $items = [
        ['name' => 'Ayam Betutu', 'qty' => 2, 'price' => 45000],
        ['name' => 'Nasi Goreng Kampung', 'qty' => 1, 'price' => 35000],
    ];

    $total = collect($items)->sum(fn($item) => $item['qty'] * $item['price']);

    $booking = Booking::find(1); // atau request ID

    return view('pages.invoice', compact('items', 'total', 'booking'));

}
}