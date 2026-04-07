<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'category',
        'is_active',
        'starting_price',
    ];

    /**
     * Scope a query to only include specific categories.
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
