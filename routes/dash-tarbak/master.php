<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


// Setting Menu Form //
Route::get('setting-menu', 'DashTarbak\SettingMenuController@show');
Route::post('setting-menu', 'DashTarbak\SettingMenuController@store');
Route::post('setting-menu-move', 'DashTarbak\SettingMenuController@storeMove');
Route::put('setting-menu', 'DashTarbak\SettingMenuController@update');
Route::delete('setting-menu', 'DashTarbak\SettingMenuController@delete');

// Data Form //
Route::get('form', 'DashTarbak\FormController@index');
Route::get('form/{id}', 'DashTarbak\FormController@getData');
Route::post('form', 'DashTarbak\FormController@store');
Route::put('form/{id}', 'DashTarbak\FormController@update');
Route::delete('form/{id}', 'DashTarbak\FormController@delete');

// Data Klp Menu //
Route::get('menu-klp', 'DashTarbak\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'DashTarbak\KelompokMenuController@getData');
Route::post('menu-klp', 'DashTarbak\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'DashTarbak\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'DashTarbak\KelompokMenuController@delete');

// Data Akses //
Route::get('akses-user', 'DashTarbak\AksesUserController@index');
Route::get('akses-user/{id}', 'DashTarbak\AksesUserController@getData');
Route::post('akses-user', 'DashTarbak\AksesUserController@store');
Route::put('akses-user/{id}', 'DashTarbak\AksesUserController@update');
Route::delete('akses-user/{id}', 'DashTarbak\AksesUserController@delete');

// Data Karyawan //
Route::get('karyawan', 'DashTarbak\KaryawanController@index');
Route::get('karyawan/{id}', 'DashTarbak\KaryawanController@getData');
Route::post('karyawan', 'DashTarbak\KaryawanController@store');
Route::post('karyawan-ubah/{id}', 'DashTarbak\KaryawanController@update');
Route::delete('karyawan/{id}', 'DashTarbak\KaryawanController@delete');

// Data Unit //
Route::get('unit', 'DashTarbak\UnitController@index');
Route::get('unit/{id}', 'DashTarbak\UnitController@getData');
Route::post('unit', 'DashTarbak\UnitController@store');
Route::put('unit/{id}', 'DashTarbak\UnitController@update');
Route::delete('unit/{id}', 'DashTarbak\UnitController@delete');

// Setting Menu Form //
Route::get('fs', 'DashTelu\FSController@index');
Route::get('fs/{id}', 'DashTelu\FSController@show');
Route::post('fs', 'DashTelu\FSController@store');
Route::put('fs/{id}', 'DashTelu\FSController@update');
Route::delete('fs/{id}', 'DashTelu\FSController@delete');

