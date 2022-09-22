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

Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        return view('dash-ypt.sesi');
    }else{
        return view('dash-ypt.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('dash-ypt.sesi');
});

Route::get('/cek_session', 'DashYpt\AuthController@cek_session');
Route::get('/', 'DashYpt\AuthController@index');
Route::get('/dash', 'DashYpt\AuthController@index');
Route::get('/menu', 'DashYpt\AuthController@getMenu');
Route::get('/login', 'DashYpt\AuthController@login');
Route::post('/login', 'DashYpt\AuthController@cek_auth');
Route::get('/logout', 'DashYpt\AuthController@logout');

Route::get('/profile', 'DashYpt\AuthController@getProfile');
Route::post('/update-password', 'DashYpt\AuthController@updatePassword');
Route::post('/update-foto', 'DashYpt\AuthController@updatePhoto');
Route::post('/update-background', 'DashYpt\AuthController@updateBackground');

Route::get('notif','DashYpt\NotifController@getNotif');
Route::post('notif-update-status','DashYpt\NotifController@updateStatusRead');
Route::post('search-form','DashYpt\AuthController@searchForm');
Route::get('search-form-list','DashYpt\AuthController@searchFormList');
Route::get('search-form-list2','DashYpt\AuthController@searchFormList2');



