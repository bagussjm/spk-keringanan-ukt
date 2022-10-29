<?php

namespace App\Http\Controllers;

use App\Models\GolonganUkt;
use App\Models\JumlahTanggungan;
use App\Models\KeteranganTerdampakCovid;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\PenghasilanOrangtua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with([
            'keteranganTerdampak',
            'penghasilanOrangtua',
            'golonganUkt',
            'jumlahTanggungan'
        ])->get();

//        return response()->json($mahasiswa);

       return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $validator = Validator::make($request->all(),[
                'nama' => 'required',
                'nim' => 'required',
                'penghasilan_orangtua' => 'required',
                'golongan_ukt' => 'required',
                'tanggungan_orangtua' => 'required',
                'keterangan_terdampak_covid' => 'required'
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }


            $kriteria = Kriteria::all();
            $kriteriaTerdampakCovid = $kriteria->where('nama_kriteria', '=','Terdampak Covid 19')->first();
            $kriteriaPenghasilanOrangtua = $kriteria->where('nama_kriteria', '=','Penghasilan Orangtua')->first();
            $kriteriaJumlahTanggungan = $kriteria->where('nama_kriteria', '=','Jumlah Tanggungan')->first();
            $kriteriaGolonganUkt = $kriteria->where('nama_kriteria', '=','Golongan UKT')->first();

            $createdMhs = Mahasiswa::create([
                'nama_mhs' => $request->nama,
                'nim_mhs' => $request->nim,
                'keterangan_mhs' => $request->has('keterangan') ? $request->keterangan : ''
            ]);

            KeteranganTerdampakCovid::create([
                'id_kriteria' => $kriteriaTerdampakCovid ? $kriteriaTerdampakCovid['id'] : 0,
                'id_mahasiswa' => $createdMhs->id,
                'keterangan_terdampak' => $request->keterangan_terdampak_covid,
                'nilai_terdampak' => KeteranganTerdampakCovid::setFuzzyValueAttribute($request->keterangan_terdampak_covid),
            ]);

            $penghasilanOrangtua = (double)str_replace(',','', $request->penghasilan_orangtua);

            PenghasilanOrangtua::create([
                'id_kriteria' => $kriteriaPenghasilanOrangtua ? $kriteriaPenghasilanOrangtua['id'] : 0,
                'id_mahasiswa' => $createdMhs->id,
                'keterangan_penghasilan' => (int)round($penghasilanOrangtua),
                'nilai_penghasilan' => (int)round($penghasilanOrangtua),
            ]);

            JumlahTanggungan::create([
                'id_kriteria' => $kriteriaJumlahTanggungan ? $kriteriaJumlahTanggungan['id'] : 0,
                'id_mahasiswa' => $createdMhs->id,
                'keterangan_jumlah_tanggungan' => $request->tanggungan_orangtua,
                'nilai_tanggungan' => $request->tanggungan_orangtua,
            ]);

            GolonganUkt::create([
                'id_kriteria' => $kriteriaGolonganUkt ? $kriteriaGolonganUkt['id'] : 0,
                'id_mahasiswa' => $createdMhs->id,
                'keterangan_golongan_ukt' =>  $request->golongan_ukt,
                'nilai_golongan_ukt' => $request->golongan_ukt,
            ]);

            DB::commit();

            return redirect()->route('mahasiswa.index')->with('success', 'Berhasil Menambah Data Mahasiswa');
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', 'Ada Masalah Saat Menambah Data Mahasiswa');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
