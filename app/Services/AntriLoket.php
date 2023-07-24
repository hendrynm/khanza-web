<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use stdClass;

class AntriLoket
{
    private const TABEL_NOMOR_ANTREAN_BARU = 'web_plus_antrean_nomor';
    private const TABEL_RUANGAN = 'web_plus_umum_ruangan';
    private const TABEL_NOMOR_LOKET = 'web_plus_antrean_loket';
    private const TABEL_AMBIL_NOMOR = 'web_plus_antrean_ambil';
    private const TABEL_WARNA = 'web_plus_antrean_warna';
    private const TABEL_RUNNING_TEXT_BAWAAN = 'runtext';
    private const TABEL_SETTING_BAWAAN = 'setting';

    public function getDaftarRuangan(string $uuid_ruangan = null): stdClass
    {
        if($uuid_ruangan === null)
        {
            $data = DB::table(self::TABEL_RUANGAN)
                ->orderBy('nama_ruang')
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

    public function setDaftarRuangan(Request $request): bool
    {
        $request->validate([
            'foto' => 'required|file|max:1024|mimes:jpeg,png,jpg,heic',
        ]);

        $nama_ruang = $request->nama_ruang;
        $loket = $request->loket;
        $reservasi = $request->reservasi;
        $type = $request->type;
        $uuid = $request->uuid ?? Str::uuid();
        $file = $request->file('foto');

        if ($file) {
            $image = Image::make($file);
            $kompres = $image->encode('jpg', 75);
            $foto = $kompres->getEncoded();
        } else {
            $foto = null;
        }

        return ($type === 'update') ? (
            ($foto === null) ?
                DB::table(self::TABEL_RUANGAN)
                    ->where('uuid','=', $uuid)
                    ->update([
                        'nama_ruang' => $nama_ruang,
                        'loket' => $loket,
                        'reservasi' => $reservasi,
                        ]) :
                DB::table(self::TABEL_RUANGAN)
                    ->where('uuid','=', $uuid)
                    ->update([
                        'nama_ruang' => $nama_ruang,
                        'loket' => $loket,
                        'reservasi' => $reservasi,
                        'foto' => $foto,
                    ])
            ) :
            DB::table(self::TABEL_RUANGAN)
                ->insert([
                    'nama_ruang' => $nama_ruang,
                    'loket' => $loket,
                    'reservasi' => $reservasi,
                    'foto' => $foto,
                    'uuid' => $uuid,
                ]);
    }

    public function deleteDaftarRuangan(string $uuid_ruangan): bool
    {
        return DB::table(self::TABEL_RUANGAN)
            ->where('uuid','=', $uuid_ruangan)
            ->delete();
    }

    public function getNomorLoketRuangan(string $uuid_ruangan = null, string $uuid_loket = null): stdClass
    {
        if($uuid_loket === null)
        {
            $data_ruang = $this->getDaftarRuangan($uuid_ruangan);
            $id_ruang = $data_ruang->id_ruang;

            $data = DB::table(self::TABEL_NOMOR_LOKET)
                ->where('id_ruang','=', $id_ruang)
                ->orderBy('nomor_loket')
                ->get();

            $hasil = [];
            $hasil_objek = new stdClass();
            foreach($data as $i=>$d)
            {
                $hasil[$i] = [];
                $hasil[$i]['uuid'] = $d->uuid;
                $hasil[$i]['bpjs'] = $d->bpjs;
                $hasil[$i]['kode_loket'] = $d->kode_loket;
                $hasil[$i]['nomor_loket'] = $d->nomor_loket;
                $hasil[$i]['nama_loket'] = $d->nama_loket;

                $hasil_objek->$i = (object) $hasil[$i];
            }

            return $hasil_objek;
        }

        $data = DB::table(self::TABEL_NOMOR_LOKET)
            ->join(self::TABEL_WARNA, self::TABEL_NOMOR_LOKET.'.id_warna', '=', self::TABEL_WARNA.'.id_warna')
            ->where('uuid','=', $uuid_loket)
            ->first();

        return $data;
    }

    public function setNomorLoketRuangan(Request $request): bool
    {
        $uuid_ruangan = $request->uuid_ruangan;
        $uuid_loket = $request->uuid_loket ?? null;
        $kode_loket = $request->kode;
        $nomor_loket = $request->nomor;
        $nama_loket = $request->nama;
        $bpjs = $request->bpjs;
        $warna = $request->warna;
        $uuid = Str::uuid();

        $data_ruang = $this->getDaftarRuangan($uuid_ruangan);
        $id_ruang = $data_ruang->id_ruang;

        return ($uuid_loket === null) ?
            DB::table(self::TABEL_NOMOR_LOKET)
            ->insert([
                'id_ruang' => $id_ruang,
                'kode_loket' => $kode_loket,
                'nomor_loket' => $nomor_loket,
                'nama_loket' => $nama_loket,
                'bpjs' => $bpjs,
                'id_warna' => $warna,
                'uuid' => $uuid,
            ]) :
            DB::table(self::TABEL_NOMOR_LOKET)
            ->where('uuid','=', $uuid_loket)
            ->update([
                'id_ruang' => $id_ruang,
                'kode_loket' => $kode_loket,
                'nomor_loket' => $nomor_loket,
                'nama_loket' => $nama_loket,
                'bpjs' => $bpjs,
                'id_warna' => $warna,
            ]);
    }

    public function deleteNomorLoketRuangan(string $uuid_loket): bool
    {
        return DB::table(self::TABEL_NOMOR_LOKET)
            ->where('uuid','=', $uuid_loket)
            ->delete();
    }

    public function getTampilanLoket(string $uuid_loket): stdClass
    {
        $data = DB::table(self::TABEL_NOMOR_LOKET)
            ->select([
                self::TABEL_NOMOR_LOKET.'.id_ruang',
                self::TABEL_NOMOR_LOKET.'.uuid',
                'id_loket',
                'nama_ruang', 'nama_loket', 'kode_loket', 'nomor_loket', 'bpjs',
            ])
            ->join(self::TABEL_RUANGAN, self::TABEL_RUANGAN.'.id_ruang', '=', self::TABEL_NOMOR_LOKET.'.id_ruang')
            ->where(self::TABEL_NOMOR_LOKET.'.uuid','=', $uuid_loket)
            ->first();

        return $data;
    }

    public function getNomorAntreanDipanggil(string $uuid_ruangan): stdClass|null
    {
        $data_ruang = $this->getDaftarRuangan($uuid_ruangan);
        $id_ruang = $data_ruang->id_ruang;

        return DB::table(self::TABEL_NOMOR_ANTREAN_BARU)
            ->select([
                self::TABEL_NOMOR_ANTREAN_BARU.'.id_nomor',
                self::TABEL_NOMOR_ANTREAN_BARU.'.nomor_antrean',
                self::TABEL_NOMOR_ANTREAN_BARU.'.status',
                self::TABEL_NOMOR_LOKET.'.kode_loket',
                self::TABEL_NOMOR_LOKET.'.nomor_loket',
                self::TABEL_WARNA.'.warna',
            ])
            ->join(self::TABEL_NOMOR_LOKET, self::TABEL_NOMOR_ANTREAN_BARU.'.id_loket', '=', self::TABEL_NOMOR_LOKET.'.id_loket')
            ->join(self::TABEL_RUANGAN, self::TABEL_NOMOR_LOKET.'.id_ruang', '=', self::TABEL_RUANGAN.'.id_ruang')
            ->join(self::TABEL_WARNA, self::TABEL_NOMOR_LOKET.'.id_warna', '=', self::TABEL_WARNA.'.id_warna')
            ->where(self::TABEL_NOMOR_ANTREAN_BARU.'.status','=',0)
            ->where(self::TABEL_RUANGAN.'.id_ruang','=', $id_ruang)
            ->first();
    }

    public function getNomorAntreanTerakhir(string $id_ruang, string $waktu = null): stdClass|null
    {
        $waktu = $waktu ?? date('Y-m-d');

        $nomor = DB::table(self::TABEL_NOMOR_LOKET)
            ->select(self::TABEL_NOMOR_LOKET.'.kode_loket', DB::raw('COALESCE(MAX('.self::TABEL_AMBIL_NOMOR.'.nomor_antrean), 0) AS nomor_antrean'))
            ->leftJoin(self::TABEL_AMBIL_NOMOR, function ($join) use ($id_ruang, $waktu) {
                $join->on(self::TABEL_NOMOR_LOKET.'.kode_loket', '=', self::TABEL_AMBIL_NOMOR.'.kode_loket')
                    ->where(self::TABEL_AMBIL_NOMOR.'.id_ruang', '=', $id_ruang)
                    ->whereDate(self::TABEL_AMBIL_NOMOR.'.waktu', '=', $waktu);
            })
            ->where(self::TABEL_NOMOR_LOKET.'.id_ruang', '=', $id_ruang)
            ->orderBy(self::TABEL_NOMOR_LOKET.'.kode_loket')
            ->groupBy('id_loket', self::TABEL_NOMOR_LOKET.'.kode_loket')
            ->distinct()
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach ($nomor as $i=>$n) {
            $hasil[$i] = [];
            $hasil[$i]['kode_loket'] = $n->kode_loket;
            $hasil[$i]['nomor_terakhir'] = $n->nomor_antrean;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getSisaNomorAntrean(int $id_ruang, string $kode_loket): int
    {
        $sudah = DB::table(self::TABEL_NOMOR_ANTREAN_BARU)
            ->select('nomor_antrean')
            ->join(self::TABEL_NOMOR_LOKET, self::TABEL_NOMOR_ANTREAN_BARU.'.id_loket', '=', self::TABEL_NOMOR_LOKET.'.id_loket')
            ->where(self::TABEL_NOMOR_ANTREAN_BARU.'.id_ruang','=', $id_ruang)
            ->where('kode_loket','=', $kode_loket)
            ->where(self::TABEL_NOMOR_ANTREAN_BARU.'.status','=', 1)
            ->get();

        return DB::table(self::TABEL_AMBIL_NOMOR)
            ->where('id_ruang','=', $id_ruang)
            ->where('kode_loket','=', $kode_loket)
            ->whereDate('waktu','>=', date('Y-m-d 00:00:00'))
            ->whereDate('waktu','<=', date('Y-m-d 23:59:59'))
            ->whereNotIn('nomor_antrean', $sudah->pluck('nomor_antrean'))
            ->count('id_ambil');
    }

    public function getNomorAntreanAkanDipanggil(Request $request): stdClass|null
    {
        $id_ruang = $request->id_ruang;
        $id_loket = $request->id_loket;
        $tanggal_awal = date('Y-m-d 00:00:00');
        $tanggal_akhir = date('Y-m-d 23:59:59');

        $loket = DB::table(self::TABEL_NOMOR_LOKET)
            ->where('id_ruang','=', $id_ruang)
            ->where('id_loket','=', $id_loket)
            ->first();
        $kode_loket = $loket->kode_loket;

        $nomor = DB::table(self::TABEL_NOMOR_ANTREAN_BARU)
            ->select([
                self::TABEL_NOMOR_ANTREAN_BARU.'.nomor_antrean',
                self::TABEL_NOMOR_LOKET.'.kode_loket',
            ])
            ->join(self::TABEL_NOMOR_LOKET, self::TABEL_NOMOR_ANTREAN_BARU.'.id_loket', '=', self::TABEL_NOMOR_LOKET.'.id_loket')
            ->where(self::TABEL_NOMOR_ANTREAN_BARU.'.id_ruang', '=', $id_ruang)
            ->where('kode_loket', '=', $kode_loket)
            ->get();

        $ambil = DB::table(self::TABEL_AMBIL_NOMOR)
            ->select('nomor_antrean')
            ->where('id_ruang', '=', $id_ruang)
            ->where('kode_loket', '=', $kode_loket)
            ->whereDate('waktu', '>=', $tanggal_awal)
            ->whereDate('waktu', '<=', $tanggal_akhir)
            ->whereNotIn('nomor_antrean', $nomor->pluck('nomor_antrean'))
            ->first();

        return $ambil;
    }

    public function setNomorAntreanSelesaiDipanggil(string $id_nomor): bool
    {
        return DB::table(self::TABEL_NOMOR_ANTREAN_BARU)
            ->where('id_nomor','=', $id_nomor)
            ->update([
                'status' => 1,
            ]);
    }

    public function setNomorAntreanBelumDipanggil(string $kode_loket, string $nomor_antrean, string $id_ruang): bool
    {
        return DB::table(self::TABEL_AMBIL_NOMOR)
            ->insert([
                'id_ruang' => $id_ruang,
                'kode_loket' => $kode_loket,
                'nomor_antrean' => $nomor_antrean,
                'waktu' => date('Y-m-d H:i:s'),
            ]);
    }

    public function setNomorAntreanAkanDipanggil(Request $request): bool
    {
        $id_ruang = $request->input('id_ruang');
        $id_loket = $request->input('id_loket');
        $nomor_antrean = $request->input('nomor_antrean');

        return DB::table(self::TABEL_NOMOR_ANTREAN_BARU)
            ->insert([
                'id_ruang' => $id_ruang,
                'id_loket' => $id_loket,
                'nomor_antrean' => $nomor_antrean,
                'status' => 0,
            ]);
    }

    public function setNomorAntreanUlangDipanggil(Request $request): bool
    {
        $id_ruang = $request->input('id_ruang');
        $id_loket = $request->input('id_loket');
        $nomor_antrean = $request->input('nomor_antrean');

        return DB::table(self::TABEL_NOMOR_ANTREAN_BARU)
            ->where('id_ruang','=', $id_ruang)
            ->where('id_loket','=', $id_loket)
            ->where('nomor_antrean','=', $nomor_antrean)
            ->update([
                'status' => 0,
            ]);
    }

    public function getTampilanCetak(string $uuid_ruangan): stdClass
    {
        $ruang = $this->getDaftarRuangan($uuid_ruangan);
        $id_ruang = $ruang->id_ruang;
        $subquery = DB::table(self::TABEL_AMBIL_NOMOR)
            ->select(DB::raw('COUNT(*)'))
            ->whereDate('waktu', '>=', date('Y-m-d 00:00:00'))
            ->whereDate('waktu', '<=', date('Y-m-d 23:59:59'))
            ->whereColumn(self::TABEL_AMBIL_NOMOR.'.kode_loket', '=', self::TABEL_NOMOR_LOKET.'.kode_loket')
            ->where(self::TABEL_AMBIL_NOMOR.'.id_ruang', '=', $id_ruang);

        $loket = DB::table(self::TABEL_NOMOR_LOKET)
            ->select([
                self::TABEL_NOMOR_LOKET.'.kode_loket',
                'nama_loket',
                'bpjs'
            ])
            ->selectSub($subquery, 'jumlah')
            ->where(self::TABEL_NOMOR_LOKET.'.id_ruang', '=', $id_ruang)
            ->groupBy(self::TABEL_NOMOR_LOKET.'.kode_loket', 'nama_loket', 'bpjs')
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($loket as $i=>$l)
        {
            $hasil[$i] = [];
            $hasil[$i]['nama_loket'] = $l->nama_loket;
            $hasil[$i]['kode_loket'] = $l->kode_loket;
            $hasil[$i]['bpjs'] = $l->bpjs;
            $hasil[$i]['jumlah'] = $l->jumlah ?? 0;

            $hasil_objek->$i = (object) $hasil[$i];
        }

        return $hasil_objek;
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
        $hasil->alamat = $data->alamat_instansi;
        $hasil->kontak = $data->kontak;
        $hasil->kabupaten = $data->kabupaten;
        $hasil->provinsi = $data->propinsi;

        return $hasil;
    }

    public function getDaftarWarna(): Collection
    {
        return DB::table(self::TABEL_WARNA)
            ->orderBy('id_warna')
            ->get();
    }
}
