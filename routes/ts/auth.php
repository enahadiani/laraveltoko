<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
        // return redirect('dash-telu/login');
        return view('ts.sesi');
    }else{
        return view('ts.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('ts.sesi');
});

Route::get('/cek_session', 'Ts\AuthController@cek_session');
Route::get('/', 'Ts\AuthController@index');
Route::get('/dash', 'Ts\AuthController@index');
Route::get('/menu', 'Ts\AuthController@getMenu');
Route::get('/login', 'Ts\AuthController@login');
Route::post('/login', 'Ts\AuthController@cek_auth');
Route::get('/logout', 'Ts\AuthController@logout');

Route::get('/profile', 'Ts\AuthController@getProfile');
Route::post('/update-password', 'Ts\AuthController@updatePassword');
Route::post('/update-foto', 'Ts\AuthController@updatePhoto');
Route::post('/update-background', 'Ts\AuthController@updateBackground');

Route::get('notif','Ts\NotifController@getNotif');
Route::post('notif-update-status','Ts\NotifController@updateStatusRead');
Route::post('search-form','Ts\AuthController@searchForm');
Route::get('search-form-list','Ts\AuthController@searchFormList');
Route::get('search-form-list2','Ts\AuthController@searchFormList2');

Route::post('/finish', 'Ts\DashSiswaController@notificationHandler');
Route::get('/finish', 'Ts\DashSiswaController@notificationHandler');
Route::post('/finish-trans', 'Ts\DashSiswaController@notificationHandler2');
Route::get('/finish-trans', 'Ts\DashSiswaController@notificationHandler2');
Route::get('/callback', 'Ts\BayarMandiriController@updateStatus');

Route::post('/sekolah', 'Ts\AuthController@getSekolah');



