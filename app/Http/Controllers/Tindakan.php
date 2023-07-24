<?php

namespace App\Http\Controllers;

use App\Services\RekamMedisService;
use App\Services\ReservasiService;
use App\Services\TindakanService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Tindakan extends Controller
{
    public RekamMedisService $rekamMedisService;
    public TindakanService $tindakanService;
    public ReservasiService $reservasiService;

    public function __construct()
    {
        $this->rekamMedisService = new RekamMedisService();
        $this->tindakanService = new TindakanService();
        $this->reservasiService = new ReservasiService();
    }

    public function beranda(): View
    {
        return view('tindakan.beranda');
    }

    public function jadwal_pilih(): View
    {
        $pasien = $this->reservasiService->getDaftarPasien();

        return view('tindakan.jadwal.pilih', ['pasien' => $pasien]);
    }

    public function detail(): View
    {
        //$pasien = $this->rekamMedisService->getDetailPasien(base64_decode($nomor_medis));

        return view('tindakan.detail');
    }

    public function jadwal_beranda(string $nomor_medis): View
    {
        $ruang = $this->reservasiService->getDaftarRuangan();

        return view('tindakan.jadwal.beranda', ['ruang' => $ruang, 'nomor_medis' => $nomor_medis]);
    }

    public function jadwal_ruang(string $nomor_medis, string $uuid): View
    {
        $jadwal = $this->reservasiService->getDaftarJadwalDokter($uuid);

        return view('tindakan.jadwal.tujuan', ['nomor_medis' => $nomor_medis, 'jadwal' => $jadwal]);
    }

    public function jadwal_konfirmasi(Request $request): View|RedirectResponse
    {
        $uuid_ruang = $request->uuid_ruang;
        $uuid_jadwal = $request->uuid_jadwal;
        $kode_dokter = $request->kode_dokter;
        $nomor_medis = $request->nomor_medis;
        $tanggal = $request->tanggal;
        $waktu_mulai = $request->waktu_mulai;
        $waktu_selesai = $request->waktu_selesai;

        $ruang = $this->reservasiService->getDetailRuangan($uuid_ruang);
        $dokter = $this->rekamMedisService->getDetailDokter($kode_dokter);
        $pasien = $this->rekamMedisService->getDetailPasien(base64_decode($nomor_medis));

        return view('tindakan.jadwal.konfirmasi', [
            'uuid_ruang' => $uuid_ruang,
            'uuid_jadwal' => $uuid_jadwal,
            'kode_dokter' => $kode_dokter,
            'tanggal' => $tanggal,
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
            'ruang' => $ruang,
            'dokter' => $dokter,
            'pasien' => $pasien
        ]);
    }

    public function jadwal_konfirmasi_simpan(Request $request): RedirectResponse
    {
        $cek = $this->reservasiService->setJadwalPasien($request);

        if ($cek) {
            toast('Penjadwalan pasien berhasil', 'success');
            return redirect()->route('admin.tindakan.beranda');
        }

        toast('Jadwal penuh atau sudah punya reservasi. Silakan pilih dokter atau jadwal lain.', 'error');
        return redirect()->route('admin.tindakan.jadwal.ruang', [
            'nomor_medis' => base64_encode($request->nomor_medis),
            'uuid' => $request->uuid_ruang
        ]);
    }

    public function catat_pilih(): View
    {
        $pasien = $this->rekamMedisService->getDaftarPasien();

        return view('tindakan.catat.pilih', ['pasien' => $pasien]);
    }

    public function catat_beranda(string $nomor_medis): View|RedirectResponse
    {
        $catat = $this->tindakanService->cekSudahRegistrasi(base64_decode($nomor_medis));

        if ($catat === null)
        {
            toast('Data pendaftaran pasien tidak ditemukan', 'error');
            return redirect()->route('admin.tindakan.catat.pilih');

        }
        return view('tindakan.catat.beranda', ['catat' => $catat]);
    }

    public function catat_simpan(Request $request): RedirectResponse
    {
        $cek = $this->tindakanService->setCatatanMedis($request);

        if ($cek) {
            toast('Data berhasil disimpan', 'success');
            return redirect()->route('admin.tindakan.beranda');
        } else {
            toast('Data gagal disimpan, silakan diulang', 'error');
            return redirect()->back();
        }
    }
}
