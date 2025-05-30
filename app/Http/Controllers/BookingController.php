<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;

class BookingController extends Controller
{
    // BookingController.php
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'people' => 'required|integer|min:1',
        ]);

        $bookingCount = Booking::where('date', $request->date)
            ->where('time', $request->time)
            ->sum('people');

        if ($bookingCount + $request->people > 150) {
            return back()->with('error', 'Kuota penuh pada waktu tersebut.');
        }

        session([
            'booking' => $request->only(['name', 'email', 'phone', 'date', 'time', 'people', 'message']),
        ]);

        return redirect('/cart');
    }

   
}
