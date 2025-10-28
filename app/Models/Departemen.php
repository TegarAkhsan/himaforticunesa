<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departemen extends Model
{
    use HasFactory;

    protected $table = 'departemen';

    protected $fillable = [
        'nama',
        'deskripsi',
        'ketua_id',
        'foto',
    ];

    public function ketua()
    {
        return $this->belongsTo(Mahasiswa::class, 'ketua_id');
    }

    public function anggota()
    {
        return $this->hasMany(AnggotaDepartemen::class, 'departemen_id');
    }

    public function programKerja()
    {
        return $this->hasMany(ProgramKerja::class, 'departemen_id');
    }
}
