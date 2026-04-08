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
            $table->string('navbar_menu')->nullable()->after('category'); // e.g., 'IMAGE EDITING', 'VIDEO PRODUCTION'
            $table->string('navbar_group')->nullable()->after('navbar_menu'); // e.g., 'Remove Background From Images'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['navbar_menu', 'navbar_group']);
        });
    }
};
