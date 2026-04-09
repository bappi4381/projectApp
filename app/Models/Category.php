<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'has_details', 'description', 'icon', 
        'image_before', 'image_after', 'features', 'faqs', 
        'methods', 'starting_price', 'price_unit', 'is_active'
    ];

    protected $casts = [
        'features' => 'array',
        'faqs' => 'array',
        'methods' => 'array',
        'has_details' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
