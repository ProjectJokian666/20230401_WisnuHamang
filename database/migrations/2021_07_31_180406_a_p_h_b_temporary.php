<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class APHBTemporary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aphb_temps', function (Blueprint $table) {
            $table->id();
            $table->string('idTrx');
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKtpAhliWaris');
            $table->string('fcKtpPenerima');
            $table->string('fcKkAhliWaris');
            $table->string('fcKkPenerima');
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
        Schema::dropIfExists('aphb_temps');
    }
}
