<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalHarianMingguanBulananToPemesanans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->string('kode_pemesanan');
            $table->string('total_harian');
            $table->string('total_mingguan');
            $table->string('total_bulanan');
            $table->date('tanggal_akhir_awal')->nullable();
            $table->enum('status', ['booking', 'selesai booking', 'selesai']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            //
        });
    }
}
