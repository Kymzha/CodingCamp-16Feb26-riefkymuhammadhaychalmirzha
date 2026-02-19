@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Dokter</h1>
</div>

<!-- Summary Card -->
<div class="row mb-4">
    <div class="col-xl-4 col-md-6">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Dokter
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $dokters->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Laporan Dokter</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">#</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>No. Telepon</th>
                        <th>Email</th>
                        <th>Total Pasien Ditangani</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokters as $i => $dokter)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $dokter->nama }}</td>
                        <td><span class="badge badge-primary">{{ $dokter->spesialis }}</span></td>
                        <td>{{ $dokter->no_telepon ?? '-' }}</td>
                        <td>{{ $dokter->email ?? '-' }}</td>
                        <td>
                            <span class="badge badge-info">
                                {{ $dokter->administrasis_count }} kunjungan
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data dokter</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
