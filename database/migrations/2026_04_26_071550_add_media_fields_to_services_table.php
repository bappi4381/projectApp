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
        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'service_type')) {
                $table->string('service_type')->default('image')->after('name')->comment('image, video, audio');
            }
            if (!Schema::hasColumn('services', 'audio_file')) {
                $table->string('audio_file')->nullable()->after('video_url');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['service_type', 'audio_file']);
        });
    }
};
