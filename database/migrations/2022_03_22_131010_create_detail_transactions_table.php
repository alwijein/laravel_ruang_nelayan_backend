<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_users')->nullable();
            $table->foreignId('id_hasil_tangkapan')->nullable();
            $table->foreignId('id_transactions')->nullable();

            $table->bigInteger('quantity');
            $table->timestamps();
        });

        Schema::table('detail_transactions', function($table) {
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_hasil_tangkapan')->references('id')->on('hasil_tangkapan')->onDelete('cascade');
            $table->foreign('id_transactions')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transactions');
    }
}
