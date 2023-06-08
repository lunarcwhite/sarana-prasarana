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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('sarana_prasarana_id')->unsigned();
            $table->date('tanggal_mulai_peminjaman')->nullable();
            $table->date('tanggal_pengajuan_peminjaman');
            $table->integer('durasi_peminjaman');
            $table->date('tanggal_pengembalian')->nullable();
            $table->char('status_peminjaman', 1)->default('2');
            $table->text('keterangan')->nullable();
            $table->integer('jumlah_pinjam')->default('1');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->foreign('sarana_prasarana_id')->references('id')->on('sarana_prasaranas')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
