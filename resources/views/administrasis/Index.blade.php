@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Administrasi</h1>
    <a href="{{ route('administrasis.create') }}" class="btn btn-primary btn-sm shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Administrasi
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Administrasi</h6>
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
                        <th>Biaya</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($administrasis as $i => $adm)
                    <tr>
                        <td>{{ $administrasis->firstItem() + $i }}</td>
                        <td>{{ $adm->pasien->nama ?? '-' }}</td>
                        <td>{{ $adm->dokter->nama ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($adm->tanggal_periksa)->format('d M Y') }}</td>
                        <td>{{ Str::limit($adm->keluhan, 40) }}</td>
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
                        <td>
                            <a href="{{ route('administrasis.edit', $adm) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('administrasis.destroy', $adm) }}"
                                  method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada data administrasi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $administrasis->links() }}
        </div>
    </div>
</div>

@endsection
