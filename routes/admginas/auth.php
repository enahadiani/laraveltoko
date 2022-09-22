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
        return view('admginas.sesi');
    }else{
        return view('admginas.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('admginas.sesi');
});

Route::get('/cek_session', 'AdmGinas\AuthController@cek_session');
Route::get('/', 'AdmGinas\AuthController@index');
Route::get('/dash', 'AdmGinas\AuthController@index');
Route::get('/menu', 'AdmGinas\AuthController@getMenu');
Route::get('/login', 'AdmGinas\AuthController@login');
Route::post('/login', 'AdmGinas\AuthController@cek_auth');
Route::get('/logout', 'AdmGinas\AuthController@logout');


Route::get('/profile', 'AdmGinas\AuthController@getProfile');
Route::post('/update-password', 'AdmGinas\AuthController@updatePassword');
Route::post('/update-foto', 'AdmGinas\AuthController@updatePhoto');
Route::post('/update-background', 'AdmGinas\AuthController@updateBackground');

Route::get('notif','AdmGinas\NotifController@getNotif');
Route::post('notif-update-status','AdmGinas\NotifController@updateStatusRead');
Route::post('search-form','AdmGinas\AuthController@searchForm');
Route::get('search-form-list','AdmGinas\AuthController@searchFormList');
Route::get('search-form-list2','AdmGinas\AuthController@searchFormList2');



