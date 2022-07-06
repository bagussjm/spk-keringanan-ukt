@extends('layout.app')

@section('judul_halaman', 'Data Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class=" card-title float-left col-sm-10">
                        Data Kriteria
                    </h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center" width="50">No</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kriteria as $val)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $val->nama_krite }}</td>
                                    <td>{{ ucfirst($val->jenis_kriteria) }}</td>
                                    <td>{{ $val->bobot }}</td>
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
