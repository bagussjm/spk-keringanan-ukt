<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganUkt extends Model
{
    use HasFactory;

    protected $table = 'golongan_ukt';

    protected $fillable = [
        'id_kriteria',
        'id_mahasiswa',
        'keterangan_golongan_ukt',
        'nilai_golongan_ukt',
    ];

    public function getFuzzyValueAttribute()
    {
        $valueRule = [
            '2' => 20,
            '3' => 30,
            '4' => 40,
            '5' => 50
        ];

        return $valueRule[$this->keterangan_golongan_ukt];
    }

    public static function setFuzzyValueAttribute($value){

        $valueRule = [
            '2' => 20,
            '3' => 30,
            '4' => 40,
            '5' => 50
        ];

        return $valueRule[$value];
    }

    public function mahasiwa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa','id')->withDefault([
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
