<?php

namespace App\Http\Controllers;

use App\Services\RekamMedisService;
use App\Services\ReservasiService;
use App\Services\TindakanService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function pilih(): View
    {
        $pasien = $this->reservasiService->getDaftarPasien();

        return view('tindakan.pilih', ['pasien' => $pasien]);
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
        $kode_dokter = $request->kode_dokter;
        $waktu_dipilih = $request->waktu_dipilih;
        $nomor_medis = $request->nomor_medis;
        $tanggal = explode('T', $waktu_dipilih)[0];
        $waktu = explode('+',explode('T', $waktu_dipilih)[1])[0];

        $cek_sesuai = $this->reservasiService->cekJadwalPasienSesuai($uuid_ruang, $kode_dokter, $tanggal, $waktu);
        if($cek_sesuai)
        {
            $ruang = $this->reservasiService->getDetailRuangan($uuid_ruang);
            $dokter = $this->rekamMedisService->getDetailDokter($kode_dokter);
            $pasien = $this->rekamMedisService->getDetailPasien(base64_decode($nomor_medis));

            return view('tindakan.jadwal.konfirmasi', [
                'uuid_ruang' => $uuid_ruang,
                'kode_dokter' => $kode_dokter,
                'tanggal' => $tanggal,
                'waktu' => $waktu,
                'ruang' => $ruang,
                'dokter' => $dokter,
                'pasien' => $pasien
            ]);
        }
        return redirect()->route('admin.tindakan.jadwal.ruang', [
            'nomor_medis' => base64_encode($request->nomor_medis),
            'uuid' => $request->uuid_ruang
        ]);
    }

    public function jadwal_konfirmasi_simpan(Request $request): RedirectResponse
    {
        $cek = $this->reservasiService->setJadwalPasien($request);

        if ($cek) {
            return redirect()->route('admin.tindakan.beranda');
        } else {
            return redirect()->route('admin.tindakan.jadwal.ruang', [
                'nomor_medis' => base64_encode($request->nomor_medis),
                'uuid' => $request->uuid_ruang
            ]);
        }
    }
}
