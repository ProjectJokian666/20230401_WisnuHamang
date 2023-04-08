<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Waris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waris', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKtpAhliWaris');
            $table->string('fcKtpAhliWarisn')->default('benar');
            $table->string('fcKkAhliWaris');
            $table->string('fcKkAhliWarisn')->default('benar');
            $table->string('suratPernyataan');
            $table->string('suratPernyataann')->default('benar');
            $table->string('suratKematian');
            $table->string('suratKematiann')->default('benar');
            $table->string('sertifikatAsli');
            $table->string('sertifikatAslin')->default('benar');
            $table->string('pbbTerbaru');
            $table->string('pbbTerbarun')->default('benar');
            $table->string('fotoLokasi');
            $table->string('fotoLokasin')->default('benar');
            $table->string('koordinatLokasi');
            $table->string('koordinatLokasin')->default('benar');
            $table->enum('notif',['y','b'])->default('b');
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
        Schema::dropIfExists('waris');
    }
}
