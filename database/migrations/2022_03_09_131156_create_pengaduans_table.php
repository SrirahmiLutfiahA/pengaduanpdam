<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('status')->default('MENUNGGU VERIFIKASI');
            $table->string('keterangan');
            $table->string('fotoaduan');
            $table->string('balasanadmin');
            $table->date('tanggalselesai');
            $table->string('fotosebelum');
            $table->string('fotoproses');
            $table->string('fotoselesai');
            $table->timestamps();


            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
};
