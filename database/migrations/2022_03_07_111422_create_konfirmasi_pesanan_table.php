<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfirmasiPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi_pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rincian')->nullable();
            $table->foreignId('id_pengantaran')->nullable();
            $table->string('status')->default('PENDING');
            $table->timestamps();
        });

        Schema::table('konfirmasi_pesanan', function($table) {
            $table->foreign('id_rincian')->references('id')->on('rincian')->onDelete('cascade');
            $table->foreign('id_pengantaran')->references('id')->on('pengantaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfirmasi_pesanan');
    }
}
