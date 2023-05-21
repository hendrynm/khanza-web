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
//        $diagnosa = new stdClass();
//        $prosedur = new stdClass();
//        $rawat_jalan = new stdClass();
//        $rawat_inap = new stdClass();
//        $ralan_dokter = new stdClass();
//        $ralan_paramedis = new stdClass();
//        $ralan_dokpar = new stdClass();
//        $ranap_dokter = new stdClass();
//        $ranap_paramedis = new stdClass();
//        $ranap_dokpar = new stdClass();
//        $kamar_inap = new stdClass();
//        $operasi = new stdClass();
//        $periksa_radiologi = new stdClass();
//        $periksa_laboratorium = new stdClass();
//        $beri_obat = new stdClass();
//        $beri_obat_operasi = new stdClass();
//        $resep_pulang = new stdClass();
//        $retur_obat = new stdClass();
//        $tambah_biaya = new stdClass();
//        $kurang_biaya = new stdClass();

        $nomor_medis = base64_decode($nomor_medis_base64);
        $pasien = $this->rekamMedis->getDetailPasien($nomor_medis);
        $periksa = $this->rekamMedis->getDetailRegistrasiPeriksa($nomor_medis);
//
//        foreach($periksa as $i=>$p) {
//            $nomor_rawat = $p->nomor_rawat;
//            $diagnosa->$i = $this->rekamMedis->getDetailDiagnosa($nomor_rawat);
//            $prosedur->$i = $this->rekamMedis->getDetailProsedur($nomor_rawat);
//            $rawat_jalan->$i = $this->rekamMedis->getDetailPemeriksaanRawatJalan($nomor_rawat);
//            $rawat_inap->$i = $this->rekamMedis->getDetailPemeriksaanRawatInap($nomor_rawat);
//            $ralan_dokter->$i = $this->rekamMedis->getDetailRawatJalanDokter($nomor_rawat);
//            $ralan_paramedis->$i = $this->rekamMedis->getDetailRawatJalanParamedis($nomor_rawat);
//            $ralan_dokpar->$i = $this->rekamMedis->getDetailRawatJalanDokterParamedis($nomor_rawat);
//            $ranap_dokter->$i = $this->rekamMedis->getDetailRawatInapDokter($nomor_rawat);
//            $ranap_paramedis->$i = $this->rekamMedis->getDetailRawatInapParamedis($nomor_rawat);
//            $ranap_dokpar->$i = $this->rekamMedis->getDetailRawatInapDokterParamedis($nomor_rawat);
//            $kamar_inap->$i = $this->rekamMedis->getDetailKamarInap($nomor_rawat);
//            $operasi->$i = $this->rekamMedis->getDetailOperasi($nomor_rawat);
//            $periksa_radiologi->$i = $this->rekamMedis->getDetailPemeriksaanRadiologi($nomor_rawat);
//
//            $periksa_laboratorium->$i = new stdClass();
//            $periksa_laboratorium->$i = $this->rekamMedis->getDetailPemeriksaanLaboratorium($nomor_rawat);
//            foreach($periksa_radiologi->$i as $j=>$pr) {
//                $periksa_laboratorium->$i->$j = $this->rekamMedis->getDetailDetailPemeriksaanLaboratorium($p->nomor_rawat, $pr->kode, $pr->tanggal, $pr->jam);
//            }
//
//            $beri_obat->$i = $this->rekamMedis->getDetailPemberianObat($nomor_rawat);
//            $beri_obat_operasi->$i = $this->rekamMedis->getDetailPemberianObatOperasi($nomor_rawat);
//            $resep_pulang->$i = $this->rekamMedis->getDetailResepPulang($nomor_rawat);
//            $retur_obat->$i = $this->rekamMedis->getDetailReturObat($nomor_rawat);
//            $tambah_biaya->$i = $this->rekamMedis->getDetailTambahanBiaya($nomor_rawat);
//            $kurang_biaya->$i = $this->rekamMedis->getDetailPenguranganBiaya($nomor_rawat);
//        }

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
