<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SIUPTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siup_temps', function (Blueprint $table) {
            $table->id();
            $table->string('idTrx');
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKKPengurus1');
            $table->string('fcKtpPengurus1');
            $table->string('fcKKPengurus2');
            $table->string('fcKtpPengurus2');
            $table->string('npwp');
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
        Schema::dropIfExists('siup_temps');
    }
}
