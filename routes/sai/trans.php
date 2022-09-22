<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper
Route::get('kontrak/{status}','Sai\HelperController@getKontrak');
Route::get('tagihan-maintain-load/{periode}','Sai\HelperController@getTagihan');

//Kontrak
Route::get('kontrak','Sai\KontrakController@index');
Route::get('kontrak-detail/{kode}','Sai\KontrakController@show');
Route::post('kontrak','Sai\KontrakController@store');
Route::post('kontrak-ubah/{kode}','Sai\KontrakController@update');
Route::delete('kontrak/{kode}','Sai\KontrakController@destroy');

//Tagihan
Route::get('tagihan','Sai\TagihanController@index');
Route::get('tagihan/{kode}','Sai\TagihanController@show');
Route::post('tagihan','Sai\TagihanController@store');
Route::post('tagihan-ubah/{kode}','Sai\TagihanController@update');
Route::delete('tagihan/{kode}','Sai\TagihanController@destroy');

//Faktur
Route::get('faktur-pajak','Sai\FakturPajakController@index');
Route::get('faktur-pajak-detail/{kode}','Sai\FakturPajakController@show');
Route::post('faktur-pajak','Sai\FakturPajakController@store');
Route::post('faktur-pajak-ubah/{kode}','Sai\FakturPajakController@update');
Route::delete('faktur-pajak/{kode}','Sai\FakturPajakController@destroy');

//Pembayaran
Route::get('pembayaran','Sai\PembayaranController@index');
Route::get('pembayaran-detail/{kode}','Sai\PembayaranController@show');
Route::post('pembayaran','Sai\PembayaranController@store');
Route::post('pembayaran-ubah/{kode}','Sai\PembayaranController@update');
Route::delete('pembayaran/{kode}','Sai\PembayaranController@destroy');

//Tagihan MT
Route::get('tagihan-maintain','Sai\TagihanMTController@index');
Route::get('tagihan-maintain-detail/{kode}','Sai\TagihanMTController@show');
Route::post('tagihan-maintain','Sai\TagihanMTController@store');
Route::post('tagihan-maintain-ubah/{kode}','Sai\TagihanMTController@update');
Route::delete('tagihan-maintain/{kode}','Sai\TagihanMTController@destroy');