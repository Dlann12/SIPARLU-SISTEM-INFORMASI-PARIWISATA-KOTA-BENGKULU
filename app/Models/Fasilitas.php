<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_fasilitas', 
        'id_pariwisata', 
        'nama_fasilitas', 
        'lokasi', 
        'jenis', 
        'deskripsi', 
        'latitude', 
        'longitude'
    ];

    public function pariwisata()
    {
        return $this->belongsTo(Pariwisata::class, 'id_pariwisata', 'id_pariwisata');
    }
}

