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
        Schema::create('labarugis', function (Blueprint $table) {
            $table->id();
            $table->integer('pendapatan_kas');
            $table->integer('pendapatan_penjualan');
            $table->integer('pendapatan_lain');
            $table->integer('gaji_pegawai');
            $table->integer('laba_rugi');
            $table->timestamp('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labarugis');
    }
};
