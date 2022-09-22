<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can resimater web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        // return redirect('dash-telu/login');
        return view('sima.sesi');
    }else{
        $tmp = explode("_",$id);
        if(isset($tmp[1])){
            return view('sima.'.$tmp[0].'.'.$tmp[1]);
        }else{
            return view('sima.'.$id);
        }
    }
});

Route::get('/sesi-habis', function () {
    return view('sima.sesi');
});

Route::get('/cek_session', 'Sima\AuthController@cek_session');
Route::get('/', 'Sima\AuthController@index');
Route::get('/dash', 'Sima\AuthController@index');
Route::get('/menu', 'Sima\AuthController@getMenu');
Route::get('/login', 'Sima\AuthController@login');
Route::get('/resimater', 'Sima\AuthController@resimater');
Route::post('/login', 'Sima\AuthController@cek_auth');
Route::get('/logout', 'Sima\AuthController@logout');


Route::get('/profile', 'Sima\AuthController@getProfile');
Route::post('/update-password', 'Sima\AuthController@updatePassword');
Route::post('/update-foto', 'Sima\AuthController@updatePhoto');
Route::post('/update-background', 'Sima\AuthController@updateBackground');

Route::get('notif','Sima\Setting\NotifController@getNotif');
Route::post('notif-update-status','Sima\Setting\NotifController@updateStatusRead');
Route::post('search-form','Sima\AuthController@searchForm');
Route::get('search-form-list','Sima\AuthController@searchFormList');
Route::get('search-form-list2','Sima\AuthController@searchFormList2');
