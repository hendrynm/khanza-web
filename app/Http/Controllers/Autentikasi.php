<?php

namespace App\Http\Controllers;

use App\Services\AutentikasiService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Autentikasi extends Controller
{
    public AutentikasiService $autentikasiService;

    public function __construct()
    {
        $this->autentikasiService = new AutentikasiService();
    }

    public function daftar_form()
    {
        $kelurahan = $this->autentikasiService->getDaftarKelurahan();
        $kecamatan = $this->autentikasiService->getDaftarKecamatan();
        $kabupaten = $this->autentikasiService->getDaftarKabupaten();
        $provinsi = $this->autentikasiService->getDaftarProvinsi();

        return view('auth.daftar', [
            'kelurahan' => $kelurahan,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'provinsi' => $provinsi,
        ]);
    }

    public function login_form()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $cek_login = $this->autentikasiService->login($request);

        if($cek_login)
        {
            toast('Login berhasil.', 'success');
            return redirect()->to('/admin/beranda');
        }

        toast('Nomor peserta atau kata sandi salah.', 'error');
        return redirect()->back();
    }

    public function daftar(Request $request): RedirectResponse
    {
        $daftar = $this->autentikasiService->daftar($request);

        toast('Pendaftaran berhasil. Masukkan ' . $daftar . ' sebagai nama pengguna dan kata sandi.', 'success');
        return redirect()->to('/');
    }

    public function admin_beranda()
    {
        $data = $this->autentikasiService->getDetailPengguna();

        return view('beranda', ['data' => $data]);
    }

    public function admin_keluar()
    {
        $this->autentikasiService->setSessionHapus();
        toast('Anda telah keluar.', 'success');
        return redirect()->to('/');
    }
}

