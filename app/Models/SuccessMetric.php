<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessMetric extends Model
{
    protected $fillable = ['title', 'count', 'suffix', 'icon', 'category', 'is_active', 'sort_order'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
