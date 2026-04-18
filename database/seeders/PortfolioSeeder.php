<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Product Enhancement',
                'category' => 'Photo Retouching',
                'description' => 'Polishing imperfections and correcting colors for a flawless commercial look that elevates brand perception.',
                'before_image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80',
                'after_image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80',
                'order' => 1,
                'show_on_home' => true,
            ],
            [
                'title' => 'Digital Apparel',
                'category' => 'Ghost Mannequin',
                'description' => 'Removing mannequins and adding neck joints to create a premium ghost mannequin effect for eCommerce.',
                'before_image' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=800&q=80',
                'after_image' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=800&q=80',
                'order' => 2,
                'show_on_home' => true,
            ],
            [
                'title' => 'Cosmetic Perfection',
                'category' => 'Product Editing',
                'description' => 'Enhancing lighting, reflections, and sharpness to meet the high standards of global cosmetic brands.',
                'before_image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=800&q=80',
                'after_image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=800&q=80',
                'order' => 3,
                'show_on_home' => true,
            ],
            [
                'title' => 'Real Estate Magic',
                'category' => 'Background Removal',
                'description' => 'Replacing dull skies and balancing interior lighting to make architectural photography irresistible.',
                'before_image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&q=80',
                'after_image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&q=80',
                'order' => 4,
                'show_on_home' => true,
            ],
            [
                'title' => 'Creative Compositing',
                'category' => 'Image Manipulation',
                'description' => 'Blending multiple elements into one cohesive, surreal environment for advertising campaigns.',
                'before_image' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=800&q=80',
                'after_image' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=800&q=80',
                'order' => 5,
            ],
            [
                'title' => 'Cinematic Grading',
                'category' => 'Color Correction',
                'description' => 'Fixing white balances and applying cinematic color grades to set the perfect mood for editorials.',
                'before_image' => 'https://images.unsplash.com/photo-1618761714954-0b8cd0026356?w=800&q=80',
                'after_image' => 'https://images.unsplash.com/photo-1618761714954-0b8cd0026356?w=800&q=80',
                'order' => 6,
            ]
        ];

        foreach ($items as $item) {
            Portfolio::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
