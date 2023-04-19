<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class General extends Controller
{
    public function beranda(): View
    {
        return view('beranda');
    }
}
