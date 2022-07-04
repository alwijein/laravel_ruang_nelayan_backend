<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTangkapanHasPengerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tangkapan_has_pengerjaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hasil_tangkapan')->nullable();
            $table->foreignId('id_jasa_pengerjaan_ikan')->nullable();
            $table->timestamps();
        });

        Schema::table('tangkapan_has_pengerjaan', function($table) {
            $table->foreign('id_hasil_tangkapan')->references('id')->on('hasil_tangkapan')->onDelete('cascade');
            $table->foreign('id_jasa_pengerjaan_ikan')->references('id')->on('jasa_pengerjaan_ikan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tangkapan_has_pengerjaan');
    }
}
