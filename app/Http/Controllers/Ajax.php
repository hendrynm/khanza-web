<?php

namespace App\Http\Controllers;

use App\Services\AntriLoket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Ajax extends Controller
{
    public AntriLoket $antriLoket;

    public function __construct(){
        $this->antriLoket = new AntriLoket();
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
            'timestamp' => date('d-m-Y h.i.s',time()),
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
}
