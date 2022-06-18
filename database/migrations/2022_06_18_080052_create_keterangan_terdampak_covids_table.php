<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganTerdampakCovidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_terdampak_covid', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kriteria')->comment('relasi ke tabel kriteria');
            $table->foreignId('id_mahasiswa')->comment('relasi ke tabel mahasiswa');
            $table->enum('keterangan_terdampak', ['Orangtua Meninggal', 'PHK', 'Penurunan Pendapatan']);
            $table->integer('nilai_terdampak')->default(0);
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
        Schema::dropIfExists('keterangan_terdampak_covid');
    }
}
