<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $mahasiswa = Mahasiswa::count();
        $kriteria = Kriteria::count();
        return view('dashboard.index', compact('mahasiswa', 'kriteria'));
    }
}
