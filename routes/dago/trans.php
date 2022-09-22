<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('cek-ktp/{ktp}', 'Dago\HelperController@cekKtp');

Route::get('jamaah', 'Dago\JamaahController@index');
Route::post('jamaah', 'Dago\JamaahController@store');
Route::get('jamaah-detail', 'Dago\JamaahController@show');
Route::get('jamaah-detail-id', 'Dago\JamaahController@showById');
Route::post('jamaah-ubah','Dago\JamaahController@update');
Route::delete('jamaah','Dago\JamaahController@destroy');

Route::get('registrasi', 'Dago\RegistrasiController@index');
Route::post('registrasi','Dago\RegistrasiController@store');
Route::get('registrasi-detail','Dago\RegistrasiController@show');
Route::put('registrasi','Dago\RegistrasiController@update');
Route::delete('registrasi','Dago\RegistrasiController@destroy');
Route::get('jadwal-detail','Dago\RegistrasiController@getJadwal');
Route::get('jadwal-detail2','Dago\RegistrasiController@getJadwal2');
Route::get('biaya-tambahan','Dago\RegistrasiController@getBiayaTambahan');
Route::get('biaya-dokumen','Dago\RegistrasiController@getBiayaDokumen');
Route::get('pp','Dago\RegistrasiController@getPP');
Route::get('harga','Dago\RegistrasiController@getHarga');
Route::get('quota','Dago\RegistrasiController@getQuota');
Route::get('harga-room','Dago\RegistrasiController@getHargaRoom');
Route::get('no-marketing','Dago\RegistrasiController@getNoMarketing');
Route::get('registrasi-preview','Dago\RegistrasiController@getPreview');
Route::get('paket/{no_paket}','Dago\RegistrasiController@getPaket');

//Registrasi Group
Route::get('registrasi-group','Dago\RegistrasiGroupController@index');
Route::post('registrasi-group','Dago\RegistrasiGroupController@store');

//Pembayaran
Route::get('pembayaran','Dago\PembayaranController@getRegistrasi');
Route::get('pembayaran-history','Dago\PembayaranController@index');
Route::post('pembayaran','Dago\PembayaranController@store');
Route::get('pembayaran-detail','Dago\PembayaranController@show');
Route::get('pembayaran-edit','Dago\PembayaranController@edit');
Route::put('pembayaran','Dago\PembayaranController@update');
Route::delete('pembayaran','Dago\PembayaranController@destroy');
Route::get('pembayaran-rekbank','Dago\PembayaranController@getRekBank');
Route::get('pembayaran-preview','Dago\PembayaranController@getPreview');
Route::get('pembayaran-kurs','Dago\PembayaranController@getKurs');

//Non Cash
Route::get('noncash','Dago\NonCashController@getRegistrasi');
Route::post('noncash','Dago\NonCashController@store');
Route::get('noncash-detail','Dago\NonCashController@show');
Route::get('noncash-rekbank','Dago\NonCashController@getRekBank');

//Verifikasi
Route::get('verifikasi','Dago\VerifikasiController@index');
Route::get('verifikasi-edit','Dago\VerifikasiController@edit');
Route::put('verifikasi','Dago\VerifikasiController@update');
Route::get('verifikasi-histori','Dago\VerifikasiController@histori');
Route::delete('verifikasi','Dago\VerifikasiController@destroy');

//UploadDok
Route::get('upload-dok','Dago\UploadDokController@index');
Route::get('upload-dok-detail','Dago\UploadDokController@show');
Route::post('upload-dok','Dago\UploadDokController@store');
Route::delete('upload-dok','Dago\UploadDokController@destroy');

//Pembayaran Group
Route::get('pembayaran-group','Dago\PembayaranGroupController@index');
Route::get('pembayaran-group-nobukti','Dago\PembayaranGroupController@getNoBukti');
Route::get('pembayaran-group-reg','Dago\PembayaranGroupController@getRegistrasi');
Route::get('pembayaran-group-det','Dago\PembayaranGroupController@getDetailBiaya');
Route::post('pembayaran-group-det','Dago\PembayaranGroupController@simpanDetTmp');
Route::post('pembayaran-group-det2','Dago\PembayaranGroupController@simpanDetTmp2');
Route::post('pembayaran-group','Dago\PembayaranGroupController@store');
Route::get('pembayaran-group-edit','Dago\PembayaranGroupController@edit');
Route::put('pembayaran-group','Dago\PembayaranGroupController@update');
Route::delete('pembayaran-group','Dago\PembayaranGroupController@destroy');
Route::delete('pembayaran-group-det','Dago\PembayaranGroupController@destroyDetTmp');
Route::get('jamaah-group','Dago\PembayaranGroupController@getJamaahGroup');

//Closing Jadwal
Route::get('closing-jadwal-reg','Dago\ClosingJadwalController@getRegistrasi');
Route::get('closing-jadwal','Dago\ClosingJadwalController@index');
Route::post('closing-jadwal','Dago\ClosingJadwalController@store');
Route::get('closing-jadwal-detail','Dago\ClosingJadwalController@show');
Route::put('closing-jadwal','Dago\ClosingJadwalController@update');
Route::delete('closing-jadwal','Dago\ClosingJadwalController@destroy');
