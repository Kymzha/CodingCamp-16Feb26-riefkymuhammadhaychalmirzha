<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    protected $fillable = ['nama', 'tanggal_lahir', 'jenis_kelamin', 'no_telepon', 'alamat'];

    public function administrasis() {
        return $this->hasMany(Administrasi::class);
    }

    use HasFactory;

}
