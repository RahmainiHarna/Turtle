<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Testimoni;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Booking;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalMenus = Cart::count();
        $totalBookings = Booking::count();
        $totalMessages = Message::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('subtotal');
        $menuCounts = Cart::selectRaw('type, COUNT(*) as total')
            ->groupBy('type')
            ->pluck('total', 'type');
        $bookings = DB::table('bookings')
            ->select(DB::raw('date, SUM(people) as total_people'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();


        $dates = $bookings->pluck('date');
        $totals = $bookings->pluck('total_people');
        $labels = $menuCounts->keys()->toArray();
        $values = $menuCounts->values()->toArray();
        $labels[] = 'Total Menu';
        $values[] = $totalMenus;

        return view('admin.admin', compact('menuCounts', 'dates', 'totals', 'totalMenus', 'totalBookings', 'totalRevenue', 'totalMessages','labels','values'));
    }
    public function Akun()
    {
        $users = User::all();
        return view('admin.akun', compact('users'));
    }
    public function MenuAdmin()
    {
        $menus = Cart::all();
        return view('admin.menu', compact('menus'));
    }



    public function TestimonialsAdmin()
    {
        $testimoni = Testimoni::all();
        return view('admin.testimonials', compact('testimoni'));
    }

    public function approve($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->status = 1;
        $testimoni->save();

        return redirect()->back()->with('success', 'Testimoni disetujui.');
    }
    public function Messages()
    {
        $message = message::all();
        return view('admin.messages', compact('message'));
    }

    public function orders()
    {
        $bookings = Booking::with('orders.menu')->latest()->get();
        return view('admin.orders', compact('bookings'));
    }

    public function showOrder($id)
    {
        $booking = Booking::with('orders.menu')->findOrFail($id);

        return view('admin.ordershow', compact('booking'));
    }
}