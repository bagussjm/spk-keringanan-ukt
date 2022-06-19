<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenghasilanOrangtua extends Model
{
    use HasFactory;

    protected $table = 'penghasilan_orangtua';

    protected $fillable = [
        'id_kriteria',
        'id_mahasiswa',
        'keterangan_penghasilan',
        'nilai_penghasilan',
    ];

    protected $appends = [
        'formatted_penghasilan'
    ];

    public function getFuzzyValueAttribute()
    {
        if ($this->keterangan_penghasilan){
            if ($this->keterangan_penghasilan < 2500000){
                return 40;
            }elseif ($this->keterangan_penghasilan >= 2501000 && $this->keterangan_penghasilan < 5000000){
                return 30;
            }elseif($this->keterangan_penghasilan > 5000000){
                return 20;
            }
        }
        return 0;
    }

    public function getFormattedPenghasilanAttribute()
    {
        return "Rp " . number_format($this->keterangan_penghasilan,2,',','.');
    }

    public static function setFuzzyValueAttribute($value)
    {
        if ($value){
            if ($value < 2500000){
                return 40;
            }elseif ($value >= 2501000 && $value < 5000000){
                return 30;
            }elseif($value > 5000000){
                return 20;
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
