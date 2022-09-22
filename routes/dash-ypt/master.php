<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


// Setting Menu Form //
Route::get('setting-menu', 'DashYpt\SettingMenuController@show');
Route::post('setting-menu', 'DashYpt\SettingMenuController@store');
Route::post('setting-menu-move', 'DashYpt\SettingMenuController@storeMove');
Route::put('setting-menu', 'DashYpt\SettingMenuController@update');
Route::delete('setting-menu', 'DashYpt\SettingMenuController@delete');

// Data Form //
Route::get('form', 'DashYpt\FormController@index');
Route::get('form/{id}', 'DashYpt\FormController@getData');
Route::post('form', 'DashYpt\FormController@store');
Route::put('form/{id}', 'DashYpt\FormController@update');
Route::delete('form/{id}', 'DashYpt\FormController@delete');

// Data Klp Menu //
Route::get('menu-klp', 'DashYpt\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'DashYpt\KelompokMenuController@getData');
Route::post('menu-klp', 'DashYpt\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'DashYpt\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'DashYpt\KelompokMenuController@delete');

// Data Akses //
Route::get('akses-user', 'DashYpt\AksesUserController@index');
Route::get('akses-user/{id}', 'DashYpt\AksesUserController@getData');
Route::post('akses-user', 'DashYpt\AksesUserController@store');
Route::put('akses-user/{id}', 'DashYpt\AksesUserController@update');
Route::delete('akses-user/{id}', 'DashYpt\AksesUserController@delete');

// Data Karyawan //
Route::get('karyawan', 'DashYpt\KaryawanController@index');
Route::get('karyawan/{id}', 'DashYpt\KaryawanController@getData');
Route::post('karyawan', 'DashYpt\KaryawanController@store');
Route::post('karyawan-ubah/{id}', 'DashYpt\KaryawanController@update');
Route::delete('karyawan/{id}', 'DashYpt\KaryawanController@delete');

// Data Unit //
Route::get('unit', 'DashYpt\UnitController@index');
Route::get('unit/{id}', 'DashYpt\UnitController@getData');
Route::post('unit', 'DashYpt\UnitController@store');
Route::put('unit/{id}', 'DashYpt\UnitController@update');
Route::delete('unit/{id}', 'DashYpt\UnitController@delete');

// Setting Menu Form //
Route::get('fs', 'DashTelu\FSController@index');
Route::get('fs/{id}', 'DashTelu\FSController@show');
Route::post('fs', 'DashTelu\FSController@store');
Route::put('fs/{id}', 'DashTelu\FSController@update');
Route::delete('fs/{id}', 'DashTelu\FSController@delete');

