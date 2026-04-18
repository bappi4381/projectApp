<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->json('summary_bullets')->nullable()->after('description');
            $table->text('necessity_text')->nullable()->after('summary_bullets');
            $table->string('features_table_heading')->nullable()->after('necessity_text');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['summary_bullets', 'necessity_text', 'features_table_heading']);
        });
    }
};
