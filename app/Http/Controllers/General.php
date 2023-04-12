<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class General extends Controller
{
    public function index()
    {
        return view('index');
    }
}
