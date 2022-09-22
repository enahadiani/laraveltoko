<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/karyawan', 'Apv\KaryawanController@index');
Route::post('/karyawan', 'Apv\KaryawanController@store');
Route::get('/karyawan/{nik}', 'Apv\KaryawanController@show');
Route::post('/karyawan/{nik}','Apv\KaryawanController@update');
Route::delete('/karyawan/{nik}','Apv\KaryawanController@destroy');

Route::get('/unit', 'Apv\UnitController@index');
Route::post('/unit', 'Apv\UnitController@store');
Route::get('/unit/{kode_pp}', 'Apv\UnitController@show');
Route::put('/unit/{kode_pp}','Apv\UnitController@update');
Route::delete('/unit/{kode_pp}','Apv\UnitController@destroy');

Route::get('/jabatan', 'Apv\JabatanController@index');
Route::post('/jabatan', 'Apv\JabatanController@store');
Route::get('/jabatan/{kode_jab}', 'Apv\JabatanController@show');
Route::put('/jabatan/{kode_jab}','Apv\JabatanController@update');
Route::delete('/jabatan/{kode_jab}','Apv\JabatanController@destroy');

Route::get('/role', 'Apv\RoleController@index');
Route::post('/role', 'Apv\RoleController@store');
Route::get('/role/{kode_role}', 'Apv\RoleController@show');
Route::put('/role/{kode_role}','Apv\RoleController@update');
Route::delete('/role/{kode_role}','Apv\RoleController@destroy');

Route::get('/hakakses','Apv\HakaksesController@index');
Route::get('/hakakses/{nik}','Apv\HakaksesController@show');
Route::post('/hakakses','Apv\HakaksesController@store');
Route::put('/hakakses/{nik}','Apv\HakaksesController@update');
Route::delete('/hakakses/{nik}','Apv\HakaksesController@destroy');
Route::get('/form','Apv\HakaksesController@getForm');
Route::get('/hakakses_menu','Apv\HakaksesController@getMenu');

Route::get('/kota_all', 'Apv\KotaController@index');
Route::post('/kota', 'Apv\KotaController@store');
Route::get('/kota/{kode_kota}', 'Apv\KotaController@show');
Route::put('/kota/{kode_kota}','Apv\KotaController@update');
Route::delete('/kota/{kode_kota}','Apv\KotaController@destroy');
Route::get('/kota-aju', 'Apv\KotaController@getKotaByNIK');

Route::get('/divisi_all', 'Apv\DivisiController@index');
Route::post('/divisi', 'Apv\DivisiController@store');
Route::get('/divisi/{kode_divisi}', 'Apv\DivisiController@show');
Route::put('/divisi/{kode_divisi}','Apv\DivisiController@update');
Route::delete('/divisi/{kode_divisi}','Apv\DivisiController@destroy');
Route::get('/divisi-aju', 'Apv\DivisiController@getDivisiByNIK');

Route::get('filter-pp','Silo\FilterController@getFilterPP');
Route::get('filter-pp-one/{kode}','Silo\FilterController@getFilterPPOne');
Route::get('filter-kota','Silo\FilterController@getFilterKota');
Route::get('filter-divisi','Silo\FilterController@getFilterDivisi');
Route::get('filter-jabatan','Silo\FilterController@getFilterJabatan');
Route::get('filter-nik','Silo\FilterController@getFilterNik');
Route::get('filter-klp-menu','Silo\FilterController@getFilterKlpMenu');
Route::get('filter-form','Silo\FilterController@getFilterForm');
