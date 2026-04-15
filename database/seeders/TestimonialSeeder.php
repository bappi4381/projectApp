<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'designation' => 'E-commerce Manager at FashionHub',
                'content' => 'The photo editing quality is exceptional. They transformed our product images in record time. Highly recommended for any serious e-commerce business!',
                'rating' => 5,
                'avatar' => null,
                'sort_order' => 1
            ],
            [
                'name' => 'Michael Chen',
                'designation' => 'Lead Photographer',
                'content' => 'PixelForge has become our go-to partner for retouching. Their attention to detail on complex paths and high-end retouching is unmatched.',
                'rating' => 5,
                'avatar' => null,
                'sort_order' => 2
            ],
            [
                'name' => 'Emily Rodriguez',
                'designation' => 'Marketing Director',
                'content' => 'Fast turnaround and consistent quality. Even on bulk orders, they never miss a deadline. Their communication is also very professional.',
                'rating' => 5,
                'avatar' => null,
                'sort_order' => 3
            ],
            [
                'name' => 'David Wilson',
                'designation' => 'Amazon Seller',
                'content' => 'Changed my business! My conversion rates went up by 30% after I started using their listing image optimization services. Truly experts.',
                'rating' => 4,
                'avatar' => null,
                'sort_order' => 4
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(['name' => $testimonial['name']], $testimonial);
        }
    }
}
