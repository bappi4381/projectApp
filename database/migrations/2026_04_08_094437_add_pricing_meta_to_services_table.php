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
            $table->json('features')->nullable()->after('starting_price');
            $table->integer('delivery_capacity')->nullable()->after('features');
            $table->integer('discount_upto')->nullable()->after('delivery_capacity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['features', 'delivery_capacity', 'discount_upto']);
        });
    }
};
