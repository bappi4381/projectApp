<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('title');
            $blueprint->integer('sort_order')->default(0);
            $blueprint->string('slug')->unique();
            $blueprint->string('category')->default('General');
            $blueprint->string('author_name')->default('PixelForge Admin');
            $blueprint->string('author_avatar')->nullable();
            $blueprint->string('featured_image');
            $blueprint->text('excerpt')->nullable();
            $blueprint->longText('content'); // Will store JSON or HTML content
            $blueprint->integer('read_time')->default(5); // in minutes
            $blueprint->boolean('is_published')->default(false);
            $blueprint->timestamp('published_at')->nullable();
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
