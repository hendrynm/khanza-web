<?php

use App\Http\Controllers\General;
use App\Http\Controllers\Loket;
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

    Route::get('/reservasi', [General::class, 'reservasi'])->name('reservasi');

    Route::get('/penjadwalan', [General::class, 'penjadwalan'])->name('penjadwalan');

    Route::get('/rekam', [General::class, 'rekam'])->name('rekam');

    Route::get('/tindakan', [General::class, 'tindakan'])->name('tindakan');

    Route::get('/keluar', [General::class, 'keluar'])->name('keluar');
});
