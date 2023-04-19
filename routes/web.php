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
            Route::get('/ruang', 'ruang')->name('ruang');
            Route::get('/loket', 'loket')->name('loket');
            Route::get('/tampil', 'tampil')->name('tampil');
        });

        Route::prefix('atur')->name('atur.')->group(function (){
            Route::get('/pilih', 'pilih')->name('pilih');
            Route::get('/ubah', 'ubah')->name('ubah');
        });
    });

    Route::prefix('reservasi')->name('reservasi.')->controller(Reservasi::class)->group(function (){
        Route::get('/', 'beranda')->name('beranda');
        Route::get('/tujuan', 'tujuan')->name('tujuan');
        Route::get('/jadwal', 'jadwal')->name('jadwal');
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
