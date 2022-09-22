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
        return view('dash-tarbak.sesi');
    }else{
        return view('dash-tarbak.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('dash-tarbak.sesi');
});

Route::get('/cek_session', 'DashTarbak\AuthController@cek_session');
Route::get('/', 'DashTarbak\AuthController@index');
Route::get('/dash', 'DashTarbak\AuthController@index');
Route::get('/menu', 'DashTarbak\AuthController@getMenu');
Route::get('/login', 'DashTarbak\AuthController@login');
Route::post('/login', 'DashTarbak\AuthController@cek_auth');
Route::get('/logout', 'DashTarbak\AuthController@logout');

Route::get('/profile', 'DashTarbak\AuthController@getProfile');
Route::post('/update-password', 'DashTarbak\AuthController@updatePassword');
Route::post('/update-foto', 'DashTarbak\AuthController@updatePhoto');
Route::post('/update-background', 'DashTarbak\AuthController@updateBackground');

Route::get('notif','DashTarbak\NotifController@getNotif');
Route::post('notif-update-status','DashTarbak\NotifController@updateStatusRead');
Route::post('search-form','DashTarbak\AuthController@searchForm');
Route::get('search-form-list','DashTarbak\AuthController@searchFormList');
Route::get('search-form-list2','DashTarbak\AuthController@searchFormList2');



