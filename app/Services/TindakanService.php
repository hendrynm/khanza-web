<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class TindakanService
{
    private const TABEL_REGISTRASI_BAWAAN = 'reg_periksa';
    private const TABEL_PEMERIKSAAN_RAWAT_JALAN_BAWAAN = 'pemeriksaan_ralan';


    public function cekSudahRegistrasi(string $nomor_medis): string|null
    {
        $data = DB::table(self::TABEL_REGISTRASI_BAWAAN)
            ->where('no_rkm_medis', $nomor_medis)
            ->where('tgl_registrasi', date('Y-m-d'))
            ->first();

        return $data->no_rawat ?? null;
    }

    public function setCatatanMedis(Request $request): bool
    {
        $nomor_rawat = $request->nomor_rawat_form;
        $subjek = str_replace("\r\n", "\n",$request->subjek);
        $objek = str_replace("\r\n", "\n",$request->objek);
        $suhu = $request->suhu;
        $tinggi = $request->tinggi;
        $berat = $request->berat;
        $spo2 = $request->spo2;
        $perut = $request->perut;
        $tensi = $request->tensi;
        $respirasi = $request->respirasi;
        $nadi = $request->nadi;
        $gcs = $request->gcs;
        $kesadaran = $request->kesadaran;
        $alergi = $request->alergi;
        $asesmen = str_replace("\r\n", "\n",$request->asesmen);
        $plan = str_replace("\r\n", "\n",$request->plan);
        $instruksi = str_replace("\r\n", "\n",$request->instruksi);
        $evaluasi = str_replace("\r\n", "\n",$request->evaluasi);

        return DB::table(self::TABEL_PEMERIKSAAN_RAWAT_JALAN_BAWAAN)
            ->insert([
                'no_rawat' => $nomor_rawat,
                'tgl_perawatan' => date('Y-m-d'),
                'jam_rawat' => date('H:i:s'),
                'suhu_tubuh' => $suhu,
                'tensi' => $tensi,
                'nadi' => $nadi,
                'respirasi' => $respirasi,
                'tinggi' => $tinggi,
                'berat' => $berat,
                'spo2' => $spo2,
                'gcs' => $gcs,
                'kesadaran' => $kesadaran,
                'keluhan' => $subjek,
                'pemeriksaan' => $objek,
                'alergi' => $alergi,
                'lingkar_perut' => $perut,
                'rtl' => $plan,
                'penilaian' => $asesmen,
                'instruksi' => $instruksi,
                'evaluasi' => $evaluasi,
                'nip' => 'D0000004'
            ]);
    }
}
