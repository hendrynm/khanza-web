<?php

use App\Http\Controllers\Autentikasi;
use App\Http\Controllers\General;
use App\Http\Controllers\Loket;
use App\Http\Controllers\Notifikasi;
use App\Http\Controllers\RekamMedis;
use App\Http\Controllers\Reservasi;
use App\Http\Controllers\Tindakan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->name('publik.')->controller(Autentikasi::class)->group(function (){
    Route::get('/', 'showLoginForm');
    Route::get('/register', 'showRegistrationForm');
    Route::post('/register', 'register');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout');
});

Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/beranda', [General::class, 'beranda'])->name('beranda');

    Route::prefix('loket')->name('loket.')->controller(Loket::class)->group(function (){
        Route::get('/', 'beranda')->name('beranda');

        Route::prefix('tampil')->name('tampil.')->group(function (){
            Route::get('/ruang', 'tampil_ruang')->name('ruang');
            Route::get('/loket/{uuid}', 'tampil_loket')->name('loket');
            Route::get('/tampil/{uuid}', 'tampil_tampil')->name('tampil');
        });

        Route::prefix('atur')->name('atur.')->group(function (){
            Route::get('/', 'atur_beranda')->name('beranda');

            Route::prefix('ruang')->name('ruang.')->group(function (){
                Route::get('/tambah', 'atur_ruang_tambah')->name('tambah');
                Route::post('/tambah', 'atur_ruang_tambah_post')->name('tambah.post');
                Route::get('/ubah/{uuid}', 'atur_ruang_ubah')->name('ubah');
                Route::post('/ubah/{uuid}', 'atur_ruang_ubah_post')->name('ubah.post');
                Route::get('/hapus/{uuid}', 'atur_ruang_hapus')->name('hapus');
            });

            Route::prefix('loket')->name('loket.')->group(function (){
                Route::get('/{uuid}', 'atur_loket_beranda')->name('beranda');
                Route::get('/{uuid}/tambah', 'atur_loket_tambah')->name('tambah');
                Route::post('/{uuid}/tambah', 'atur_loket_tambah_post')->name('tambah.post');
                Route::get('/{uuid}/ubah/{uuid_loket}', 'atur_loket_ubah')->name('ubah');
                Route::post('/{uuid}/ubah/{uuid_loket}', 'atur_loket_ubah_post')->name('ubah.post');
                Route::get('/{uuid}/hapus/{uuid_loket}', 'atur_loket_hapus')->name('hapus');
            });
        });

        Route::prefix('publik')->name('publik.')->group(function (){
            Route::get('/', 'publik_beranda')->name('beranda');
            Route::get('/panggil/{uuid}', 'publik_panggil')->name('panggil');
            Route::get('/cetak/{uuid}', 'publik_cetak')->name('cetak');
        });
    });

    Route::prefix('reservasi')->name('reservasi.')->controller(Reservasi::class)->group(function (){
        Route::get('/', 'beranda')->name('beranda');

        Route::prefix('pasien')->name('pasien.')->group(function (){
            Route::get('/', 'pasien_beranda')->name('beranda');
            Route::get('/{nomor_medis}', 'pasien_tujuan')->name('tujuan');
            Route::get('/{nomor_medis}/tujuan/{uuid}', 'pasien_jadwal')->name('jadwal');
        });

        Route::prefix('registrasi')->name('registrasi.')->group(function (){
            Route::get('/', 'registrasi_beranda')->name('beranda');
            Route::get('/daftar/{nomor_medis}', 'registrasi_daftar')->name('daftar');
            Route::post('/konfirmasi','registrasi_konfirmasi')->name('konfirmasi');
            Route::post('/konfirmasi/simpan','registrasi_konfirmasi_simpan')->name('konfirmasi.simpan');
            Route::get('/hapus/{uuid}', 'registrasi_hapus')->name('hapus');
        });

        Route::prefix('atur')->name('atur.')->group(function (){
            Route::get('/', 'atur_beranda')->name('beranda');
            Route::get('/tambah', 'atur_tambah')->name('tambah');
            Route::post('/tambah', 'atur_tambah_post')->name('tambah.post');
            Route::get('/ubah/{uuid}', 'atur_ubah')->name('ubah');
            Route::post('/ubah/{uuid}', 'atur_ubah_post')->name('ubah.post');
            Route::get('/hapus/{uuid}', 'atur_hapus')->name('hapus');
        });

        Route::prefix('dokter')->name('dokter.')->group(function (){
            Route::get('/{uuid_ruang}', 'dokter_beranda')->name('beranda');
            Route::get('/{uuid_ruang}/tambah', 'dokter_tambah')->name('tambah');
            Route::post('/{uuid_ruang}/tambah', 'dokter_tambah_post')->name('tambah.post');
            Route::get('/{uuid_ruang}/ubah/{uuid_jadwal}', 'dokter_ubah')->name('ubah');
            Route::post('/{uuid_ruang}/ubah/{uuid_jadwal}', 'dokter_ubah_post')->name('ubah.post');
            Route::get('/{uuid_ruang}/hapus/{uuid_jadwal}', 'dokter_hapus')->name('hapus');
        });

        Route::prefix('/simpan')->name('simpan.')->group(function (){
            Route::get('/', 'simpan_beranda')->name('beranda');
            Route::get('/{uuid}', 'simpan_detail')->name('detail');
        });

        Route::get('/daftar', 'daftar')->name('daftar');
    });

    Route::get('/penjadwalan', [General::class, 'penjadwalan'])->name('penjadwalan');

    Route::prefix('rekam')->name('rekam_medis.')->controller(RekamMedis::class)->group(function (){
        Route::get('/', 'beranda')->name('beranda');
        Route::get('/profil/{nomor_medis}', 'profil')->name('profil');
        Route::get('/detail/{nomor_medis}/{nomor_rawat}', 'detail')->name('detail');
    });

    Route::prefix('tindakan')->name('tindakan.')->controller(Tindakan::class)->group(function (){
        Route::get('/', 'beranda')->name('beranda');

        Route::prefix('/jadwal')->name('jadwal.')->group(function (){
            Route::get('/pilih', 'jadwal_pilih')->name('pilih');
            Route::get('/{nomor_medis}', 'jadwal_beranda')->name('beranda');
            Route::get('/{nomor_medis}/ruang/{uuid}', 'jadwal_ruang')->name('ruang');
            Route::post('/konfirmasi', 'jadwal_konfirmasi')->name('konfirmasi');
            Route::post('/konfirmasi/simpan', 'jadwal_konfirmasi_simpan')->name('konfirmasi.simpan');
        });

        Route::prefix('/catat')->name('catat.')->group(function (){
            Route::get('/pilih', 'catat_pilih')->name('pilih');
            Route::get('/{nomor_medis}', 'catat_beranda')->name('beranda');
            Route::post('/{nomor_medis}', 'catat_simpan')->name('simpan');
        });

        Route::get('/detail', 'detail')->name('detail');
    });

    Route::prefix('notifikasi')->name('notifikasi.')->controller(Notifikasi::class)->group(function (){
        Route::get('/', 'beranda')->name('beranda');
    });

    Route::get('/keluar', [General::class, 'keluar'])->name('keluar');
});

Route::fallback(function() {
    return response()->view('_error.404', [], 404);
});
