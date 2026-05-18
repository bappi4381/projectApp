<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $table = 'software';
    protected $fillable = [
        'name',
        'slug',
        'category',
        'image_url',
        'link_url',
        'short_desc',
        'long_desc',
        'is_active',
        'solutions',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'solutions' => 'array',
    ];
}
