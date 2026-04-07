<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sort_order',
        'slug',
        'category',
        'author_name',
        'author_avatar',
        'featured_image',
        'excerpt',
        'content',
        'read_time',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'content' => 'array', // Casting JSON content to array automatically
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    /**
     * Scope for published posts - sorted by manual order then date
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->orderBy('sort_order', 'asc')
            ->orderBy('published_at', 'desc');
    }
}
