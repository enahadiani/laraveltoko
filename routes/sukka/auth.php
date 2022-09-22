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
        return view('sukka.sesi');
    }else{
        return view('sukka.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('sukka.sesi');
});

Route::get('/cek_session', 'Sukka\AuthController@cek_session');
Route::get('/', 'Sukka\AuthController@index');
Route::get('/dash', 'Sukka\AuthController@index');
Route::get('/menu', 'Sukka\AuthController@getMenu');
Route::get('/login', 'Sukka\AuthController@login');
Route::post('/login', 'Sukka\AuthController@cek_auth');
Route::get('/logout', 'Sukka\AuthController@logout');
Route::get('/autologin', 'Sukka\AuthController@autoLogin');

Route::get('/profile', 'Sukka\AuthController@getProfile');
Route::post('/update-password', 'Sukka\AuthController@updatePassword');
Route::post('/update-foto', 'Sukka\AuthController@updatePhoto');
Route::post('/update-background', 'Sukka\AuthController@updateBackground');

Route::get('notif','Sukka\NotifController@getNotif');
Route::post('notif-update-status','Sukka\NotifController@updateStatusRead');
Route::post('search-form','Sukka\AuthController@searchForm');
Route::get('search-form-list','Sukka\AuthController@searchFormList');
Route::get('search-form-list2','Sukka\AuthController@searchFormList2');



