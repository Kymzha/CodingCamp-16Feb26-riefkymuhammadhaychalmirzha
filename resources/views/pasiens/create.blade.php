@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Pasien</h1>
    <a href="{{ route('pasiens.index') }}" class="btn btn-secondary btn-sm shadow-sm">
        <i class="fas fa-arrow-left fa-sm"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pasien</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pasiens.store') }}" method="POST">
            @csrf

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Pasien <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}" placeholder="Masukkan nama pasien">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <select name="jenis_kelamin"
                            class="form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="date" name="tanggal_lahir"
                           class="form-control @error('tanggal_lahir') is-invalid @enderror"
                           value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">No. Telepon</label>
                <div class="col-sm-9">
                    <input type="text" name="no_telepon"
                           class="form-control @error('no_telepon') is-invalid @enderror"
                           value="{{ old('no_telepon') }}" placeholder="Contoh: 08123456789">
                    @error('no_telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <textarea name="alamat" rows="3"
                              class="form-control @error('alamat') is-invalid @enderror"
                              placeholder="Masukkan alamat pasien">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                    <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times mr-1"></i> Batal
                    </a>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
