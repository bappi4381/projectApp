<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'service_type',
        'slug',
        'description',
        'summary_bullets',
        'necessity_text',
        'features_table_heading',
        'icon',
        'category_id',
        'sub_category_id',
        'is_active',
        'starting_price',
        'price_unit',
        'features',
        'pricing_tiers',
        'faqs',
        'methods',
        'work_samples',
        'delivery_capacity',
        'delivery_unit',
        'discount_upto',
        'discount_tag',
        'image_before',
        'image_after',
        'video_url',
        'audio_file',
        'has_details',
        'show_on_pricing',
    ];

    public function parent()
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }

    public function variants()
    {
        return $this->hasMany(Service::class, 'parent_id')->orderBy('id');
    }

    protected $casts = [
        'features' => 'array',
        'pricing_tiers' => 'array',
        'summary_bullets' => 'array',
        'faqs' => 'array',
        'methods' => 'array',
        'work_samples' => 'array',
        'is_active' => 'boolean',
        'has_details' => 'boolean',
        'show_on_pricing' => 'boolean'
    ];

    public function complexities()
    {
        return $this->hasMany(ServiceComplexity::class)->orderBy('order');
    }


    public function serviceCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
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
