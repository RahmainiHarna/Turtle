<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Testimoni;   
use App\Models\Cart;
use App\Models\message;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin'); //dashboard
    }
    public function Akun()
    {
        $users = User::all();
        return view('admin.akun', compact ('users')); 
    }
    public function MenuAdmin()
    {
        $menus = Cart::all();
        return view('admin.menu', compact ('menus')); 
    }
    public function orders()
    {
        return view('admin.orders');
    }
    public function TestimonialsAdmin()
    {
          $testimoni = Testimoni::all();
        return view('admin.testimonials', compact('testimoni')); 
    }

    public function Messages()
    {
        $message = message::all();
        return view('admin.messages', compact('message'));
    }
}