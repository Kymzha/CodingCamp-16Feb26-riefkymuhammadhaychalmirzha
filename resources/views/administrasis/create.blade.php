@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Administrasi</h1>
    <a href="{{ route('administrasis.index') }}" class="btn btn-secondary btn-sm shadow-sm">
        <i class="fas fa-arrow-left fa-sm"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Administrasi</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('administrasis.store') }}" method="POST">
            @csrf

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Pasien <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <select name="pasien_id"
                            class="form-control @error('pasien_id') is-invalid @enderror">
                        <option value="">-- Pilih Pasien --</option>
                        @foreach($pasiens as $pasien)
                            <option value="{{ $pasien->id }}"
                                {{ old('pasien_id') == $pasien->id ? 'selected' : '' }}>
                                {{ $pasien->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('pasien_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Dokter <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <select name="dokter_id"
                            class="form-control @error('dokter_id') is-invalid @enderror">
                        <option value="">-- Pilih Dokter --</option>
                        @foreach($dokters as $dokter)
                            <option value="{{ $dokter->id }}"
                                {{ old('dokter_id') == $dokter->id ? 'selected' : '' }}>
                                {{ $dokter->nama }} - {{ $dokter->spesialis }}
                            </option>
                        @endforeach
                    </select>
                    @error('dokter_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Periksa <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="date" name="tanggal_periksa"
                           class="form-control @error('tanggal_periksa') is-invalid @enderror"
                           value="{{ old('tanggal_periksa') }}">
                    @error('tanggal_periksa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Keluhan <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <textarea name="keluhan" rows="3"
                              class="form-control @error('keluhan') is-invalid @enderror"
                              placeholder="Masukkan keluhan pasien">{{ old('keluhan') }}</textarea>
                    @error('keluhan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Diagnosa</label>
                <div class="col-sm-9">
                    <textarea name="diagnosa" rows="3"
                              class="form-control @error('diagnosa') is-invalid @enderror"
                              placeholder="Masukkan diagnosa (opsional)">{{ old('diagnosa') }}</textarea>
                    @error('diagnosa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Biaya</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="number" name="biaya"
                               class="form-control @error('biaya') is-invalid @enderror"
                               value="{{ old('biaya', 0) }}" min="0">
                        @error('biaya')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <select name="status"
                            class="form-control @error('status') is-invalid @enderror">
                        <option value="Menunggu" {{ old('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Selesai"  {{ old('status') == 'Selesai'  ? 'selected' : '' }}>Selesai</option>
                        <option value="Batal"    {{ old('status') == 'Batal'    ? 'selected' : '' }}>Batal</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                    <a href="{{ route('administrasis.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times mr-1"></i> Batal
                    </a>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
