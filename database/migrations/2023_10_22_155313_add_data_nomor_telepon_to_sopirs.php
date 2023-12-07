<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataNomorTeleponToSopirs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sopirs', function (Blueprint $table) {
            $table->enum('data_nomor_telepon', ['benar', 'salah']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sopirs', function (Blueprint $table) {
            //
        });
    }
}
