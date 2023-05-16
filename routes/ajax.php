<?php

use App\Http\Controllers\Ajax;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('ajax.')->controller(Ajax::class)->group(function (){
    Route::prefix('/antrean')->name('antrean.')->group(function (){
        Route::get('/cek_nomor_baru/{uuid}', 'cek_nomor_baru')->name('cek_nomor_baru');
        Route::post('/cek_sisa_nomor', 'cek_sisa_nomor')->name('cek_sisa_nomor');
        Route::get('/cek_nomor_sekarang/{uuid}', 'cek_nomor_sekarang')->name('cek_nomor_sekarang');
        Route::post('/simpan_antrean', 'simpan_antrean')->name('simpan_antrean');
        Route::post('/panggil_antrean', 'panggil_antrean')->name('panggil_antrean');
        Route::post('/ulang_antrean', 'ulang_antrean')->name('ulang_antrean');
    });
});
