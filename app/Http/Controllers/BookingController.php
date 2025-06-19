<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // untuk menyimpan data booking yang baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:1,13',
            'date' => 'required|date',
            'time' => 'required',
            'people' => 'required|integer|min:1',
        ]);

        $bookingCount = Booking::where('date', $request->date)
            ->where('time', $request->time)
            ->sum('people');

        if ($bookingCount + $request->people > 5) {
            return back()->with('error', 'Kuota penuh pada waktu tersebut.');
        }

        $data = $request->only(['name', 'email', 'phone', 'date', 'time', 'people', 'message']);

        session([
            'booking' => $data
        ]);

        return redirect('/cart')->with('booking_success', 'Your booking details have been saved. Please choose your menu.');
    }

    // untuk menghapud data booking di halaman admin, tetapi tidak didatabase 
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 1;
        $booking->save();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    public function getFullyBookedDates()
    {
        $times = ['11:00:00', '13:15:00', '15:30:00', '17:45:00', '20:00:00'];

        $bookings = DB::table('bookings')
            ->select(DB::raw('date'), DB::raw('TIME_FORMAT(time, "%H:%i:%s") as time'), DB::raw('SUM(COALESCE(people, 0)) as total'))
            ->where('status', 0)
            ->whereIn(DB::raw('TIME_FORMAT(time, "%H:%i:%s")'), $times)
            ->groupBy('date', DB::raw('TIME_FORMAT(time, "%H:%i:%s")'))
            ->get()
            ->groupBy('date');


        $dates = [];

        foreach ($bookings as $date => $perDate) {
            $fullCount = 0;
            foreach ($times as $time) {
                $booking = $perDate->firstWhere('time', $time);
                if ($booking && $booking->total >= 5) {
                    $fullCount++;
                }
            }
            if ($fullCount === count($times)) {
                $dates[] = date('Y-m-d', strtotime($date));
            }
        }

        return response()->json($dates); // return array of 'YYYY-MM-DD'
    }

    public function checkAvailability(Request $request)
    {
        $date = $request->date;

        // Data waktu tetap
        $availableTimes = ['11:00:00', '13:15:00', '15:30:00', '17:45:00', '20:00:00'];

        // Ambil jumlah orang per jam di tanggal itu
        $bookings = DB::table('bookings')
            ->select('time', DB::raw('SUM(people) as total_people'))
            ->where('date', $date)
            ->where('status', 0)
            ->whereIn('time', $availableTimes)
            ->groupBy('time')
            ->get();

        $disabled = [];

        foreach ($bookings as $b) {
            if ($b->total_people >= 5) {
                $disabled[] = $b->time;
            }
        }

        return response()->json($disabled);
    }




}
