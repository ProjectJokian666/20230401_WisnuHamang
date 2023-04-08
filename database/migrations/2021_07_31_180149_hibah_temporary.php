<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HibahTemporary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hibah_temps', function (Blueprint $table) {
            $table->id();
            $table->string('idTrx');
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKtpPenerima');
            $table->string('fcKtpPemberi');
            $table->string('fcKkPenerima');
            $table->string('fcKkPemberi');
            $table->string('bukuNikahPemberi')->nullable();
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
        Schema::dropIfExists('hibah_temps');
    }
}
