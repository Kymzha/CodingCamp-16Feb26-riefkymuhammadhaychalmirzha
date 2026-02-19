@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Dokter</h1>
    <a href="{{ route('dokters.create') }}" class="btn btn-primary btn-sm shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Dokter
    </a>
</div>

<!-- Alert Success -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<!-- Tabel -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Dokter</h6>
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
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokters as $i => $dokter)
                    <tr>
                        <td>{{ $dokters->firstItem() + $i }}</td>
                        <td>{{ $dokter->nama }}</td>
                        <td>
                            <span class="badge badge-primary">{{ $dokter->spesialis }}</span>
                        </td>
                        <td>{{ $dokter->no_telepon ?? '-' }}</td>
                        <td>{{ $dokter->email ?? '-' }}</td>
                        <td>
                            <a href="{{ route('dokters.edit', $dokter) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('dokters.destroy', $dokter) }}"
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
                        <td colspan="6" class="text-center text-muted">Belum ada data dokter</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            {{ $dokters->links() }}
        </div>
    </div>
</div>

@endsection
