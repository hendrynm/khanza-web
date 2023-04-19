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
        return view('reservasi.tujuan');
    }

    public function jadwal(): View
    {
        return view('reservasi.jadwal');
    }
}
