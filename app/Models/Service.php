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
        'category_id',
        'sub_category_id',
        'is_active',
        'starting_price',
        'price_unit',
        'features',
        'faqs',
        'methods',
        'delivery_capacity',
        'delivery_unit',
        'discount_upto',
        'discount_tag',
        'image_before',
        'image_after',
    ];

    protected $casts = [
        'features' => 'array',
        'faqs' => 'array',
        'methods' => 'array',
        'is_active' => 'boolean',
    ];

    public function complexities()
    {
        return $this->hasMany(ServiceComplexity::class)->orderBy('order');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    /**
     * Scope a query to only include specific categories.
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
