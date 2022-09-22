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
        return view('sekolah.sesi');
    }else{
        return view('sekolah.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('sekolah.sesi');
});

Route::get('/cek_session', 'Sekolah\AuthController@cek_session');
Route::get('/', 'Sekolah\AuthController@index');
Route::get('/dash', 'Sekolah\AuthController@index');
Route::get('/menu', 'Sekolah\AuthController@getMenu');
Route::get('/login', 'Sekolah\AuthController@login');
Route::post('/login', 'Sekolah\AuthController@cek_auth');
Route::get('/logout', 'Sekolah\AuthController@logout');

Route::get('/profile', 'Sekolah\AuthController@getProfile');
Route::post('/update-password', 'Sekolah\AuthController@updatePassword');
Route::post('/update-foto', 'Sekolah\AuthController@updatePhoto');
Route::post('/update-background', 'Sekolah\AuthController@updateBackground');

Route::get('notif','Sekolah\NotifController@getNotif');
Route::post('notif-update-status','Sekolah\NotifController@updateStatusRead');
Route::post('search-form','Sekolah\AuthController@searchForm');
Route::get('search-form-list','Sekolah\AuthController@searchFormList');
Route::get('search-form-list2','Sekolah\AuthController@searchFormList2');



