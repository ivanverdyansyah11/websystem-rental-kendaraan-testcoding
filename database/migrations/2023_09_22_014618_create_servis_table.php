<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kendaraans_id')->index();
            $table->date('tanggal_servis');
            $table->string('kilometer_sebelum');
            $table->string('kilometer_setelah');
            $table->enum('air_accu', ['ada', 'tidak ada', 'kosong']);
            $table->enum('air_waiper', ['ada', 'tidak ada', 'kosong']);
            $table->enum('ban', ['ada', 'tidak ada', 'kosong']);
            $table->enum('oli', ['ada', 'tidak ada', 'kosong']);
            $table->text('total_bayar')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servis');
    }
}
