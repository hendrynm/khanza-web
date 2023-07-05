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

    public function getDetailRawatJalanDokter(string $nomor_rawat): stdClass
    {
        $dokter = DB::table(self::TABEL_RAWAT_JALAN_DOKTER_BAWAAN)
            ->select([
                self::TABEL_RAWAT_JALAN_DOKTER_BAWAAN.'.kd_jenis_prw',
                self::TABEL_JENIS_PERAWATAN_BAWAAN.'.nm_perawatan',
                self::TABEL_DOKTER_BAWAAN.'.nm_dokter',
                self::TABEL_RAWAT_JALAN_DOKTER_BAWAAN.'.biaya_rawat'
            ])
            ->join(self::TABEL_JENIS_PERAWATAN_BAWAAN, self::TABEL_RAWAT_JALAN_DOKTER_BAWAAN.'.kd_jenis_prw', '=', self::TABEL_JENIS_PERAWATAN_BAWAAN.'.kd_jenis_prw')
            ->join(self::TABEL_DOKTER_BAWAAN, self::TABEL_RAWAT_JALAN_DOKTER_BAWAAN.'.kd_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->where(self::TABEL_RAWAT_JALAN_DOKTER_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($dokter as $i=>$d) {
            $hasil[$i] = [];
            $hasil[$i]['kode_jenis_perawatan'] = $d->kd_jenis_prw;
            $hasil[$i]['nama_perawatan'] = $d->nm_perawatan;
            $hasil[$i]['nama_dokter'] = $d->nm_dokter;
            $hasil[$i]['biaya'] = $d->biaya_rawat;

            $hasil_objek->$i = (object)$hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailRawatJalanParamedis(string $nomor_rawat): stdClass
    {
        $perawatan = DB::table(self::TABEL_RAWAT_JALAN_PARAMEDIS_BAWAAN)
            ->select([
                self::TABEL_RAWAT_JALAN_PARAMEDIS_BAWAAN.'.kd_jenis_prw',
                self::TABEL_JENIS_PERAWATAN_BAWAAN.'.nm_perawatan',
                self::TABEL_PETUGAS_BAWAAN.'.nama',
                self::TABEL_RAWAT_JALAN_PARAMEDIS_BAWAAN.'.biaya_rawat'
            ])
            ->join(self::TABEL_JENIS_PERAWATAN_BAWAAN, self::TABEL_RAWAT_JALAN_PARAMEDIS_BAWAAN.'.kd_jenis_prw', '=', self::TABEL_JENIS_PERAWATAN_BAWAAN.'.kd_jenis_prw')
            ->join(self::TABEL_PETUGAS_BAWAAN, self::TABEL_RAWAT_JALAN_PARAMEDIS_BAWAAN.'.nip', '=', self::TABEL_PETUGAS_BAWAAN.'.nip')
            ->where(self::TABEL_RAWAT_JALAN_PARAMEDIS_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($perawatan as $i=>$p) {
            $hasil[$i] = [];
            $hasil[$i]['kode_jenis_perawatan'] = $p->kd_jenis_prw;
            $hasil[$i]['nama_perawatan'] = $p->nm_perawatan;
            $hasil[$i]['nama_petugas'] = $p->nama;
            $hasil[$i]['biaya'] = $p->biaya_rawat;

            $hasil_objek->$i = (object)$hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailRawatJalanDokterParamedis(string $nomor_rawat): stdClass
    {
        $rawat = DB::table(self::TABEL_RAWAT_JALAN_DOKTER_PARAMEDIS_BAWAAN)
            ->select([
                self::TABEL_RAWAT_JALAN_DOKTER_PARAMEDIS_BAWAAN.'.kd_jenis_prw',
                self::TABEL_JENIS_PERAWATAN_BAWAAN.'.nm_perawatan',
                self::TABEL_DOKTER_BAWAAN.'.nm_dokter',
                self::TABEL_PETUGAS_BAWAAN.'.nama',
                self::TABEL_RAWAT_JALAN_DOKTER_PARAMEDIS_BAWAAN.'.biaya_rawat'
            ])
            ->join(self::TABEL_JENIS_PERAWATAN_BAWAAN, self::TABEL_RAWAT_JALAN_DOKTER_PARAMEDIS_BAWAAN.'.kd_jenis_prw', '=', self::TABEL_JENIS_PERAWATAN_BAWAAN.'.kd_jenis_prw')
            ->join(self::TABEL_DOKTER_BAWAAN, self::TABEL_RAWAT_JALAN_DOKTER_PARAMEDIS_BAWAAN.'.kd_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->join(self::TABEL_PETUGAS_BAWAAN, self::TABEL_RAWAT_JALAN_DOKTER_PARAMEDIS_BAWAAN.'.nip', '=', self::TABEL_PETUGAS_BAWAAN.'.nip')
            ->where(self::TABEL_RAWAT_JALAN_DOKTER_PARAMEDIS_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($rawat as $i=>$r) {
            $hasil[$i] = [];
            $hasil[$i]['kode_jenis_perawatan'] = $r->kd_jenis_prw;
            $hasil[$i]['nama_perawatan'] = $r->nm_perawatan;
            $hasil[$i]['nama_dokter'] = $r->nm_dokter;
            $hasil[$i]['nama_petugas'] = $r->nama;
            $hasil[$i]['biaya'] = $r->biaya_rawat;

            $hasil_objek->$i = (object)$hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailRawatInapDokter(string $nomor_rawat): stdClass
    {
        $dokter = DB::table(self::TABEL_RAWAT_INAP_DOKTER_BAWAAN)
            ->select([
                self::TABEL_RAWAT_INAP_DOKTER_BAWAAN.'.tgl_perawatan',
                self::TABEL_RAWAT_INAP_DOKTER_BAWAAN.'.jam_rawat',
                self::TABEL_RAWAT_INAP_DOKTER_BAWAAN.'.kd_jenis_prw',
                self::TABEL_JENIS_PERAWATAN_BAWAAN.'.nm_perawatan',
                self::TABEL_DOKTER_BAWAAN.'.nm_dokter',
                self::TABEL_RAWAT_INAP_DOKTER_BAWAAN.'.biaya_rawat'
            ])
            ->join(self::TABEL_JENIS_PERAWATAN_BAWAAN, self::TABEL_RAWAT_INAP_DOKTER_BAWAAN.'.kd_jenis_prw', '=', self::TABEL_JENIS_PERAWATAN_BAWAAN.'.kd_jenis_prw')
            ->join(self::TABEL_DOKTER_BAWAAN, self::TABEL_RAWAT_INAP_DOKTER_BAWAAN.'.kd_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->where(self::TABEL_RAWAT_INAP_DOKTER_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($dokter as $i=>$d) {
            $hasil[$i] = [];
            $hasil[$i]['tanggal_rawat'] = $d->tgl_perawatan;
            $hasil[$i]['jam_rawat'] = $d->jam_rawat;
            $hasil[$i]['kode_jenis_perawatan'] = $d->kd_jenis_prw;
            $hasil[$i]['nama_perawatan'] = $d->nm_perawatan;
            $hasil[$i]['nama_dokter'] = $d->nm_dokter;
            $hasil[$i]['biaya'] = $d->biaya_rawat;

            $hasil_objek->$i = (object)$hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailRawatInapParamedis(string $nomor_rawat): stdClass
    {
        $paramedis = DB::table(self::TABEL_RAWAT_INAP_PARAMEDIS_BAWAAN)
            ->select([
                self::TABEL_RAWAT_INAP_PARAMEDIS_BAWAAN.'.tgl_perawatan',
                self::TABEL_RAWAT_INAP_PARAMEDIS_BAWAAN.'.jam_rawat',
                self::TABEL_RAWAT_INAP_PARAMEDIS_BAWAAN.'.kd_jenis_prw',
                self::TABEL_JENIS_PERAWATAN_BAWAAN.'.nm_perawatan',
                self::TABEL_PETUGAS_BAWAAN.'.nama',
                self::TABEL_RAWAT_INAP_PARAMEDIS_BAWAAN.'.biaya_rawat'
            ])
            ->join(self::TABEL_JENIS_PERAWATAN_BAWAAN, self::TABEL_RAWAT_INAP_PARAMEDIS_BAWAAN.'.kd_jenis_prw', '=', self::TABEL_JENIS_PERAWATAN_BAWAAN.'.kd_jenis_prw')
            ->join(self::TABEL_PETUGAS_BAWAAN, self::TABEL_RAWAT_INAP_PARAMEDIS_BAWAAN.'.nip', '=', self::TABEL_PETUGAS_BAWAAN.'.nip')
            ->where(self::TABEL_RAWAT_INAP_PARAMEDIS_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($paramedis as $i=>$p) {
            $hasil[$i] = [];
            $hasil[$i]['tanggal_rawat'] = $p->tgl_perawatan;
            $hasil[$i]['jam_rawat'] = $p->jam_rawat;
            $hasil[$i]['kode_jenis_perawatan'] = $p->kd_jenis_prw;
            $hasil[$i]['nama_perawatan'] = $p->nm_perawatan;
            $hasil[$i]['nama_petugas'] = $p->nama;
            $hasil[$i]['biaya'] = $p->biaya_rawat;

            $hasil_objek->$i = (object)$hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailRawatInapDokterParamedis(string $nomor_rawat): stdClass
    {
        $dokpar = DB::table(self::TABEL_RAWAT_INAP_DOKTER_PARAMEDIS_BAWAAN)
            ->select([
                self::TABEL_RAWAT_INAP_DOKTER_PARAMEDIS_BAWAAN.'.tgl_perawatan',
                self::TABEL_RAWAT_INAP_DOKTER_PARAMEDIS_BAWAAN.'.jam_rawat',
                self::TABEL_RAWAT_INAP_DOKTER_PARAMEDIS_BAWAAN.'.kd_jenis_prw',
                self::TABEL_JENIS_PERAWATAN_BAWAAN.'.nm_perawatan',
                self::TABEL_DOKTER_BAWAAN.'.nm_dokter',
                self::TABEL_PETUGAS_BAWAAN.'.nama',
                self::TABEL_RAWAT_INAP_DOKTER_PARAMEDIS_BAWAAN.'.biaya_rawat'
            ])
            ->join(self::TABEL_JENIS_PERAWATAN_BAWAAN, self::TABEL_RAWAT_INAP_DOKTER_PARAMEDIS_BAWAAN.'.kd_jenis_prw', '=', self::TABEL_JENIS_PERAWATAN_BAWAAN.'.kd_jenis_prw')
            ->join(self::TABEL_DOKTER_BAWAAN, self::TABEL_RAWAT_INAP_DOKTER_PARAMEDIS_BAWAAN.'.kd_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->join(self::TABEL_PETUGAS_BAWAAN, self::TABEL_RAWAT_INAP_DOKTER_PARAMEDIS_BAWAAN.'.nip', '=', self::TABEL_PETUGAS_BAWAAN.'.nip')
            ->where(self::TABEL_RAWAT_INAP_DOKTER_PARAMEDIS_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($dokpar as $i=>$dp) {
            $hasil[$i] = [];
            $hasil[$i]['tanggal_rawat'] = $dp->tgl_perawatan;
            $hasil[$i]['jam_rawat'] = $dp->jam_rawat;
            $hasil[$i]['kode_jenis_perawatan'] = $dp->kd_jenis_prw;
            $hasil[$i]['nama_perawatan'] = $dp->nm_perawatan;
            $hasil[$i]['nama_dokter'] = $dp->nm_dokter;
            $hasil[$i]['nama_petugas'] = $dp->nama;
            $hasil[$i]['biaya'] = $dp->biaya_rawat;

            $hasil_objek->$i = (object)$hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailKamarInap(string $nomor_rawat): stdClass
    {
        $kamar = DB::table(self::TABEL_KAMAR_INAP_BAWAAN)
            ->select([
                self::TABEL_KAMAR_INAP_BAWAAN.'.kd_kamar',
                self::TABEL_KAMAR_INAP_BAWAAN.'.tgl_masuk',
                self::TABEL_KAMAR_INAP_BAWAAN.'.tgl_keluar',
                self::TABEL_KAMAR_INAP_BAWAAN.'.stts_pulang',
                self::TABEL_KAMAR_INAP_BAWAAN.'.lama',
                self::TABEL_KAMAR_INAP_BAWAAN.'.jam_masuk',
                self::TABEL_KAMAR_INAP_BAWAAN.'.jam_keluar',
                self::TABEL_KAMAR_INAP_BAWAAN.'.ttl_biaya',
                self::TABEL_BANGSAL_BAWAAN.'.nm_bangsal',
            ])
            ->join(self::TABEL_BANGSAL_BAWAAN, self::TABEL_KAMAR_INAP_BAWAAN.'.kd_kamar', '=', self::TABEL_BANGSAL_BAWAAN.'.kd_bangsal')
            ->join(self::TABEL_KAMAR_BAWAAN, self::TABEL_KAMAR_INAP_BAWAAN.'.kd_kamar', '=', self::TABEL_KAMAR_BAWAAN.'.kd_kamar')
            ->where(self::TABEL_KAMAR_INAP_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($kamar as $i=>$k) {
            $hasil[$i] = [];
            $hasil[$i]['kode_kamar'] = $k->kd_kamar;
            $hasil[$i]['tanggal_masuk'] = $k->tgl_masuk;
            $hasil[$i]['tanggal_keluar'] = $k->tgl_keluar;
            $hasil[$i]['status_pulang'] = $k->stts_pulang;
            $hasil[$i]['lama'] = $k->lama;
            $hasil[$i]['jam_masuk'] = $k->jam_masuk;
            $hasil[$i]['jam_keluar'] = $k->jam_keluar;
            $hasil[$i]['total_biaya'] = $k->ttl_biaya;
            $hasil[$i]['nama_bangsal'] = $k->nm_bangsal;

            $hasil_objek->$i = (object)$hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailOperasi(string $nomor_rawat): stdClass
    {
        $operasi = DB::table(self::TABEL_OPERASI_BAWAAN)
            ->select([
                self::TABEL_OPERASI_BAWAAN.'.tgl_operasi',
                self::TABEL_OPERASI_BAWAAN.'.jenis_anasthesi',
                self::TABEL_OPERASI_BAWAAN.'.operator1',
                self::TABEL_OPERASI_BAWAAN.'.operator2',
                self::TABEL_OPERASI_BAWAAN.'.operator3',
                self::TABEL_OPERASI_BAWAAN.'.asisten_operator1',
                self::TABEL_OPERASI_BAWAAN.'.asisten_operator2',
                self::TABEL_OPERASI_BAWAAN.'.instrumen',
                self::TABEL_OPERASI_BAWAAN.'.dokter_anak',
                self::TABEL_OPERASI_BAWAAN.'.perawaat_resusitas',
                self::TABEL_OPERASI_BAWAAN.'.dokter_anestesi',
                self::TABEL_OPERASI_BAWAAN.'.asisten_anestesi',
                self::TABEL_OPERASI_BAWAAN.'.bidan',
                self::TABEL_OPERASI_BAWAAN.'.bidan2',
                self::TABEL_OPERASI_BAWAAN.'.bidan3',
                self::TABEL_OPERASI_BAWAAN.'.perawat_luar',
                self::TABEL_OPERASI_BAWAAN.'.omloop',
                self::TABEL_OPERASI_BAWAAN.'.omloop2',
                self::TABEL_OPERASI_BAWAAN.'.omloop3',
                self::TABEL_OPERASI_BAWAAN.'.kode_paket',
                self::TABEL_PAKET_OPERASI_BAWAAN.'.nm_perawatan',
                self::TABEL_OPERASI_BAWAAN.'.biayaoperator1',
                self::TABEL_OPERASI_BAWAAN.'.biayaoperator2',
                self::TABEL_OPERASI_BAWAAN.'.biayaoperator3',
                self::TABEL_OPERASI_BAWAAN.'.biayaasisten_operator1',
                self::TABEL_OPERASI_BAWAAN.'.biayaasisten_operator2',
                self::TABEL_OPERASI_BAWAAN.'.biayainstrumen',
                self::TABEL_OPERASI_BAWAAN.'.biayadokter_anak',
                self::TABEL_OPERASI_BAWAAN.'.biayaperawaat_resusitas',
                self::TABEL_OPERASI_BAWAAN.'.biayadokter_anestesi',
                self::TABEL_OPERASI_BAWAAN.'.biayaasisten_anestesi',
                self::TABEL_OPERASI_BAWAAN.'.biayabidan',
                self::TABEL_OPERASI_BAWAAN.'.biayabidan2',
                self::TABEL_OPERASI_BAWAAN.'.biayabidan3',
                self::TABEL_OPERASI_BAWAAN.'.biayaperawat_luar',
                self::TABEL_OPERASI_BAWAAN.'.biayaalat',
                self::TABEL_OPERASI_BAWAAN.'.biayasewaok',
                self::TABEL_OPERASI_BAWAAN.'.akomodasi',
                self::TABEL_OPERASI_BAWAAN.'.bagian_rs',
                self::TABEL_OPERASI_BAWAAN.'.biaya_omloop',
                self::TABEL_OPERASI_BAWAAN.'.biaya_omloop2',
                self::TABEL_OPERASI_BAWAAN.'.biaya_omloop3',
                self::TABEL_OPERASI_BAWAAN.'.biayasarpras',
                DB::raw('('.self::TABEL_OPERASI_BAWAAN.'.biayaoperator1 +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayaoperator2 +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayaoperator3 +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayaasisten_operator1 +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayaasisten_operator2 +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayainstrumen +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayadokter_anak +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayaperawaat_resusitas +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayadokter_anestesi +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayaasisten_anestesi +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayabidan +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayabidan2 +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayabidan3 +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayaperawat_luar +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayaalat +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayasewaok +'.
                    self::TABEL_OPERASI_BAWAAN.'.akomodasi +'.
                    self::TABEL_OPERASI_BAWAAN.'.bagian_rs +'.
                    self::TABEL_OPERASI_BAWAAN.'.biaya_omloop +'.
                    self::TABEL_OPERASI_BAWAAN.'.biaya_omloop2 +'.
                    self::TABEL_OPERASI_BAWAAN.'.biaya_omloop3 +'.
                    self::TABEL_OPERASI_BAWAAN.'.biayasarpras)'.' as total')
            ])
            ->join(self::TABEL_PAKET_OPERASI_BAWAAN, self::TABEL_OPERASI_BAWAAN.'.kode_paket', '=', self::TABEL_PAKET_OPERASI_BAWAAN.'.kode_paket')
            ->where(self::TABEL_OPERASI_BAWAAN.'.no_rawat','=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($operasi as $i=>$o)
        {
            $hasil[$i] = [];
            $hasil[$i]['tanggal_operasi'] = $o->tgl_operasi;
            $hasil[$i]['jenis_anasthesi'] = $o->jenis_anasthesi;
            $hasil[$i]['operator_1'] = $o->operator1;
            $hasil[$i]['operator_2'] = $o->operator2;
            $hasil[$i]['operator_3'] = $o->operator3;
            $hasil[$i]['asisten_operator_1'] = $o->asisten_operator1;
            $hasil[$i]['asisten_operator_2'] = $o->asisten_operator2;
            $hasil[$i]['instrumen'] = $o->instrumen;
            $hasil[$i]['dokter_anak'] = $o->dokter_anak;
            $hasil[$i]['perawaat_resusitas'] = $o->perawaat_resusitas;
            $hasil[$i]['dokter_anestesi'] = $o->dokter_anestesi;
            $hasil[$i]['asisten_anestesi'] = $o->asisten_anestesi;
            $hasil[$i]['bidan_1'] = $o->bidan;
            $hasil[$i]['bidan_2'] = $o->bidan2;
            $hasil[$i]['bidan_3'] = $o->bidan3;
            $hasil[$i]['perawat_luar'] = $o->perawat_luar;
            $hasil[$i]['omloop_1'] = $o->omloop;
            $hasil[$i]['omloop_2'] = $o->omloop2;
            $hasil[$i]['omloop_3'] = $o->omloop3;
            $hasil[$i]['kode_paket'] = $o->kode_paket;
            $hasil[$i]['nama_perawatan'] = $o->nm_perawatan;
            $hasil[$i]['biaya_operator_1'] = $o->biayaoperator1;
            $hasil[$i]['biaya_operator_2'] = $o->biayaoperator2;
            $hasil[$i]['biaya_operator_3'] = $o->biayaoperator3;
            $hasil[$i]['biaya_asisten_operator_1'] = $o->biayaasisten_operator1;
            $hasil[$i]['biaya_asisten_operator_2'] = $o->biayaasisten_operator2;
            $hasil[$i]['biaya_instrumen'] = $o->biayainstrumen;
            $hasil[$i]['biaya_dokter_anak'] = $o->biayadokter_anak;
            $hasil[$i]['biaya_perawaat_resusitas'] = $o->biayaperawaat_resusitas;
            $hasil[$i]['biaya_dokter_anestesi'] = $o->biayadokter_anestesi;
            $hasil[$i]['biaya_asisten_anestesi'] = $o->biayaasisten_anestesi;
            $hasil[$i]['biaya_bidan_1'] = $o->biayabidan;
            $hasil[$i]['biaya_bidan_2'] = $o->biayabidan2;
            $hasil[$i]['biaya_bidan_3'] = $o->biayabidan3;
            $hasil[$i]['biaya_perawat_luar'] = $o->biayaperawat_luar;
            $hasil[$i]['biaya_alat'] = $o->biayaalat;
            $hasil[$i]['biaya_sewa_ok'] = $o->biayasewaok;
            $hasil[$i]['akomodasi'] = $o->akomodasi;
            $hasil[$i]['bagian_rs'] = $o->bagian_rs;
            $hasil[$i]['biaya_omloop_1'] = $o->biaya_omloop;
            $hasil[$i]['biaya_omloop_2'] = $o->biaya_omloop2;
            $hasil[$i]['biaya_omloop_3'] = $o->biaya_omloop3;
            $hasil[$i]['biaya_sarpras'] = $o->biayasarpras;
            $hasil[$i]['total'] = $o->total;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailPemeriksaanRadiologi(string $nomor_rawat): stdClass
    {
        $periksa = DB::table(self::TABEL_PERIKSA_RADIOLOGI_BAWAAN)
            ->select([
                self::TABEL_PERIKSA_RADIOLOGI_BAWAAN.'.tgl_periksa',
                self::TABEL_PERIKSA_RADIOLOGI_BAWAAN.'.jam',
                self::TABEL_PERIKSA_RADIOLOGI_BAWAAN.'.kd_jenis_prw',
                self::TABEL_JENIS_PERAWATAN_RADIOLOGI_BAWAAN.'.nm_perawatan',
                self::TABEL_PETUGAS_BAWAAN.'.nama',
                self::TABEL_PERIKSA_RADIOLOGI_BAWAAN.'.biaya',
                self::TABEL_PERIKSA_RADIOLOGI_BAWAAN.'.dokter_perujuk',
                self::TABEL_DOKTER_BAWAAN.'.nm_dokter',
            ])
            ->join(self::TABEL_JENIS_PERAWATAN_RADIOLOGI_BAWAAN, self::TABEL_PERIKSA_RADIOLOGI_BAWAAN.'.kd_jenis_prw', '=', self::TABEL_JENIS_PERAWATAN_RADIOLOGI_BAWAAN.'.kd_jenis_prw')
            ->join(self::TABEL_PETUGAS_BAWAAN, self::TABEL_PERIKSA_RADIOLOGI_BAWAAN.'.nip', '=', self::TABEL_PETUGAS_BAWAAN.'.nip')
            ->join(self::TABEL_DOKTER_BAWAAN, self::TABEL_PERIKSA_RADIOLOGI_BAWAAN.'.kd_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->where(self::TABEL_PERIKSA_RADIOLOGI_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($periksa as $i=>$p)
        {
            $hasil[$i]['tanggal'] = $p->tgl_periksa;
            $hasil[$i]['jam'] = $p->jam;
            $hasil[$i]['kode'] = $p->kd_jenis_prw;
            $hasil[$i]['nama_perawatan'] = $p->nm_perawatan;
            $hasil[$i]['nama_petugas'] = $p->nama;
            $hasil[$i]['biaya'] = $p->biaya;
            $hasil[$i]['dokter_perujuk'] = $p->dokter_perujuk;
            $hasil[$i]['nama_dokter'] = $p->nm_dokter;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailPemeriksaanLaboratorium(string $nomor_rawat): stdClass
    {
        $periksa = DB::table(self::TABEL_PERIKSA_LABORATORIUM_BAWAAN)
            ->select([
                self::TABEL_PERIKSA_LABORATORIUM_BAWAAN.'.tgl_periksa',
                self::TABEL_PERIKSA_LABORATORIUM_BAWAAN.'.jam',
                self::TABEL_PERIKSA_LABORATORIUM_BAWAAN.'.kd_jenis_prw',
                self::TABEL_JENIS_PERAWATAN_LABORATORIUM_BAWAAN.'.nm_perawatan',
                self::TABEL_PETUGAS_BAWAAN.'.nama',
                self::TABEL_PERIKSA_LABORATORIUM_BAWAAN.'.biaya',
                self::TABEL_PERIKSA_LABORATORIUM_BAWAAN.'.dokter_perujuk',
                self::TABEL_DOKTER_BAWAAN.'.nm_dokter',
            ])
            ->join(self::TABEL_JENIS_PERAWATAN_LABORATORIUM_BAWAAN, self::TABEL_PERIKSA_LABORATORIUM_BAWAAN.'.kd_jenis_prw', '=', self::TABEL_JENIS_PERAWATAN_LABORATORIUM_BAWAAN.'.kd_jenis_prw')
            ->join(self::TABEL_PETUGAS_BAWAAN, self::TABEL_PERIKSA_LABORATORIUM_BAWAAN.'.nip', '=', self::TABEL_PETUGAS_BAWAAN.'.nip')
            ->join(self::TABEL_DOKTER_BAWAAN, self::TABEL_PERIKSA_LABORATORIUM_BAWAAN.'.kd_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->where(self::TABEL_PERIKSA_LABORATORIUM_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($periksa as $i=>$p)
        {
            $hasil[$i]['tanggal'] = $p->tgl_periksa;
            $hasil[$i]['jam'] = $p->jam;
            $hasil[$i]['kode'] = $p->kd_jenis_prw;
            $hasil[$i]['nama_perawatan'] = $p->nm_perawatan;
            $hasil[$i]['nama_petugas'] = $p->nama;
            $hasil[$i]['biaya'] = $p->biaya;
            $hasil[$i]['dokter_perujuk'] = $p->dokter_perujuk;
            $hasil[$i]['nama_dokter'] = $p->nm_dokter;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailDetailPemeriksaanLaboratorium(string $nomor_rawat, string $kode_jenis_perawatan, string $tanggal, string $jam): stdClass
    {
        $detail = DB::table(self::TABEL_DETAIL_PEMERIKSAAN_LABORATORIUM_BAWAAN)
            ->select([
                self::TABEL_TEMPLATE_LABORAORIUM_BAWAAN.'.pemeriksaan',
                self::TABEL_DETAIL_PEMERIKSAAN_LABORATORIUM_BAWAAN.'.nilai',
                self::TABEL_TEMPLATE_LABORAORIUM_BAWAAN.'.satuan',
                self::TABEL_DETAIL_PEMERIKSAAN_LABORATORIUM_BAWAAN.'.nilai_rujukan',
                self::TABEL_DETAIL_PEMERIKSAAN_LABORATORIUM_BAWAAN.'.biaya_item',
                self::TABEL_DETAIL_PEMERIKSAAN_LABORATORIUM_BAWAAN.'.keterangan',
            ])
            ->join(self::TABEL_TEMPLATE_LABORAORIUM_BAWAAN, self::TABEL_DETAIL_PEMERIKSAAN_LABORATORIUM_BAWAAN.'.id_template', '=', self::TABEL_TEMPLATE_LABORAORIUM_BAWAAN.'.id_template')
            ->where(self::TABEL_DETAIL_PEMERIKSAAN_LABORATORIUM_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->where(self::TABEL_DETAIL_PEMERIKSAAN_LABORATORIUM_BAWAAN.'.kd_jenis_prw', '=', $kode_jenis_perawatan)
            ->where(self::TABEL_DETAIL_PEMERIKSAAN_LABORATORIUM_BAWAAN.'.tgl_periksa', '=', $tanggal)
            ->where(self::TABEL_DETAIL_PEMERIKSAAN_LABORATORIUM_BAWAAN.'.jam', '=', $jam)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($detail as $i=>$d)
        {
            $hasil[$i]['pemeriksaan'] = $d->pemeriksaan;
            $hasil[$i]['nilai'] = $d->nilai;
            $hasil[$i]['satuan'] = $d->satuan;
            $hasil[$i]['nilai_rujukan'] = $d->nilai_rujukan;
            $hasil[$i]['biaya_item'] = $d->biaya_item;
            $hasil[$i]['keterangan'] = $d->keterangan;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailPemberianObat(string $nomor_rawat): stdClass
    {
        $obat = DB::table(self::TABEL_DETAIL_PEMBERIAN_OBAT_BAWAAN)
            ->select([
                self::TABEL_DETAIL_PEMBERIAN_OBAT_BAWAAN.'.tgl_perawatan',
                self::TABEL_DETAIL_PEMBERIAN_OBAT_BAWAAN.'.jam',
                self::TABEL_DETAIL_PEMBERIAN_OBAT_BAWAAN.'.kode_brng',
                self::TABEL_DETAIL_PEMBERIAN_OBAT_BAWAAN.'.jml',
                self::TABEL_DETAIL_PEMBERIAN_OBAT_BAWAAN.'.total',
                self::TABEL_BARANG_BAWAAN.'.nama_brng',
                self::TABEL_BARANG_BAWAAN.'.kode_sat',
            ])
            ->join(self::TABEL_BARANG_BAWAAN, self::TABEL_DETAIL_PEMBERIAN_OBAT_BAWAAN.'.kode_brng', '=', self::TABEL_BARANG_BAWAAN.'.kode_brng')
            ->where(self::TABEL_DETAIL_PEMBERIAN_OBAT_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($obat as $i=>$o)
        {
            $hasil[$i]['tanggal'] = $o->tgl_perawatan;
            $hasil[$i]['jam'] = $o->jam;
            $hasil[$i]['kode_barang'] = $o->kode_brng;
            $hasil[$i]['nama_obat'] = $o->nama_brng;
            $hasil[$i]['jumlah'] = $o->jml;
            $hasil[$i]['total'] = $o->total;
            $hasil[$i]['satuan'] = $o->kode_sat;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailPemberianObatOperasi(string $nomor_rawat): stdClass
    {
        $obat = DB::table(self::TABEL_PEMBERIAN_OBAT_OPERASI_BAWAAN)
            ->select([
                self::TABEL_PEMBERIAN_OBAT_OPERASI_BAWAAN.'.tanggal',
                self::TABEL_PEMBERIAN_OBAT_OPERASI_BAWAAN.'.kd_obat',
                self::TABEL_PEMBERIAN_OBAT_OPERASI_BAWAAN.'.hargasatuan',
                self::TABEL_PEMBERIAN_OBAT_OPERASI_BAWAAN.'.jumlah',
                self::TABEL_OBAT_BHP_BAWAAN.'.nm_obat',
                self::TABEL_OBAT_BHP_BAWAAN.'.kode_sat',
                DB::raw('('.self::TABEL_PEMBERIAN_OBAT_OPERASI_BAWAAN.'.hargasatuan * '.self::TABEL_PEMBERIAN_OBAT_OPERASI_BAWAAN.'.jumlah) as total'),
            ])
            ->join(self::TABEL_OBAT_BHP_BAWAAN, self::TABEL_PEMBERIAN_OBAT_OPERASI_BAWAAN.'.kd_obat', '=', self::TABEL_OBAT_BHP_BAWAAN.'.kd_obat')
            ->where(self::TABEL_PEMBERIAN_OBAT_OPERASI_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($obat as $i=>$o)
        {
            $hasil[$i]['tanggal'] = $o->tanggal;
            $hasil[$i]['kode_barang'] = $o->kd_obat;
            $hasil[$i]['nama_obat'] = $o->nm_obat;
            $hasil[$i]['jumlah'] = $o->jumlah;
            $hasil[$i]['total'] = $o->total;
            $hasil[$i]['satuan'] = $o->kode_sat;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailResepPulang(string $nomor_rawat): stdClass
    {
        $resep = DB::table(self::TABEL_RESEP_PULANG_BAWAAN)
            ->select([
                self::TABEL_RESEP_PULANG_BAWAAN.'.kode_brng',
                self::TABEL_RESEP_PULANG_BAWAAN.'.dosis',
                self::TABEL_RESEP_PULANG_BAWAAN.'.jml_barang',
                self::TABEL_RESEP_PULANG_BAWAAN.'.total',
                self::TABEL_BARANG_BAWAAN.'.nama_brng',
                self::TABEL_BARANG_BAWAAN.'.kode_sat',
            ])
            ->join(self::TABEL_BARANG_BAWAAN, self::TABEL_RESEP_PULANG_BAWAAN.'.kode_brng', '=', self::TABEL_BARANG_BAWAAN.'.kode_brng')
            ->where(self::TABEL_RESEP_PULANG_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->orderBy(self::TABEL_BARANG_BAWAAN.'.nama_brng')
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($resep as $i=>$r)
        {
            $hasil[$i]['kode_barang'] = $r->kode_brng;
            $hasil[$i]['nama_obat'] = $r->nama_brng;
            $hasil[$i]['dosis'] = $r->dosis;
            $hasil[$i]['jumlah'] = $r->jml_barang;
            $hasil[$i]['total'] = $r->total;
            $hasil[$i]['satuan'] = $r->kode_sat;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailReturObat(string $nomor_rawat): stdClass
    {
        $retur = DB::table(self::TABEL_DETAIL_RETUR_JUAL_BAWAAN)
            ->select([
                self::TABEL_BARANG_BAWAAN.'.kode_brng',
                self::TABEL_BARANG_BAWAAN.'.nama_brng',
                self::TABEL_DETAIL_RETUR_JUAL_BAWAAN.'.kode_sat',
                self::TABEL_DETAIL_RETUR_JUAL_BAWAAN.'.h_retur',
                DB::raw('('.self::TABEL_DETAIL_RETUR_JUAL_BAWAAN.'.jml_retur * -1) as jumlah'),
                DB::raw('('.self::TABEL_DETAIL_RETUR_JUAL_BAWAAN.'.subtotal * -1) as total'),
            ])
            ->join(self::TABEL_BARANG_BAWAAN, self::TABEL_DETAIL_RETUR_JUAL_BAWAAN.'.kode_brng', '=', self::TABEL_BARANG_BAWAAN.'.kode_brng')
            ->join(self::TABEL_RETUR_JUAL_BAWAAN, self::TABEL_DETAIL_RETUR_JUAL_BAWAAN.'.no_retur_jual', '=', self::TABEL_RETUR_JUAL_BAWAAN.'.no_retur_jual')
            ->where(self::TABEL_RETUR_JUAL_BAWAAN.'.no_retur_jual', '=', $nomor_rawat)
            ->orderBy(self::TABEL_BARANG_BAWAAN.'.nama_brng')
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($retur as $i=>$r)
        {
            $hasil[$i]['kode_barang'] = $r->kode_brng;
            $hasil[$i]['nama_obat'] = $r->nama_brng;
            $hasil[$i]['jumlah'] = $r->jumlah;
            $hasil[$i]['total'] = $r->total;
            $hasil[$i]['satuan'] = $r->kode_sat;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailTambahanBiaya(string $nomor_rawat): stdClass
    {
        $tambah = DB::table(self::TABEL_TAMBAHAN_BIAYA_BAWAAN)
            ->select([
                self::TABEL_TAMBAHAN_BIAYA_BAWAAN.'.nama_biaya',
                self::TABEL_TAMBAHAN_BIAYA_BAWAAN.'.besar_biaya',
            ])
            ->where(self::TABEL_TAMBAHAN_BIAYA_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->orderBy(self::TABEL_TAMBAHAN_BIAYA_BAWAAN.'.nama_biaya')
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($tambah as $i=>$t)
        {
            $hasil[$i]['nama_biaya'] = $t->nama_biaya;
            $hasil[$i]['besar_biaya'] = $t->besar_biaya;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailPenguranganBiaya(string $nomor_rawat): stdClass
    {
        $kurang = DB::table(self::TABEL_PENGURANGAN_BIAYA_BAWAAN)
            ->select([
                self::TABEL_PENGURANGAN_BIAYA_BAWAAN.'.nama_pengurangan',
                DB::raw('('.self::TABEL_PENGURANGAN_BIAYA_BAWAAN.'.besar_pengurangan * -1) as besar_pengurangan'),
            ])
            ->where(self::TABEL_PENGURANGAN_BIAYA_BAWAAN.'.no_rawat', '=', $nomor_rawat)
            ->orderBy(self::TABEL_PENGURANGAN_BIAYA_BAWAAN.'.nama_pengurangan')
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($kurang as $i=>$k)
        {
            $hasil[$i]['nama_pengurangan'] = $k->nama_pengurangan;
            $hasil[$i]['besar_pengurangan'] = $k->besar_pengurangan;

            $hasil_objek->$i = (object) $hasil[$i];
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
