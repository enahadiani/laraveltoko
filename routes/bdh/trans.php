<?php

use Illuminate\Support\Facades\Route;


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
// Pengajuan Droping
Route::get('/droping-aju', 'Bdh\PengajuanDropingController@index');
Route::get('/droping-aju-pp', 'Bdh\PengajuanDropingController@getPP');
Route::get('/droping-aju-akun', 'Bdh\PengajuanDropingController@getAkun');
Route::get('/droping-aju-nobukti', 'Bdh\PengajuanDropingController@GenerateBukti');
Route::post('/droping-aju', 'Bdh\PengajuanDropingController@store');

// Penerimaan Droping
Route::get('/droping-terima', 'Bdh\PenerimaanDropingController@index');
Route::get('/droping-terima-nobukti', 'Bdh\PenerimaanDropingController@GenerateBukti');
Route::get('/droping-terima-akun', 'Bdh\PenerimaanDropingController@getakun');
Route::get('/droping-terima-niktahu', 'Bdh\PenerimaanDropingController@getNik');
Route::get('/droping-terima-load', 'Bdh\PenerimaanDropingController@loadData');
Route::get('/droping-terima-detail', 'Bdh\PenerimaanDropingController@show');
Route::post('/droping-terima', 'Bdh\PenerimaanDropingController@store');
Route::post('/droping-terima-ubah', 'Bdh\PenerimaanDropingController@update');
Route::delete('/droping-terima', 'Bdh\PenerimaanDropingController@destroy');

// PB Pindah Buku
Route::get('/pindah-buku', 'Bdh\PindahPbController@index');
Route::get('/pindah-buku-nobukti', 'Bdh\PindahPbController@generateBukti');
Route::get('/pindah-buku-rekening-sumber', 'Bdh\PindahPbController@getRekSumber');


// Pertanggungan Beban
Route::get('/ptg-beban', 'Bdh\PtgBebanController@index');
Route::get('ptg-beban/{id}', 'Bdh\PtgBebanController@show');
Route::post('ptg-beban', 'Bdh\PtgBebanController@store');
Route::post('ptg-beban-ubah', 'Bdh\PtgBebanController@update');
Route::delete('ptg-beban', 'Bdh\PtgBebanController@destroy');

Route::get('generate-bukti', 'Bdh\PtgBebanController@GenerateBukti');
Route::get('load-budget', 'Bdh\PtgBebanController@cekBudget');
Route::get('nik-buat', 'Bdh\PtgBebanController@getNikBuat');
Route::get('nik-tahu', 'Bdh\PtgBebanController@getNikTahu');
Route::get('nik-ver', 'Bdh\PtgBebanController@getNikVer');
Route::get('akun', 'Bdh\PtgBebanController@getAkun');
Route::get('pp', 'Bdh\PtgBebanController@getPP');
Route::get('drk', 'Bdh\PtgBebanController@getDrk');
Route::get('dok-jenis', 'Bdh\PtgBebanController@getJenis');

// Serah Terima Dokumen Online
Route::get('/serah-dok-pb', 'Bdh\SerahTerimaDokOnController@index');
Route::get('/serah-dok-nik', 'Bdh\SerahTerimaDokOnController@getPenerima');
Route::get('/serah-dok-detail', 'Bdh\SerahTerimaDokOnController@show');
Route::post('/serah-dok', 'Bdh\SerahTerimaDokOnController@store');

// Approval Droping Dana
Route::get('/droping-app', 'Bdh\AppDropingController@index');
Route::get('/droping-app-aju', 'Bdh\AppDropingController@getFilter');
Route::get('/droping-app-akun-mutasi', 'Bdh\AppDropingController@getAkun');
Route::get('/droping-app/{id}', 'Bdh\AppDropingController@getDroping');
Route::get('/droping-app-detail', 'Bdh\AppDropingController@show');
Route::get('/droping-app-detail-edit', 'Bdh\AppDropingController@show2');
Route::post('/droping-app', 'Bdh\AppDropingController@store');
Route::post('/droping-app-ubah', 'Bdh\AppDropingController@update');
Route::delete('/droping-app', 'Bdh\AppDropingController@destroy');

// Verifikasi Dokumen
Route::get('/ver-dok', 'Bdh\VerDokController@index');
Route::get('/ver-dok-nobukti', 'Bdh\VerDokController@generateKode');
Route::get('/ver-dok-pb', 'Bdh\VerDokController@getPb');
Route::get('/ver-dok-detail', 'Bdh\VerDokController@LoadData');
Route::post('/ver-dok', 'Bdh\VerDokController@store');

// verifikasi pajak
Route::get('/ver-pajak','Bdh\VerPajakController@index');
Route::get('/ver-pajak-detail','Bdh\VerPajakController@show');
Route::get('/ver-pajak-akun','Bdh\VerPajakController@getAkun');
Route::get('/ver-pajak-pp','Bdh\VerPajakController@getPP');
Route::get('/ver-pajak-drk','Bdh\VerPajakController@getDrk');
Route::get('/ver-pajak-jenis-dok','Bdh\VerPajakController@getJenisDok');
Route::post('/ver-pajak','Bdh\VerPajakController@store');

// verifikasi akun
Route::get('/ver-akun','Bdh\VerAkunController@index');
Route::get('/ver-akun-detail','Bdh\VerAkunController@show');
Route::get('/ver-akun-budget','Bdh\VerAkunController@cekBudget');
Route::post('/ver-akun','Bdh\VerAkunController@store');

// SPB
Route::get('/spb', 'Bdh\SpbController@index');
Route::get('/spb-pb-list', 'Bdh\SpbController@getPb');
Route::get('/spb-rek-transfer', 'Bdh\SpbController@getTransfer');
Route::post('/spb', 'Bdh\SpbController@store');
Route::delete('/spb', 'Bdh\SpbController@destroy');
Route::get('spb-nobukti', 'Bdh\SpbController@GenerateBukti');
Route::get('spb-nik-bdh', 'Bdh\SpbController@getNikBdh');
Route::get('spb-nik-fiat', 'Bdh\SpbController@getNikFiat');
Route::get('spb-tambah-pb', 'Bdh\SpbController@getPbTambah');
Route::get('spb-store-pb', 'Bdh\SpbController@postPbTambah');


// Pembayaran SPB
Route::get('/bayar-spb', 'Bdh\PemSpbController@index');
Route::get('/bayar-spb-list', 'Bdh\PemSpbController@getPb');
Route::get('/bayar-spb-rek-transfer', 'Bdh\PemSpbController@getTransfer');
Route::get('/bayar-spb-nobukti', 'Bdh\PemSpbController@GenerateBukti');
Route::get('/bayar-spb-akun', 'Bdh\PemSpbController@getAkun');
Route::get('/bayar-spb-pp', 'Bdh\PemSpbController@getPP');
Route::get('/bayar-spb-akun-kasbank', 'Bdh\PemSpbController@getKasBank');
Route::post('/bayar-spb', 'Bdh\PemSpbController@store');
