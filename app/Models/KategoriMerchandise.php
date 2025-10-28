<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMerchandise extends Model
{
    use HasFactory;

    protected $table = 'kategori_merchandises';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    // Relasi: satu kategori punya banyak merchandise
    public function merchandises()
    {
        return $this->hasMany(Merchandise::class, 'kategori_id');
    }
}
