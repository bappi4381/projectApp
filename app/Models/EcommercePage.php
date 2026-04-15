<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcommercePage extends Model
{
    protected $table = 'ecommerce_pages';

    protected $fillable = [
        'hero_title',
        'hero_gif',
        'hero_price_from',
        'hero_price_unit',
        'hero_delivery_capacity',
        'hero_delivery_subtitle',
        'workflow_sections',
        'service_links',
        'categories',
        'tour_title',
        'tour_subtitle',
        'tour_video_thumbnail',
        'tour_video_url',
        'portfolio_images',
        'faqs',
        'value_quote',
        'value_quote_author',
        'value_quote_role',
        'value_image',
    ];

    protected $casts = [
        'workflow_sections' => 'array',
        'service_links'     => 'array',
        'categories'        => 'array',
        'portfolio_images'  => 'array',
        'faqs'              => 'array',
        'hero_price_from'   => 'decimal:2',
    ];

    /**
     * Always return the single settings row, creating it with defaults if it doesn't exist.
     */
    public static function settings(): self
    {
        return self::firstOrCreate([], [
            'hero_title'              => 'Ecommerce Product Photo Editing Services',
            'hero_price_from'         => 0.49,
            'hero_price_unit'         => 'Per Image',
            'hero_delivery_capacity'  => '5000 images/day',
            'hero_delivery_subtitle'  => '2500+ images in 12 hours',
            'tour_title'              => 'Take a quick tour on',
            'tour_subtitle'           => 'How we retouch ecommerce product photos.',
            'value_quote'             => "We've saved hundreds of hours and finally have time to focus on growing the brand instead of sitting next to screen for countless of hours.",
            'value_quote_author'      => 'Rachel M.',
            'value_quote_role'        => 'Production Manager',

            'workflow_sections' => [
                [
                    'title'           => 'High-End Ghost Mannequin Services',
                    'highlight_words' => ['Ghost', 'Mannequin'],
                    'description'     => 'Our invisible mannequin service gives your apparel products a 3D, hollow-man look by expertly joining the neck and inner-bottom areas. We ensure natural-looking curves and realistic shadows that highlight the fit and texture of your clothing, helping you increase conversions.',
                    'before_image'    => '',
                    'after_image'     => '',
                    'cta_label'       => 'VIEW SAMPLES',
                    'cta_route'       => 'graphics.portfolio',
                    'reverse_layout'  => false,
                ],
                [
                    'title'           => 'Color correction and consistency across all platforms',
                    'highlight_words' => ['Color correction', 'consistency'],
                    'description'     => 'From creating product variants to fixing texture details, we match your product colors to your physical samples and brand guidelines so your visuals look authentic and always stay on-brand, everywhere.',
                    'before_image'    => '',
                    'after_image'     => '',
                    'cta_label'       => 'GET QUOTE',
                    'cta_route'       => 'graphics.get-quote',
                    'reverse_layout'  => true,
                ],
            ],

            'service_links' => [
                ['name' => 'Background Removal',     'url' => '/graphics-studio/services', 'image_url' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80'],
                ['name' => 'High-end Retouching',    'url' => '/graphics-studio/services', 'image_url' => 'https://images.unsplash.com/photo-1596783074918-c84cb06531ca?auto=format&fit=crop&w=600&q=80'],
                ['name' => 'Clipping Path',          'url' => '/graphics-studio/services', 'image_url' => 'https://images.unsplash.com/photo-1617042503254-2cc35be26e13?auto=format&fit=crop&w=600&q=80'],
                ['name' => 'Color Correction',       'url' => '/graphics-studio/services', 'image_url' => 'https://images.unsplash.com/photo-1579338559194-a162d19bf842?auto=format&fit=crop&w=600&q=80'],
                ['name' => 'Ghost Mannequin Effect', 'url' => '/graphics-studio/services', 'image_url' => 'https://images.unsplash.com/photo-1620799139834-6b8f844fbe61?auto=format&fit=crop&w=600&q=80'],
                ['name' => 'Shadow Creation',        'url' => '/graphics-studio/services', 'image_url' => 'https://images.unsplash.com/photo-1618354691438-25bc04584c23?auto=format&fit=crop&w=600&q=80'],
                ['name' => 'Dust Cleaning & more',   'url' => '/graphics-studio/services', 'image_url' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=600&q=80'],
            ],

            'categories' => [
                ['title' => 'Apparel & Clothing',  'image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1516257984-b1b4d707412e?auto=format&fit=crop&w=800&q=80', 'description' => 'Worried about low-quality apparel photos on your e-commerce store? We offer top-notch editing for all types of clothing, including color and exposure correction, background removal, ghost mannequin effects, and more—to ensure the best results.'],
                ['title' => 'Beauty Products',     'image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=800&q=80', 'description' => 'Cosmetic products are in high demand online and need to look their best. From makeup to perfumes, we enhance every item with expert photo editing—adding shadows, adjusting colors, correcting exposure, and more to create engaging visuals.'],
                ['title' => 'Shoes & Footwear',   'image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?auto=format&fit=crop&w=800&q=80', 'description' => 'We specialize in high-demand shoe photo editing for e-commerce, including color correction, background removal, line drawing, and retouching—handled by experts who deliver top results, no matter the complexity.'],
                ['title' => 'Furniture & Movables','image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=800&q=80', 'description' => 'With the rise of online shopping, furniture sellers are taking their business digital. We enhance all types of furniture photos—sofas, chairs, tables, cupboards, and more—using top-quality photo editing to help products stand out online.'],
            ],

            'portfolio_images' => [
                ['image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=600&q=80'],
                ['image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=600&q=80'],
                ['image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&w=600&q=80'],
                ['image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1563170351-be82bc888aa4?auto=format&fit=crop&w=600&q=80'],
                ['image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1605100804763-247f6612d54e?auto=format&fit=crop&w=600&q=80'],
                ['image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=600&q=80'],
                ['image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1588667675765-515433f48a1d?auto=format&fit=crop&w=600&q=80'],
                ['image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=600&q=80'],
                ['image_path' => '', 'image_url' => 'https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=600&q=80'],
            ],

            'faqs' => [
                ['q' => 'What are the products that you edit?',                'a' => 'We edit and retouch all types of product photos. For example- Electronics, Food Items, Apparel, Cosmetics, machinery/motor parts, farming tools, and many more.'],
                ['q' => 'What services do you provide for ecommerce product photo editing?', 'a' => 'We offer clipping path, background removal, ghost mannequin effect, color correction, Photoshop shadow effect, image cropping & resizing, perspective & exposure correction, and many more.'],
                ['q' => 'Do you edit bulk product photos?',                    'a' => 'Absolutely, we edit bulk product photos. Our editing capacity is 5000+ images per day.'],
                ['q' => 'How about the image quality?',                        'a' => "You don't have to worry about the image quality. We are a professional image editing company and always bring out 100% quality product images that are capable of drawing potential customers' attention."],
                ['q' => 'Are you a Photography studio?',                       'a' => 'No, we are a photo editing company. We have been serving product photographers, e-commerce businesses, photography agencies, advertising companies, and many more by offering top-grade image manipulation services.'],
                ['q' => 'Do you have an image editing production house?',      'a' => 'Yes, we have a well-equipped production house located in Dhaka, Bangladesh. With 250+ full-fledged photo editors & graphic designers, we use state-of-the-art technology and maintain maximum photo quality.'],
            ],
        ]);
    }
}
