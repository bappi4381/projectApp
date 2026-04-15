<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_pages', function (Blueprint $table) {
            $table->id();
            
            // Hero
            $table->string('hero_badge')->default('Our Work');
            $table->string('hero_title_regular')->default('Visuals that');
            $table->string('hero_title_highlight')->default('Speak Louder.');
            $table->text('hero_subtitle')->nullable();

            // Items (JSON array of before/after projects)
            $table->json('showcase_items')->nullable();

            // CTA Bottom
            $table->string('cta_title')->default('Start Your Next Big Project');
            $table->text('cta_desc')->nullable();
            $table->string('cta_btn_label')->default('Contact Us Now');
            $table->string('cta_btn_link')->default('#');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_pages');
    }
};
