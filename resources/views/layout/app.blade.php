
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from myrathemes.com/xeloro/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2020 03:39:03 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Sistem Informasi Pendukung Keputusan Penurunan UKT - UIN SUSKA RIAU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="MyraStudio" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('template/assets/images/icon_bptp.jpg')}}">

    <!-- App css -->
    <link href="{{asset('template/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('template/assets/css/theme.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Plugins css -->
    <link href="{{asset('template/assets/plugins/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/assets/plugins/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/assets/plugins/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/assets/plugins/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .main-content{
            background-image: url("{{ url('landing/images/bg3.png') }}");
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
        }
    </style>
</head>

<body >

<div id="layout-wrapper">
    @include('layout.topbar')
    <!-- ========== Left Sidebar Start ========== -->
    @include('layout.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-6">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            @yield('page-title','')
                        </div>
                    </div>
                    <div class="col-6">
                        @yield('page-tool','')
                    </div>
                </div>
                @if(\Illuminate\Support\Facades\Session::has('alert'))
                    <div
                        class="alert alert-success bg-success alert-dismissible fade show animated bounceIn text-white"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-white">×</span>
                        </button>
                        <strong><i class="ion ion-md-checkmark-circle"></i> BERHASIL
                        </strong> {{ \Illuminate\Support\Facades\Session::get('alert','berhasil menjalankan operasi') }}
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Session::has('alert_update'))
                    <div
                        class="alert alert-warning bg-warning alert-dismissible fade show animated bounceIn text-white"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-white">×</span>
                        </button>
                        <strong><i class="ion ion-md-checkmark-circle"></i> BERHASIL
                        </strong> {{ \Illuminate\Support\Facades\Session::get('alert_update','berhasil menjalankan operasi') }}
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Session::has('alert_delete'))
                    <div
                        class="alert alert-danger bg-danger alert-dismissible fade show animated bounceIn text-white"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-white">×</span>
                        </button>
                        <strong><i class="ion ion-md-checkmark-circle"></i>
                        </strong> {{ \Illuminate\Support\Facades\Session::get('alert_delete','berhasil menjalankan operasi') }}
                    </div>
                @endif
                <!-- end page title -->

                    @yield('content')


            </div>
            <!--end row-->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    {{-- support center button --}}
    <div style="position: fixed;z-index: 100;bottom: 56px;right: 34px;" class="d-none d-lg-block">
        <a href="https://t.me/sipmobil" class="btn btn-success btn-sm btn-rounded" target="_blank" >
            Pusat Bantuan
            <i class="fa fa-info-circle d-none d-lg-inline" data-toggle="tooltip" id="desktop-view-tooltip"
               data-placement="top" title="Mengalami masalah? Hubungi Support Center Kami">
            </i>
        </a>
    </div>

    <div style="position: fixed;z-index: 100;bottom: 24px;right: 24px;" class="d-lg-none">
        <a href="https://t.me/sipmobil" class="btn btn-success btn-sm btn-rounded" target="_blank">
            Pusat Bantuan
            <i class="fa fa-info-circle d-lg-none" data-toggle="tooltip" id="mobile-view-tooltip"
               data-placement="top" title="Mengalami masalah? Hubungi Support Center Kami">
            </i>
        </a>
    </div>
    {{-- support center button --}}

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    2021 © BPTP RIAU.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Design & Develop by
                        <a href="https://jibrasoft.id">
                            Mirwansyah
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
<!-- end main content-->

<!-- Overlay-->
<div class="menu-overlay"></div>


<!-- jQuery  -->
<script src="{{asset('/js/app.js?key='.uniqid('bptp'))}}"></script>
<script src="{{asset('template/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('template/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('template/assets/js/metismenu.min.js')}}"></script>
<script src="{{asset('template/assets/js/waves.js')}}"></script>
<script src="{{asset('template/assets/js/simplebar.min.js')}}"></script>

<!-- third party js -->
<script src="{{asset('template/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
{{--<script src="{{asset('template/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>--}}
{{--<script src="{{asset('template/assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>--}}
<script src="{{asset('template/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/datatables/buttons.flash.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/datatables/dataTables.select.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/datatables/vfs_fonts.js')}}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{asset('template/assets/js/datatable-config.js')}}"></script>

<!-- Chart Custom Js-->
{{--<script src="{{asset('template/assets/pages/knob-chart-demo.js')}}"></script>--}}

<!-- Custom Js -->
{{--<script src="{{asset('template/assets/pages/dashboard-demo.js')}}"></script>--}}

<!-- App js -->
<script src="{{asset('template/assets/js/theme.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        toolTips();

        function toolTips() {
            setTimeout(showDesktopToolTip,2000);

            setTimeout(showMobileTooltip,2000);
        }

        function showDesktopToolTip() {
            $('#desktop-view-tooltip').tooltip('show');
            setTimeout(hideDesktopToolTip,4000);
        }

        function hideDesktopToolTip(){
            $('#desktop-view-tooltip').tooltip('hide');
        }

        function showMobileTooltip() {
            $('#mobile-view-tooltip').tooltip('show');

            setTimeout(hideMobileTooltip,4000);
        }

       function hideMobileTooltip() {
           $('#mobile-view-tooltip').tooltip('hide');
       }


    });


</script>

</body>
</html>
