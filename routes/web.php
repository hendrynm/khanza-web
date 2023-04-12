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

Route::group([], function (){
    Route::get('/admin/beranda', [General::class, 'index'])->name('global.beranda');
    Route::get('/admin/loket', [Loket::class, 'index'])->name('global.loket');
    Route::get('/admin/reservasi', [General::class, 'reservasi'])->name('global.reservasi');
    Route::get('admin/penjadwalan', [General::class, 'penjadwalan'])->name('global.penjadwalan');
    Route::get('admin/rekam', [General::class, 'rekam'])->name('global.rekam');
    Route::get('admin/tindakan', [General::class, 'tindakan'])->name('global.tindakan');
    Route::get('admin/keluar', [General::class, 'keluar'])->name('global.keluar');
});
