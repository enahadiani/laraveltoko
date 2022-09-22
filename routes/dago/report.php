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

Route::get('filter-periode','Dago\FilterController@getFilterPeriode');
Route::get('filter-paket','Dago\FilterController@getFilterPaket');
Route::get('filter-jadwal','Dago\FilterController@getFilterJadwal');
Route::get('filter-noreg','Dago\FilterController@getFilterNoReg');
Route::get('filter-peserta','Dago\FilterController@getFilterPeserta');
Route::get('filter-kwitansi','Dago\FilterController@getFilterKwitansi');
Route::get('filter-jk','Dago\FilterController@getFilterJK');
Route::get('filter-terima','Dago\FilterController@getFilterTerima');
Route::get('filter-periode-bayar','Dago\FilterController@getFilterPeriodeBayar');

Route::get('filter2-periode','Dago\FilterController@getFilter2Periode');
Route::get('filter2-paket','Dago\FilterController@getFilter2Paket');
Route::get('filter2-jadwal','Dago\FilterController@getFilter2Jadwal');
Route::get('filter2-noreg','Dago\FilterController@getFilter2NoReg');
Route::get('filter2-peserta','Dago\FilterController@getFilter2Peserta');
Route::get('filter2-kwitansi','Dago\FilterController@getFilter2Kwitansi');
Route::get('filter2-nobukti','Dago\FilterController@getFilter2NoBukti');
Route::get('filter2-jk','Dago\FilterController@getFilter2JK');
Route::get('filter2-status','Dago\FilterController@getFilter2Status');
Route::get('filter2-usia','Dago\FilterController@getFilter2Usia');
Route::get('filter2-terima','Dago\FilterController@getFilter2Terima');
Route::get('filter2-periode-bayar','Dago\FilterController@getFilter2PeriodeBayar');


//Pihak ketiga

//Laporan
Route::post('lap-mku-operasional','Dago\LaporanController@getMkuOperasional');
Route::post('lap-mku-keuangan','Dago\LaporanController@getMkuKeuangan');
Route::post('lap-paket','Dago\LaporanController@getPaket');
Route::post('lap-dokumen','Dago\LaporanController@getDokumen');
Route::post('lap-jamaah','Dago\LaporanController@getJamaah');

Route::post('lap-form-registrasi','Dago\LaporanController@getFormRegistrasi');
Route::post('lap-form-registrasi-baru','Dago\LaporanController@getFormRegistrasiBaru');
Route::post('lap-registrasi','Dago\LaporanController@getRegistrasi');
Route::post('lap-pembayaran','Dago\LaporanController@getPembayaran');
Route::post('lap-rekap-saldo','Dago\LaporanController@getRekapSaldo');
Route::post('lap-detail-saldo','Dago\LaporanController@getDetailSaldo');
Route::post('lap-detail-tagihan','Dago\LaporanController@getDetailTagihan');
Route::post('lap-detail-bayar','Dago\LaporanController@getDetailBayar');
Route::post('lap-kartu-pembayaran','Dago\LaporanController@getKartuPembayaran');
Route::post('lap-terima','Dago\LaporanController@getTerima');
Route::post('lap-jurnal','Dago\LaporanController@getJurnal');

Route::post('lap-mku-operasional','Dago\LaporanController@getMkuOperasional');
Route::post('lap-mku-keuangan','Dago\LaporanController@getMkuKeuangan');
Route::post('lap-paket','Dago\LaporanController@getPaket');
Route::post('lap-dokumen','Dago\LaporanController@getDokumen');
Route::post('lap-jamaah','Dago\LaporanController@getJamaah');
Route::post('lap2-jamaah-list','Dago\Laporan2Controller@getDaftarJamaah');
Route::post('lap2-detail-jamaah','Dago\Laporan2Controller@getDetailJamaah');

Route::post('lap2-form-registrasi','Dago\Laporan2Controller@getFormRegistrasi');
Route::post('lap2-registrasi','Dago\Laporan2Controller@getRegistrasi');
Route::post('lap2-pembayaran','Dago\Laporan2Controller@getPembayaran');
Route::post('lap2-mku-operasional','Dago\Laporan2Controller@getMkuOperasional');
Route::post('lap2-mku-keuangan','Dago\Laporan2Controller@getMkuKeuangan');
Route::post('lap2-rekap-saldo','Dago\Laporan2Controller@getRekapSaldo');
Route::post('lap2-detail-saldo','Dago\Laporan2Controller@getDetailSaldo');
Route::post('lap2-detail-tagihan','Dago\Laporan2Controller@getDetailTagihan');
Route::post('lap2-detail-bayar','Dago\Laporan2Controller@getDetailBayar');
Route::post('lap2-kartu-pembayaran','Dago\Laporan2Controller@getKartuPembayaran');
Route::post('lap2-terima','Dago\Laporan2Controller@getTerima');
Route::post('lap2-jurnal','Dago\Laporan2Controller@getJurnal');
