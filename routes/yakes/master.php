<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Data//
Route::get('helper-akun', 'Yakes\HelperController@getAkun');
Route::get('helper-akun/{id}', 'Yakes\HelperController@getAkunById');
Route::get('cek-akun/{id}', 'Yakes\HelperController@cekAkun');
Route::get('helper-tanggal', 'Yakes\HelperController@getTanggal');
Route::get('helper-pp', 'Yakes\HelperController@getPPYakes');
Route::get('helper-pp/{id}', 'Yakes\HelperController@getPPYakesById');
Route::get('helper-fs', 'Yakes\HelperController@getFSYakes');
Route::get('helper-fs/{id}', 'Yakes\HelperController@getFSYakesById');
Route::get('helper-bukti-sesuai', 'Yakes\HelperController@generateBuktiSesuai');

// Data Masakun //
Route::get('masakun', 'Yakes\MasakunController@index');
Route::get('masakun/{id}', 'Yakes\MasakunController@getData');
Route::post('masakun', 'Yakes\MasakunController@store');
Route::put('masakun/{id}', 'Yakes\MasakunController@update');
Route::delete('masakun/{id}', 'Yakes\MasakunController@delete');

// Data FS //
Route::get('fs', 'Yakes\FSController@index');
Route::get('fs/{id}', 'Yakes\FSController@getData');
Route::post('fs', 'Yakes\FSController@store');
Route::put('fs/{id}', 'Yakes\FSController@update');
Route::delete('fs/{id}', 'Yakes\FSController@delete');

// Data Flag Akun //
Route::get('flag-akun', 'Yakes\FlagAkunController@index');
Route::get('flag-akun/{id}', 'Yakes\FlagAkunController@getData');
Route::post('flag-akun', 'Yakes\FlagAkunController@store');
Route::put('flag-akun/{id}', 'Yakes\FlagAkunController@update');
Route::delete('flag-akun/{id}', 'Yakes\FlagAkunController@delete');

// Data Flag Relasi //
Route::get('flag-relasi', 'Yakes\FlagRelasiController@index');
Route::get('flag-akun/{id}', 'Yakes\FlagAkunController@getData');
Route::put('flag-relasi/{id}', 'Yakes\FlagRelasiController@update');
Route::delete('flag-relasi/{id}', 'Yakes\FlagRelasiController@delete');

// Tambahan //
Route::get('format-laporan','Yakes\FormatLaporanController@show');
Route::post('format-laporan','Yakes\FormatLaporanController@store');
Route::put('format-laporan','Yakes\FormatLaporanController@update');
Route::delete('format-laporan','Yakes\FormatLaporanController@destroy');
Route::get('format-laporan-versi','Yakes\FormatLaporanController@getVersi');
Route::get('format-laporan-tipe','Yakes\FormatLaporanController@getTipe');
Route::get('format-laporan-relakun','Yakes\FormatLaporanController@getRelakun');
Route::post('format-laporan-relasi','Yakes\FormatLaporanController@simpanRelasi');
Route::post('format-laporan-move','Yakes\FormatLaporanController@simpanMove');

Route::get('format-aruskas','Yakes\FormatArusKasController@show');
Route::post('format-aruskas','Yakes\FormatArusKasController@store');
Route::put('format-aruskas','Yakes\FormatArusKasController@update');
Route::delete('format-aruskas','Yakes\FormatArusKasController@destroy');
Route::get('format-aruskas-versi','Yakes\FormatArusKasController@getVersi');
Route::get('format-aruskas-tipe','Yakes\FormatArusKasController@getTipe');
Route::get('format-aruskas-relakun','Yakes\FormatArusKasController@getRelakun');
Route::post('format-aruskas-relasi','Yakes\FormatArusKasController@simpanRelasi');
Route::post('format-aruskas-move','Yakes\FormatArusKasController@simpanMove');

// Setting Menu Form //
Route::get('setting-menu', 'Yakes\SettingMenuController@show');
Route::post('setting-menu', 'Yakes\SettingMenuController@store');
Route::post('setting-menu-move', 'Yakes\SettingMenuController@storeMove');
Route::put('setting-menu', 'Yakes\SettingMenuController@update');
Route::delete('setting-menu', 'Yakes\SettingMenuController@delete');

// Data Form //
Route::get('form', 'Yakes\FormController@index');
Route::get('form/{id}', 'Yakes\FormController@getData');
Route::post('form', 'Yakes\FormController@store');
Route::put('form/{id}', 'Yakes\FormController@update');
Route::delete('form/{id}', 'Yakes\FormController@delete');

// Data Klp Menu //
Route::get('menu-klp', 'Yakes\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'Yakes\KelompokMenuController@getData');
Route::post('menu-klp', 'Yakes\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'Yakes\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'Yakes\KelompokMenuController@delete');

// Data Akses //
Route::get('akses-user', 'Yakes\AksesUserController@index');
Route::get('akses-user/{id}', 'Yakes\AksesUserController@getData');
Route::post('akses-user', 'Yakes\AksesUserController@store');
Route::put('akses-user/{id}', 'Yakes\AksesUserController@update');
Route::delete('akses-user/{id}', 'Yakes\AksesUserController@delete');

// Data Karyawan //
Route::get('karyawan', 'Yakes\KaryawanController@index');
Route::get('lokasi', 'Yakes\KaryawanController@getLokasi');
Route::get('karyawan/{id}', 'Yakes\KaryawanController@getData');
Route::post('karyawan', 'Yakes\KaryawanController@store');
Route::post('karyawan-ubah/{id}', 'Yakes\KaryawanController@update');
Route::delete('karyawan/{id}', 'Yakes\KaryawanController@delete');

// Data Unit //
Route::get('unit', 'Yakes\UnitController@index');
Route::get('unit/{id}', 'Yakes\UnitController@getData');
Route::post('unit', 'Yakes\UnitController@store');
Route::put('unit/{id}', 'Yakes\UnitController@update');
Route::delete('unit/{id}', 'Yakes\UnitController@delete');


// Data Ttd //
Route::get('ttd', 'Yakes\TtdController@index');
Route::put('ttd', 'Yakes\TtdController@store');

Route::get('klp-akun', 'Yakes\KelompokAkunController@index');
Route::get('klp-akun-detail', 'Yakes\KelompokAkunController@show');
Route::post('klp-akun', 'Yakes\KelompokAkunController@store');
Route::put('klp-akun', 'Yakes\KelompokAkunController@update');
Route::delete('klp-akun', 'Yakes\KelompokAkunController@destroy');
Route::get('klp-akun-akun', 'Yakes\KelompokAkunController@getAkun');
