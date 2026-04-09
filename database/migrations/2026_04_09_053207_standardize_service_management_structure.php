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
        $tables = ['categories', 'sub_categories', 'services'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                if (!Schema::hasColumn($table->getTable(), 'has_details')) {
                    $table->boolean('has_details')->default(false)->after('slug');
                }
                if (!Schema::hasColumn($table->getTable(), 'description')) {
                    $table->longText('description')->nullable()->after('has_details');
                }
                if (!Schema::hasColumn($table->getTable(), 'icon')) {
                    $table->string('icon')->nullable()->after('description');
                }
                if (!Schema::hasColumn($table->getTable(), 'image_before')) {
                    $table->string('image_before')->nullable()->after('icon');
                }
                if (!Schema::hasColumn($table->getTable(), 'image_after')) {
                    $table->string('image_after')->nullable()->after('image_before');
                }
                if (!Schema::hasColumn($table->getTable(), 'features')) {
                    $table->json('features')->nullable()->after('image_after');
                }
                if (!Schema::hasColumn($table->getTable(), 'faqs')) {
                    $table->json('faqs')->nullable()->after('features');
                }
                if (!Schema::hasColumn($table->getTable(), 'methods')) {
                    $table->json('methods')->nullable()->after('faqs');
                }
                if (!Schema::hasColumn($table->getTable(), 'starting_price')) {
                    $table->decimal('starting_price', 10, 2)->nullable()->after('methods');
                }
                if (!Schema::hasColumn($table->getTable(), 'price_unit')) {
                    $table->string('price_unit')->nullable()->after('starting_price');
                }
                if (!Schema::hasColumn($table->getTable(), 'is_active')) {
                    $table->boolean('is_active')->default(true)->after('price_unit');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = ['categories', 'sub_categories', 'services'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn([
                    'has_details', 'description', 'icon', 'image_before', 'image_after', 
                    'features', 'faqs', 'methods', 'starting_price', 'price_unit', 'is_active'
                ]);
            });
        }
    }
};
