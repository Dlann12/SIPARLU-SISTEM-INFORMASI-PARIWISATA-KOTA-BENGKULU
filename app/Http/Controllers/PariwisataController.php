<?php

namespace App\Http\Controllers;

use App\Models\Pariwisata;
use Illuminate\Http\Request;

class PariwisataController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil nilai dari parameter 'search'
    
        // Filter data berdasarkan pencarian jika ada
        $pariwisataQuery = Pariwisata::query();
    
        if ($search) {
            $pariwisataQuery->where('nama_pariwisata', 'like', '%' . $search . '%')
                            ->orWhere('lokasi', 'like', '%' . $search . '%');
        }
    
        // Gunakan appends() untuk menyertakan parameter 'search' di pagination
        $pariwisata = $pariwisataQuery->paginate(10)->appends(['search' => $search]);
        return view('admin.pariwisata', compact('pariwisata', 'search'));
    }

    public function create()
    {
        // Mengambil ID terakhir dari tabel pariwisata (misalnya P002)
        $lastId = Pariwisata::max('id_pariwisata');
        
        // Jika ID terakhir ada, ekstrak angka di belakang 'P', tambah 1
        if ($lastId) {
            $lastNumber = (int) substr($lastId, 1); // Mengambil angka setelah 'P', misalnya '001' -> 1
            $nextId = 'P' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT); // Menambahkan 1 dan format menjadi 3 digit
        } else {
            // Jika tidak ada ID sebelumnya (misalnya pertama kali), mulai dari P001
            $nextId = 'P001';
        }
    
        // Pass the nextId to the view
        return view('admin.pariwisata.tambah', compact('nextId'));
    }
    
    

    public function store(Request $request)
    {
       // Validasi data input
       $validatedData = $request->validate([
        'id_pariwisata' => 'required|string|max:10',
        'nama_pariwisata' => 'required|string|max:250',
        'lokasi' => 'required|string',
        'deskripsi' => 'required|string',
        'latitude' => 'required|string|max:100',
        'longitude' => 'required|string|max:100',
    ]);

    // Simpan data ke database
    try {
        Pariwisata::create($validatedData);
        return redirect()->route('admin.pariwisata.tambah')->with('success', 'Data Pariwisata berhasil ditambahkan.');
    } catch (\Exception $e) {
        // Jika terjadi kesalahan, kembali ke halaman form dengan pesan error
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
    }
    }

    public function edit($id)
    {
                // Simpan URL sebelumnya di session
                session()->put('previous_url', url()->previous());
    
                // Ambil data fasilitas
                $pariwisata= Pariwisata::findOrFail($id);
                
                return view('admin.pariwisata.edit', compact('pariwisata'));
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_pariwisata' => 'required|string|max:250',
        'lokasi' => 'nullable|string',
        'deskripsi' => 'nullable|string',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
    ]);
    
    // Temukan data pariwisata berdasarkan ID
    $pariwisata = Pariwisata::findOrFail($id);

    // Update data pariwisata
    $pariwisata->update([
        'nama_pariwisata' => $request->nama_pariwisata,
        'lokasi' => $request->lokasi,
        'deskripsi' => $request->deskripsi,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
    ]);

    // Ambil parameter 'page' dari query string, jika ada
    $page = $request->get('page', 1); // Jika tidak ada, set default ke halaman 1
    
    // Redirect kembali ke halaman yang sama (menggunakan route yang ada)
    return redirect(session('previous_url'))->with('success', 'Data fasilitas berhasil diperbarui!');

}

    

    public function destroy($id_pariwisata)
    {
        // Temukan data berdasarkan ID dan hapus
        $pariwisata = Pariwisata::findOrFail($id_pariwisata);
        
        // Hapus data
        $pariwisata->delete();
        
        // Redirect ke halaman yang sama dengan pesan sukses
        return redirect()->back()->with('success', 'Data pariwisata berhasil dihapus.');
    }
    
    public function showPariwisata(Request $request)
    {
        $search = $request->input('search'); // Ambil nilai dari parameter 'search'
    
        // Filter data berdasarkan pencarian jika ada
        $pariwisataQuery = Pariwisata::query();
    
        if ($search) {
            $pariwisataQuery->where('nama_pariwisata', 'like', '%' . $search . '%')
                            ->orWhere('lokasi', 'like', '%' . $search . '%');
        }
    
        // Gunakan appends() untuk menyertakan parameter 'search' di pagination
        $pariwisata = $pariwisataQuery->paginate(10)->appends(['search' => $search]);
    
        return view('user.datapariwisata', compact('pariwisata', 'search'));
    }
    

    
    public function show($id)
    {
    $pariwisata = Pariwisata::findOrFail($id);
    return view('user.detailpariwisata', compact('pariwisata'));
    }
}