<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('periode', 'DashYpt\TransferDataController@getPeriode');
Route::post('transfer-data', 'DashYpt\TransferDataController@store');

Route::get('setting-grafik', 'DashYpt\SettingGrafikController@index');
Route::get('setting-grafik-detail', 'DashYpt\SettingGrafikController@show');
Route::post('setting-grafik', 'DashYpt\SettingGrafikController@store');
Route::put('setting-grafik', 'DashYpt\SettingGrafikController@update');
Route::delete('setting-grafik', 'DashYpt\SettingGrafikController@destroy');
Route::get('setting-grafik-klp', 'DashYpt\SettingGrafikController@getKlp');
Route::get('setting-grafik-neraca', 'DashYpt\SettingGrafikController@getNeraca');

Route::get('pendukung', 'DashYpt\PendukungController@index');
Route::get('pendukung-detail', 'DashYpt\PendukungController@show');
Route::post('pendukung', 'DashYpt\PendukungController@store');
Route::put('pendukung', 'DashYpt\PendukungController@update');
Route::delete('pendukung', 'DashYpt\PendukungController@destroy');
Route::get('pendukung-neraca', 'DashYpt\PendukungController@getNeraca');

Route::get('setting-rasio', 'DashYpt\SettingRasioController@index');
Route::get('setting-rasio-detail', 'DashYpt\SettingRasioController@show');
Route::post('setting-rasio', 'DashYpt\SettingRasioController@store');
Route::put('setting-rasio', 'DashYpt\SettingRasioController@update');
Route::delete('setting-rasio', 'DashYpt\SettingRasioController@destroy');
Route::get('setting-rasio-klp', 'DashYpt\SettingRasioController@getKlp');
Route::get('setting-rasio-neraca', 'DashYpt\SettingRasioController@getNeraca');