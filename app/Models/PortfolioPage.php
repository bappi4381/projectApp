<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioPage extends Model
{
    protected $table = 'portfolio_pages';

    protected $fillable = [
        'hero_badge',
        'hero_title_regular',
        'hero_title_highlight',
        'hero_subtitle',
        'showcase_items',
        'cta_title',
        'cta_desc',
        'cta_btn_label',
        'cta_btn_link',
    ];

    protected $casts = [
        'showcase_items' => 'array',
    ];

    public static function settings(): self
    {
        return self::firstOrCreate([], [
            'hero_badge'           => 'Our Work',
            'hero_title_regular'   => 'Visuals that',
            'hero_title_highlight' => 'Speak Louder.',
            'hero_subtitle'        => 'Explore our digital playground where imagination meets pixel-perfect execution. We transform concepts into captivating visual journeys.',
            'cta_title'            => 'Start Your Next Big Project',
            'cta_desc'             => 'Let\'s collaborate and build something extraordinary together. Our team is ready to bring your vision to life.',
            'cta_btn_label'        => 'Contact Us Now',
            'cta_btn_link'         => '#',

            'showcase_items' => [
                [
                    'title'    => 'Product Enhancement',
                    'category' => 'Photo Retouching',
                    'desc'     => 'Polishing imperfections and correcting colors for a flawless commercial look that elevates brand perception.',
                    'before'   => '',
                    'after'    => '',
                    'fallback_before' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80',
                    'fallback_after'  => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80', 
                ],
                [
                    'title'    => 'Digital Apparel',
                    'category' => 'Ghost Mannequin',
                    'desc'     => 'Removing mannequins and adding neck joints to create a premium ghost mannequin effect for eCommerce.',
                    'before'   => '',
                    'after'    => '',
                    'fallback_before' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=800&q=80',
                    'fallback_after'  => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=800&q=80',
                ],
                [
                    'title'    => 'Cosmetic Perfection',
                    'category' => 'Product Editing',
                    'desc'     => 'Enhancing lighting, reflections, and sharpness to meet the high standards of global cosmetic brands.',
                    'before'   => '',
                    'after'    => '',
                    'fallback_before' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=800&q=80',
                    'fallback_after'  => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=800&q=80',
                ],
                [
                    'title'    => 'Real Estate Magic',
                    'category' => 'Background Removal',
                    'desc'     => 'Replacing dull skies and balancing interior lighting to make architectural photography irresistible.',
                    'before'   => '',
                    'after'    => '',
                    'fallback_before' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&q=80',
                    'fallback_after'  => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&q=80',
                ],
                [
                    'title'    => 'Creative Compositing',
                    'category' => 'Image Manipulation',
                    'desc'     => 'Blending multiple elements into one cohesive, surreal environment for advertising campaigns.',
                    'before'   => '',
                    'after'    => '',
                    'fallback_before' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=800&q=80',
                    'fallback_after'  => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=800&q=80',
                ],
                [
                    'title'    => 'Cinematic Grading',
                    'category' => 'Color Correction',
                    'desc'     => 'Fixing white balances and applying cinematic color grades to set the perfect mood for editorials.',
                    'before'   => '',
                    'after'    => '',
                    'fallback_before' => 'https://images.unsplash.com/photo-1618761714954-0b8cd0026356?w=800&q=80',
                    'fallback_after'  => 'https://images.unsplash.com/photo-1618761714954-0b8cd0026356?w=800&q=80',
                ]
            ],
        ]);
    }
}
