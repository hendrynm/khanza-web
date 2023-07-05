<?php

namespace App\Http\Controllers;

use App\Services\AutentikasiService;
use App\Services\NotifikasiService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Notifikasi extends Controller
{
    private NotifikasiService $notifikasiService;
    private AutentikasiService $autentikasiService;

    public function __construct()
    {
        $this->notifikasiService = new NotifikasiService();
        $this->autentikasiService = new AutentikasiService();
    }

    public function beranda(): View
    {
        $id_pengguna = $this->autentikasiService->getIDPengguna(session('nama_pengguna'));
        $notifikasi = $this->notifikasiService->getNomorHP($id_pengguna);

        return view('notifikasi.beranda', [
            'notifikasi' => $notifikasi
        ]);
    }

    public function simpan(Request $request): RedirectResponse
    {
        $request->merge(['id_pengguna' => $this->autentikasiService->getIDPengguna(session('nama_pengguna'))]);
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
