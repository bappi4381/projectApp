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
            $table->string('price_unit')->nullable()->after('starting_price');
            $table->string('delivery_unit')->nullable()->after('delivery_capacity');
            $table->string('discount_tag')->nullable()->after('discount_upto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['price_unit', 'delivery_unit', 'discount_tag']);
        });
    }
};
