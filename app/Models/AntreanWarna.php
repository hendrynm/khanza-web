<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntreanWarna extends Model
{
    use HasFactory;

    protected $table = 'web_plus_antrean_warna';

    protected $fillable = [
        'id_warna',
        'warna'
    ];

    public function web_plus_antrean_loket()
    {
        return $this->hasMany(AntreanLoket::class, 'id_warna', 'id_warna');
    }
}
