@extends('layout.app')

@section('judul_halaman', 'Data Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Tentukan Jumlah Mahasiswa Yang Akan Diranking
                </div>

                <div class="card-body">
                    <form action="{{ route('perhitungan.pilihan') }}" method="get" class="form-row form">
                        @method('GET')
                        <div class="col-10 form-group">
                            <label for="pilih" class="col-form-label">Jumlah Mahasiswa</label>
                            <input type="number" class="form-control" name="jumlah_hitung" @if ($hitung) value="{{ $hitung }}" @endif>
                        </div>

                        <div class="col-1 form-group ">
                            <label for="" class="col-form-label d-block">.</label>
                            <button type="submit" class="btn btn-primary float-right">
                                HITUNG
                            </button>
                        </div>

                        <div class="col-1 form-group ">
                            <label for="" class="col-form-label d-block">.</label>
                            <a href="{{ route('perhitungan.pilihan') }}" type="submit" class="btn btn-light float-right">
                                RESET
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- table detail perhitungan akan muncul jika sudah submit total hitung --}}
        @if ($hitung)
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Matriks Keputusan Moora
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE</th>
                                <th>NAMA</th>
                                <th>K1</th>
                                <th>K2</th>
                                <th>K3</th>
                                <th>K4</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(collect($mooraDecisionMatrix)->toArray() as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ 'A'.$loop->iteration }}</td>
                                <td>{{ $value['nama'] }}</td>
                                <td>{{ $value['k1_value'] }}</td>
                                <td>{{ $value['k2_value'] }}</td>
                                <td>{{ $value['k3_value'] }}</td>
                                <td>{{ $value['k4_value'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Normalisasi Matriks Keputusan
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>KODE</th>
                            <th>NAMA</th>
                            <th>K1</th>
                            <th>K2</th>
                            <th>K3</th>
                            <th>K4</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($normalizedDecisionMatrix as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ 'A'.$loop->iteration }}</td>
                                <td>{{ $value['nama'] }}</td>
                                <td>{{ $value['k1_normalized_value'] }}</td>
                                <td>{{ $value['k2_normalized_value'] }}</td>
                                <td>{{ $value['k3_normalized_value'] }}</td>
                                <td>{{ $value['k4_normalized_value'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Hasil Matriks Ternomalisasi Dikali Bobot Kiteria
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>KODE</th>
                            <th>NAMA</th>
                            <th>K1 (0.3)</th>
                            <th>K2 (0.25)</th>
                            <th>K3 (0.25)</th>
                            <th>K4 (0.2)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($weightedNormalizedDecisionMatrix as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ 'A'.$loop->iteration }}</td>
                                <td>{{ $value['nama'] }}</td>
                                <td>{{ $value['k1_weighted_normalized_matrix_value'] }}</td>
                                <td>{{ $value['k2_weighted_normalized_matrix_value'] }}</td>
                                <td>{{ $value['k3_weighted_normalized_matrix_value'] }}</td>
                                <td>{{ $value['k4_weighted_normalized_matrix_value'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Nilai Optimasi Moora (Max-Min)
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>KODE</th>
                            <th>NAMA</th>
                            <th>Maximum (k1+k3+k4)</th>
                            <th>Minimum (k2)</th>
                            <th>Yi (Max-Min)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rankOptimizedMooraValue as $value)
                            <tr>
                                <td>
                                    <span class="badge badge-light">
                                         {{ $loop->iteration }}
                                    </span>
                                    urutan prioritas
                                </td>
                                <td>{{ 'A'.$value['id'] }}</td>
                                <td>{{ $value['nama'] }}</td>
                                <td>
                                    <span class="badge badge-soft-success">
                                        {{ $value['maximum_value'] }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-soft-danger">
                                        {{ $value['minimum_value'] }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-soft-primary">
                                        {{ $value['yi_value'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
