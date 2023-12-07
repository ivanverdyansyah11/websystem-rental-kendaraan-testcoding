<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenis_kendaraans_id')->index();
            $table->bigInteger('brand_kendaraans_id')->index();
            $table->bigInteger('seri_kendaraans_id')->index();
            $table->bigInteger('kategori_kilometer_kendaraans_id')->index();
            $table->string('foto_kendaraan');
            $table->string('stnk_nama');
            $table->string('nomor_plat');
            $table->string('kilometer');
            $table->string('kilometer_saat_ini');
            $table->string('tarif_sewa_hari');
            $table->string('tarif_sewa_minggu');
            $table->string('tarif_sewa_bulan');
            $table->string('tahun_pembuatan');
            $table->date('tanggal_pembelian');
            $table->string('warna');
            $table->string('nomor_rangka');
            $table->string('nomor_mesin');
            $table->enum('status', ['ready', 'booking', 'dipesan', 'servis']);
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
        Schema::dropIfExists('kendaraans');
    }
}
