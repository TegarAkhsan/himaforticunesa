<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusHimpunan extends Model
{
    use HasFactory;

    protected $table = 'pengurus_himpunan';

    protected $fillable = [
        'mahasiswa_id',
        'jabatan',
        'departemen_id',
        'foto',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }
}
