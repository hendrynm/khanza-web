<?php

namespace App\Http\Controllers;

use App\Services\AntriLoket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class Loket extends Controller
{
    public AntriLoket $antriLoket;

    public function __construct(){
        $this->antriLoket = new AntriLoket();
    }

    public function beranda(): View
    {
        return view('loket.beranda');
    }

    public function tampil_ruang(): View
    {
        $ruang = $this->antriLoket->getDaftarRuangan();

        return view('loket.tampil.ruang', ['ruang' => $ruang]);
    }

    public function tampil_loket(string $uuid_ruangan): View
    {
        $loket = $this->antriLoket->getNomorLoketRuangan($uuid_ruangan);

        return view('loket.tampil.loket', ['loket' => $loket]);
    }

    public function tampil_tampil(string $uuid_loket): View
    {
        $tampil = $this->antriLoket->getTampilanLoket($uuid_loket);

        return view('loket.tampil.tampil', ['tampil' => $tampil]);
    }

    public function atur_ubah(): View
    {
        return view('loket.atur.ubah');
    }

    public function atur_beranda(): View
    {
        $ruang = $this->antriLoket->getDaftarRuangan();

        return view('loket.atur.ruang.beranda', ['ruang' => $ruang]);
    }

    public function atur_ruang_tambah(): View
    {
        return view('loket.atur.ruang.tambah');
    }

    public function atur_ruang_tambah_post(): RedirectResponse
    {
        $this->antriLoket->setDaftarRuangan(request()->all());

        return redirect()->route('admin.loket.atur.ubah.ruang.beranda');
    }

    public function atur_ruang_ubah(string $uuid_ruangan): View
    {
        $ruang = $this->antriLoket->getNomorLoketRuangan($uuid_ruangan);

        return view('loket.atur.ruang.ubah', ['ruang' => $ruang]);
    }

    public function atur_ruang_ubah_post(string $uuid_ruangan): RedirectResponse
    {
        $this->antriLoket->setDaftarRuangan(request()->all());

        return redirect()->route('admin.loket.atur.ubah.ruang.beranda');
    }

    public function atur_ruang_hapus(string $uuid_ruangan): RedirectResponse
    {
        $this->antriLoket->deleteDaftarRuangan($uuid_ruangan);

        return redirect()->route('admin.loket.atur.ubah.ruang.beranda');
    }

    public function publik(): View
    {
        $run_text = $this->antriLoket->getRunningTextBawaan();
        $setting = $this->antriLoket->getSettingBawaan();

        return view('loket.publik.tampil',['run_text' => $run_text, 'setting' => $setting]);
    }
}
