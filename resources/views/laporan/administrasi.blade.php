@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Administrasi</h1>
</div>

<!-- Summary Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Transaksi
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $administrasis->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Pendapatan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Rp {{ number_format($total_biaya, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Menunggu
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $total_tunggu }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Selesai
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
</div>

<!-- Tabel -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Laporan Administrasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">#</th>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Tgl Periksa</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                        <th>Biaya</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($administrasis as $i => $adm)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $adm->pasien->nama ?? '-' }}</td>
                        <td>{{ $adm->dokter->nama ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($adm->tanggal_periksa)->format('d M Y') }}</td>
                        <td>{{ Str::limit($adm->keluhan, 30) }}</td>
                        <td>{{ Str::limit($adm->diagnosa ?? '-', 30) }}</td>
                        <td>Rp {{ number_format($adm->biaya, 0, ',', '.') }}</td>
                        <td>
                            @if($adm->status == 'Menunggu')
                                <span class="badge badge-warning">Menunggu</span>
                            @elseif($adm->status == 'Selesai')
                                <span class="badge badge-success">Selesai</span>
                            @else
                                <span class="badge badge-danger">Batal</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada data administrasi</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot class="thead-light">
                    <tr>
                        <th colspan="6" class="text-right">Total Pendapatan:</th>
                        <th>Rp {{ number_format($total_biaya, 0, ',', '.') }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
