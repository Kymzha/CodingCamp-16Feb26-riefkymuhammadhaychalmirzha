<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Administrasi;

class LaporanController extends Controller
{
    public function dokter()
    {
        $dokters = Dokter::withCount('administrasis')->get();
        return view('laporan.dokter', compact('dokters'));
    }

    public function pasien()
    {
        $pasiens = Pasien::withCount('administrasis')->get();
        return view('laporan.pasien', compact('pasiens'));
    }

    public function administrasi()
    {
        $administrasis = Administrasi::with(['dokter', 'pasien'])->get();
        $total_biaya   = $administrasis->sum('biaya');
        $total_selesai = $administrasis->where('status', 'Selesai')->count();
        $total_batal   = $administrasis->where('status', 'Batal')->count();
        $total_tunggu  = $administrasis->where('status', 'Menunggu')->count();

        return view('laporan.administrasi', compact(
            'administrasis',
            'total_biaya',
            'total_selesai',
            'total_batal',
            'total_tunggu'
        ));
    }
}
