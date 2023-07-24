<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPasien extends Model
{
    use HasFactory;

    protected $table = 'web_plus_reservasi_pasien';

    public function jadwal()
    {
        return $this->belongsTo(JadwalDokter::class);
    }
}
