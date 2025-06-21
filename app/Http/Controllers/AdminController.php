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
    // menamilpan halaman dashbord
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

        return view('admin.dashboard', compact('menuCounts', 'dates', 'totals', 'totalMenus', 'totalBookings', 'totalRevenue', 'totalMessages', 'labels', 'values'));

    }
    // menampilkan halaman daftar akun
    public function Akun()
    {
        $users = User::all();
        return view('admin.akun', compact('users'));
    }

    // menampilkan halaman daftar menu pada halaman admin
    public function MenuAdmin()
    {
        $menus = Cart::paginate(10);

        return view('admin.menu', compact('menus'));
    }

    //menampilkan halaman daftar testimoni pada halaman admin
    public function TestimonialsAdmin()
    {
        $testimoni = Testimoni::all();
        return view('admin.testimonials', compact('testimoni'));
    }

    // untuk menyutujui testimoni, jika sudah distujui maka akan tampil dihalaman user
    public function approve($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->status = 1;
        $testimoni->save();

        return redirect()->back()->with('success', 'Testimoni disetujui.');
    }

    // menampilkan halaman daftar pesan
    public function Messages()
    {
        $message = message::all();
        return view('admin.messages', compact('message'));
    }

    // menampilkan daftar booking ( data diri )
    public function orders()
    {
        $bookings = Booking::with('orders.menu')->where('status', 0)->latest()->get();
        return view('admin.orders', compact('bookings'));
    }

    // menamiplakn detail dari setiap booking seperti data diri, menu yang dipesan, dan detail order
    public function showOrder($id)
    {
        $booking = Booking::with('orders.menu')->findOrFail($id);

        return view('admin.orderShow', compact('booking'));
    }



}