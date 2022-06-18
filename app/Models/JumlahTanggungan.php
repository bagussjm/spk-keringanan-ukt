<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahTanggungan extends Model
{
    use HasFactory;

    protected $table = 'jumlah_tanggungan';

    protected $fillable = [
        'id_kriteria',
        'id_mahasiswa',
        'keterangan_jumlah_tanggungan',
        'nilai_tanggungan',
    ];

    public function getFuzzyValueAttribute()
    {
        if ($this->keterangan_jumlah_tanggungan){
            if ($this->keterangan_jumlah_tanggungan <= 1){
                return 20;
            }elseif ($this->keterangan_jumlah_tanggungan > 1 && $this->keterangan_jumlah_tanggungan <=4){
                return 30;
            }elseif($this->keterangan_jumlah_tanggungan > 4){
                return 40;
            }
        }
        return 0;
    }

    public static function setFuzzyValueAttribute($value)
    {
        if ($value){
            if ($value <= 1){
                return 20;
            }elseif ($value > 1 && $value <=4){
                return 30;
            }elseif($value > 4){
                return 40;
            }
        }
        return 0;
    }

    public function mahasiswa()
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
