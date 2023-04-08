<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JualBeli extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jual_belis', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKtpPenjual');
            $table->string('fcKtpPenjualn')->default('benar');
            $table->string('fcKtpPembeli');
            $table->string('fcKtpPembelin')->default('benar');
            $table->string('fcKkPenjual');
            $table->string('fcKkPenjualn')->default('benar');
            $table->string('fcKkPembeli');
            $table->string('fcKkPembelin')->default('benar');
            $table->string('bukuNikahPenjual')->nullable();
            $table->string('bukuNikahPenjualn')->default('benar')->nullable();
            $table->string('fcSertifikat');
            $table->string('fcSertifikatn')->default('benar');
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
        Schema::dropIfExists('jual_belis');
    }
}
