<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected $table = 'merchandises';

    protected $fillable = [
        'kategori_id',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
    ];

    // Relasi: satu merchandise milik satu kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriMerchandise::class, 'kategori_id');
    }
}
