@extends('layout.app')

@section('judul_halaman', 'Data Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class=" card-title float-left col-sm-10">
                        Data Mahasiswa
                    </h4>

                    <a href="{{ route('mahasiswa.create') }}">
                        <button class="btn btn-sm btn-primary float-right">
                            <i class="mdi mdi-plus"></i> TAMBAH DATA
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center" width="50">No</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Golongan UKT</th>
                                    <th>Penghasilan <br> Orangtua</th>
                                    <th>Jumlah Tanggungan <br> Orangtua</th>
                                    <th>Keterangan Terdampak <br> Covid19</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mahasiswa as $mhs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mhs->nama_mhs }} <br> {{ $mhs->nim_mhs }}</td>
                                        <td>{{ $mhs->keterangan_mhs }}</td>
                                        <td>{{ $mhs->golonganUkt->keterangan_golongan_ukt }}</td>
                                        <td>{{ $mhs->penghasilanOrangtua->formatted_penghasilan }}</td>
                                        <td>{{ $mhs->jumlahTanggungan->keterangan_jumlah_tanggungan }}</td>
                                        <td>{{ $mhs->keteranganTerdampak->keterangan_terdampak }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
