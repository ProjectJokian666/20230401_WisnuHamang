<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aphbs',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
        });
        Schema::table('cvs',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
        });
        Schema::table('hibahs',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
        });
        Schema::table('jual_belis',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
        });
        Schema::table('nibs',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
        });
        Schema::table('pecah_sertifikats',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
        });
        Schema::table('penyertifikatans',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
        });
        Schema::table('peta_bidangs',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
        });
        Schema::table('pts',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
        });
        Schema::table('royas',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
        });
        Schema::table('siups',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
        });
        Schema::table('waris',function(Blueprint $table){
            $table->string('bukti');
            $table->enum('pembayaran',['sudah','belum','konfirm'])->default('belum');
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
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
        Schema::table('cvs',function(Blueprint $table){
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
        Schema::table('hibahs',function(Blueprint $table){
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
        Schema::table('jual_belis',function(Blueprint $table){
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
        Schema::table('nibs',function(Blueprint $table){
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
        Schema::table('pecah_sertifikats',function(Blueprint $table){
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
        Schema::table('penyertifikatans',function(Blueprint $table){
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
        Schema::table('peta_bidangs',function(Blueprint $table){
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
        Schema::table('pts',function(Blueprint $table){
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
        Schema::table('royas',function(Blueprint $table){
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
        Schema::table('siups',function(Blueprint $table){
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
        Schema::table('waris',function(Blueprint $table){
            $table->dropColumn('bukti');
            $table->dropColumn('pembayaran');
        });
    }
}
