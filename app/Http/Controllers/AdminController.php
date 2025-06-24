<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Testimoni;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Booking;
use App\Models\message;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    // menamilpan halaman dashbord
    public function index()
    {
        $totalMenus = Menu::count();
        $totalBookings = Booking::count();
        $totalMessages = Message::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('subtotal');

        $slotWaktu = [
            '11:00:00',
            '13:15:00',
            '15:30:00',
            '17:45:00',
            '20:00:00',
        ];


        $menuCounts = Menu::selectRaw('type, COUNT(*) as total')
            ->groupBy('type')
            ->pluck('total', 'type');
        $bookings = DB::table('bookings')
            ->select('date', 'time', DB::raw('SUM(people) as total_people'))
            // ->whereIn('time', $slotWaktu)
            ->groupBy('date', 'time')
            ->orderBy('date')
            ->orderBy('time')
            ->get();
        $bookingLabels = [];
        $bookedValues = [];
        $emptyValues = [];

        foreach ($bookings as $row) {
            $label = $row->date . ' ' . substr($row->time, 0, 5); // contoh: "2025-06-22 13:15"
            $bookingLabels[] = $label;
            $bookedValues[] = (int) $row->total_people;
            $emptyValues[] = max(0, 5 - (int) $row->total_people);
        }
        $dates = $bookings->pluck('date');
        $totals = $bookings->pluck('total_people');
        $labels = $menuCounts->keys()->toArray();
        $values = $menuCounts->values()->toArray();
        $labels[] = 'Total Menu';
        $values[] = $totalMenus;
        $availableDates = Booking::select('date')->distinct()->pluck('date');



        return view('admin.dashboard', compact(
            'menuCounts',
            'dates',
            'totals',
            'totalMenus',
            'totalBookings',
            'totalRevenue',
            'totalMessages',
            'labels',
            'values',
            'bookingLabels',
            'bookedValues',
            'emptyValues',
            'availableDates'
        ));

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

        $menus = Menu::all();

        return view('admin.menu', compact('menus'));
    }
    public function GaleryAdmin()
    {

        $galery = Galery::all();

        return view('admin.galery', compact('galery'));
    }

    public function editGalery(string $id)
    {
        $galery = Galery::findOrFail($id);
        return view('admin.editGalery', compact('galery'));
    }
    public function updateGalery(Request $request, string $id)
    {
        $galery = Galery::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $galery->name = $request->name;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Hapus gambar lama
            $oldPath = public_path('assets/img/gallery/' . $galery->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Simpan gambar baru
            $slug = Str::slug($request->name, '-');
            $ext = $file->getClientOriginalExtension();
            $filename = $slug . '.' . $ext;

            $destination = public_path('assets/img/gallery/');
            $file->move($destination, $filename);

            $galery->image = $filename;
        }

        $galery->save();

        return redirect()->route('galeryAdmin')->with('success', 'Galeri berhasil diperbarui!');
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
    public function toggleStatus($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->status = $testimoni->status == 0 ? 1 : 0;
        $testimoni->save();

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }

    public function destroyTestimoni($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
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
        $bookings = Booking::with('orders.menu')->latest()->get();
        return view('admin.orders', compact('bookings'));
    }


    // menamiplakn detail dari setiap booking seperti data diri, menu yang dipesan, dan detail order
    public function showOrder($id)
    {
        $booking = Booking::with('orders.menu')->findOrFail($id);

        return view('admin.orderShow', compact('booking'));
    }

    public function dashboardChartData()
    {
        $slots = [
            '11:00:00',
            '13:15:00',
            '15:30:00',
            '17:45:00',
            '20:00:00'
        ];

        $results = DB::table('bookings')
            ->select(
                'date',
                'time',
                DB::raw('SUM(people) as total_people')
            )
            ->whereIn('time', $slots)
            ->groupBy('date', 'time')
            ->orderBy('date')
            ->orderBy('time')
            ->get();

        // Format data untuk chart.js
        $formatted = [];
        foreach ($results as $row) {
            $key = $row->date . ' ' . $row->time;
            $formatted[] = [
                'label' => $key,
                'booked' => (int) $row->total_people,
                'empty' => max(0, 5 - (int) $row->total_people),
            ];
        }

        return response()->json($formatted);
    }

    public function filterBookings(Request $request)
    {
        $slotWaktu = ['11:00:00', '13:15:00', '15:30:00', '17:45:00', '20:00:00'];
        $selectedDate = $request->input('date');

        $data = DB::table('bookings')
            ->select('time', DB::raw('SUM(people) as total_people'))
            ->where('date', $selectedDate)
            ->where(function ($query) use ($slotWaktu) {
                foreach ($slotWaktu as $slot) {
                    $query->orWhere('time', 'like', $slot . '%');
                }
            })
            ->groupBy('time')
            ->orderBy('time')
            ->get();

        $labels = [];
        $booked = [];
        $empty = [];

        foreach ($slotWaktu as $time) {
            $match = $data->firstWhere('time', $time);
            $labels[] = substr($time, 0, 5); // Tampilkan hanya "11:00"
            $booked[] = $match ? (int) $match->total_people : 0;
            $empty[] = max(0, 5 - ($match ? (int) $match->total_people : 0));
        }

        return response()->json([
            'labels' => $labels,
            'booked' => $booked,
            'empty' => $empty,
        ]);

    }


}