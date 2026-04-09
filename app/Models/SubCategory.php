<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'icon', 
        'image_before', 'image_after', 'features', 'faqs', 'methods', 
        'is_active', 'has_details', 'starting_price', 'price_unit'
    ];

    protected $casts = [
        'features' => 'array',
        'faqs' => 'array',
        'methods' => 'array',
        'is_active' => 'boolean',
        'has_details' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class)->whereNull('parent_id');
    }
}
