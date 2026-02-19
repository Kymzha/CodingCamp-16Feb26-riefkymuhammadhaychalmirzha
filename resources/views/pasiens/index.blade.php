@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1>
    <a href="{{ route('pasiens.create') }}" class="btn btn-primary btn-sm shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pasien
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
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pasien</h6>
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
                        <th>Alamat</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pasiens as $i => $pasien)
                    <tr>
                        <td>{{ $pasiens->firstItem() + $i }}</td>
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
                        <td>{{ $pasien->alamat ?? '-' }}</td>
                        <td>
                            <a href="{{ route('pasiens.edit', $pasien) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('pasiens.destroy', $pasien) }}"
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
                        <td colspan="7" class="text-center text-muted">Belum ada data pasien</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $pasiens->links() }}
        </div>
    </div>
</div>

@endsection
