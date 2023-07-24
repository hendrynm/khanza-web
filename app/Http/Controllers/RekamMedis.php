<?php

namespace App\Http\Controllers;

use App\Services\RekamMedisService;
use Illuminate\Contracts\View\View;
use stdClass;

class RekamMedis extends Controller
{
    public RekamMedisService $rekamMedis;

    public function __construct(RekamMedisService $rekamMedis)
    {
        $this->rekamMedis = $rekamMedis;
    }

    public function beranda(): View
    {
        $pasien = $this->rekamMedis->getDaftarPasien();

        return view('rekam_medis.beranda', ['pasien' => $pasien]);
    }

    public function profil(string $nomor_medis_base64): View
    {
        $nomor_medis = base64_decode($nomor_medis_base64);
        $pasien = $this->rekamMedis->getDetailPasien($nomor_medis);
        $periksa = $this->rekamMedis->getDetailRegistrasiPeriksa($nomor_medis);

        return view('rekam_medis.profil', [
            'pasien' => $pasien,
            'periksa' => $periksa,
        ]);
    }

    public function detail(string $nomor_medis_base64, string $nomor_rawat_base64): View
    {
        $nomor_medis = base64_decode($nomor_medis_base64);
        $nomor_rawat = base64_decode($nomor_rawat_base64);

        $diagnosa = $this->rekamMedis->getDetailDiagnosa($nomor_rawat);
        $prosedur = $this->rekamMedis->getDetailProsedur($nomor_rawat);
        $rawat_jalan = $this->rekamMedis->getDetailPemeriksaanRawatJalan($nomor_rawat);
        $rawat_inap = $this->rekamMedis->getDetailPemeriksaanRawatInap($nomor_rawat);

        $periksa = $this->rekamMedis->getDetailRegistrasiPeriksa($nomor_medis);

        return view('rekam_medis.detail', [
            'periksa' => $periksa,
            'diagnosa' => $diagnosa,
            'prosedur' => $prosedur,
            'rawat_jalan' => $rawat_jalan,
            'rawat_inap' => $rawat_inap,
        ]);
    }
}
