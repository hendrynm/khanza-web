<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntreanRuangan extends Model
{
    use HasFactory;

    protected $table = 'web_plus_antrean_ruangan';

    protected $fillable = [
        'id_ruang',
        'nama_ruang',
        'foto',
        'uuid'
    ];
}
