<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    protected $fillable = ['nama', 'spesialis', 'no_telepon', 'email', 'alamat'];

    public function administrasis() {
        return $this->hasMany(Administrasi::class);
    }

    use HasFactory;
}
