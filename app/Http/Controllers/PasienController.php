<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::latest()->paginate(10);
        return view('pasiens.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasiens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_telepon'    => 'nullable|string|max:20',
            'alamat'        => 'nullable|string',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasiens.index')
                         ->with('success', 'Data pasien berhasil ditambahkan!');
    }

    public function edit(Pasien $pasien)
    {
        return view('pasiens.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_telepon'    => 'nullable|string|max:20',
            'alamat'        => 'nullable|string',
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasiens.index')
                         ->with('success', 'Data pasien berhasil diupdate!');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasiens.index')
                         ->with('success', 'Data pasien berhasil dihapus!');
    }
}
