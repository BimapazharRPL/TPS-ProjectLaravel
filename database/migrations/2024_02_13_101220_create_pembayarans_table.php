<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email_P');
            $table->string('asal');
            $table->integer('total_pembayaran');
            $table->string('bulan_dipilih');
            $table->string('tanggal');
            $table->string('tahun');
            $table->enum('status', ['unpaid','paid']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}