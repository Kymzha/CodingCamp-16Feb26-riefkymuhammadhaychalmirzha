<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Administrasi;

class DashboardController extends Controller
{
    public function index()
    {
        $total_dokter      = Dokter::count();
        $total_pasien      = Pasien::count();
        $total_transaksi   = Administrasi::count();
        $total_pendapatan  = Administrasi::where('status', 'Selesai')->sum('biaya');
        $total_menunggu    = Administrasi::where('status', 'Menunggu')->count();
        $total_selesai     = Administrasi::where('status', 'Selesai')->count();
        $total_batal       = Administrasi::where('status', 'Batal')->count();

        // 5 transaksi terbaru
        $transaksi_terbaru = Administrasi::with(['dokter', 'pasien'])
                                         ->latest()
                                         ->take(5)
                                         ->get();

        return view('dashboard', compact(
            'total_dokter',
            'total_pasien',
            'total_transaksi',
            'total_pendapatan',
            'total_menunggu',
            'total_selesai',
            'total_batal',
            'transaksi_terbaru'
        ));
    }
}
