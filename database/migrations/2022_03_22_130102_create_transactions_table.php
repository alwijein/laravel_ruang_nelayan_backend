<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_users')->nullable();
            $table->foreignId('id_jasa_pengantaran')->nullable();

            $table->string('alamat')->nullable();
            $table->string('pembayaran')->default('MANUAL');
            $table->float('total_pembayaran')->default(0);
            $table->float('ongkos_kirim')->default(0);
            $table->float('total_jasa')->default(0);

            $table->string('status')->default('MENUNGGU KONFIRMASI');
            $table->timestamps();
        });

        Schema::table('transactions', function($table) {
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_jasa_pengantaran')->references('id')->on('jasa_pengantaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
