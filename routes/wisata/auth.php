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
        return redirect('wisata-auth/login');
    }else{
        return view('wisata.'.$id);
    }
});

Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        // return redirect('dash-telu/login');
        return view('wisata.sesi');
    }else{
        return view('wisata.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('wisata.sesi');
});

Route::get('/cek_session', 'Wisata\AuthController@cek_session');
Route::get('/', 'Wisata\AuthController@index');
Route::get('/dash', 'Wisata\AuthController@index');
Route::get('/menu', 'Wisata\AuthController@getMenu');
Route::get('/login', 'Wisata\AuthController@login');
Route::post('/login', 'Wisata\AuthController@cek_auth');
Route::get('/logout', 'Wisata\AuthController@logout');


Route::get('/profile', 'Wisata\AuthController@getProfile');
Route::post('/update-password', 'Wisata\AuthController@updatePassword');
Route::post('/update-foto', 'Wisata\AuthController@updatePhoto');
Route::post('/update-background', 'Wisata\AuthController@updateBackground');

Route::get('notif','Wisata\NotifController@getNotif');
Route::post('notif-update-status','Wisata\NotifController@updateStatusRead');
Route::post('search-form','Wisata\AuthController@searchForm');
Route::get('search-form-list','Wisata\AuthController@searchFormList');
Route::get('search-form-list2','Wisata\AuthController@searchFormList2');



