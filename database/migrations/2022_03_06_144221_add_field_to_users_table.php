<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik_ktp')->after('no_hp')->unique();
            $table->string('avatar')->after('no_hp')->nullable();
            $table->string('alamat')->after('no_hp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nik_ktp');
            $table->dropColumn('avatar');
            $table->dropColumn('alamat');
        });
    }
}
