<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


// Data Form //
Route::get('form', 'Sukka\FormController@index');
Route::get('form/{id}', 'Sukka\FormController@getData');
Route::post('form', 'Sukka\FormController@store');
Route::put('form/{id}', 'Sukka\FormController@update');
Route::delete('form/{id}', 'Sukka\FormController@delete');

// Setting Menu Form //
Route::get('setting-menu', 'Sukka\SettingMenuController@show');
Route::post('setting-menu', 'Sukka\SettingMenuController@store');
Route::post('setting-menu-move', 'Sukka\SettingMenuController@storeMove');
Route::put('setting-menu', 'Sukka\SettingMenuController@update');
Route::delete('setting-menu', 'Sukka\SettingMenuController@delete');

// Data Klp Menu //
Route::get('menu-klp', 'Sukka\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'Sukka\KelompokMenuController@getData');
Route::post('menu-klp', 'Sukka\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'Sukka\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'Sukka\KelompokMenuController@delete');

Route::get('/karyawan', 'Sukka\KaryawanController@index');
Route::post('/karyawan', 'Sukka\KaryawanController@store');
Route::get('/karyawan/{nik}', 'Sukka\KaryawanController@show');
Route::post('/karyawan/{nik}','Sukka\KaryawanController@update');
Route::delete('/karyawan/{nik}','Sukka\KaryawanController@destroy');
Route::get('/karyawan-nik', 'Sukka\KaryawanController@getGrKaryawan');

Route::get('/unit', 'Sukka\UnitController@index');
Route::post('/unit', 'Sukka\UnitController@store');
Route::get('/unit/{kode_pp}', 'Sukka\UnitController@show');
Route::put('/unit/{kode_pp}','Sukka\UnitController@update');
Route::delete('/unit/{kode_pp}','Sukka\UnitController@destroy');

Route::get('/jabatan', 'Sukka\JabatanController@index');
Route::post('/jabatan', 'Sukka\JabatanController@store');
Route::get('/jabatan/{kode_jab}', 'Sukka\JabatanController@show');
Route::put('/jabatan/{kode_jab}','Sukka\JabatanController@update');
Route::delete('/jabatan/{kode_jab}','Sukka\JabatanController@destroy');

Route::get('/role', 'Sukka\RoleController@index');
Route::get('/role-jenis', 'Sukka\RoleController@getJenis');
Route::post('/role', 'Sukka\RoleController@store');
Route::get('/role/{kode_role}', 'Sukka\RoleController@show');
Route::put('/role/{kode_role}','Sukka\RoleController@update');
Route::delete('/role/{kode_role}','Sukka\RoleController@destroy');

Route::get('/hakakses','Sukka\HakaksesController@index');
Route::get('/hakakses/{nik}','Sukka\HakaksesController@show');
Route::post('/hakakses','Sukka\HakaksesController@store');
Route::put('/hakakses/{nik}','Sukka\HakaksesController@update');
Route::delete('/hakakses/{nik}','Sukka\HakaksesController@destroy');
Route::get('/hakakses_menu','Sukka\HakaksesController@getMenu');

Route::get('filter-pp','Sukka\FilterController@getFilterPP');
Route::get('filter-pp-one/{kode}','Sukka\FilterController@getFilterPPOne');
Route::get('filter-jabatan','Sukka\FilterController@getFilterJabatan');
Route::get('filter-nik','Sukka\FilterController@getFilterNik');
Route::get('filter-klp-menu','Sukka\FilterController@getFilterKlpMenu');
Route::get('filter-form','Sukka\FilterController@getFilterForm');




