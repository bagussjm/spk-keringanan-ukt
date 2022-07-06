@extends('layout.app')

@section('judul_halaman', 'Halaman Utama')

@section('content')
    <div class="row">
        <div class="col-12">
            <div role="alert" class="alert alert-info alert-dismissible fade show"><strong>
                    <center>SELAMAT DATANG DI SISTEM INFORMASI PENDUKUNG KEPUTUSAN PENURUNAN UKT UIN SUSKA RIAU</center>
                </strong>
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
        </div>

        <div class="col-md-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4"><h5 class="card-title mb-0">Jumlah Mahasiswa</h5></div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $mahasiswa }}
                            </h2>
                        </div>
                        <div class="col-4 text-right"></div>
                    </div>
                    <div class="progress shadow-sm" style="height: 5px;">
                        <div role="progressbar" class="progress-bar bg-success" style="width: 57%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4"><h5 class="card-title mb-0">Jumlah Kriteria</h5></div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $kriteria }}
                            </h2>
                        </div>
                        <div class="col-4 text-right"></div>
                    </div>
                    <div class="progress shadow-sm" style="height: 5px;">
                        <div role="progressbar" class="progress-bar bg-danger" style="width: 57%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
