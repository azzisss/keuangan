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
        Schema::create('aruskas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->integer('pemasukan');
            $table->integer('pengeluaran');
            $table->char('detail_pemasukan')->nullable();
            $table->char('detail_pengeluaran')->nullable();
            $table->integer('jumlah_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aruskas');
    }
};
