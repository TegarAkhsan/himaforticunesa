<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita'; // Mendefinisikan nama tabel secara eksplisit

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
    ];

    // Satu kategori memiliki banyak berita
    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_berita_id');
    }
}