<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnggotaDepartemen extends Model
{
    use HasFactory;

    protected $table = 'anggota_departemen';

    protected $fillable = [
        'departemen_id',
        'mahasiswa_id',
        'jabatan',
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
