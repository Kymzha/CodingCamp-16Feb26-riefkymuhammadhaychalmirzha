<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::latest()->paginate(10);
        return view('dokters.index', compact('dokters'));
    }

    public function create()
    {
        return view('dokters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'spesialis'  => 'required|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'email'      => 'nullable|email|max:255',
            'alamat'     => 'nullable|string',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokters.index')
                         ->with('success', 'Data dokter berhasil ditambahkan!');
    }

    public function edit(Dokter $dokter)
    {
        return view('dokters.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'spesialis'  => 'required|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'email'      => 'nullable|email|max:255',
            'alamat'     => 'nullable|string',
        ]);

        $dokter->update($request->all());

        return redirect()->route('dokters.index')
                         ->with('success', 'Data dokter berhasil diupdate!');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return redirect()->route('dokters.index')
                         ->with('success', 'Data dokter berhasil dihapus!');
    }
}
