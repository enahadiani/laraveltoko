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
Route::get('filter-kelas','Sekolah\FilterController@getFilterKelasDash');
Route::get('filter-matpel','Sekolah\FilterController@getFilterMatpelDash');

Route::get('pesan-history', 'Sekolah\PesanController@historyPesan');
Route::get('rata2-nilai-dashboard', 'Sekolah\DashboardController@rata2Nilai');
Route::get('dibawah-nilai-kkm', 'Sekolah\DashboardController@dibawahKKM');
Route::get('data-box', 'Sekolah\PesanController@getDataBox');
Route::get('filter-tahunajar', 'Sekolah\FilterController@getFilterTahunAjaran');

Route::get('kartu-piutang', 'Sekolah\DashSiswaController@getKartuPiutang');
Route::get('kartu-pdd', 'Sekolah\DashSiswaController@getKartuPDD');
Route::get('dash-siswa-profile', 'Sekolah\DashSiswaController@getProfile');

Route::get('progress-nilai', 'Sekolah\DashboardController@getProgressNilai');
Route::get('komposisi-siswa', 'Sekolah\DashboardController@getKomposisiSiswa');
Route::get('chart-nilai', 'Sekolah\DashboardController@getChartNilai');
Route::get('tingkat', 'Sekolah\DashboardController@getTingkat');