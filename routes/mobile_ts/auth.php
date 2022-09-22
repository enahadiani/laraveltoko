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
        // return redirect('dash-telu/login');
        return view('mobile-ts.sesi');
    }else{
        return view('mobile-ts.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('mobile-ts.sesi');
});

Route::get('/cek_session', 'Ts\AuthMobileController@cek_session');
Route::get('/', 'Ts\AuthMobileController@index');
Route::get('/dash', 'Ts\AuthMobileController@index');
Route::get('/menu', 'Ts\AuthMobileController@getMenu');
Route::get('/login', 'Ts\AuthMobileController@login');
Route::post('/login', 'Ts\AuthMobileController@cek_auth');
Route::get('/logout', 'Ts\AuthMobileController@logout');

Route::get('/profile', 'Ts\AuthMobileController@getProfile');
Route::post('/update-password', 'Ts\AuthMobileController@updatePassword');
Route::post('/update-foto', 'Ts\AuthMobileController@updatePhoto');
Route::post('/update-background', 'Ts\AuthMobileController@updateBackground');

Route::get('notif','Ts\NotifController@getNotif');
Route::post('notif-update-status','Ts\NotifController@updateStatusRead');
Route::post('search-form','Ts\AuthMobileController@searchForm');
Route::get('search-form-list','Ts\AuthMobileController@searchFormList');
Route::get('search-form-list2','Ts\AuthMobileController@searchFormList2');


Route::get('dash-siswa-profile', 'Ts\DashSiswaController@getProfile');
Route::get('riwayat-trans', 'Ts\DashSiswaController@getRiwayatTrans');



