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
        return view('siaga.sesi');
    }else{
        $tmp = explode("_",$id);
        if(isset($tmp[1])){
            return view('siaga.'.$tmp[0].'.'.$tmp[1]);
        }else{
            return view('siaga.'.$id);
        }
    }
});

Route::get('/sesi-habis', function () {
    return view('siaga.sesi');
});

Route::get('/cek_session', 'Siaga\AuthController@cek_session');
Route::get('/', 'Siaga\AuthController@index');
Route::get('/dash', 'Siaga\AuthController@index');
Route::get('/menu', 'Siaga\AuthController@getMenu');
Route::get('/login', 'Siaga\AuthController@login');
Route::post('/login', 'Siaga\AuthController@cek_auth');
Route::get('/logout', 'Siaga\AuthController@logout');
Route::get('/autologin', 'Siaga\AuthController@autoLogin');

Route::get('/profile', 'Siaga\AuthController@getProfile');
Route::post('/update-password', 'Siaga\AuthController@updatePassword');
Route::post('/update-foto', 'Siaga\AuthController@updatePhoto');
Route::post('/update-background', 'Siaga\AuthController@updateBackground');

Route::get('notif','Siaga\NotifController@getNotif');
Route::post('notif-update-status','Siaga\NotifController@updateStatusRead');
Route::post('search-form','Siaga\AuthController@searchForm');
Route::get('search-form-list','Siaga\AuthController@searchFormList');
Route::get('search-form-list2','Siaga\AuthController@searchFormList2');



