<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KetBayar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aphbs',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
        Schema::table('cvs',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
        Schema::table('hibahs',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
        Schema::table('jual_belis',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
        Schema::table('nibs',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
        Schema::table('pecah_sertifikats',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
        Schema::table('penyertifikatans',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
        Schema::table('peta_bidangs',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
        Schema::table('pts',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
        Schema::table('royas',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
        Schema::table('siups',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
        Schema::table('waris',function(Blueprint $table){
            $table->enum('ket',['dp','lunas','bayar'])->default('bayar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aphbs',function(Blueprint $table){
            $table->dropColumn('ket');
        });
        Schema::table('cvs',function(Blueprint $table){
            $table->dropColumn('ket');
        });
        Schema::table('hibahs',function(Blueprint $table){
            $table->dropColumn('ket');
        });
        Schema::table('jual_belis',function(Blueprint $table){
            $table->dropColumn('ket');
        });
        Schema::table('nibs',function(Blueprint $table){
            $table->dropColumn('ket');
        });
        Schema::table('pecah_sertifikats',function(Blueprint $table){
            $table->dropColumn('ket');
        });
        Schema::table('penyertifikatans',function(Blueprint $table){
            $table->dropColumn('ket');
        });
        Schema::table('peta_bidangs',function(Blueprint $table){
            $table->dropColumn('ket');
        });
        Schema::table('pts',function(Blueprint $table){
            $table->dropColumn('ket');
        });
        Schema::table('royas',function(Blueprint $table){
            $table->dropColumn('ket');
        });
        Schema::table('siups',function(Blueprint $table){
            $table->dropColumn('ket');
        });
        Schema::table('waris',function(Blueprint $table){
            $table->dropColumn('ket');
        });
    }
}
