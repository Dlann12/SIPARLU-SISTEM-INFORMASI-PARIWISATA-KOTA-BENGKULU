<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pariwisata extends Model
{
    // Nama tabel dalam database
    protected $table = 'pariwisata';

    // Primary key
    protected $primaryKey = 'id_pariwisata';

    // Jika primary key bukan auto-increment
    public $incrementing = false;

    // Tipe data primary key
    protected $keyType = 'string';

    // Kolom-kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'id_pariwisata',
        'nama_pariwisata',
        'lokasi',
        'deskripsi',
        'latitude',
        'longitude',
        'gambar',
    ];

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class, 'id_pariwisata');
    }
}
