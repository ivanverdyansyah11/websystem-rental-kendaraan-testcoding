<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seri_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenis_kendaraans_id')->index();
            $table->bigInteger('brand_kendaraans_id')->index();
            $table->string('nomor_seri');
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
        Schema::dropIfExists('seri_kendaraans');
    }
}
