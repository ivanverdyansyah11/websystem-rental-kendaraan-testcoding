<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenambahanSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penambahan_sewas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelepasan_pemesanans_id')->index();
            $table->bigInteger('kendaraans_id')->index();
            $table->string('jumlah_hari');
            $table->string('total_biaya');
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
        Schema::dropIfExists('penambahan_sewas');
    }
}
