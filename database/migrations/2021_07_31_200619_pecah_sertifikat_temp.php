<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PecahSertifikatTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pecah_sertifikat_temps', function (Blueprint $table) {
            $table->id();
            $table->string('idTrx');
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKtp');
            $table->string('fcKk');
            $table->string('sertifikatAsli');
            $table->string('pbbTerbaru');
            $table->string('fotoLokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pecah_sertifikat_temps');
    }
}
