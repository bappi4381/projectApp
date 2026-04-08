<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceComplexity extends Model
{
    protected $fillable = [
        'service_id',
        'name',
        'description',
        'price',
        'image_before',
        'image_after',
        'order',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

