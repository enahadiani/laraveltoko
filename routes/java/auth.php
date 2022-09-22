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
        return view('java.sesi');
    }else{
        return view('java.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('java.sesi');
});

Route::get('/tes', function () {
    return view('java.tes');
});

Route::get('/cropper', function () {
    return view('java.cropper');
});

Route::get('/croppie', function () {
    return view('java.croppie');
});

Route::get('/cek_session', 'Java\AuthController@cek_session');
Route::get('/', 'Java\AuthController@index');
Route::get('/dash', 'Java\AuthController@index');
Route::get('/menu', 'Java\AuthController@getMenu');
Route::get('/login', 'Java\AuthController@login');
Route::get('/register', 'Java\AuthController@register');
Route::post('/login', 'Java\AuthController@cek_auth');
Route::get('/logout', 'Java\AuthController@logout');


Route::get('/profile', 'Java\AuthController@getProfile');
Route::post('/update-password', 'Java\AuthController@updatePassword');
Route::post('/update-foto', 'Java\AuthController@updatePhoto');
Route::post('/update-background', 'Java\AuthController@updateBackground');

Route::get('notif','Java\NotifController@getNotif');
Route::post('notif-update-status','Java\NotifController@updateStatusRead');
Route::post('search-form','Java\AuthController@searchForm');
Route::get('search-form-list','Java\AuthController@searchFormList');
Route::get('search-form-list2','Java\AuthController@searchFormList2');


Route::get('/bottom-sheet', function () {
    return view('java.modal');
});


Route::get('/bottom-sheet2', function () {
    return view('java.modal2');
});
