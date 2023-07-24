<?php

namespace App\Http\Controllers;

use App\Services\RekamMedisService;
use App\Services\ReservasiService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Reservasi extends Controller
{
    public ReservasiService $reservasiService;
    public RekamMedisService $rekamMedisService;

    public function __construct()
    {
        $this->reservasiService = new ReservasiService();
        $this->rekamMedisService = new RekamMedisService();
    }

    public function beranda(): View
    {
        return view('reservasi.beranda');
    }

    public function pasien_beranda(): View
    {
        $pasien = $this->reservasiService->getDaftarPasien();

        return view('reservasi.lama.nomor', [
            'pasien' => $pasien
        ]);
    }

    public function pasien_tujuan(string $nomor_medis): View
    {
        $ruang = $this->reservasiService->getDaftarRuangan();

        return view('reservasi.lama.tujuan', [
            'ruang' => $ruang,
            'nomor_medis' => $nomor_medis
        ]);
    }

    public function pasien_jadwal(string $nomor_medis, string $uuid_ruang): View
    {
        $jadwal = $this->reservasiService->getDaftarJadwalDokter($uuid_ruang);

        return view('reservasi.lama.jadwal', [
            'jadwal' => $jadwal
        ]);
    }

    public function atur_beranda(): View
    {
        return view('reservasi.atur.beranda');
    }

    public function atur_tambah(): View
    {
        return view('reservasi.atur.tambah');
    }

    public function atur_tambah_post(Request $request): RedirectResponse
    {
        $this->reservasiService->setDetailRuangan($request);

        toast('Ruangan berhasil ditambahkan', 'success');
        return redirect()->route('admin.reservasi.atur.beranda');
    }

    public function atur_ubah(string $uuid_ruang): View
    {
        $ruang = $this->reservasiService->getDetailRuangan($uuid_ruang);

        return view('reservasi.atur.ubah',[
            'ruang' => $ruang
        ]);
    }

    public function atur_ubah_post(Request $request): RedirectResponse
    {
        $this->reservasiService->setDetailRuangan($request);

        toast('Ruangan berhasil diubah', 'success');
        return redirect()->route('admin.reservasi.atur.beranda');
    }

    public function atur_hapus(string $uuid_ruang): RedirectResponse
    {
        $this->reservasiService->deleteDetailRuangan($uuid_ruang);

        toast('Ruangan berhasil dihapus', 'success');
        return redirect()->route('admin.reservasi.atur.beranda');
    }

    public function dokter_beranda(string $uuid_ruang): View
    {
        return view('reservasi.dokter.beranda');
    }

    public function dokter_tambah(string $uuid_ruang): View
    {
        $ruang = $this->reservasiService->getDetailRuangan($uuid_ruang);
        $dokter = $this->reservasiService->getDaftarDokter();

        return view('reservasi.dokter.tambah', [
            'dokter' => $dokter,
            'ruang' => $ruang
        ]);
    }

    public function dokter_tambah_post(Request $request): RedirectResponse
    {
        $this->reservasiService->setDetailJadwalDokter($request);

        toast('Jadwal dokter berhasil ditambahkan', 'success');
        return redirect()->route('admin.reservasi.dokter.beranda', [
            'uuid_ruang' => $request->uuid_ruang
        ]);
    }

    public function dokter_ubah(string $uuid_ruang, string $uuid_jadwal): View
    {
        $ruang = $this->reservasiService->getDetailRuangan($uuid_ruang);
        $dokter = $this->reservasiService->getDaftarDokter();
        $jadwal = $this->reservasiService->getDetailJadwalDokter($uuid_jadwal);

        return view('reservasi.dokter.ubah', [
            'dokter' => $dokter,
            'ruang' => $ruang,
            'jadwal' => $jadwal
        ]);
    }

    public function dokter_ubah_post(Request $request): RedirectResponse
    {
        $this->reservasiService->setDetailJadwalDokter($request);

        toast('Jadwal dokter berhasil diubah', 'success');
        return redirect()->route('admin.reservasi.dokter.beranda', [
            'uuid_ruang' => $request->uuid_ruang
        ]);
    }

    public function dokter_hapus(string $uuid_ruang, string $uuid_jadwal): RedirectResponse
    {
        $this->reservasiService->deleteDetailJadwalDokter($uuid_jadwal);

        toast('Jadwal dokter berhasil dihapus', 'success');
        return redirect()->route('admin.reservasi.dokter.beranda', [
            'uuid_ruang' => $uuid_ruang
        ]);
    }

    public function daftar(): View
    {
        return view('reservasi.daftar.daftar');
    }

    public function registrasi_beranda(): View
    {
        $pasien = $this->reservasiService->getDaftarPasien();

        return view('reservasi.registrasi.nomor', [
            'pasien' => $pasien
        ]);
    }

    public function registrasi_daftar(string $nomor_medis): View
    {
        $daftar = $this->reservasiService->getDaftarReservasi(base64_decode($nomor_medis));

        return view('reservasi.registrasi.daftar', [
            'daftar' => $daftar
        ]);
    }

    public function registrasi_konfirmasi(Request $request): View|RedirectResponse
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

        return view('reservasi.registrasi.beranda', [
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

    public function registrasi_konfirmasi_simpan(Request $request): RedirectResponse
    {
        $cek = $this->reservasiService->setJadwalPasien($request);

        if ($cek) {
            toast('Reservasi berhasil ditambahkan', 'success');
            return redirect()->route('admin.reservasi.beranda');
        }

        toast('Jadwal penuh atau sudah punya reservasi. Silakan pilih dokter atau jadwal lain.', 'error');
        return redirect()->route('admin.reservasi.pasien.jadwal', [
            'nomor_medis' => base64_encode($request->nomor_medis),
            'uuid' => $request->uuid_ruang
        ]);
    }

    public function registrasi_hapus(string $uuid): RedirectResponse
    {
        $this->reservasiService->deleteJadwalPasien($uuid);

        toast('Reservasi berhasil dihapus', 'success');
        return redirect()->route('admin.reservasi.beranda');
    }

    public function simpan_beranda(): View
    {
        $ruang = $this->reservasiService->getDaftarRuangan();

        return view('reservasi.simpan.beranda', [
            'ruang' => $ruang
        ]);
    }

    public function simpan_detail(string $uuid_ruang): View
    {
        $ruang = $this->reservasiService->getDetailRuangan($uuid_ruang);
        $pasien = $this->reservasiService->getDaftarPasien();

        return view('reservasi.simpan.detail', [
            'ruang' => $ruang,
            'pasien' => $pasien
        ]);
    }
}
