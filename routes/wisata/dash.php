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
Route::get('data-kunjungan', 'Wisata\DashboardController@dataKunjungan');
Route::get('data-bidang', 'Wisata\DashboardController@dataBidang');
Route::get('data-mitra', 'Wisata\DashboardController@dataMitra');
Route::get('top-daerah', 'Wisata\DashboardController@dataTopDaerah');
Route::get('top-mitra', 'Wisata\DashboardController@dataTopMitra');
Route::get('kunjungan-tahunan', 'Wisata\DashboardController@dataKunjunganTahunan');
Route::get('kunjungan-bulanan', 'Wisata\DashboardController@dataKunjunganBulanan');
