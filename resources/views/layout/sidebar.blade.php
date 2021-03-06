<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div class="navbar-brand-box">
            <a href="#" class="logo">
                <i class="mdi mdi-desktop-mac"></i>
                <span>SPK UKT</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard.index') }}" class="waves-effect">
                        <i class="mdi mdi-home-analytics"></i>
                        <span class="badge badge-pill badge-primary float-right">
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-database"></i>
                        <span>Data Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
                        <li><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-file-excel"></i>
                        <span>Perhitungan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('perhitungan.index') }}">Keseluruhan</a></li>
                        <li><a href="{{ route('perhitungan.pilihan') }}">Pilihan</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
