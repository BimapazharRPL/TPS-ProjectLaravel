<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statistiks', function (Blueprint $table) {
            $table->id();
            $table->integer('pengurus')->nullable();
            $table->integer('pelanggan')->nullable();
            $table->integer('sudah_bayar')->nullable();
            $table->integer('belum_bayar')->nullable();
            $table->integer('pengumpulan_S')->nullable();
            $table->integer('residu_S')->nullable();
            $table->integer('perusahaan')->nullable();
            $table->integer('rumah')->nullable();
            $table->integer('kantor')->nullable();
            $table->integer('toko')->nullable();
            $table->integer('warung')->nullable();
            $table->integer('sekolah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistiks');
    }
};
