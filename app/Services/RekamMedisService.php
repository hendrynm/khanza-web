<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use stdClass;

class RekamMedisService
{
    private const TABEL_PASIEN_BAWAAN = 'pasien';
    private const TABEL_KELURAHAN_BAWAAN = 'kelurahan';
    private const TABEL_KECAMATAN_BAWAAN = 'kecamatan';
    private const TABEL_KABUPATEN_BAWAAN = 'kabupaten';
    private const TABEL_PROVINSI_BAWAAN = 'propinsi';
    private const TABEL_REGISTRASI_PERIKSA_BAWAAN = 'reg_periksa';
    private const TABEL_DOKTER_BAWAAN = 'dokter';
    private const TABEL_POLIKLINIK_BAWAAN = 'poliklinik';
    private const TABEL_PENANGGUNG_JAWAB_BAWAAN = 'penjab';
    private const TABEL_DIAGNOSA_PASIEN_BAWAAN = 'diagnosa_pasien';
    private const TABEL_PENYAKIT_BAWAAN = 'penyakit';
    private const TABEL_PROSEDUR_PASIEN_BAWAAN = 'prosedur_pasien';
    private const TABEL_ICD9_BAWAAN = 'icd9';
    private const TABEL_PEMERIKSAAN_RAWAT_JALAN_BAWAAN = 'pemeriksaan_ralan';
    private const TABEL_PEMERIKSAAN_RAWAT_INAP_BAWAAN = 'pemeriksaan_ranap';
    private const TABEL_RAWAT_JALAN_DOKTER_BAWAAN = 'rawat_jl_dr';
    private const TABEL_JENIS_PERAWATAN_BAWAAN = 'jns_perawatan';
    private const TABEL_RAWAT_JALAN_PARAMEDIS_BAWAAN = 'rawat_jl_pr';
    private const TABEL_PETUGAS_BAWAAN = 'petugas';
    private const TABEL_RAWAT_JALAN_DOKTER_PARAMEDIS_BAWAAN = 'rawat_jl_drpr';
    private const TABEL_RAWAT_INAP_DOKTER_BAWAAN = 'rawat_inap_dr';
    private const TABEL_RAWAT_INAP_PARAMEDIS_BAWAAN = 'rawat_inap_pr';
    private const TABEL_RAWAT_INAP_DOKTER_PARAMEDIS_BAWAAN = 'rawat_inap_drpr';
    private const TABEL_KAMAR_INAP_BAWAAN = 'kamar_inap';
    private const TABEL_BANGSAL_BAWAAN = 'bangsal';
    private const TABEL_KAMAR_BAWAAN = 'kamar';
    private const TABEL_OPERASI_BAWAAN = 'operasi';
    private const TABEL_PAKET_OPERASI_BAWAAN = 'paket_operasi';
    private const TABEL_PERIKSA_RADIOLOGI_BAWAAN = 'periksa_radiologi';
    private const TABEL_JENIS_PERAWATAN_RADIOLOGI_BAWAAN = 'jns_perawatan_radiologi';
    private const TABEL_PERIKSA_LABORATORIUM_BAWAAN = 'periksa_lab';
    private const TABEL_JENIS_PERAWATAN_LABORATORIUM_BAWAAN = 'jns_perawatan_lab';
    private const TABEL_DETAIL_PEMERIKSAAN_LABORATORIUM_BAWAAN = 'detail_periksa_lab';
    private const TABEL_TEMPLATE_LABORAORIUM_BAWAAN = 'template_laboratorium';
    private const TABEL_DETAIL_PEMBERIAN_OBAT_BAWAAN = 'detail_pemberian_obat';
    private const TABEL_BARANG_BAWAAN = 'databarang';
    private const TABEL_PEMBERIAN_OBAT_OPERASI_BAWAAN = 'beri_obat_operasi';
    private const TABEL_OBAT_BHP_BAWAAN = 'obatbhp_ok';
    private const TABEL_RESEP_PULANG_BAWAAN = 'resep_pulang';
    private const TABEL_DETAIL_RETUR_JUAL_BAWAAN = 'detreturjual';
    private const TABEL_RETUR_JUAL_BAWAAN = 'returjual';
    private const TABEL_TAMBAHAN_BIAYA_BAWAAN = 'tambahan_biaya';
    private const TABEL_PENGURANGAN_BIAYA_BAWAAN = 'pengurangan_biaya';
    private const TABEL_JABATAN_BAWAAN = 'jabatan';
    private const TABEL_SPESIALIS_BAWAAN = 'spesialis';


    public function getDaftarPasien(): stdClass
    {
        switch(session('level_akses'))
        {
            case(1):
                $nama_pengguna = session('nama_pengguna');
                $pengguna = DB::table('web_plus_autentikasi_pengguna')
                    ->whereRaw("nama_pengguna = AES_ENCRYPT('$nama_pengguna','nur')")
                    ->first();
                $id_pengguna = $pengguna->id_pengguna;

                $korelasi = DB::table('web_plus_autentikasi_korelasi')
                    ->where('id_pengguna', '=', $id_pengguna)
                    ->get();
                $korelasi_arr = [];
                foreach($korelasi as $i=>$k)
                    $korelasi_arr[$i] = $k->nomor;

                $pasien = DB::table(self::TABEL_PASIEN_BAWAAN)
                    ->whereIn('no_rkm_medis', $korelasi_arr)
                    ->get();
                break;

            default:
                $pasien = DB::table(self::TABEL_PASIEN_BAWAAN)
                    ->get();
                break;
        }

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($pasien as $i=>$p) {
            $hasil[$i] = [];
            $hasil[$i]['nomor_medis'] = $p->no_rkm_medis;
            $hasil[$i]['nama'] = $p->nm_pasien;
            $hasil[$i]['nomor_ktp'] = $p->no_ktp;
            $hasil[$i]['tanggal_lahir'] = $p->tgl_lahir;
            $hasil[$i]['nomor_bpjs'] = $p->no_peserta;

            $hasil_objek->$i = (object) $hasil[$i];
        }

        return $hasil_objek;
    }

    public function getDetailPasien(string $nomor_medis): stdClass
    {
        $pasien = DB::table(self::TABEL_PASIEN_BAWAAN)
            ->join(self::TABEL_KELURAHAN_BAWAAN, self::TABEL_PASIEN_BAWAAN.'.kd_kel', '=', self::TABEL_KELURAHAN_BAWAAN.'.kd_kel')
            ->join(self::TABEL_KECAMATAN_BAWAAN, self::TABEL_PASIEN_BAWAAN.'.kd_kec', '=', self::TABEL_KECAMATAN_BAWAAN.'.kd_kec')
            ->join(self::TABEL_KABUPATEN_BAWAAN, self::TABEL_PASIEN_BAWAAN.'.kd_kab', '=', self::TABEL_KABUPATEN_BAWAAN.'.kd_kab')
            ->join(self::TABEL_PROVINSI_BAWAAN, self::TABEL_PASIEN_BAWAAN.'.kd_prop', '=', self::TABEL_PROVINSI_BAWAAN.'.kd_prop')
            ->where(self::TABEL_PASIEN_BAWAAN.'.no_rkm_medis', '=', $nomor_medis)
            ->first();

        $hasil = new stdClass();
        $hasil->nomor_medis = $pasien->no_rkm_medis;
        $hasil->nama = $pasien->nm_pasien;
        $hasil->nomor_ktp = $pasien->no_ktp;
        $hasil->nomor_bpjs = $pasien->no_peserta;
        $hasil->tempat_lahir = $pasien->tmp_lahir;
        $hasil->tanggal_lahir = $pasien->tgl_lahir;
        $hasil->golongan_darah = $pasien->gol_darah;
        $hasil->jenis_kelamin = ($pasien->jk === 'L') ? 'Laki-laki' : 'Perempuan';
        $hasil->alamat = $pasien->alamat;
        $hasil->kelurahan = $pasien->nm_kel;
        $hasil->kecamatan = $pasien->nm_kec;
        $hasil->kabupaten = $pasien->nm_kab;
        $hasil->provinsi = $pasien->nm_prop;
        $hasil->telepon = $pasien->no_tlp;
        $hasil->pekerjaan = $pasien->pekerjaan;
        $hasil->agama = $pasien->agama;
        $hasil->pendidikan = $pasien->pnd;
        $hasil->status_nikah = $pasien->stts_nikah;
        $hasil->nama_ibu = $pasien->nm_ibu;

        return $hasil;
    }

    public function getDetailRegistrasiPeriksa(string $nomor_medis): stdClass
    {
        $periksa = DB::table(self::TABEL_REGISTRASI_PERIKSA_BAWAAN)
            ->select([
                self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.no_reg',
                self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.no_rawat',
                self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.tgl_registrasi',
                self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.jam_reg',
                self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.kd_dokter',
                self::TABEL_DOKTER_BAWAAN.'.nm_dokter',
                self::TABEL_POLIKLINIK_BAWAAN.'.nm_poli',
                self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.p_jawab',
                self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.almt_pj',
                self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.hubunganpj',
                self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.biaya_reg',
                self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.status_lanjut',
                self::TABEL_PENANGGUNG_JAWAB_BAWAAN.'.png_jawab'
            ])
            ->join(self::TABEL_DOKTER_BAWAAN, self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.kd_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->join(self::TABEL_POLIKLINIK_BAWAAN, self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.kd_poli', '=', self::TABEL_POLIKLINIK_BAWAAN.'.kd_poli')
            ->join(self::TABEL_PENANGGUNG_JAWAB_BAWAAN, self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.kd_pj', '=', self::TABEL_PENANGGUNG_JAWAB_BAWAAN.'.kd_pj')
            ->where('stts', '<>', 'Batal')
            ->where(self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.no_rkm_medis', '=', $nomor_medis)
            ->orderBy(self::TABEL_REGISTRASI_PERIKSA_BAWAAN.'.tgl_registrasi', 'desc')
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($periksa as $i=>$p) {
            $hasil[$i] = [];
            $hasil[$i]['nomor_registrasi'] = $p->no_reg;
            $hasil[$i]['nomor_rawat'] = $p->no_rawat;
            $hasil[$i]['tanggal_registrasi'] = $p->tgl_registrasi;
            $hasil[$i]['jam_registrasi'] = $p->jam_reg;
            $hasil[$i]['dokter'] = $p->nm_dokter;
            $hasil[$i]['poliklinik'] = $p->nm_poli;
            $hasil[$i]['penanggung_jawab'] = $p->png_jawab;
            $hasil[$i]['alamat_penanggung_jawab'] = $p->almt_pj;
            $hasil[$i]['hubungan_penanggung_jawab'] = $p->hubunganpj;
            $hasil[$i]['biaya_registrasi'] = $p->biaya_reg;
            $hasil[$i]['status_lanjut'] = $p->status_lanjut;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailDiagnosa(string $nomor_rawat): stdClass
    {
        $diagnosa = DB::table(self::TABEL_DIAGNOSA_PASIEN_BAWAAN)
            ->select([
                self::TABEL_DIAGNOSA_PASIEN_BAWAAN.'.kd_penyakit',
                self::TABEL_PENYAKIT_BAWAAN.'.nm_penyakit',
                self::TABEL_DIAGNOSA_PASIEN_BAWAAN.'.status'
            ])
            ->join(self::TABEL_PENYAKIT_BAWAAN, self::TABEL_DIAGNOSA_PASIEN_BAWAAN.'.kd_penyakit', '=', self::TABEL_PENYAKIT_BAWAAN.'.kd_penyakit')
            ->where(self::TABEL_DIAGNOSA_PASIEN_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($diagnosa as $i=>$d) {
            $hasil[$i] = [];
            $hasil[$i]['kode_penyakit'] = $d->kd_penyakit;
            $hasil[$i]['nama_penyakit'] = $d->nm_penyakit;
            $hasil[$i]['status'] = $d->status;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailProsedur(string $nomor_rawat): stdClass
    {
        $prosedur = DB::table(self::TABEL_PROSEDUR_PASIEN_BAWAAN)
            ->select([
                self::TABEL_PROSEDUR_PASIEN_BAWAAN.'.kode',
                self::TABEL_ICD9_BAWAAN.'.deskripsi_panjang',
                self::TABEL_PROSEDUR_PASIEN_BAWAAN.'.status'
            ])
            ->join(self::TABEL_ICD9_BAWAAN, self::TABEL_PROSEDUR_PASIEN_BAWAAN.'.kode', '=', self::TABEL_ICD9_BAWAAN.'.kode')
            ->where(self::TABEL_PROSEDUR_PASIEN_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($prosedur as $i=>$p) {
            $hasil[$i] = [];
            $hasil[$i]['kode'] = $p->kode;
            $hasil[$i]['deskripsi_panjang'] = $p->deskripsi_panjang;
            $hasil[$i]['status'] = $p->status;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailPemeriksaanRawatJalan(string $nomor_rawat): stdClass
    {
        $ralan = DB::table(self::TABEL_PEMERIKSAAN_RAWAT_JALAN_BAWAAN)
            ->leftJoin(self::TABEL_DOKTER_BAWAAN, self::TABEL_PEMERIKSAAN_RAWAT_JALAN_BAWAAN.'.nip', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->leftJoin(self::TABEL_PETUGAS_BAWAAN, self::TABEL_PEMERIKSAAN_RAWAT_JALAN_BAWAAN.'.nip', '=', self::TABEL_PETUGAS_BAWAAN.'.nip')
            ->leftJoin(self::TABEL_JABATAN_BAWAAN, self::TABEL_PETUGAS_BAWAAN.'.kd_jbtn', '=', self::TABEL_JABATAN_BAWAAN.'.kd_jbtn')
            ->leftJoin(self::TABEL_SPESIALIS_BAWAAN, self::TABEL_DOKTER_BAWAAN.'.kd_sps', '=', self::TABEL_SPESIALIS_BAWAAN.'.kd_sps')
            ->orderByDesc('tgl_perawatan')
            ->where('no_rawat', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($ralan as $i=>$r) {
            $hasil[$i] = [];
            $hasil[$i]['tanggal'] = $r->tgl_perawatan;
            $hasil[$i]['jam'] = $r->jam_rawat;
            $hasil[$i]['suhu'] = $r->suhu_tubuh;
            $hasil[$i]['tensi'] = $r->tensi;
            $hasil[$i]['nadi'] = $r->nadi;
            $hasil[$i]['respirasi'] = $r->respirasi;
            $hasil[$i]['tinggi'] = $r->tinggi;
            $hasil[$i]['berat'] = $r->berat;
            $hasil[$i]['gcs'] = $r->gcs;
            $hasil[$i]['spo2'] = $r->spo2;
            $hasil[$i]['keluhan'] = $r->keluhan;
            $hasil[$i]['kesadaran'] = $r->kesadaran;
            $hasil[$i]['pemeriksaan'] = $r->pemeriksaan;
            $hasil[$i]['alergi'] = $r->alergi;
            $hasil[$i]['lingkar_perut'] = $r->lingkar_perut;
            $hasil[$i]['rencana_tindak_lanjut'] = $r->rtl;
            $hasil[$i]['penilaian'] = $r->penilaian;
            $hasil[$i]['instruksi'] = $r->instruksi;
            $hasil[$i]['evaluasi'] = $r->evaluasi;
            $hasil[$i]['nip'] = $r->nip;
            $hasil[$i]['jenis_petugas'] = ($r->nm_dokter != null) ? 'Dokter' : 'Petugas';
            $hasil[$i]['nama'] = $r->nama ?? $r->nm_dokter;
            $hasil[$i]['jabatan'] = $r->nm_jbtn ?? $r->nm_sps;

            $hasil_objek->$i = (object)$hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailPemeriksaanRawatInap(string $nomor_rawat): stdClass
    {
        $ranap = DB::table(self::TABEL_PEMERIKSAAN_RAWAT_INAP_BAWAAN)
            ->leftJoin(self::TABEL_DOKTER_BAWAAN, self::TABEL_PEMERIKSAAN_RAWAT_INAP_BAWAAN.'.nip', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->leftJoin(self::TABEL_PETUGAS_BAWAAN, self::TABEL_PEMERIKSAAN_RAWAT_INAP_BAWAAN.'.nip', '=', self::TABEL_PETUGAS_BAWAAN.'.nip')
            ->leftJoin(self::TABEL_JABATAN_BAWAAN, self::TABEL_PETUGAS_BAWAAN.'.kd_jbtn', '=', self::TABEL_JABATAN_BAWAAN.'.kd_jbtn')
            ->leftJoin(self::TABEL_SPESIALIS_BAWAAN, self::TABEL_DOKTER_BAWAAN.'.kd_sps', '=', self::TABEL_SPESIALIS_BAWAAN.'.kd_sps')
            ->orderByDesc('tgl_perawatan')
            ->where('no_rawat', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($ranap as $i=>$r) {
            $hasil[$i] = [];
            $hasil[$i]['tanggal'] = $r->tgl_perawatan;
            $hasil[$i]['jam'] = $r->jam_rawat;
            $hasil[$i]['suhu'] = $r->suhu_tubuh;
            $hasil[$i]['tensi'] = $r->tensi;
            $hasil[$i]['nadi'] = $r->nadi;
            $hasil[$i]['respirasi'] = $r->respirasi;
            $hasil[$i]['tinggi'] = $r->tinggi;
            $hasil[$i]['berat'] = $r->berat;
            $hasil[$i]['gcs'] = $r->gcs;
            $hasil[$i]['spo2'] = $r->spo2;
            $hasil[$i]['keluhan'] = $r->keluhan;
            $hasil[$i]['kesadaran'] = $r->kesadaran;
            $hasil[$i]['pemeriksaan'] = $r->pemeriksaan;
            $hasil[$i]['alergi'] = $r->alergi;
            $hasil[$i]['lingkar_perut'] = $r->lingkar_perut ?? '-';
            $hasil[$i]['rencana_tindak_lanjut'] = $r->rtl;
            $hasil[$i]['penilaian'] = $r->penilaian;
            $hasil[$i]['instruksi'] = $r->instruksi;
            $hasil[$i]['evaluasi'] = $r->evaluasi;
            $hasil[$i]['nip'] = $r->nip;
            $hasil[$i]['jenis_petugas'] = ($r->nm_dokter != null) ? 'Dokter' : 'Petugas';
            $hasil[$i]['nama'] = $r->nama ?? $r->nm_dokter;
            $hasil[$i]['jabatan'] = $r->nm_jbtn ?? $r->nm_sps;

            $hasil_objek->$i = (object)$hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailDokter(string $kode_dokter): array
    {
        $dokter = DB::table(self::TABEL_DOKTER_BAWAAN)
            ->select(['kd_dokter', 'nm_dokter'])
            ->where('kd_dokter', '=', $kode_dokter)
            ->first();

        $hasil = [];
        $hasil['kode_dokter'] = $dokter->kd_dokter;
        $hasil['nama_dokter'] = $dokter->nm_dokter;

        return $hasil;
    }
}
