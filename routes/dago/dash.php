<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('data-box','Dago\DashboardController@getDataBox');
Route::get('top-agen','Dago\DashboardController@getTopAgen');
Route::get('reg-harian','Dago\DashboardController@getRegHarian');
Route::get('kuota-paket','Dago\DashboardController@getKuotaPaket');
Route::get('kartu','Dago\DashboardController@getKartu');
Route::get('dokumen','Dago\DashboardController@getDokumen');



