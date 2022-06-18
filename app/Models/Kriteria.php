<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';

    protected $fillable = [
        'nama_kriteria',
        'jenis_kriteria',
        'bobot',
    ];

    public function keteranganTerdampak()
    {
        return $this->hasMany(KeteranganTerdampakCovid::class, 'id_kriteria', 'id');
    }

    public function penghasilanOrangtua()
    {
        return $this->hasMany(PenghasilanOrangtua::class, 'id_kriteria', 'id');
    }

    public function golonganUkt()
    {
        return $this->hasMany(GolonganUkt::class, 'id_kriteria', 'id');
    }

    public function jumlahTanggungan()
    {
        return $this->hasMany(JumlahTanggungan::class, 'id_kriteria', 'id');
    }
}
