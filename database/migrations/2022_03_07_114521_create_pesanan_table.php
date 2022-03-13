<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pesanan');

        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_konfirmasi_pemesanan')->nullable();
            $table->foreignId('id_metode_pembayaran')->nullable();
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('pesanan', function($table) {
            $table->foreign('id_konfirmasi_pemesanan')->references('id')->on('konfirmasi_pesanan')->onDelete('cascade');
            $table->foreign('id_metode_pembayaran')->references('id')->on('metode_pembayaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
