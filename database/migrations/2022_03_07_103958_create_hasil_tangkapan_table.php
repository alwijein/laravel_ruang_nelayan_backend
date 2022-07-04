<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilTangkapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_tangkapan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->nullable();
            $table->string('nama_ikan');
            $table->foreignId('id_jenis_ikan')->nullable();
            $table->integer('jumlah');
            $table->float('harga');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        Schema::table('hasil_tangkapan', function($table) {
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_jenis_ikan')->references('id')->on('jenis_ikan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_tangkapan');
    }
}
