<?php

namespace App\Services;
use http\Client\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use stdClass;

class AntriLoket
{
    private const TABEL_NOMOR_ANTREAN_BAWAAN = 'antriloket';
    private const TABEL_NOMOR_ANTREAN_BARU = 'web_plus_antrean_nomor';
    private const TABEL_RUANGAN = 'web_plus_antrean_ruangan';
    private const TABEL_NOMOR_LOKET = 'web_plus_antrean_loket';
    private const TABEL_RUNNING_TEXT_BAWAAN = 'runtext';
    private const TABEL_SETTING_BAWAAN = 'setting';

    public function getDaftarRuangan(string $uuid_ruangan = null): stdClass
    {
        if($uuid_ruangan === null)
        {
            $data = DB::table(self::TABEL_RUANGAN)
                ->get();

            $hasil = [];
            $hasil_objek = new stdClass();
            foreach($data as $i=>$d)
            {
                $hasil[$i] = [];
                $hasil[$i]['uuid'] = $d->uuid;
                $hasil[$i]['nama_ruang'] = $d->nama_ruang;
                $hasil[$i]['foto'] = base64_encode($d->foto);

                $hasil_objek->$i = (object) $hasil[$i];
            }

            return $hasil_objek;
        }

        $data = DB::table(self::TABEL_RUANGAN)
            ->where('uuid','=', $uuid_ruangan)
            ->first();

        return $data;
    }

    public function setDaftarRuangan(array $request): bool
    {
        print_r($request);
        $nama_ruang = $request['nama_ruang'];

        return DB::table(self::TABEL_RUANGAN)
            ->insert([
                'uuid' => Str::orderedUuid(),
                'nama_ruang' => $nama_ruang,
            ]);
    }

    public function deleteDaftarRuangan(string $uuid_ruangan): bool
    {
        return DB::table(self::TABEL_RUANGAN)
            ->where('uuid','=', $uuid_ruangan)
            ->delete();
    }

    public function getNomorLoketRuangan(string $uuid_ruangan): stdClass
    {
        $data_ruang = $this->getDaftarRuangan($uuid_ruangan);
        $id_ruang = $data_ruang->id_ruang;

        $data = DB::table(self::TABEL_NOMOR_LOKET)
            ->where('id_ruang','=', $id_ruang)
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($data as $i=>$d)
        {
            $hasil[$i] = [];
            $hasil[$i]['uuid'] = $d->uuid;
            $hasil[$i]['kode_loket'] = $d->kode_loket;
            $hasil[$i]['nomor_loket'] = $d->nomor_loket;
            $hasil[$i]['nama_loket'] = $d->nama_loket;

            $hasil_objek->$i = (object) $hasil[$i];
        }

        return $hasil_objek;
    }

    public function setNomorLoketRuangan(string $uuid_ruangan, string $nomor_loket, string $nama_loket): bool
    {
        return DB::table(self::TABEL_NOMOR_LOKET)
            ->insert([
                'uuid_ruangan' => $uuid_ruangan,
                'nomor_loket' => $nomor_loket,
                'nama_loket' => $nama_loket,
            ]);
    }

    public function deleteNomorLoketRuangan(string $uuid_ruangan, string $nomor_loket): bool
    {
        return DB::table(self::TABEL_NOMOR_LOKET)
            ->where('uuid_ruangan','=', $uuid_ruangan)
            ->where('nomor_loket','=', $nomor_loket)
            ->delete();
    }

    public function getTampilanLoket(string $uuid_loket): stdClass
    {
        $data = DB::table(self::TABEL_NOMOR_LOKET)
            ->select([self::TABEL_NOMOR_LOKET.'.uuid', 'nama_ruang', 'nama_loket', 'kode_loket', 'nomor_loket'])
            ->join(self::TABEL_RUANGAN, self::TABEL_RUANGAN.'.id_ruang', '=', self::TABEL_NOMOR_LOKET.'.id_ruang')
            ->where(self::TABEL_NOMOR_LOKET.'.uuid','=', $uuid_loket)
            ->first();

        return $data;
    }

    public function getNomorAntreanDipanggil(string $uuid_ruangan): stdClass
    {
        return DB::table(self::TABEL_NOMOR_ANTREAN_BARU)
            ->where('uuid_ruangan','=', $uuid_ruangan)
            ->first();
    }

    public function setNomorAntreanDipanggil(string $uuid_ruangan, string $nomor_antrean): bool
    {
        return DB::table(self::TABEL_NOMOR_ANTREAN_BARU)
            ->insert([
                'uuid_ruangan' => $uuid_ruangan,
                'nomor_antrean' => $nomor_antrean,
            ]);
    }

    public function deleteNomorAntreanDipanggil(string $uuid_ruangan, string $nomor_antrean): bool
    {
        return DB::table(self::TABEL_NOMOR_ANTREAN_BARU)
            ->where('uuid_ruangan','=', $uuid_ruangan)
            ->where('nomor_antrean','=', $nomor_antrean)
            ->delete();
    }

    public function getNomorAntreanDipanggilUlang(string $uuid_ruangan): stdClass
    {
        return $this->getNomorAntreanDipanggil($uuid_ruangan);
    }

    public function setNomorAntreanDipanggilUlang(string $uuid_ruangan, string $nomor_antrean): bool
    {
        return DB::table(self::TABEL_NOMOR_ANTREAN_BARU)
            ->insert([
                'uuid_ruangan' => $uuid_ruangan,
                'nomor_antrean' => $nomor_antrean,
            ]);
    }

    public function deleteNomorAntreanDipanggilUlang(string $uuid_ruangan, string $nomor_antrean): bool
    {
        return $this->deleteNomorAntreanDipanggil($uuid_ruangan, $nomor_antrean);
    }

    public function getRunningTextBawaan(): stdClass
    {
        $data = DB::table(self::TABEL_RUNNING_TEXT_BAWAAN)
            ->first();

        $hasil = new stdClass();
        $hasil->teks = $data->teks;
        $hasil->gambar = base64_encode($data->gambar);

        return $hasil;
    }

    public function getSettingBawaan(): stdClass
    {
        $data = DB::table(self::TABEL_SETTING_BAWAAN)
            ->first();

        $hasil = new stdClass();
        $hasil->logo = base64_encode($data->logo);
        $hasil->wallpaper = base64_encode($data->wallpaper);
        $hasil->nama = $data->nama_instansi;

        return $hasil;
    }
}
