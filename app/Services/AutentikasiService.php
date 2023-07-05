<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class AutentikasiService
{
    private const TABEL_PENGGUNA_BARU = 'web_plus_autentikasi_pengguna';
    private const TABEL_PENGGUNA_LAMA = 'user';

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

    public function getNomorRekamMedis(string $uuid): string
    {
        return DB::table(self::TABEL_PENGGUNA_BARU)
            ->select('*')
            ->where('uuid', $uuid)
            ->first();
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

    public function getSessionNamaPengguna(): string
    {
        return session()->key('nama_pengguna');
    }

    public function getSessionLevelAkses(): int
    {
        return session()->key('level_akses');
    }
}
