<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Remove duplicate invoice_id records, keeping only the latest one
        $duplicates = DB::table('payments')
            ->select('invoice_id', DB::raw('MAX(id) as keep_id'))
            ->whereNotNull('invoice_id')
            ->groupBy('invoice_id')
            ->having(DB::raw('COUNT(*)'), '>', 1)
            ->get();

        foreach ($duplicates as $dup) {
            DB::table('payments')
                ->where('invoice_id', $dup->invoice_id)
                ->where('id', '!=', $dup->keep_id)
                ->delete();
        }

        // Now make invoice_id unique (drop old index first, add unique)
        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex(['invoice_id']);
            $table->unique('invoice_id');
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropUnique(['invoice_id']);
            $table->index('invoice_id');
        });
    }
};
