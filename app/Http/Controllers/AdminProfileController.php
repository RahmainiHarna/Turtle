<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminProfileController extends Controller
{
    public function edit()
    {
        /** @var \App\Models\User $admin */
        $admin = Auth::user();

        // Tambahan keamanan: pastikan dia admin
        if ($admin->level != 1) {
            abort(403); // akses ditolak
        }

        return view('admin.profile', compact('admin'));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $admin */
        $admin = Auth::user();

        if ($admin->level != 1) {
            abort(403);
        }

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $admin->id,
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'no_hp' => 'required|string|max:13|unique:users,no_hp,' . $admin->id,
            'password' => 'nullable|string|min:6|confirmed',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->no_hp = $request->no_hp;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/profile'), $filename);
            $admin->photo = 'assets/img/profile/' . $filename;
        }

        $admin->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully!');
    }
}
