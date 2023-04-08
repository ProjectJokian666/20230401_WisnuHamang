<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SIUP extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siups', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('nik');
            $table->string('status');
            $table->string('fcKKPengurus1');
            $table->string('fcKtpPengurus1');
            $table->string('fcKKPengurus2');
            $table->string('fcKtpPengurus2');
            $table->string('npwp');
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
        Schema::dropIfExists('siups');
    }
}
