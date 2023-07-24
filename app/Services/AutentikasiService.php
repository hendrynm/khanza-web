<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use stdClass;

class AutentikasiService
{
    private const TABEL_PENGGUNA_BARU = 'web_plus_autentikasi_pengguna';

    public function login(Request $request): bool
    {
        $nama_pengguna = $request->input('nama_pengguna');
        $kata_sandi = $request->input('kata_sandi');

        $cek = DB::table(self::TABEL_PENGGUNA_BARU)
            ->select(['level_akses'])
            ->selectRaw("AES_DECRYPT(nama_pengguna, 'nur') AS nama_pengguna")
            ->whereRaw("nama_pengguna = AES_ENCRYPT('$nama_pengguna', 'nur')")
            ->whereRaw("kata_sandi = AES_ENCRYPT('$kata_sandi', 'windi')")
            ->get();

        if(count($cek) > 0)
        {
            $this->setSessionHapus();
            $this->setSessionBaru($cek[0]->nama_pengguna, $cek[0]->level_akses);
            return true;
        }
        return false;
    }

    public function setSessionBaru(string $nama_pengguna, int $level_akses): void
    {
        session()->put('nama_pengguna', $nama_pengguna);
        session()->put('level_akses', $level_akses);
    }

    public function setSessionHapus(): void
    {
        session()->forget('nama_pengguna');
        session()->forget('level_akses');
    }

    public function getIDPengguna(string $nama_pengguna): int
    {
        $data = DB::table(self::TABEL_PENGGUNA_BARU)
            ->select('id_pengguna')
            ->whereRaw("nama_pengguna = AES_ENCRYPT('$nama_pengguna', 'nur')")
            ->first();
        return $data->id_pengguna;
    }

    public function getDetailPengguna(): string
    {
        $nomor = session('nama_pengguna');
        switch(session('level_akses'))
        {
            case(1):
                $data = DB::table('pasien')
                    ->where('no_rkm_medis','=', $nomor)
                    ->first();
                return $data->nm_pasien;
            case(2):
                $data = DB::table('petugas')
                    ->where('nip', '=', $nomor)
                    ->first();
                return $data->nama;
            case(3):
                $data = DB::table('dokter')
                    ->where('kd_dokter', '=', $nomor)
                    ->first();
                return $data->nm_dokter;
            default:
                break;
        }
        return '';
    }

    public function getDaftarKelurahan(): stdClass
    {
        $kelurahan = DB::table('kelurahan')
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($kelurahan as $i=>$k)
        {
            $hasil[$i] = [];
            $hasil[$i]['id'] = $k->kd_kel;
            $hasil[$i]['nama'] = $k->nm_kel;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDaftarKecamatan(): stdClass
    {
        $kecamatan = DB::table('kecamatan')
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($kecamatan as $i=>$k)
        {
            $hasil[$i] = [];
            $hasil[$i]['id'] = $k->kd_kec;
            $hasil[$i]['nama'] = $k->nm_kec;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDaftarKabupaten(): stdClass
    {
        $kabupaten = DB::table('kabupaten')
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($kabupaten as $i=>$k)
        {
            $hasil[$i] = [];
            $hasil[$i]['id'] = $k->kd_kab;
            $hasil[$i]['nama'] = $k->nm_kab;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function getDaftarProvinsi(): stdClass
    {
        $provinsi = DB::table('propinsi')
            ->get();

        $hasil = [];
        $hasil_objek = new stdClass();
        foreach($provinsi as $i=>$p)
        {
            $hasil[$i] = [];
            $hasil[$i]['id'] = $p->kd_prop;
            $hasil[$i]['nama'] = $p->nm_prop;

            $hasil_objek->$i = (object) $hasil[$i];
        }
        return $hasil_objek;
    }

    public function daftar(Request $request): string
    {
        $nomor_rekam_medis = $request->input('nomor_rekam_medis') ?? rand(100000, 999999);
        $nama_lengkap = $request->input('nama');
        $nomor_ktp = $request->input('ktp');
        $tempat_lahir = $request->input('tempat_lahir');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $alamat = $request->input('alamat');
        $kelurahan = $request->input('kelurahan');
        $kecamatan = $request->input('kecamatan');
        $kabupaten = $request->input('kabupaten');
        $provinsi = $request->input('provinsi');
        $telepon = $request->input('telepon');
        $pekerjaan = $request->input('pekerjaan');
        $agama = $request->input('agama');
        $status_perkawinan = $request->input('status_perkawinan');
        $golongan_darah = $request->input('golongan_darah');
        $nama_ibu = $request->input('nama_ibu');

        $data = [
            'no_rkm_medis' => $nomor_rekam_medis,
            'no_ktp' => $nomor_ktp,
            'nm_pasien' => $nama_lengkap,
            'tmp_lahir' => $tempat_lahir,
            'tgl_lahir' => $tanggal_lahir,
            'jk' => $jenis_kelamin,
            'alamat' => $alamat,
            'kd_kel' => $kelurahan,
            'kd_kec' => $kecamatan,
            'kd_kab' => $kabupaten,
            'kd_prop' => $provinsi,
            'no_tlp' => $telepon,
            'pekerjaan' => $pekerjaan,
            'agama' => $agama,
            'stts_nikah' => $status_perkawinan,
            'gol_darah' => $golongan_darah,
            'nm_ibu' => $nama_ibu,
        ];
        DB::table('pasien')->insert($data);

        DB::statement("
            INSERT INTO web_plus_autentikasi_pengguna (nama_pengguna, kata_sandi, level_akses, uuid)
            VALUES (
                AES_ENCRYPT('$nomor_rekam_medis', 'nur'),
                AES_ENCRYPT('$nomor_rekam_medis', 'windi'),
                1,
                UUID()
            )
        ");

        $akun = DB::table('web_plus_autentikasi_pengguna')
            ->orderByDesc('id_pengguna')
            ->first();

        DB::table('web_plus_autentikasi_korelasi')
            ->insert([
                'id_pengguna' => $akun->id_pengguna,
                'nomor' => $nomor_rekam_medis,
            ]);

        return $nomor_rekam_medis;
    }
}
