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
        Schema::create('video_pricings', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('slug')->unique();
            $table->json('pricing_tiers')->nullable();
            $table->integer('order_column')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_pricings');
    }
};
