<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('periode', 'DashTarbak\TransferDataController@getPeriode');
Route::post('transfer-data', 'DashTarbak\TransferDataController@store');

Route::get('setting-grafik', 'DashTarbak\SettingGrafikController@index');
Route::get('setting-grafik-detail', 'DashTarbak\SettingGrafikController@show');
Route::post('setting-grafik', 'DashTarbak\SettingGrafikController@store');
Route::put('setting-grafik', 'DashTarbak\SettingGrafikController@update');
Route::delete('setting-grafik', 'DashTarbak\SettingGrafikController@destroy');
Route::get('setting-grafik-klp', 'DashTarbak\SettingGrafikController@getKlp');
Route::get('setting-grafik-neraca', 'DashTarbak\SettingGrafikController@getNeraca');

Route::get('pendukung', 'DashTarbak\PendukungController@index');
Route::get('pendukung-detail', 'DashTarbak\PendukungController@show');
Route::post('pendukung', 'DashTarbak\PendukungController@store');
Route::put('pendukung', 'DashTarbak\PendukungController@update');
Route::delete('pendukung', 'DashTarbak\PendukungController@destroy');
Route::get('pendukung-neraca', 'DashTarbak\PendukungController@getNeraca');

Route::get('setting-rasio', 'DashTarbak\SettingRasioController@index');
Route::get('setting-rasio-detail', 'DashTarbak\SettingRasioController@show');
Route::post('setting-rasio', 'DashTarbak\SettingRasioController@store');
Route::put('setting-rasio', 'DashTarbak\SettingRasioController@update');
Route::delete('setting-rasio', 'DashTarbak\SettingRasioController@destroy');
Route::get('setting-rasio-klp', 'DashTarbak\SettingRasioController@getKlp');
Route::get('setting-rasio-neraca', 'DashTarbak\SettingRasioController@getNeraca');