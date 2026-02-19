<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
    <!-- Brand -->
    <a class="sidebar-brand" href="/">
        <div class="sidebar-brand-text">Klinik</div>
    </a>

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    </li>

    <!-- Data Klinik -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#dataKlinik">
            <i class="fas fa-hospital"></i> Data Klinik
        </a>
        <div class="collapse" id="dataKlinik">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('dokters.index') }}">Dokter</a>
                <a class="collapse-item" href="{{ route('pasiens.index') }}">Pasien</a>
            </div>
        </div>
    </li>

    <!-- Data Transaksi -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('administrasis.index') }}">
            <i class="fas fa-file-invoice"></i> Data Transaksi
        </a>
    </li>
</ul>
