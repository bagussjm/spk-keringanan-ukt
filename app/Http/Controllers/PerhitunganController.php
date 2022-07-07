<?php

namespace App\Http\Controllers;

use App\Http\Resources\MooraDecisionMatrixResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{

    public function index()
    {
        $mahasiswa = Mahasiswa::with([
            'keteranganTerdampak',
            'penghasilanOrangtua',
            'golonganUkt',
            'jumlahTanggungan'
        ])->get();

        $mooraDecisionMatrix = MooraDecisionMatrixResource::collection($mahasiswa);

        $normalizedDecisionMatrix = MooraDecisionMatrixResource::normalizeDecisionMatrixValue($mooraDecisionMatrix);

        $weightedNormalizedDecisionMatrix = MooraDecisionMatrixResource::weightedNormalizedDecisionMatrixValue($normalizedDecisionMatrix);

        $optimizedMooraValue = MooraDecisionMatrixResource::optimizeValue($weightedNormalizedDecisionMatrix);

//        return response()->json($optimizedMooraValue);
        $rankOptimizedMooraValue = collect($optimizedMooraValue)->sortByDesc('yi_value')->values()->all();
//        dd($rankOptimizedMooraValue);
        return view('perhitungan.index',
            compact('mooraDecisionMatrix', 'normalizedDecisionMatrix', 'weightedNormalizedDecisionMatrix', 'rankOptimizedMooraValue')
        );
    }

    public function pilihan(Request $request)
    {

        $hitung = $request->has('jumlah_hitung') ? $request->jumlah_hitung : false;

        $mahasiswa = Mahasiswa::with([
            'keteranganTerdampak',
            'penghasilanOrangtua',
            'golonganUkt',
            'jumlahTanggungan'
        ])->get();

        if ($hitung){
           if ((int)$hitung > 0){
               $mahasiswa = Mahasiswa::with([
                   'keteranganTerdampak',
                   'penghasilanOrangtua',
                   'golonganUkt',
                   'jumlahTanggungan'
               ])->limit((int)$hitung)->get();
           }
        }


        $mooraDecisionMatrix = MooraDecisionMatrixResource::collection($mahasiswa);

        $normalizedDecisionMatrix = MooraDecisionMatrixResource::normalizeDecisionMatrixValue($mooraDecisionMatrix);

        $weightedNormalizedDecisionMatrix = MooraDecisionMatrixResource::weightedNormalizedDecisionMatrixValue($normalizedDecisionMatrix);

        $optimizedMooraValue = MooraDecisionMatrixResource::optimizeValue($weightedNormalizedDecisionMatrix);

//        return response()->json($optimizedMooraValue);
        $rankOptimizedMooraValue = collect($optimizedMooraValue)->sortByDesc('yi_value')->values()->all();
//        dd($rankOptimizedMooraValue);
        return view('perhitungan.penilaian',
            compact('mooraDecisionMatrix', 'normalizedDecisionMatrix',
                'weightedNormalizedDecisionMatrix', 'rankOptimizedMooraValue',
                'hitung'
            )
        );
    }
}
