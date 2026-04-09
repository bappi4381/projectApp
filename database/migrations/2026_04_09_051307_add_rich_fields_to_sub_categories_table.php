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
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->text('description')->nullable()->after('slug');
            $table->string('icon')->nullable()->after('description');
            $table->string('image_before')->nullable()->after('icon');
            $table->string('image_after')->nullable()->after('image_before');
            $table->json('features')->nullable()->after('image_after');
            $table->json('faqs')->nullable()->after('features');
            $table->json('methods')->nullable()->after('faqs');
            $table->boolean('is_active')->default(true)->after('methods');
            $table->boolean('has_details')->default(false)->after('is_active');
            $table->decimal('starting_price', 10, 2)->nullable()->after('has_details');
            $table->string('price_unit')->nullable()->after('starting_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropColumn([
                'description', 'icon', 'image_before', 'image_after', 
                'features', 'faqs', 'methods', 'is_active', 'has_details', 
                'starting_price', 'price_unit'
            ]);
        });
    }
};
