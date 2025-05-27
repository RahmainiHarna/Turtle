<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoleController extends Controller
{
     public function redirectUser()
    {
        $user = Auth::user();

        if ($user->level == 1) {
            return redirect()->route('admin');
        } else {
            return redirect('/');
        }
    }
}
