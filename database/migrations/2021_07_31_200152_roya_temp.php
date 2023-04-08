<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoyaTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roya_temps', function (Blueprint $table) {
            $table->id();
            $table->string('idTrx');
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKtp');
            $table->string('fcKk');
            $table->string('suratPermohonan');
            $table->string('suratLunas');
            $table->string('ktpPetugas');
            $table->string('sertifikatAsli');
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
        Schema::dropIfExists('roya_temps');
    }
}
