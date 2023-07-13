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
        Schema::table('rekapan_peminjamen', function (Blueprint $table) {
            $table->string('kondisi_awal')->nullable();
            $table->string('kondisi_pengembalian')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rekapan_peminjamen', function (Blueprint $table) {
            $table->dropColumn('kondisi_awal');
            $table->dropColumn('kondisi_pengembalian');
        });
    }
};
