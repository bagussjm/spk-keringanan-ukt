@extends('layout.app')

@section('judul_halaman', 'Data Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class=" card-title float-left col-sm-10">
                        Tambah Data Mahasiswa
                    </h4>
                </div>
                <div class="card-body p-3">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form action="{{ route('mahasiswa.store') }}" method="POST">
                                {{ csrf_field() }}
                                @method('POST')
                                <p class="text-muted">DATA MAHASISWA</p>
                                <div class="dropdown-divider"></div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="nama">Nama <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                               name="nama" id="nama" value="{{ old('nama') }}" required>
                                        @error('nama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="nim">NIM <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control @error('nim') is-invalid @enderror"
                                               name="nim" value="{{ old('nim') }}" id="nim" required>
                                        @error('nim')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="keterangan">Keterangan</label>
                                    <div class="col-md-9">
                                        <textarea name="keterangan" id="keterangan" class="form-control"
                                                  cols="5" rows="8"></textarea>
                                        @error('keterangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <p class="text-muted mt-2">DATA TAMBAHAN</p>
                                <div class="dropdown-divider"></div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="golongan_ukt">Golongan UKT <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select  class="form-control @error('golongan_ukt') is-invalid @enderror"
                                               name="golongan_ukt" id="golongan_ukt" required>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        @error('golongan_ukt')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="penghasilan_orangtua">Penghasilan Orang Tua (Rp) <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control money @error('penghasilan_orangtua') is-invalid @enderror"
                                                 name="penghasilan_orangtua" id="penghasilan_orangtua" required>
                                        @error('penghasilan_orangtua')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="tanggungan_orangtua">Jumlah Tanggungan Orang Tua <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control @error('tanggungan_orangtua') is-invalid @enderror"
                                               name="tanggungan_orangtua" id="tanggungan_orangtua" required>
                                        @error('tanggungan_orangtua')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="keterangan_terdampak_covid">Keterangan Terdampak Covid19 <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select  class="form-control @error('keterangan_terdampak_covid') is-invalid @enderror"
                                                 name="keterangan_terdampak_covid" id="keterangan_terdampak_covid" required>
                                            @foreach(\App\Models\KeteranganTerdampakCovid::getTerdampakOptions() as $option)
                                                <option value="{{ $option }}"> {{ $option }} </option>
                                            @endforeach
                                        </select>
                                        @error('keterangan_terdampak_covid')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-3" for=""></label>
                                    <div class="col-md-9">
                                        <button class="btn btn-primary" type="submit">SIMPAN</button>
                                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-light ml-3">BATALKAN</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
