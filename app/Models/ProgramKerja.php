<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'program_kerja';

    protected $fillable = [
        'departemen_id',
        'nama',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function fotoProgram()
    {
        return $this->hasMany(FotoProgramKerja::class, 'program_kerja_id');
    }
}

