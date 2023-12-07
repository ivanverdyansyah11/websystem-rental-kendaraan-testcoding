<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSopirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sopirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('nomor_telepon')->nullable();
            $table->string('nomor_ktp')->nullable();
            $table->string('nomor_sim')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('foto_sim')->nullable();
            $table->text('alamat');
            $table->enum('data_ktp', ['benar', 'salah']);
            $table->enum('data_sim', ['benar', 'salah']);
            $table->enum('status', ['ada', 'tidak ada']);
            $table->enum('kelengkapan_ktp', ['lengkap', 'belum lengkap']);
            $table->enum('kelengkapan_sim', ['lengkap', 'belum lengkap']);
            $table->enum('kelengkapan_nomor_telepon', ['lengkap', 'belum lengkap']);
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
        Schema::dropIfExists('sopirs');
    }
}
