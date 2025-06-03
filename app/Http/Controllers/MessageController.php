<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\testimoni;

class MessageController extends Controller
{
    public function message(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function testimoni(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'nullable|string',
            'message' => 'required|string',
        ]);

        Testimoni::create($request->all());

        return redirect()->back()->with('success', 'Testimoni berhasil dikirim!');
    }
    public function update(Request $request, $id)
    {
        $pesan = message::findOrFail($id);
        $pesan->status = 1; // Tandai sebagai sudah dibaca
        $pesan->save();

        return redirect()->back()->with('success', 'Pesan sudah ditandai sebagai dibaca.');
    }
}
