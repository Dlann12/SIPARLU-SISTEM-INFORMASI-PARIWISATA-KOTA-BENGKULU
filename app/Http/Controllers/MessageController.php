<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Method untuk menyimpan pesan
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Simpan pesan ke database
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Redirect ke halaman kontak dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim.');
    }

    // Method untuk menampilkan pesan di halaman admin
    public function index()
    {
        // Ambil semua pesan dari database
        $messages = Message::all();

        // Tampilkan halaman admin dengan pesan-pesan tersebut
        return view('admin.dashboard', compact('messages'));
    }
    public function getMessages()
    {
        // Mengambil 5 pesan terbaru
        $messages = Message::latest()->take(5)->get();

        // Mengembalikan pesan dalam format JSON
        return response()->json($messages);
    }
    public function deleteMessage($email)
    {
        // Cari pesan berdasarkan email
        $message = Message::where('email', $email)->first();
    
        // Pastikan pesan ditemukan sebelum menghapusnya
        if ($message) {
            $message->delete(); // Hapus pesan dari database
        }
    
        // Redirect kembali ke halaman pesan dengan notifikasi sukses
        return redirect()->route('admin.messages')->with('success', 'Pesan berhasil dihapus!');
    }
    
}

