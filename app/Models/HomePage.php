<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_pages';

    protected $fillable = [
        'hero_slides',
    ];

    protected $casts = [
        'hero_slides' => 'array',
    ];

    public static function settings(): self
    {
        return self::firstOrCreate([], [
            'hero_slides' => [
                [
                    'badge'  => '',
                    'title'  => 'CRAFTING <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400">PIXEL-PERFECT</span> VISUALS',
                    'desc'   => 'High-end clipping path, complex masking, and high-frequency retouching for brands that refuse to settle for average.',
                    'image'  => '',
                    'fallback_image' => 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=1920&q=80&auto=format&fit=crop',
                    'accent' => 'indigo'
                ],
                [
                    'badge'  => '',
                    'title'  => 'ELEVATE <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">YOUR PRODUCT</span> AESTHETICS',
                    'desc'   => 'From ghost mannequin effects to jewelry enhancement, we transform raw clicks into high-converting commercial assets.',
                    'image'  => '',
                    'fallback_image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=1920&q=80&auto=format&fit=crop',
                    'accent' => 'purple'
                ],
                [
                    'badge'  => '',
                    'title'  => 'ELITE <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">REAL ESTATE</span> & ARCHITECTURE',
                    'desc'   => 'Professional HDR blending, twilight enhancement, and virtual staging that makes properties sell 35% faster.',
                    'image'  => '',
                    'fallback_image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1920&q=80&auto=format&fit=crop',
                    'accent' => 'cyan'
                ]
            ],
        ]);
    }
}
