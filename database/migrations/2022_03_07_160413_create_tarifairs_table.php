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
        Schema::create('tarifairs', function (Blueprint $table) {
            $table->id();
            $table->enum('kelompok_pelanggan',['Sosial','Rumah Tangga A','Rumah Tangga B','Dinas Instansi','Niaga','Industri']);
            $table->string('hargapemakaian');
            $table->string('biayapemeliharaan');
            $table->string('biayaadministrasi');
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
        Schema::dropIfExists('tarifairs');
    }
};
