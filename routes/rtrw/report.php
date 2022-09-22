<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Filter Controller//
Route::get('filter-periode-keu', 'Rtrw\FilterController@getFilterPeriodeKeuangan');
Route::get('filter-modul', 'Rtrw\FilterController@getFilterModul');
Route::get('filter-bukti-trans', 'Rtrw\FilterController@getFilterBuktiTrans');
Route::get('filter-rumah', 'Rtrw\FilterController@getFilterRumah');
Route::get('filter-jenis', 'Rtrw\FilterController@getFilterJenis');
Route::get('filter-tglsurat', 'Rtrw\FilterController@getFilterTglSurat');
Route::get('filter-nosurat', 'Rtrw\FilterController@getFilterNoSurat');

Route::post('lap-bukti-trans', 'Rtrw\LaporanController@getBuktiTrans');
Route::post('lap-saldo-akun', 'Rtrw\LaporanController@getSaldoAkun');
Route::post('lap-kartu-iuran', 'Rtrw\LaporanController@getKartuIuran');
Route::post('lap-surat-antar', 'Rtrw\LaporanController@getSuratAntar');

Route::get('lap-bukti-trans-pdf', 'Rtrw\LaporanController@getBuktiTransPDF');
Route::get('lap-saldo-akun-pdf', 'Rtrw\LaporanController@getSaldoAkunPDF');
Route::get('lap-kartu-iuran-pdf', 'Rtrw\LaporanController@getKartuIuranPDF');
Route::get('lap-surat-antar-pdf', 'Rtrw\LaporanController@getSuratAntarPDF');

Route::post('send-email-report', 'Rtrw\LaporanController@sendEmail');
