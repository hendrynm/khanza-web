<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    use HasFactory;

    protected $table = 'web_plus_reservasi_dokter';

    protected $fillable = [
        'id_jadwal',
        'id_ruang',
        'id_dokter',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'uuid'
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
