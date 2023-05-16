<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntreanLoket extends Model
{
    use HasFactory;

    protected $table = 'web_plus_antrean_loket';

    protected $fillable = [
        'id_loket',
        'id_ruang',
        'kode_loket',
        'nomor_loket',
        'nama_loket',
        'bpjs',
        'status',
        'uuid'
    ];

    public function web_plus_antrean_warna()
    {
        return $this->belongsTo(AntreanWarna::class, 'id_warna', 'id_warna');
    }
}
