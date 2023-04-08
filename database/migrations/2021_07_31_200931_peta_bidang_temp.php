<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PetaBidangTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peta_bidang_temps', function (Blueprint $table) {
            $table->id();
            $table->string('idTrx');
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcSurat');
            $table->string('fcKtpPemohon');
            $table->string('fcKkPemohon');
            $table->string('pbbTerbaru');
            $table->string('fotoLokasi');
            $table->string('fotoPatok');
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
        Schema::dropIfExists('peta_bidang_temps');
    }
}
