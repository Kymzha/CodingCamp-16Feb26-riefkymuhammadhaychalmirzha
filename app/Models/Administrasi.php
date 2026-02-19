<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrasi extends Model
{
    protected $fillable = ['pasien_id', 'dokter_id', 'tanggal_periksa', 'keluhan', 'diagnosa', 'biaya', 'status'];

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter() {
        return $this->belongsTo(Dokter::class);
    }

    use HasFactory;
}
