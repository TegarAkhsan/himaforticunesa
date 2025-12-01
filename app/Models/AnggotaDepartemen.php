<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnggotaDepartemen extends Model
{
    use HasFactory;

    protected $table = 'pengurus_himpunan';

    protected $fillable = [
        'departemen_id',
        'mahasiswa_id',
        'jabatan',
    ];

    protected static function booted()
    {
        static::addGlobalScope('departemen', function ($builder) {
            $builder->whereNotNull('departemen_id');
        });
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
