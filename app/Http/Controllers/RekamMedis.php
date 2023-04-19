<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;

class RekamMedis extends Controller
{
    public function beranda(): View
    {
        return view('rekam_medis.beranda');
    }

    public function profil(): View
    {
        return view('rekam_medis.profil');
    }
}
