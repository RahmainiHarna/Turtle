<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin'); // Pastikan view 'admin.blade.php' ada di folder resources/views
    }
    public function Akun()
    {
        $users = User::all();
        return view('admin.akun', compact ('users')); // Pastikan view 'admin.blade.php' ada di folder resources/views
    }
    public function MenuAdmin()
    {
        $menus = Cart::all();
        return view('admin.menu', compact ('menus')); // Pastikan view 'admin.blade.php' ada di folder resources/views
    }
    public function orders()
    {
        return view('admin.orders');
    }
    public function TestimonialsAdmin()
    {
        return view('admin.testimonials'); // Pastikan view 'admin.blade.php' ada di folder resources/views
    }

    public function Messages()
    {
        return view('admin.messages'); // Pastikan view 'admin.blade.php' ada di folder resources/views
    }

}