<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('filter-periode', 'Toko\HelperController@getPeriodePnj');
Route::get('filter-nik', 'Toko\HelperController@getNikPnj');
Route::get('filter-tanggal', 'Toko\HelperController@getTanggalPnj');
Route::get('filter-bukti', 'Toko\HelperController@getBuktiPnj');
Route::get('filter-periode-pmb', 'Toko\HelperController@getPeriodePmb');
Route::get('filter-nik-pmb', 'Toko\HelperController@getNikPmb');
Route::get('filter-bukti-pmb', 'Toko\HelperController@getBuktiPmb');
Route::get('filter-periode-close', 'Toko\HelperController@getPeriodeClose');
Route::get('filter-nik-close', 'Toko\HelperController@getNikClose');
Route::get('filter-bukti-close', 'Toko\HelperController@getBuktiClose');
Route::get('filter-barang', 'Toko\HelperController@getBarang');
Route::get('filter-periode-retur', 'Toko\HelperController@getPeriodeRetur');
Route::get('filter-nik-retur', 'Toko\HelperController@getNikRetur');
Route::get('filter-bukti-retur', 'Toko\HelperController@getBuktiRetur');


Route::post('lap-penjualan-harian', 'Toko\LaporanController@getPenjualanHarian');
Route::post('lap-penjualan', 'Toko\LaporanController@getPenjualan');
Route::post('lap-retur-beli', 'Toko\LaporanController@getReturBeli');
Route::post('lap-pembelian', 'Toko\LaporanController@getPembelian');
Route::post('lap-closing', 'Toko\LaporanController@getClosing');
Route::post('lap-barang', 'Toko\LaporanController@getBarang');
Route::post('lap-saldo', 'Toko\LaporanController@getSaldo');
Route::post('lap-kartu', 'Toko\LaporanController@getKartu');