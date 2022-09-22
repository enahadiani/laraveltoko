<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Penjualan Routes //
Route::get('penjualan-open', 'Toko\PenjualanController@getNoOpen');
Route::get('penjualan-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Toko\PenjualanController@cekBonus');
Route::post('penjualan', 'Toko\PenjualanController@store');

//Open Kasir //
Route::get('open-kasir', 'Toko\OpenKasirController@index');
Route::post('open-kasir', 'Toko\OpenKasirController@store');
Route::put('open-kasir/{nik}/{no_open}', 'Toko\OpenKasirController@update');

//Close Kasir //
Route::get('close-kasir-new', 'Toko\CloseKasirController@indexNew');
Route::get('close-kasir-finish', 'Toko\CloseKasirController@indexFinish');
Route::get('close-kasir-detail/{no_open}', 'Toko\CloseKasirController@getData');
Route::post('close-kasir', 'Toko\CloseKasirController@store');

// Pembelian Routes //
Route::get('pembelian', 'Toko\PembelianController@index');
Route::get('pembelian-barang', 'Toko\PembelianController@getBarang');
Route::post('pembelian', 'Toko\PembelianController@store');
Route::put('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Toko\PembelianController@update');
Route::delete('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Toko\PembelianController@delete');
Route::get('pembelian-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Toko\PembelianController@show');

// Retur Pembelian //
Route::post('retur-beli', 'Toko\ReturBeliController@store');
Route::get('retur-beli-new', 'Toko\ReturBeliController@getNew');
Route::get('retur-beli-finish', 'Toko\ReturBeliController@getFinish');
Route::get('retur-beli-barang/{no_bukti1}/{no_bukti2}/{no_bukti3}/{no_bukti4}', 'Toko\ReturBeliController@getBarang');
Route::get('retur-beli-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}/{no_bukti4}', 'Toko\ReturBeliController@show');

// Stok Opname //
Route::get('stok-opname', 'Toko\StokOpnameController@index');
// Route::get('retur-beli-new', 'Toko\ReturBeliController@getNew');
// Route::get('retur-beli-finish', 'Toko\ReturBeliController@getFinish');
// Route::get('retur-beli-barang/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Toko\ReturBeliController@getBarang');
// Route::get('retur-beli-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Toko\ReturBeliController@show');

// Pemasukan Routes //
Route::get('pemasukan', 'Toko\PemasukanController@index');
Route::get('pemasukan/{no_bukti}', 'Toko\PemasukanController@show');
Route::post('pemasukan', 'Toko\PemasukanController@store');
Route::put('pemasukan/{no_bukti}', 'Toko\PemasukanController@update');
Route::delete('pemasukan/{no_bukti}', 'Toko\PemasukanController@destroy');

// Pemasukan Routes //
Route::get('pengeluaran', 'Toko\PengeluaranController@index');
Route::get('pengeluaran/{no_bukti}', 'Toko\PengeluaranController@show');
Route::post('pengeluaran', 'Toko\PengeluaranController@store');
Route::put('pengeluaran/{no_bukti}', 'Toko\PengeluaranController@update');
Route::delete('pengeluaran/{no_bukti}', 'Toko\PengeluaranController@destroy');

// Pindah buku Routes //
Route::get('pindah-buku', 'Toko\PindahBukuController@index');
Route::get('pindah-buku/{no_bukti}', 'Toko\PindahBukuController@show');
Route::post('pindah-buku', 'Toko\PindahBukuController@store');
Route::put('pindah-buku/{no_bukti}', 'Toko\PindahBukuController@update');
Route::delete('pindah-buku/{no_bukti}', 'Toko\PindahBukuController@destroy');

//Penjualan OL //
Route::get('penjualan-langsung-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Toko\PenjualanLangsungController@cekBonus');
Route::post('penjualan-langsung', 'Toko\PenjualanLangsungController@store');

// Data Provinsi //
Route::get('provinsi', 'Toko\PenjualanLangsungController@getProvinsi');
Route::get('kota', 'Toko\PenjualanLangsungController@getKota');
Route::get('kecamatan', 'Toko\PenjualanLangsungController@getKecamatan');
Route::get('service', 'Toko\PenjualanLangsungController@getService');

Route::get('barcode-load', 'Toko\BarcodeController@loadData');
Route::get('periode', 'Toko\BarcodeController@getPeriode');
Route::post('barcode', 'Toko\BarcodeController@store');
