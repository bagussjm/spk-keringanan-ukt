<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganTerdampakCovid extends Model
{
    use HasFactory;

    protected $table = 'keterangan_terdampak_covid';

    protected $fillable = [
        'id_kriteria',
        'id_mahasiswa',
        'keterangan_terdampak',
        'nilai_terdampak',
    ];

    public static $criteriaWeight = 0.3;

    public static function getTerdampakOptions()
    {
        return ['PHK', 'Orangtua Meninggal', 'Penurunan Pendapatan'];
    }

    public function getFuzzyValueAttribute()
    {
        $valueRule = [
            'Orangtua Meninggal' => 3,
            'PHK' => 2,
            'Penurunan Pendapatan' => 1
        ];

        return $valueRule[$this->keterangan_terdampak];
    }

    public static function setFuzzyValueAttribute($value)
    {
        $valueRule = [
            'Orangtua Meninggal' => 3,
            'PHK' => 2,
            'Penurunan Pendapatan' => 1
        ];

        return $valueRule[$value];
    }

    public function mahasiwa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id')->withDefault([
            'id' => null,
            'nama_mhs' => null,
            'nim_mhs' => null,
            'keterangan_mhs' => null,
            'created_at' => null,
            'updated_at' => null,
        ]);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id')->withDefault([
            'id' => null,
            'nama_kriteria' => null,
            'jenis_kriteria' => null,
            'bobot' => null,
            'created_at' => null,
            'updated_at' => null,
        ]);
    }

}
