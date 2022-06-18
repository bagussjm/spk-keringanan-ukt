<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghasilanOrangtuasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghasilan_orangtua', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kriteria')->comment('relasi ke tabel kriteria');
            $table->foreignId('id_mahasiswa')->comment('relasi ke tabel mahasiwa');
            $table->integer('keterangan_penghasilan')->default(0);
            $table->integer('nilai_penghasilan')->default(0);
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
        Schema::dropIfExists('penghasilan_orangtua');
    }
}
