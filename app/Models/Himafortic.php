<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Himafortic extends Model
{
    use HasFactory;

    protected $table = 'himafortic';

    protected $fillable = [
        'tahun_periode',
        'deskripsi',
        'foto',
        'ketua_id',
        'wakil_id',
        'is_active',
    ];

    public function departemen()
    {
        return $this->hasMany(Departemen::class, 'himafortic_id');
    }

    // Relasi ke Mahasiswa (Ketua)
    public function ketua()
    {
        return $this->belongsTo(Mahasiswa::class, 'ketua_id');
    }

    // Relasi ke Mahasiswa (Wakil)
    public function wakil()
    {
        return $this->belongsTo(Mahasiswa::class, 'wakil_id');
    }

    // Relasi ke Gallery
    public function galleries()
    {
        return $this->hasMany(HimaforticGallery::class, 'himafortic_id');
    }
}
