<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VideoPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'slug',
        'pricing_tiers',
        'order_column',
        'is_active',
    ];

    protected $casts = [
        'pricing_tiers' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->service_name);
            }
        });
    }
}
