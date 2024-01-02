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
        Schema::create('transaksi_detail', function (Blueprint $table) {
            $table->id('id_transaksi_detail');
            $table->unsignedBigInteger('id_transaksi');
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
            $table->unsignedBigInteger('id_menu');
            $table->foreign('id_menu')->references('id_menu')->on('menu');
            $table->integer('jumlah_pesanan');
            $table->decimal('harga');
            $table->decimal('sub_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_detail');
    }
};
