<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita'; // Mendefinisikan nama tabel secara eksplisit

    protected $fillable = [
        'kategori_berita_id',
        'judul',
        'slug',
        'gambar_utama',
        'konten',
        'penulis',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'datetime',
    ];

    // Satu berita dimiliki oleh satu kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id');
    }
}
