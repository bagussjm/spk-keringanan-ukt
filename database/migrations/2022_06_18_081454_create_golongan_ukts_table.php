<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGolonganUktsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('golongan_ukt', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId('id_kriteria')->comment('relasi ke tabel kriteria');
            $table->foreignId('id_mahasiswa')->comment('relasi ke tabel mahasiswa');
            $table->enum('keterangan_golongan_ukt', ['1','2','3'])->default('1');
            $table->integer('nilai_golongan_ukt')->default(0);
            $table->id();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('golongan_ukt');
    }
}
