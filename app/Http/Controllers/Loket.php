<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Loket extends Controller
{
    public function index()
    {
        return view('loket.index');
    }
}
