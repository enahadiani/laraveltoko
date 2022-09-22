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
Route::get('top-selling/{periode}', 'Toko\DashboardController@getTopSelling');
Route::get('ctg-selling/{periode}', 'Toko\DashboardController@getSellingCtg');
Route::get('data-box/{periode}', 'Toko\DashboardController@getDataBox');
Route::get('top-vendor/{periode}', 'Toko\DashboardController@getTopVendor');
