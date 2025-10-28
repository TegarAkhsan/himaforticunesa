<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nama',
        'nim',
        'email',
        'no_hp',
        'foto',
        'instagram',
        'linkedin',
    ];

    // ============================
    // RELASI
    // ============================

    public function anggotaDepartemen()
    {
        return $this->hasMany(AnggotaDepartemen::class, 'mahasiswa_id');
    }

    public function pengurusHimpunan()
    {
        return $this->hasOne(PengurusHimpunan::class, 'mahasiswa_id');
    }

    public function himaforticKetua()
    {
        return $this->hasMany(Himafortic::class, 'ketua_id');
    }

    public function himaforticWakil()
    {
        return $this->hasMany(Himafortic::class, 'wakil_id');
    }
}
