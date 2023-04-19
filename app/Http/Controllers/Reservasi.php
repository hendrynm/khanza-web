<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class Reservasi extends Controller
{
    public function beranda(): View
    {
        return view('reservasi.beranda');
    }

    public function tujuan(): View
    {
        return view('reservasi.lama.tujuan');
    }

    public function jadwal(): View
    {
        return view('reservasi.lama.jadwal');
    }

    public function daftar(): View
    {
        return view('reservasi.daftar.daftar');
    }
}
