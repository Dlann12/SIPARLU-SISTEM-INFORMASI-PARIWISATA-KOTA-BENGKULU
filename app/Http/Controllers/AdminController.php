<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pariwisata;
use App\Models\Fasilitas;


class AdminController extends Controller
{
    function admin ()
    {
       return view('admin.dashboard');
    }
    public function dashboard()
    {
        $jumlahPariwisata = Pariwisata::count(); // Menghitung jumlah pariwisata
        $jumlahFasilitas = Fasilitas::count(); // Menghitung jumlah fasilitas
    
        // Total data adalah jumlah pariwisata + fasilitas
        $totalData = $jumlahPariwisata + $jumlahFasilitas;
    
        return view('admin.dashboard', compact('totalData', 'jumlahPariwisata', 'jumlahFasilitas'));
    }
    
   
}
