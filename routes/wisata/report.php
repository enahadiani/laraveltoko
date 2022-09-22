<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('list-bulan', 'Wisata\HelperController@getReportBulanList');
Route::get('list-tahun', 'Wisata\HelperController@getReportTahunList');

Route::post('lap-bidang', 'Wisata\LaporanController@getBidang');
Route::post('lap-mitra', 'Wisata\LaporanController@getMitra');
Route::post('lap-kunjungan', 'Wisata\LaporanController@getKunjungan');