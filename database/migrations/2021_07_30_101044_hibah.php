<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hibah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hibahs', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKtpPenerima');
            $table->string('fcKtpPeneriman')->default('benar');
            $table->string('fcKtpPemberi');
            $table->string('fcKtpPemberin')->default('benar');
            $table->string('fcKkPenerima');
            $table->string('fcKkPeneriman')->default('benar');
            $table->string('fcKkPemberi');
            $table->string('fcKkPemberin')->default('benar');
            $table->string('bukuNikahPemberi')->nullable();
            $table->string('bukuNikahPemberin')->default('benar');
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
        Schema::dropIfExists('hibahs');
    }
}
