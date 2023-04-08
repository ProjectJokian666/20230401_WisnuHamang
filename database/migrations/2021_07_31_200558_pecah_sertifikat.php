<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PecahSertifikat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pecah_sertifikats', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKtp');
            $table->string('fcKk');
            $table->string('sertifikatAsli');
            $table->string('pbbTerbaru');
            $table->string('fotoLokasi');
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
        Schema::dropIfExists('pecah_sertifikats');
    }
}
