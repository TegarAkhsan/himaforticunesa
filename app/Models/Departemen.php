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
        'slug',
        'deskripsi',
        'ketua_id',
        'foto',
        'himafortic_id',
    ];

    public function himafortic()
    {
        return $this->belongsTo(Himafortic::class, 'himafortic_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->slug)) {
                $model->slug = \Illuminate\Support\Str::slug($model->nama);
            }
        });
    }

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
