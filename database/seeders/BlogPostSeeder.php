<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'The Importance of High-Quality Product Images for E-commerce',
                'category' => 'Photography',
                'excerpt' => 'Learn why high-resolution images are the backbone of any successful online store and how they impact sales.',
                'content' => 'High-quality product images are more than just pictures; they are your store\'s virtual storefront. In this article, we explore the psychological impact of professional photography on customer trust and conversion rates. We discuss lighting, background removal, and the importance of consistent editing.',
                'featured_image' => 'blog/product-photography.jpg',
                'read_time' => 5,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Mastering Background Masking in Photoshop',
                'category' => 'Tutorial',
                'excerpt' => 'A step-by-step guide to achieving pixel-perfect background removal for complex subjects like hair and fur.',
                'content' => 'Background removal is one of the most requested services in photo editing. This tutorial covers the Pen Tool, Select and Mask workspace, and advanced channel masking techniques. Whether you are a beginner or looking to refine your skills, these tips will save you hours of work.',
                'featured_image' => 'blog/photoshop-masking.jpg',
                'read_time' => 8,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => '5 Editing Trends to Watch in 2026',
                'category' => 'Trends',
                'excerpt' => 'From AI-assisted retouching to minimalist color grading, discover what is trending in the creative world this year.',
                'content' => 'The creative landscape is evolving fast. This year, we see a shift towards hyper-realism and AI-integrated workflows. We analyze how top brands are using subtle editing to create a premium feel and how you can apply these trends to your own projects without overdoing it.',
                'featured_image' => 'blog/trends-2026.jpg',
                'read_time' => 6,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5),
            ],
        ];

        foreach ($posts as $post) {
            $post['slug'] = Str::slug($post['title']);
            BlogPost::updateOrCreate(['slug' => $post['slug']], $post);
        }
    }
}
