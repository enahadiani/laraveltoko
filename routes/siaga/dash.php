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
Route::get('summary','Siaga\DashboardController@getSummary');
Route::get('dept','Siaga\DashboardController@getDept');
Route::get('periode','Siaga\DashboardController@getPeriode');
Route::get('dataof-modul','Siaga\DashboardController@getDataOfModul');
Route::get('data-other','Siaga\DashboardController@getDataOther');

//Financial Performance
Route::get('data-fp-default-filter', 'Siaga\DashboardFPController@getDefaultFilter');
Route::get('data-fp-box', 'Siaga\DashboardFPController@getDataBox');
Route::get('data-fp-margin', 'Siaga\DashboardFPController@getMargin');
Route::get('data-fp-per-bulan', 'Siaga\DashboardFPController@getFPBulan');
Route::get('data-fp-kontribusi-filter', 'Siaga\DashboardFPController@getFilterKontribusi');
Route::get('data-fp-kontribusi', 'Siaga\DashboardFPController@getKontribusi');
Route::get('data-fp-margin', 'Siaga\DashboardFPController@getMargin');

Route::get('data-fp-detail-box', 'Siaga\DashboardFPDetailController@getDataBox');
Route::get('data-fp-detail-kontribusi', 'Siaga\DashboardFPDetailController@getKontribusi');
Route::get('data-fp-detail-portofolio', 'Siaga\DashboardFPDetailController@getPortofolio');
Route::get('data-fp-detail-ytdvsyoy', 'Siaga\DashboardFPDetailController@getYTDvsYoY');
Route::get('data-fp-detail-rkavsreal', 'Siaga\DashboardFPDetailController@getRKAvsReal');


//Detail Financial Performance
Route::get('data-pend-box', 'Siaga\DashboardPendController@getDataBox');
Route::get('data-pend-kontribusi', 'Siaga\DashboardPendController@getKontribusi');
Route::get('data-pend-portofolio', 'Siaga\DashboardPendController@getPortofolio');
Route::get('data-pend-ytdvsyoy', 'Siaga\DashboardPendController@getYTDvsYoY');
Route::get('data-pend-rkavsreal', 'Siaga\DashboardPendController@getRKAvsReal');

