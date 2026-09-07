<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Pariwisata;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index(Request $request)    {
                // Ambil input pencarian
                $search = $request->input('search');
    
                // Query data fasilitas dengan pencarian
                $fasilitas = Fasilitas::when($search, function ($query, $search) {
                    return $query->where('nama_fasilitas', 'like', "%{$search}%")
                                 ->orWhere('lokasi', 'like', "%{$search}%")
                                 ->orWhere('jenis', 'like', "%{$search}%");
                })->paginate(10);
            
                // Tambahkan query string ke paginasi
                $fasilitas->appends(['search' => $search]);
        return view('admin.fasilitas', compact('fasilitas'));
    }

    public function create()
    {
        // Mengambil ID fasilitas terakhir
        $lastId = Fasilitas::max('id_fasilitas'); // Misalnya F001, F002, dst.
    
        // Jika ID terakhir ada, ekstrak angka setelah 'F' dan tambah 1
        if ($lastId) {
            $lastNumber = (int) substr($lastId, 1); // Mengambil angka setelah 'F', misalnya '001' -> 1
            $nextId = 'F' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT); // Menambahkan 1 dan format menjadi 3 digit
        } else {
            // Jika tidak ada ID sebelumnya (misalnya pertama kali), mulai dari F001
            $nextId = 'F001';
        }
    
        // Mengambil data pariwisata untuk pilihan di select option
        $pariwisataList = Pariwisata::all();
    
        // Mengirim ID fasilitas berikutnya dan daftar pariwisata ke view
        return view('admin.fasilitas.tambah', compact('pariwisataList', 'nextId'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_fasilitas' => 'required|string|max:10|unique:fasilitas',
            'id_pariwisata' => 'required|string|max:10|exists:pariwisata,id_pariwisata',
            'nama_fasilitas' => 'required|string|max:250',
            'lokasi' => 'required|string',
            'jenis' => 'required|string|in:Hotel,Restoran,Oleh-oleh,Tempat Ibadah',
            'deskripsi' => 'required|string',
            'latitude' => 'required|string|max:100',
            'longitude' => 'required|string|max:100',
        ]);

        Fasilitas::create($validatedData);

        return redirect()->route('admin.fasilitas.tambah')->with('success', 'Data fasilitas berhasil ditambahkan');
    }
    public function edit($id)
    {
        // Simpan URL sebelumnya di session
        session()->put('previous_url', url()->previous());
    
        // Ambil data fasilitas
        $fasilitas = Fasilitas::findOrFail($id);
        $pariwisata = Pariwisata::all(); // Ambil semua data pariwisata
        
        return view('admin.fasilitas.edit', compact('fasilitas', 'pariwisata'));
    }
    
    
    
    // Method untuk mengupdate data fasilitas
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_pariwisata' => 'required',
            'nama_fasilitas' => 'required',
            'lokasi' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
    
        // Cari data fasilitas berdasarkan ID
        $fasilitas = Fasilitas::find($id);
    
        if (!$fasilitas) {
            return redirect()->route('admin.fasilitas')->with('error', 'Data tidak ditemukan!');
        }
    
        // Update data fasilitas
        $fasilitas->update($request->only([
            'id_pariwisata', 'nama_fasilitas', 'lokasi', 'jenis', 'deskripsi', 'latitude', 'longitude'
        ]));
    
        // Ambil parameter page dari request
        $page = $request->input('page', 1);
    
        // Redirect ke halaman fasilitas dengan parameter page
        return redirect(session('previous_url'))->with('success', 'Data fasilitas berhasil diperbarui!');
    }
    
    
    
    
    public function destroy($id_fasilitas)
    {
        // Temukan data berdasarkan ID dan hapus
        $fasilitas = Fasilitas::findOrFail($id_fasilitas);
        
        // Hapus data
        $fasilitas->delete();
        
        // Redirect ke halaman yang sama dengan pesan sukses
        return redirect()->back()->with('success', 'Data pariwisata berhasil dihapus.');
    }
    
    
    public function showFasilitas(Request $request)
    {
        // Ambil input pencarian
        $search = $request->input('search');
    
        // Query data fasilitas dengan pencarian
        $fasilitas = Fasilitas::when($search, function ($query, $search) {
            return $query->where('nama_fasilitas', 'like', "%{$search}%")
                         ->orWhere('lokasi', 'like', "%{$search}%")
                         ->orWhere('jenis', 'like', "%{$search}%");
        })->paginate(10);
    
        // Tambahkan query string ke paginasi
        $fasilitas->appends(['search' => $search]);
    
        // Kirim data fasilitas dan kata kunci pencarian ke view
        return view('user.datafasilitas', compact('fasilitas', 'search'));
    }
    
    
    public function show($id)
{
    // Menemukan fasilitas berdasarkan ID
    $fasilitas = Fasilitas::findOrFail($id);

    // Mengirimkan data fasilitas ke view
    return view('user.detailfasilitas', compact('fasilitas'));
}

}