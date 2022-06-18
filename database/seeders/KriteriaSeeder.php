<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultCriteria = [
            [
                'nama_kriteria' => 'Terdampak Covid 19',
                'jenis_kriteria' => 'benefit',
                'bobot' => 0.3,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'nama_kriteria' => 'Penghasilan Orangtua',
                'jenis_kriteria' => 'cost',
                'bobot' => 0.25,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'nama_kriteria' => 'Jumlah Tanggungan',
                'jenis_kriteria' => 'benefit',
                'bobot' => 0.25,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'nama_kriteria' => 'Golongan UKT',
                'jenis_kriteria' => 'benefit',
                'bobot' => 0.2,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ]
        ];

        Kriteria::insert($defaultCriteria);
    }
}
