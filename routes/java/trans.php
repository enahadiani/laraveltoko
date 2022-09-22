<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Helper
Route::get('customer', 'Java\HelperController@getCustomer');
Route::get('vendor', 'Java\HelperController@getVendor');
Route::get('rab-proyek-cbbl', 'Java\HelperController@getProyekRab');
Route::get('beban-proyek-cbbl', 'Java\HelperController@getProyekBeban');
Route::get('tagihan-proyek-cbbl', 'Java\HelperController@getProyekTagihan');
Route::get('bank-bayar-cbbl', 'Java\HelperController@getBankBayar');
Route::get('tagihan-bayar-cbbl', 'Java\HelperController@getTagihanBayar');
Route::get('dok-jenis', 'Java\HelperController@getJenisDokumen');
Route::delete('proyek-file', 'Java\HelperController@deleteFile');

// Data Proyek //
Route::get('proyek', 'Java\ProyekController@index');
Route::get('proyek-show', 'Java\ProyekController@getData');
Route::get('proyek-check', 'Java\ProyekController@isUnikProyek');
Route::get('kontrak-check', 'Java\ProyekController@isUnikKontrak');
Route::post('proyek', 'Java\ProyekController@store');
Route::put('proyek-ubah', 'Java\ProyekController@update');
Route::delete('proyek', 'Java\ProyekController@delete');

// Data Proyek RAB //
Route::get('rab-proyek', 'Java\RabProyekController@index');
Route::get('rab-proyek-show', 'Java\RabProyekController@getData');
Route::post('rab-proyek', 'Java\RabProyekController@store');
Route::put('rab-proyek-ubah', 'Java\RabProyekController@update');
Route::delete('rab-proyek', 'Java\RabProyekController@delete');

// Data Beban
Route::get('biaya-proyek', 'Java\BiayaProyekController@index');
Route::get('biaya-proyek-show', 'Java\BiayaProyekController@getData');
Route::post('biaya-proyek', 'Java\BiayaProyekController@store');
Route::put('biaya-proyek-ubah', 'Java\BiayaProyekController@update');
Route::delete('biaya-proyek', 'Java\BiayaProyekController@delete');

// Data Tagihan
Route::get('tagihan-proyek', 'Java\TagihanProyekController@index');
Route::get('tagihan-proyek-show', 'Java\TagihanProyekController@getData');
Route::post('tagihan-proyek', 'Java\TagihanProyekController@store');
Route::put('tagihan-proyek-ubah', 'Java\TagihanProyekController@update');
Route::delete('tagihan-proyek', 'Java\TagihanProyekController@delete');

// Data Bayar
Route::get('bayar-proyek', 'Java\PembayaranProyekController@index');
Route::get('bayar-proyek-show', 'Java\PembayaranProyekController@getData');
Route::post('bayar-proyek', 'Java\PembayaranProyekController@store');
Route::put('bayar-proyek-ubah', 'Java\PembayaranProyekController@update');
Route::delete('bayar-proyek', 'Java\PembayaranProyekController@delete');

?>