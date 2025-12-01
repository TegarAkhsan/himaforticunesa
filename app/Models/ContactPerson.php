<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'name',
        'whatsapp_number',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
