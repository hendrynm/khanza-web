<?php

use App\Http\Controllers\General;
use App\Http\Controllers\Loket;
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
                Route::post('/ubah/{uuid}', 'atur_ubah_ruang_post')->name('ubah.post');
                Route::get('/hapus/{uuid}', 'atur_ruang_hapus')->name('hapus');
            });

            Route::prefix('loket')->name('loket.')->group(function (){
                Route::get('/tambah', 'atur_loket_tambah')->name('tambah');
                Route::post('/tambah', 'atur_loket_tambah_post')->name('tambah.post');
                Route::get('/ubah/{uuid}', 'atur_loket_ubah')->name('ubah');
                Route::post('/ubah/{uuid}', 'atur_ubah_loket_post')->name('ubah.post');
                Route::get('/hapus/{uuid}', 'atur_loket_hapus')->name('hapus');
            });
        });

        Route::prefix('publik')->name('publik.')->group(function (){
            Route::get('/tampil', 'publik')->name('tampil');
        });
    });

    Route::prefix('reservasi')->name('reservasi.')->controller(Reservasi::class)->group(function (){
        Route::get('/', 'beranda')->name('beranda');
        Route::get('/tujuan', 'tujuan')->name('tujuan');
        Route::get('/jadwal', 'jadwal')->name('jadwal');

        Route::get('/daftar', 'daftar')->name('daftar');
    });

    Route::get('/penjadwalan', [General::class, 'penjadwalan'])->name('penjadwalan');

    Route::prefix('rekam')->name('rekam_medis.')->controller(RekamMedis::class)->group(function (){
        Route::get('/', 'beranda')->name('beranda');
        Route::get('/profil', 'profil')->name('profil');
    });

    Route::prefix('tindakan')->name('tindakan.')->controller(Tindakan::class)->group(function (){
        Route::get('/', 'beranda')->name('beranda');
        Route::get('/tindakan', 'tindakan')->name('tindakan');
    });

    Route::get('/keluar', [General::class, 'keluar'])->name('keluar');
});

Route::fallback(function() {
    return response()->view('_error.404', [], 404);
});
