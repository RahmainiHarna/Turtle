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

        $data = $request->only(['name', 'email', 'phone', 'date', 'time', 'people', 'message']);

        session([
            'booking' => $data
        ]);

        return redirect('/cart')->with('booking_success', 'Your booking details have been saved. Please choose your menu.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 1;
        $booking->save();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }



}
