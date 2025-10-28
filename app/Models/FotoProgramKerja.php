<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FotoProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'foto_program';

    protected $fillable = [
        'program_kerja_id',
        'foto1',
        'foto2',
        'foto3',
    ];

    public function programKerja()
    {
        return $this->belongsTo(ProgramKerja::class, 'program_kerja_id');
    }
}
