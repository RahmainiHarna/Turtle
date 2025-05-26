<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin'); // Pastikan view 'admin.blade.php' ada di folder resources/views
    }
}