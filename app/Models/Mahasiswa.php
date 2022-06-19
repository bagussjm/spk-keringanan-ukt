<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nama_mhs',
        'nim_mhs',
        'keterangan_mhs',
    ];

    protected $attributes = [
        'keterangan_mhs' => ''
    ];

    public function keteranganTerdampak()
    {
        return $this->hasOne(KeteranganTerdampakCovid::class, 'id_mahasiswa', 'id')->withDefault([
            'id' => null,
            'id_kriteria' => null,
            'id_mahasiswa' => null,
            'keterangan_terdampak' => null,
            'nilai_terdampak' => null,
            'created_at' => null,
            'updated_at' => null,
        ]);
    }

    public function penghasilanOrangtua()
    {
        return $this->hasOne(PenghasilanOrangtua::class, 'id_mahasiswa', 'id')->withDefault([
            'id' => null,
            'id_kriteria' => null,
            'id_mahasiswa' => null,
            'keterangan_penghasilan' => null,
            'nilai_penghasilan' => null,
            'created_at' => null,
            'updated_at' => null,
        ]);
    }

    public function golonganUkt()
    {
        return $this->hasOne(GolonganUkt::class, 'id_mahasiswa', 'id')->withDefault([
            'id' => null,
            'id_kriteria' => null,
            'id_mahasiswa' => null,
            'keterangan_golongan_ukt' => null,
            'nilai_golongan_ukt' => null,
            'updated_at' => null,
            'created_at' => null,
        ]);
    }

    public function jumlahTanggungan()
    {
        return $this->hasOne(JumlahTanggungan::class, 'id_mahasiswa', 'id')->withDefault([
            'id' => null,
            'id_kriteria' => null,
            'id_mahasiswa' => null,
            'keterangan_jumlah_tanggungan' => null,
            'nilai_tanggungan' => null,
            'created_at' => null,
            'updated_at' => null,
        ]);
    }
}
