<?php

namespace App\Http\Controllers;

use App\Services\NotifikasiService;
use Illuminate\Contracts\View\View;

class Notifikasi extends Controller
{
    private NotifikasiService $notifikasiService;

    public function __construct()
    {
        $this->notifikasiService = new NotifikasiService();
    }

    public function beranda(): View
    {
        return view('notifikasi.beranda');
    }
}
