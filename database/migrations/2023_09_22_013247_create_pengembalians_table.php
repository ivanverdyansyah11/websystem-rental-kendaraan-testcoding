<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelepasan_pemesanans_id')->index();
            $table->string('foto_pembayaran');
            $table->enum('jenis_pembayaran', ['lunas', 'dp', 'belum bayar']);
            $table->string('total_bayar')->nullable();
            $table->enum('metode_bayar', ['transfer bank', 'internet banking', 'mobile banking', 'virtual account', 'online credit card', 'rekening bersama', 'payPal', 'e-money'])->nullable();
            $table->date('tanggal_kembali');
            $table->string('kilometer_kembali');
            $table->string('bensin_kembali');
            $table->string('ketepatan_waktu');
            $table->string('terlambat')->nullable();
            $table->enum('sarung_jok', ['ada', 'tidak ada', 'kosong']);
            $table->enum('karpet', ['ada', 'tidak ada', 'kosong']);
            $table->enum('kondisi_kendaraan', ['baik', 'rusak ringan', 'rusak berat']);
            $table->enum('ban_serep', ['ada', 'tidak ada', 'kosong'])->nullable();
            $table->string('biaya_tambahan')->nullable();
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
        Schema::dropIfExists('pengembalians');
    }
}
