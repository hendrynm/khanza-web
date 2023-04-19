<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class Tindakan extends Controller
{
    public function beranda(): View
    {
        return view('tindakan.beranda');
    }

    public function tindakan(): View
    {
        return view('tindakan.tindakan');
    }
}
