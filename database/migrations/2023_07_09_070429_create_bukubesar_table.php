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
        Schema::create('bukubesar', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('total_pendapatan');
            $table->integer('total_pengeluaran');
            $table->integer('jumlah_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukubesar');
    }
};
