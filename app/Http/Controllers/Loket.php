<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class Loket extends Controller
{
    public function beranda(): View
    {
        return view('loket.beranda');
    }

    public function ruang(): View
    {
        return view('loket.tampil.ruang');
    }

    public function loket(): View
    {
        return view('loket.tampil.loket');
    }

    public function tampil(): View
    {
        return view('loket.tampil.tampil');
    }

    public function pilih(): View
    {
        return view('loket.atur.pilih');
    }

    public function ubah(): View
    {
        return view('loket.atur.ubah');
    }
}
