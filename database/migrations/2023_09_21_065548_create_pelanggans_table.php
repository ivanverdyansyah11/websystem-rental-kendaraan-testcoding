<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('nomor_telepon')->nullable();
            $table->string('nomor_ktp')->nullable();
            $table->string('nomor_kk')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('foto_kk')->nullable();
            $table->text('alamat');
            $table->enum('data_ktp', ['benar', 'salah']);
            $table->enum('data_kk', ['benar', 'salah']);
            // $table->enum('data_nomor_telepon', ['benar', 'salah']);
            // $table->enum('status', ['ada', 'tidak ada']);
            $table->enum('kelengkapan_ktp', ['lengkap', 'belum lengkap']);
            $table->enum('kelengkapan_kk', ['lengkap', 'belum lengkap']);
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
        Schema::dropIfExists('pelanggans');
    }
}
