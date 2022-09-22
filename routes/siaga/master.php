<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/karyawan', 'Siaga\KaryawanController@index');
Route::post('/karyawan', 'Siaga\KaryawanController@store');
Route::get('/karyawan/{nik}', 'Siaga\KaryawanController@show');
Route::post('/karyawan/{nik}','Siaga\KaryawanController@update');
Route::delete('/karyawan/{nik}','Siaga\KaryawanController@destroy');
Route::get('/karyawan-nik', 'Siaga\KaryawanController@getGrKaryawan');

Route::get('/unit', 'Siaga\UnitController@index');
Route::post('/unit', 'Siaga\UnitController@store');
Route::get('/unit/{kode_pp}', 'Siaga\UnitController@show');
Route::put('/unit/{kode_pp}','Siaga\UnitController@update');
Route::delete('/unit/{kode_pp}','Siaga\UnitController@destroy');

Route::get('/jabatan', 'Siaga\JabatanController@index');
Route::post('/jabatan', 'Siaga\JabatanController@store');
Route::get('/jabatan/{kode_jab}', 'Siaga\JabatanController@show');
Route::put('/jabatan/{kode_jab}','Siaga\JabatanController@update');
Route::delete('/jabatan/{kode_jab}','Siaga\JabatanController@destroy');

Route::get('/role', 'Siaga\RoleController@index');
Route::post('/role', 'Siaga\RoleController@store');
Route::get('/role/{kode_role}', 'Siaga\RoleController@show');
Route::put('/role/{kode_role}','Siaga\RoleController@update');
Route::delete('/role/{kode_role}','Siaga\RoleController@destroy');

Route::get('/hakakses','Siaga\HakaksesController@index');
Route::get('/hakakses/{nik}','Siaga\HakaksesController@show');
Route::post('/hakakses','Siaga\HakaksesController@store');
Route::put('/hakakses/{nik}','Siaga\HakaksesController@update');
Route::delete('/hakakses/{nik}','Siaga\HakaksesController@destroy');
Route::get('/form','Siaga\HakaksesController@getForm');
Route::get('/hakakses_menu','Siaga\HakaksesController@getMenu');

Route::get('filter-pp','Siaga\FilterController@getFilterPP');
Route::get('filter-pp-one/{kode}','Siaga\FilterController@getFilterPPOne');
Route::get('filter-jabatan','Siaga\FilterController@getFilterJabatan');
Route::get('filter-nik','Siaga\FilterController@getFilterNik');
Route::get('filter-klp-menu','Siaga\FilterController@getFilterKlpMenu');
Route::get('filter-form','Siaga\FilterController@getFilterForm');

//ADMIN SETTING
// Data Unit //
Route::get('set-unit', 'Siaga\Settings\UnitController@index');
Route::get('set-unit/{id}', 'Siaga\Settings\UnitController@getData');
Route::post('set-unit', 'Siaga\Settings\UnitController@store');
Route::put('set-unit/{id}', 'Siaga\Settings\UnitController@update');
Route::delete('set-unit/{id}', 'Siaga\Settings\UnitController@delete');

// Data Klp Menu //
Route::get('set-menu-klp', 'Siaga\Settings\KelompokMenuController@index');
Route::get('set-menu-klp/{id}', 'Siaga\Settings\KelompokMenuController@getData');
Route::post('set-menu-klp', 'Siaga\Settings\KelompokMenuController@store');
Route::put('set-menu-klp/{id}', 'Siaga\Settings\KelompokMenuController@update');
Route::delete('set-menu-klp/{id}', 'Siaga\Settings\KelompokMenuController@delete');

// Data Karyawan //
Route::get('set-karyawan', 'Siaga\Settings\KaryawanController@index');
Route::get('set-karyawan/{id}', 'Siaga\Settings\KaryawanController@getData');
Route::post('set-karyawan', 'Siaga\Settings\KaryawanController@store');
Route::post('set-karyawan-ubah/{id}', 'Siaga\Settings\KaryawanController@update');
Route::delete('set-karyawan/{id}', 'Siaga\Settings\KaryawanController@delete');

// Data Akses //
Route::get('set-akses-user', 'Siaga\Settings\AksesUserController@index');
Route::get('set-akses-user/{id}', 'Siaga\Settings\AksesUserController@getData');
Route::post('set-akses-user', 'Siaga\Settings\AksesUserController@store');
Route::put('set-akses-user/{id}', 'Siaga\Settings\AksesUserController@update');
Route::delete('set-akses-user/{id}', 'Siaga\Settings\AksesUserController@delete');

// Data Form //
Route::get('set-form', 'Siaga\Settings\FormController@index');
Route::get('set-form/{id}', 'Siaga\Settings\FormController@getData');
Route::post('set-form', 'Siaga\Settings\FormController@store');
Route::put('set-form/{id}', 'Siaga\Settings\FormController@update');
Route::delete('set-form/{id}', 'Siaga\Settings\FormController@delete');

// Setting Menu Form //
Route::get('set-setting-menu', 'Siaga\Settings\SettingMenuController@show');
Route::post('set-setting-menu', 'Siaga\Settings\SettingMenuController@store');
Route::post('set-setting-menu-move', 'Siaga\Settings\SettingMenuController@storeMove');
Route::put('set-setting-menu', 'Siaga\Settings\SettingMenuController@update');
Route::delete('set-setting-menu', 'Siaga\Settings\SettingMenuController@delete');
Route::post('set-setting-menu-csv', 'Siaga\Settings\SettingMenuController@storeCSV');






