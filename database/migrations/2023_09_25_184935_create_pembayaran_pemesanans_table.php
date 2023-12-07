<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelepasan_pemesanans_id')->index();
            $table->bigInteger('kendaraans_id')->index();
            $table->bigInteger('sopirs_id')->nullable();
            $table->string('foto_pembayaran');
            $table->string('waktu_sewa');
            $table->enum('jenis_pembayaran', ['lunas', 'dp', 'belum bayar']);
            $table->string('total_tarif_sewa');
            $table->string('total_bayar')->nullable();
            $table->enum('metode_bayar', ['transfer bank', 'internet banking', 'mobile banking', 'virtual account', 'online credit card', 'rekening bersama', 'payPal', 'e-money'])->nullable();
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
        Schema::dropIfExists('pembayaran_pemesanans');
    }
}
