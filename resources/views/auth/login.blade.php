<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from myrathemes.com/xeloro/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2020 03:43:06 GMT -->

<head>
    <meta charset="utf-8"/>
    <title> Sistem Informasi Pendukung Keputusan Penurunan UKT - UIN SUSKA RIAU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="MyraStudio" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('template/assets/images/icon_bptp.jpg') }}">

    <!-- App css -->
    <link href="{{ asset('template/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('template/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('template/assets/css/theme.min.css') }}" rel="stylesheet" type="text/css"/>
</head>

<body>
<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center min-vh-100">
                    <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center mb-5">
                                        <a href="index.html" class="text-dark font-size-22 font-family-secondary">
                                            <i class="fa fa-desktop"></i> <b>SPK PENURUNAN UKT</b>
                                        </a>
                                    </div>
                                    <h1 class="h5 mb-1">Silahkan Login</h1>
                                    <p class="text-muted mb-4">Masukkan Email dan Kata Sandi untuk Login</p>
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close"
                                                    data-dismiss="alert">×
                                            </button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    <form class="user" action="{{ route('auth.login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email"
                                                   class="form-control form-control-user @error('email') is-invalid @enderror"
                                                   id="email" placeholder="Masukkan Email" name="email"
                                                   value="{{ old('nip') }}">
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                   class="form-control form-control-user @error('password') is-invalid @enderror"
                                                   id="password" placeholder="Masukkan Kata Sandi" name="password">
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- <a href="{{ url('beranda') }}"
                                            class="btn btn-success btn-block waves-effect waves-light"> Log In </a> --}}
                                        <button type="submit"
                                                class="btn btn-success btn-block waves-effect waves-light">
                                            LOGIN
                                        </button>

                                    </form>

                                </div> <!-- end .padding-5 -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- end .w-100 -->
                </div> <!-- end .d-flex -->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- jQuery  -->
<script src="{{ asset('template/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/assets/js/metismenu.min.js') }}"></script>
<script src="{{ asset('template/assets/js/waves.js') }}"></script>
<script src="{{ asset('template/assets/js/simplebar.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('landing/assets/js/theme.js') }}"></script>

</body>


<!-- Mirrored from myrathemes.com/xeloro/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2020 03:43:06 GMT -->

</html>
