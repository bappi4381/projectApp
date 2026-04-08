<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $categoriesData = [
            'IMAGE EDITING' => [
                'Remove Background From Images' => [
                    ['name' => 'Clipping Path Service', 'slug' => 'clipping-path'],
                    ['name' => 'Ghost Mannequin Effect', 'slug' => 'ghost-mannequin'],
                    ['name' => 'Photoshop Image Masking', 'slug' => 'image-masking'],
                    ['name' => 'Photoshop Shadow Service', 'slug' => 'shadow-service'],
                ],
                'Professional Photo Retouching' => [
                    ['name' => 'Photo Restoration Service', 'slug' => 'photo-restoration'],
                    ['name' => 'Photoshop Color Correction', 'slug' => 'color-correction'],
                    ['name' => 'Photography Retouching', 'slug' => 'photo-retouching'],
                    ['name' => 'High End Photo Retouching', 'slug' => 'high-end-retouching'],
                ],
                'Photography Post Production' => [
                    ['name' => 'Product Photo Editing', 'slug' => 'product-photo-editing'],
                    ['name' => 'Wedding Photo Retouching', 'slug' => 'wedding-photo-editing'],
                    ['name' => 'Real Estate Photo Editing', 'slug' => 'real-estate-editing'],
                    ['name' => 'Image Blending Service', 'slug' => 'image-blending'],
                ],
                'Creative Editing Services' => [
                    ['name' => 'Creative Photo Manipulation', 'slug' => 'photo-manipulation'],
                    ['name' => '3D Modeling Services', 'slug' => '3d-modeling'],
                    ['name' => 'Desktop Publishing', 'slug' => 'desktop-publishing'],
                    ['name' => 'Video Editing and Post Production Services', 'slug' => 'video-editing'],
                ],
                'Vector Illustration & Conversion' => [
                    ['name' => 'Raster to Vector Conversion', 'slug' => 'raster-to-vector'],
                    ['name' => 'Vector Line Drawing & Artwork', 'slug' => 'vector-line-drawing'],
                ]
            ],
            'VIDEO PRODUCTION' => [
                'Video Editing Services' => [
                    ['name' => 'E-Commerce Video Editing Services', 'slug' => 'ecommerce-video-editing'],
                    ['name' => 'Video Background Removal Services', 'slug' => 'video-background-removal'],
                    ['name' => 'Video Object Removal Services', 'slug' => 'video-object-removal'],
                    ['name' => 'Rotoscoping Services', 'slug' => 'rotoscoping-services'],
                    ['name' => 'Video Resizing Services', 'slug' => 'video-resizing'],
                    ['name' => 'Subtitling Services', 'slug' => 'subtitling-services'],
                    ['name' => 'Video Ad Creation Service', 'slug' => 'video-ad-creation'],
                    ['name' => 'Vlog Editing Services', 'slug' => 'vlog-editing'],
                    ['name' => 'Video Masking', 'slug' => 'video-masking'],
                ],
                'Video Post Production Services' => [
                    ['name' => 'Video Color Grading Services', 'slug' => 'video-color-grading'],
                    ['name' => 'Film Editing Services', 'slug' => 'film-editing'],
                    ['name' => 'Drone Video Editing Services', 'slug' => 'drone-video-editing'],
                    ['name' => 'Wedding Video Editing Services', 'slug' => 'wedding-video-editing'],
                    ['name' => 'Music Video Editing Services', 'slug' => 'music-video-editing'],
                    ['name' => 'Corporate Video Editing Services', 'slug' => 'corporate-video-editing'],
                ],
                'Audio Editing' => [
                    ['name' => 'Audio Enhancement Services', 'slug' => 'audio-enhancement'],
                    ['name' => 'Audio Mixing Services', 'slug' => 'audio-mixing'],
                    ['name' => 'Audio Noise Reduction Services', 'slug' => 'audio-noise-reduction'],
                    ['name' => 'Dialogue Editing', 'slug' => 'dialogue-editing'],
                    ['name' => 'Artificial Voice Over Editing Service', 'slug' => 'artificial-voice-over'],
                    ['name' => 'Podcast Audio Editing', 'slug' => 'podcast-audio-editing'],
                    ['name' => 'Voice Over Editing', 'slug' => 'voice-over-editing'],
                ],
                'Story Boarding' => [
                    ['name' => 'Script Writing Services', 'slug' => 'script-writing'],
                    ['name' => 'Explanatory Video', 'slug' => 'explanatory-video'],
                ],
                'Animation Services' => [
                    ['name' => 'Web Animation Service', 'slug' => 'web-animation'],
                ]
            ]
        ];

        foreach ($categoriesData as $categoryName => $subCategories) {
            $category = Category::updateOrCreate(
                ['slug' => Str::slug($categoryName)],
                ['name' => $categoryName]
            );

            foreach ($subCategories as $subCategoryName => $services) {
                $subCategory = SubCategory::updateOrCreate(
                    ['slug' => Str::slug($subCategoryName), 'category_id' => $category->id],
                    ['name' => $subCategoryName]
                );

                foreach ($services as $serviceData) {
                    Service::updateOrCreate(
                        ['slug' => $serviceData['slug']],
                        [
                            'name' => $serviceData['name'],
                            'category_id' => $category->id,
                            'sub_category_id' => $subCategory->id,
                        ]
                    );
                }
            }
        }
    }
}
