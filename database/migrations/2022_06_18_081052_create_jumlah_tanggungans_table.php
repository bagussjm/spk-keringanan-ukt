<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJumlahTanggungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jumlah_tanggungan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kriteria')->comment('relasi ke tabel kriteria');
            $table->foreignId('id_mahasiswa')->comment('relasi ke tabel mahasiswa');
            $table->integer('keterangan_jumlah_tanggungan')->default(0);
            $table->integer('nilai_tanggungan')->default(0);
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
        Schema::dropIfExists('jumlah_tanggungan');
    }
}
