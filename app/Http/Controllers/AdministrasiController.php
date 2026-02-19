<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    public function index()
    {
        $administrasis = Administrasi::with(['pasien', 'dokter'])
                                     ->latest()
                                     ->paginate(10);
        return view('administrasis.index', compact('administrasis'));
    }

    public function create()
    {
        $dokters = Dokter::all();
        $pasiens = Pasien::all();
        return view('administrasis.create', compact('dokters', 'pasiens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id'       => 'required|exists:pasiens,id',
            'dokter_id'       => 'required|exists:dokters,id',
            'tanggal_periksa' => 'required|date',
            'keluhan'         => 'required|string',
            'diagnosa'        => 'nullable|string',
            'biaya'           => 'nullable|numeric|min:0',
            'status'          => 'required|in:Menunggu,Selesai,Batal',
        ]);

        Administrasi::create($request->all());

        return redirect()->route('administrasis.index')
                         ->with('success', 'Data administrasi berhasil ditambahkan!');
    }

    public function edit(Administrasi $administrasi)
    {
        $dokters = Dokter::all();
        $pasiens = Pasien::all();
        return view('administrasis.edit', compact('administrasi', 'dokters', 'pasiens'));
    }

    public function update(Request $request, Administrasi $administrasi)
    {
        $request->validate([
            'pasien_id'       => 'required|exists:pasiens,id',
            'dokter_id'       => 'required|exists:dokters,id',
            'tanggal_periksa' => 'required|date',
            'keluhan'         => 'required|string',
            'diagnosa'        => 'nullable|string',
            'biaya'           => 'nullable|numeric|min:0',
            'status'          => 'required|in:Menunggu,Selesai,Batal',
        ]);

        $administrasi->update($request->all());

        return redirect()->route('administrasis.index')
                         ->with('success', 'Data administrasi berhasil diupdate!');
    }

    public function destroy(Administrasi $administrasi)
    {
        $administrasi->delete();

        return redirect()->route('administrasis.index')
                         ->with('success', 'Data administrasi berhasil dihapus!');
    }
}
