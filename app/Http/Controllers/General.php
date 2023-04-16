<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class General extends Controller
{
    public function beranda(): View
    {
        return view('beranda');
    }
}
