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
        return view('admjava.sesi');
    }else{
        return view('admjava.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('admjava.sesi');
});

Route::get('/tes', function () {
    return view('admjava.tes');
});

Route::get('/cropper', function () {
    return view('admjava.cropper');
});

Route::get('/croppie', function () {
    return view('admjava.croppie');
});

Route::get('/cek_session', 'AdmJava\AuthController@cek_session');
Route::get('/', 'AdmJava\AuthController@index');
Route::get('/dash', 'AdmJava\AuthController@index');
Route::get('/menu', 'AdmJava\AuthController@getMenu');
Route::get('/login', 'AdmJava\AuthController@login');
Route::get('/register', 'AdmJava\AuthController@register');
Route::post('/login', 'AdmJava\AuthController@cek_auth');
Route::get('/logout', 'AdmJava\AuthController@logout');


Route::get('/profile', 'AdmJava\AuthController@getProfile');
Route::post('/update-password', 'AdmJava\AuthController@updatePassword');
Route::post('/update-foto', 'AdmJava\AuthController@updatePhoto');
Route::post('/update-background', 'AdmJava\AuthController@updateBackground');

Route::get('notif','AdmJava\NotifController@getNotif');
Route::post('notif-update-status','AdmJava\NotifController@updateStatusRead');
Route::post('search-form','AdmJava\AuthController@searchForm');
Route::get('search-form-list','AdmJava\AuthController@searchFormList');
Route::get('search-form-list2','AdmJava\AuthController@searchFormList2');


Route::get('/bottom-sheet', function () {
    return view('admjava.modal');
});


Route::get('/bottom-sheet2', function () {
    return view('admjava.modal2');
});
