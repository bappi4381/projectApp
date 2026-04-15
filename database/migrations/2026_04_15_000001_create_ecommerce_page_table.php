<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ecommerce_pages', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_title')->default('Ecommerce Product Photo Editing Services');
            $table->string('hero_gif')->nullable();           // image path
            $table->decimal('hero_price_from', 8, 2)->default(0.49);
            $table->string('hero_price_unit')->default('Per Image');
            $table->string('hero_delivery_capacity')->default('5000 images/day');
            $table->string('hero_delivery_subtitle')->default('2500+ images in 12 hours');

            // Workflow Sections (2 rows: Ghost Mannequin + Color Correction)
            $table->json('workflow_sections')->nullable();
            // Each item: { title, highlight_words (array), description, before_image, after_image, cta_label, cta_url, reverse_layout (bool) }

            // "Everything You Need" service links
            $table->json('service_links')->nullable();
            // Each item: { name, url, image_url }

            // Product Categories Grid
            $table->json('categories')->nullable();
            // Each item: { title, image_path, description }

            // Tour Section
            $table->string('tour_title')->default('Take a quick tour on');
            $table->string('tour_subtitle')->default('How we retouch ecommerce product photos.');
            $table->string('tour_video_thumbnail')->nullable();
            $table->string('tour_video_url')->nullable();

            // Portfolio
            $table->json('portfolio_images')->nullable();
            // Each item: image path string

            // FAQ
            $table->json('faqs')->nullable();
            // Each item: { q, a }

            // Value Proposition
            $table->text('value_quote')->nullable();
            $table->string('value_quote_author')->nullable();
            $table->string('value_quote_role')->nullable();
            $table->string('value_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ecommerce_pages');
    }
};
