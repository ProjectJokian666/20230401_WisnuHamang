<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Roya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('royas', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKtp');
            $table->string('fcKtpn')->default('benar');
            $table->string('fcKk');
            $table->string('fcKkn')->default('benar');
            $table->string('suratPermohonan');
            $table->string('suratPermohonann')->default('benar');
            $table->string('suratLunas');
            $table->string('suratLunasn')->default('benar');
            $table->string('ktpPetugas');
            $table->string('ktpPetugasn')->default('benar');
            $table->string('sertifikatAsli');
            $table->string('sertifikatAslin')->default('benar');
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
        Schema::dropIfExists('royas');
    }
}
