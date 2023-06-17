<?php

namespace App\Services;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use stdClass;
use Str;

class ReservasiService
{
    public $rekamMedisService;
    public $antriLoket;
    private const TABEL_RUANGAN = 'web_plus_umum_ruangan';
    private const TABEL_JADWAL_DOKTER = 'web_plus_reservasi_dokter';
    private const TABEL_DOKTER_BAWAAN = 'dokter';
    private const TABEL_JADWAL_PASIEN = 'web_plus_reservasi_pasien';
    private const TABEL_PASIEN_BAWAAN = 'pasien';

    public function __construct()
    {
        $this->rekamMedisService = new RekamMedisService();
        $this->antriLoket = new AntriLoket();
    }

    public function getDaftarPasien(): stdClass
    {
        return $this->rekamMedisService->getDaftarPasien();
    }

    public function getDaftarReservasi(string $nomor_medis): stdClass
    {
        $pasien = DB::table(self::TABEL_JADWAL_PASIEN)
            ->join(self::TABEL_DOKTER_BAWAAN, self::TABEL_JADWAL_PASIEN.'.id_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->join(self::TABEL_RUANGAN, self::TABEL_JADWAL_PASIEN.'.id_ruang', '=', self::TABEL_RUANGAN.'.id_ruang')
            ->where('nomor_medis', '=', $nomor_medis)
            ->orderByDesc('tanggal')
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($pasien as $i=>$p)
        {
            $hasil[$i] = [];
            $hasil[$i]['uuid'] = $p->uuid;
            $hasil[$i]['tanggal'] = $p->tanggal;
            $hasil[$i]['waktu_mulai'] = $p->waktu_mulai;
            $hasil[$i]['waktu_selesai'] = $p->waktu_selesai;
            $hasil[$i]['id_dokter'] = $p->id_dokter;
            $hasil[$i]['nama_dokter'] = $p->nm_dokter;
            $hasil[$i]['id_ruang'] = $p->id_ruang;
            $hasil[$i]['nama_ruang'] = $p->nama_ruang;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDaftarRuangan(): stdClass
    {
        return $this->antriLoket->getDaftarRuangan();
    }

    public function getDetailRuangan(string $uuid_ruang): stdClass
    {
        return $this->antriLoket->getDaftarRuangan($uuid_ruang);
    }

    public function setDetailRuangan(Request $request): bool
    {
        return $this->antriLoket->setDaftarRuangan($request);
    }

    public function deleteDetailRuangan(string $uuid_ruang): bool
    {
        return $this->antriLoket->deleteDaftarRuangan($uuid_ruang);
    }

    public function getDaftarJadwalDokter(string $uuid_ruang): stdClass
    {
        $id_ruang = $this->getKodeRuang($uuid_ruang);
        $jadwal = DB::table(self::TABEL_JADWAL_DOKTER)
            ->join(self::TABEL_DOKTER_BAWAAN, self::TABEL_JADWAL_DOKTER.'.id_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->where(self::TABEL_JADWAL_DOKTER.'.id_ruang', '=', $id_ruang)
            ->get()
            ->unique('id_dokter');

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($jadwal as $i=>$j)
        {
            $hasil[$i] = [];
            $hasil[$i]['uuid'] = $j->uuid;
            $hasil[$i]['id_dokter'] = $j->id_dokter;
            $hasil[$i]['nama_dokter'] = $j->nm_dokter;
            $hasil[$i]['tanggal'] = $j->tanggal;
            $hasil[$i]['waktu_mulai'] = $j->waktu_mulai;
            $hasil[$i]['waktu_selesai'] = $j->waktu_selesai;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDaftarDokter(): stdClass
    {
        $dokter = DB::table(self::TABEL_DOKTER_BAWAAN)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($dokter as $i=>$d)
        {
            $hasil[$i] = [];
            $hasil[$i]['id_dokter'] = $d->kd_dokter;
            $hasil[$i]['nama_dokter'] = $d->nm_dokter;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDetailJadwalDokter(string $uuid_jadwal): stdClass
    {
        return DB::table(self::TABEL_JADWAL_DOKTER)
            ->join(self::TABEL_DOKTER_BAWAAN, self::TABEL_JADWAL_DOKTER.'.id_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->where(self::TABEL_JADWAL_DOKTER.'.uuid', '=', $uuid_jadwal)
            ->first();
    }

    public function setDetailJadwalDokter(Request $request): bool
    {
        $type = $request->type;
        $id_ruang = $this->getKodeRuang($request->uuid_ruang);
        $id_dokter = $request->id_dokter;
        $tanggal = $request->tanggal;
        $waktu_mulai = $request->waktu_mulai;
        $waktu_selesai = $request->waktu_selesai;
        $uuid = $request->uuid_jadwal ?? Str::uuid();

        return ($type === 'update') ?
            DB::table(self::TABEL_JADWAL_DOKTER)
                ->where('uuid', '=', $uuid)
                ->update([
                    'id_ruang' => $id_ruang,
                    'id_dokter' => $id_dokter,
                    'tanggal' => $tanggal,
                    'waktu_mulai' => $waktu_mulai,
                    'waktu_selesai' => $waktu_selesai
                ]) :
            DB::table(self::TABEL_JADWAL_DOKTER)
                ->insert([
                    'id_ruang' => $id_ruang,
                    'id_dokter' => $id_dokter,
                    'tanggal' => $tanggal,
                    'waktu_mulai' => $waktu_mulai,
                    'waktu_selesai' => $waktu_selesai,
                    'uuid' => $uuid
                ]);
    }

    public function deleteDetailJadwalDokter(string $uuid_jadwal): bool
    {
        return DB::table(self::TABEL_JADWAL_DOKTER)
            ->where('uuid', '=', $uuid_jadwal)
            ->delete();
    }

    public function getKodeDokter(string $id_dokter): string
    {
        $dokter = DB::table(self::TABEL_DOKTER_BAWAAN)
            ->where('kd_dokter', '=', $id_dokter)
            ->first();
        return $dokter->kd_dokter;
    }

    public function getKodeRuang(string $uuid_ruang): string
    {
        $ruang = $this->getDetailRuangan($uuid_ruang);
        return $ruang->id_ruang;
    }

    public function getJadwalDokterTersedia(string $uuid_ruang, string $kode_dokter): stdClass
    {
        $id_ruang = $this->getKodeRuang($uuid_ruang);
        $jadwal = DB::table(self::TABEL_JADWAL_DOKTER)
            ->where('id_ruang', '=', $id_ruang)
            ->where('id_dokter', '=', $kode_dokter)
            ->whereDate('tanggal', '>=', date('Y-m-d'))
            ->whereDate('tanggal', '<=', date('Y-m-d', strtotime('+1 week')))
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($jadwal as $i=>$j)
        {
            $hasil[$i] = [];
            $hasil[$i]['uuid'] = $j->uuid;
            $hasil[$i]['id_dokter'] = $j->id_dokter;
            $hasil[$i]['tanggal'] = $j->tanggal;
            $hasil[$i]['waktu_mulai'] = $j->waktu_mulai;
            $hasil[$i]['waktu_selesai'] = $j->waktu_selesai;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getJadwalDokterTerisi(string $uuid_ruang, string $kode_dokter): stdClass
    {
        $id_ruang = $this->getKodeRuang($uuid_ruang);
        $jadwal = DB::table(self::TABEL_JADWAL_PASIEN)
            ->where('id_ruang', '=', $id_ruang)
            ->where('id_dokter', '=', $kode_dokter)
            ->whereDate('tanggal', '>=', date('Y-m-d'))
            ->whereDate('tanggal', '<=', date('Y-m-d', strtotime('+1 week')))
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($jadwal as $i => $j) {
            $hasil[$i] = [];
            $hasil[$i]['uuid'] = $j->uuid;
            $hasil[$i]['id_dokter'] = $j->id_dokter;
            $hasil[$i]['tanggal'] = $j->tanggal;
            $hasil[$i]['waktu_mulai'] = $j->waktu_mulai;
            $hasil[$i]['waktu_selesai'] = $j->waktu_selesai;

            $hasil_objek->$i = (object)$hasil[$i];
        }
        return $hasil_objek;
    }

    public function cekJadwalPasienGanda(string $id_ruang, string $kode_dokter, string $tanggal, string $waktu_mulai): bool
    {
        $jadwal = DB::table(self::TABEL_JADWAL_PASIEN)
            ->where('id_ruang', '=', $id_ruang)
            ->where('id_dokter', '=', $kode_dokter)
            ->where('tanggal', '=', $tanggal)
            ->where('waktu_mulai', '=', $waktu_mulai)
            ->first();

        return (bool)$jadwal;
    }

    public function cekJadwalPasienSesuai(string $uuid_ruang, string $kode_dokter, string $tanggal, string $waktu_mulai): bool
    {
        $waktu_dipilih = new DateTime($tanggal . " " . $waktu_mulai);
        $tersedia = $this->getJadwalDokterTersedia($uuid_ruang, $kode_dokter);
        $cocok = false;

        foreach($tersedia as $t)
        {
            $rentang_mulai = new DateTime($t->tanggal . " " .$t->waktu_mulai);
            $rentang_selesai = new DateTime($t->tanggal . " " .$t->waktu_selesai);

            if ($waktu_dipilih >= $rentang_mulai && $waktu_dipilih <= $rentang_selesai) {
                $cocok = true;
                break;
            }
        }
        return $cocok;
    }

    public function setJadwalPasien(Request $request): bool
    {
        $id_ruang = $this->getKodeRuang($request->uuid_ruang);
        $id_dokter = $request->id_dokter;
        $nomor_medis = $request->nomor_medis;
        $tanggal = $request->tanggal;
        $waktu_mulai = $request->waktu_mulai;
        $waktu_selesai = $request->waktu_selesai;
        $uuid = Str::uuid();

        $cek_dobel = $this->cekJadwalPasienGanda($id_ruang, $id_dokter, $tanggal, $waktu_mulai);
        $cek_sesuai = $this->cekJadwalPasienSesuai($request->uuid_ruang, $request->id_dokter, $request->tanggal, $request->waktu_mulai);

        if(!$cek_dobel && $cek_sesuai)
        {
            return DB::table(self::TABEL_JADWAL_PASIEN)
                ->insert([
                    'id_ruang' => $id_ruang,
                    'id_dokter' => $id_dokter,
                    'nomor_medis' => $nomor_medis,
                    'tanggal' => $tanggal,
                    'waktu_mulai' => $waktu_mulai,
                    'waktu_selesai' => $waktu_selesai,
                    'uuid' => $uuid
                ]);
        }
        return false;
    }
}
