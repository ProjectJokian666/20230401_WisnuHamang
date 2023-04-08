<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WarisTemporary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waris_temps', function (Blueprint $table) {
            $table->id();
            $table->string('idTrx');
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKtpAhliWaris');
            $table->string('fcKkAhliWaris');
            $table->string('suratPernyataan');
            $table->string('suratKematian');
            $table->string('sertifikatAsli');
            $table->string('pbbTerbaru');
            $table->string('fotoLokasi');
            $table->string('koordinatLokasi');
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
        Schema::dropIfExists('waris_temps');
    }
}
