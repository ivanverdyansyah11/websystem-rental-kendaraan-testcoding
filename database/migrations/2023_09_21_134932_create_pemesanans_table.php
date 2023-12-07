<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelanggans_id')->index();
            $table->bigInteger('sopirs_id')->index()->nullable();
            $table->bigInteger('kendaraans_id')->index();
            // $table->string('kode_pemesanan');
            // $table->string('total_harian');
            // $table->string('total_mingguan');
            // $table->string('total_bulanan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            // $table->date('tanggal_akhir_awal')->nullable();
            // $table->enum('status', ['booking', 'selesai booking', 'selesai']);
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
        Schema::dropIfExists('pemesanans');
    }
}
