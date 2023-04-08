<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeryertifikatanTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyertifikatan_temps', function (Blueprint $table) {
            $table->id();
            $table->string('idTrx');
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcSurat');
            $table->string('fcKtpPemohon');
            $table->string('fcKkPemohon');
            $table->string('kematian');
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
        Schema::dropIfExists('penyertifikatan_temps');
    }
}
