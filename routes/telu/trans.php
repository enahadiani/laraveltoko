<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('periode', 'DashTelu\TransferDataController@getPeriode');
Route::post('transfer-data', 'DashTelu\TransferDataController@store');

Route::get('setting-grafik', 'DashTelu\SettingGrafikController@index');
Route::get('setting-grafik-detail', 'DashTelu\SettingGrafikController@show');
Route::post('setting-grafik', 'DashTelu\SettingGrafikController@store');
Route::put('setting-grafik', 'DashTelu\SettingGrafikController@update');
Route::delete('setting-grafik', 'DashTelu\SettingGrafikController@destroy');
Route::get('setting-grafik-klp', 'DashTelu\SettingGrafikController@getKlp');
Route::get('setting-grafik-neraca', 'DashTelu\SettingGrafikController@getNeraca');

Route::get('hash-pass-menu-lokasi', 'DashTelu\HashPasswordController@getLokasi');
Route::get('hash-pass-menu', 'DashTelu\HashPasswordController@index');
Route::get('hash-pass-menu-batch', 'DashTelu\HashPasswordController@getBatch');
Route::post('hash-pass-menu', 'DashTelu\HashPasswordController@hashPass');
