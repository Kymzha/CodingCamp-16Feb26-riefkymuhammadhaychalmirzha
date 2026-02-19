@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Pasien</h1>
</div>

<!-- Summary Card -->
<div class="row mb-4">
    <div class="col-xl-4 col-md-6">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Pasien
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $pasiens->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-procedures fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Laporan Pasien</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">#</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>No. Telepon</th>
                        <th>Total Kunjungan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pasiens as $i => $pasien)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $pasien->nama }}</td>
                        <td>
                            @if($pasien->jenis_kelamin == 'Laki-laki')
                                <span class="badge badge-primary">
                                    <i class="fas fa-mars mr-1"></i> Laki-laki
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    <i class="fas fa-venus mr-1"></i> Perempuan
                                </span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d M Y') }}</td>
                        <td>{{ $pasien->no_telepon ?? '-' }}</td>
                        <td>
                            <span class="badge badge-info">
                                {{ $pasien->administrasis_count }} kunjungan
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data pasien</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
