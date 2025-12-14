<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HimaforticGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'himafortic_id',
        'image_path',
        'caption',
    ];

    public function himafortic()
    {
        return $this->belongsTo(Himafortic::class, 'himafortic_id');
    }
}
