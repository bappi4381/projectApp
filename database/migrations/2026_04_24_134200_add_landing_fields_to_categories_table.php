<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('hero_heading')->nullable()->after('description');
            $table->text('short_description')->nullable()->after('hero_heading');
            $table->string('video_link')->nullable()->after('short_description');
            $table->longText('full_description')->nullable()->after('video_link');
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['hero_heading', 'short_description', 'video_link', 'full_description']);
        });
    }
};
