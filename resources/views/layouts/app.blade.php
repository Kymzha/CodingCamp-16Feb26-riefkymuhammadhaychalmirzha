<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Klinik</title>

    <!-- Font Awesome -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Klinik</div>
            </a>

            <hr class="sidebar-divider my-0">

            <!-- Dashboard -->
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">Data Klinik</div>

            <!-- Dokter -->
            <li class="nav-item {{ request()->is('dokters*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dokters.index') }}">
                    <i class="fas fa-fw fa-user-md"></i>
                    <span>Dokter</span>
                </a>
            </li>

            <!-- Pasien -->
            <li class="nav-item {{ request()->is('pasiens*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pasiens.index') }}">
                    <i class="fas fa-fw fa-procedures"></i>
                    <span>Pasien</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">Transaksi</div>

            <!-- Administrasi -->
            <li class="nav-item {{ request()->is('administrasis*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('administrasis.index') }}">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Administrasi</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">Laporan</div>

            <li class="nav-item {{ request()->is('laporan*') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseLaporan" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('laporan.dokter') }}">Laporan Dokter</a>
                        <a class="collapse-item" href="{{ route('laporan.pasien') }}">Laporan Pasien</a>
                        <a class="collapse-item" href="{{ route('laporan.administrasi') }}">Laporan Administrasi</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Toggle Sidebar -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Topbar -->

                <!-- Main Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>

            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Klinik {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- End Content Wrapper -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
