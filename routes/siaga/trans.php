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

Route::get('app','Siaga\ApprovalController@index');
Route::get('app-aju','Siaga\ApprovalController@getPengajuan');
Route::get('app-detail','Siaga\ApprovalController@show');
Route::post('app','Siaga\ApprovalController@store');
Route::get('app-status','Siaga\ApprovalController@getStatus');
Route::get('app-preview','Siaga\ApprovalController@getPreview');
Route::get('aju-preview','Siaga\ApprovalController@getPreviewAju');

Route::get('app-spb','Siaga\ApprovalSpbController@index');
Route::get('app-spb-aju','Siaga\ApprovalSpbController@getPengajuan');
Route::get('app-spb-detail','Siaga\ApprovalSpbController@show');
Route::post('app-spb','Siaga\ApprovalSpbController@store');
Route::get('app-spb-status','Siaga\ApprovalSpbController@getStatus');
Route::get('app-spb-preview','Siaga\ApprovalSpbController@getPreview');
Route::get('aju-spb-preview','Siaga\ApprovalSpbController@getPreviewAju');

Route::post('send-email','Siaga\ApprovalController@sendEmail');