<?php

namespace App\Http\Controllers;

use App\Services\NotifikasiService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function simpan(Request $request): RedirectResponse
    {
        $simpan = $this->notifikasiService->setNomorHP($request);

        if($simpan)
        {
            toast('Data nomor HP berhasil disimpan', 'success');
            return redirect()->route('admin.notifikasi.beranda');
        }
        toast('Data gagal disimpan, mohon coba lagi', 'error');
        return redirect()->back();
    }
}
