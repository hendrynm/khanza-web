<?php

namespace App\Http\Controllers;

use App\Services\AntriLoket;
use App\Services\NotifikasiService;
use App\Services\ReservasiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Ajax extends Controller
{
    public AntriLoket $antriLoket;
    public NotifikasiService $notifikasiService;
    public ReservasiService $reservasiService;

    public function __construct(){
        $this->antriLoket = new AntriLoket();
        $this->notifikasiService = new NotifikasiService();
        $this->reservasiService = new ReservasiService();
    }

    public function cek_nomor_baru(string $uuid_ruangan): JsonResponse
    {
        $antri = $this->antriLoket->getNomorAntreanDipanggil($uuid_ruangan);

        if($antri === null)
        {
            return response()->json([
                'status' => 204,
                'message' => 'Tidak ada nomor baru diterima',
                'timestamp' => date('d-m-Y h.i.s',time()),
            ]);
        }

        $this->antriLoket->setNomorAntreanSelesaiDipanggil($antri->id_nomor);

        return response()->json([
            'status' => 200,
            'message' => 'Data loket berhasil diambil',
            'data' => [
                'kode_loket' => $antri->kode_loket,
                'nomor_loket' => $antri->nomor_loket,
                'nomor_antrean' => sprintf('%03d',$antri->nomor_antrean),
                'warna' => 'bg-'.$antri->warna,
            ],
            'timestamp' => date('d-m-Y h.i.s',time()),
        ]);
    }

    public function cek_sisa_nomor(Request $request): JsonResponse
    {
        $id_ruang = $request->id_ruang;
        $kode_loket = $request->kode_loket;

        $sisa = $this->antriLoket->getSisaNomorAntrean($id_ruang, $kode_loket);

        return response()->json([
            'status' => 200,
            'message' => 'Sisa nomor antrean berhasil diambil',
            'data' => [
                'sisa' => $sisa,
            ],
            'timestamp' => date('d-m-Y h.i.s',time()),
        ]);
    }

    public function cek_nomor_sekarang(string $id_ruang): JsonResponse
    {
        $nomor = $this->antriLoket->getNomorAntreanTerakhir($id_ruang);

        return response()->json([
            'status' => 200,
            'message' => 'Nomor antrean terakhir berhasil diambil',
            'data' => $nomor,
            'timestamp' => date('d-m-Y h.i.s', time()),
        ]);
    }

    public function simpan_antrean(Request $request): JsonResponse
    {
        $kode_loket = $request->kode_loket;
        $nomor_antrean = $request->nomor_antrean;
        $id_ruang = $request->id_ruang;

        $this->antriLoket->setNomorAntreanBelumDipanggil($kode_loket, $nomor_antrean, $id_ruang);

        return response()->json([
            'status' => 201,
            'message' => 'Nomor antrean berhasil disimpan',
            'timestamp' => date('d-m-Y h.i.s',time()),
        ]);
    }

    public function panggil_antrean(Request $request): JsonResponse
    {
        $panggil = $this->antriLoket->getNomorAntreanAkanDipanggil($request);
        $request->merge(['nomor_antrean' => $panggil->nomor_antrean]);
        $this->antriLoket->setNomorAntreanAkanDipanggil($request);

        return response()->json([
            'status' => 200,
            'message' => 'Nomor antrean berhasil dipanggil',
            'data' => [
                'nomor_dipanggil' => $panggil->nomor_antrean,
            ],
            'timestamp' => date('d-m-Y h.i.s',time()),
        ]);
    }

    public function ulang_antrean(Request $request): JsonResponse
    {
        $this->antriLoket->setNomorAntreanUlangDipanggil($request);

        return response()->json([
            'status' => 201,
            'message' => 'Nomor antrean berhasil diulangi',
            'timestamp' => date('d-m-Y h.i.s',time()),
        ]);
    }

    public function cek_ketersediaan_dokter(Request $request): JsonResponse
    {
        $uuid_ruang = $request->uuid_ruang;
        $kode_dokter = $request->kode_dokter;
        $is_dokter = $request->is_dokter ?? false;

        $tersedia = $this->reservasiService->getJadwalDokterTersedia($uuid_ruang, $kode_dokter);
        $penuh = $this->reservasiService->getJadwalDokterTerisi($uuid_ruang, $kode_dokter, $is_dokter);

        return response()->json([
            'status' => 200,
            'message' => 'Data jadwal dokter tersedia berhasil diambil',
            'data' => [
                'tersedia' => $tersedia,
                'penuh' => $penuh,
            ],
            'timestamp' => date('d-m-Y h.i.s',time()),
        ]);
    }

    public function notifikasi_uji(): JsonResponse
    {
        $nomor_tujuan = '85331303015';
        $nama_pasien = 'Maribel Hendry Naufal';
        $tanggal = '13 Mei 2023';
        $waktu = '09.15 WIB';
        $lokasi = 'Poliklinik Gigi dan Mulut';
        $tautan = 'https://khanza-plus.tekan.id/admin/reservasi';

        $pesan = $this->notifikasiService->setKirimPengingatReservasi($nomor_tujuan, $nama_pasien, $tanggal, $waktu, $lokasi, $tautan);

        return response()->json([
            'status' => 200,
            'message' => 'Data notifikasi berhasil diambil',
            'data' => $pesan,
            'timestamp' => date('d-m-Y h.i.s',time()),
        ]);
    }
}
