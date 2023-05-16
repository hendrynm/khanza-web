<?php

namespace App\Http\Controllers;

use App\Services\AntriLoket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function atur_beranda(): View
    {
        $ruang = $this->antriLoket->getDaftarRuangan();

        return view('loket.atur.beranda', ['ruang' => $ruang]);
    }

    public function atur_ruang_tambah(): View
    {
        return view('loket.atur.ruang.tambah');
    }

    public function atur_ruang_tambah_post(Request $request): RedirectResponse
    {
        $this->antriLoket->setDaftarRuangan($request);

        return redirect()->route('admin.loket.atur.beranda');
    }

    public function atur_ruang_ubah(string $uuid_ruangan): View
    {
        $ruang = $this->antriLoket->getDaftarRuangan($uuid_ruangan);

        return view('loket.atur.ruang.ubah', ['ruang' => $ruang]);
    }

    public function atur_ruang_ubah_post(Request $request): RedirectResponse
    {
        $this->antriLoket->setDaftarRuangan($request);

        return redirect()->route('admin.loket.atur.beranda');
    }

    public function atur_ruang_hapus(string $uuid_ruangan): RedirectResponse
    {
        $this->antriLoket->deleteDaftarRuangan($uuid_ruangan);

        return redirect()->route('admin.loket.atur.beranda');
    }

    public function atur_loket_beranda(string $uuid_ruangan): View
    {
        $ruang = $this->antriLoket->getNomorLoketRuangan($uuid_ruangan);

        return view('loket.atur.loket.beranda', ['ruang' => $ruang]);
    }

    public function atur_loket_tambah(string $uuid_ruangan): View
    {
        $ruang = $this->antriLoket->getDaftarRuangan($uuid_ruangan);
        $warna = $this->antriLoket->getDaftarWarna();

        return view('loket.atur.loket.tambah', ['ruang' => $ruang, 'warna' => $warna]);
    }

    public function atur_loket_tambah_post(Request $request): RedirectResponse
    {
        $this->antriLoket->setNomorLoketRuangan($request);

        return redirect()->route('admin.loket.atur.loket.beranda', strtoupper($request->uuid_ruangan));
    }

    public function atur_loket_ubah(string $uuid_ruangan, string $uuid_loket): View
    {
        $ruang = $this->antriLoket->getDaftarRuangan($uuid_ruangan);
        $loket = $this->antriLoket->getNomorLoketRuangan(null, $uuid_loket);
        $warna = $this->antriLoket->getDaftarWarna();

        return view('loket.atur.loket.ubah', ['ruang' => $ruang, 'loket' => $loket, 'warna' => $warna]);
    }

    public function atur_loket_ubah_post(Request $request): RedirectResponse
    {
        $this->antriLoket->setNomorLoketRuangan($request);

        return redirect()->route('admin.loket.atur.loket.beranda', strtoupper($request->uuid_ruangan));
    }

    public function atur_loket_hapus(string $uuid_ruangan, string $uuid_loket): RedirectResponse
    {
        $this->antriLoket->deleteNomorLoketRuangan($uuid_loket);

        return redirect()->route('admin.loket.atur.loket.beranda', $uuid_ruangan);
    }

    public function publik_beranda(): View
    {
        $ruang = $this->antriLoket->getDaftarRuangan();

        return view('loket.publik.beranda', ['ruang' => $ruang]);
    }

    public function publik_panggil(string $uuid_ruangan): View
    {
        $run_text = $this->antriLoket->getRunningTextBawaan();
        $setting = $this->antriLoket->getSettingBawaan();
        $ruang = $this->antriLoket->getDaftarRuangan($uuid_ruangan);

        return view('loket.publik.panggil',['run_text' => $run_text, 'setting' => $setting, 'ruang' => $ruang]);
    }

    public function publik_cetak(string $uuid_ruangan): View
    {
        $run_text = $this->antriLoket->getRunningTextBawaan();
        $setting = $this->antriLoket->getSettingBawaan();
        $ruang = $this->antriLoket->getDaftarRuangan($uuid_ruangan);
        $loket = $this->antriLoket->getTampilanCetak($uuid_ruangan);

        return view('loket.publik.cetak', ['run_text' => $run_text, 'setting' => $setting, 'ruang' => $ruang, 'loket' => $loket]);
    }
}
