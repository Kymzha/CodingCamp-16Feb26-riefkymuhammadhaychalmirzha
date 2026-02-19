@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Dokter</h1>
    <a href="{{ route('dokters.index') }}" class="btn btn-secondary btn-sm shadow-sm">
        <i class="fas fa-arrow-left fa-sm"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Dokter</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('dokters.update', $dokter) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Dokter <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $dokter->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Spesialis <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" name="spesialis"
                           class="form-control @error('spesialis') is-invalid @enderror"
                           value="{{ old('spesialis', $dokter->spesialis) }}">
                    @error('spesialis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">No. Telepon</label>
                <div class="col-sm-9">
                    <input type="text" name="no_telepon"
                           class="form-control @error('no_telepon') is-invalid @enderror"
                           value="{{ old('no_telepon', $dokter->no_telepon) }}">
                    @error('no_telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', $dokter->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <textarea name="alamat" rows="3"
                              class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $dokter->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Update
                    </button>
                    <a href="{{ route('dokters.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times mr-1"></i> Batal
                    </a>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
