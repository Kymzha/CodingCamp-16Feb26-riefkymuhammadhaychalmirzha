@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <span class="text-muted small">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</span>
</div>

<!-- Summary Cards Row 1 -->
<div class="row">

    <!-- Total Dokter -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Dokter
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $total_dokter }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pasien -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Pasien
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $total_pasien }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-procedures fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Transaksi -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Transaksi
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $total_transaksi }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pendapatan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Pendapatan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Rp {{ number_format($total_pendapatan, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Status Cards Row 2 -->
<div class="row">

    <!-- Menunggu -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Transaksi Menunggu
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $total_menunggu }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Selesai -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Transaksi Selesai
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $total_selesai }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Batal -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Transaksi Batal
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $total_batal }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Transaksi Terbaru -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi Terbaru</h6>
                <a href="{{ route('administrasis.index') }}" class="btn btn-sm btn-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Pasien</th>
                                <th>Dokter</th>
                                <th>Tgl Periksa</th>
                                <th>Biaya</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transaksi_terbaru as $i => $trx)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $trx->pasien->nama ?? '-' }}</td>
                                <td>{{ $trx->dokter->nama ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($trx->tanggal_periksa)->format('d M Y') }}</td>
                                <td>Rp {{ number_format($trx->biaya, 0, ',', '.') }}</td>
                                <td>
                                    @if($trx->status == 'Menunggu')
                                        <span class="badge badge-warning">Menunggu</span>
                                    @elseif($trx->status == 'Selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @else
                                        <span class="badge badge-danger">Batal</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada transaksi</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
