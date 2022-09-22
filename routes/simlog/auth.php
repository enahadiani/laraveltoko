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
        return view('simlog.sesi');
    }else{
        return view('simlog.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('simlog.sesi');
});

Route::get('/cek_session', 'Simlog\AuthController@cek_session');
Route::get('/', 'Simlog\AuthController@index');
Route::get('/dash', 'Simlog\AuthController@index');
Route::get('/menu', 'Simlog\AuthController@getMenu');
Route::get('/login', 'Simlog\AuthController@login');
Route::get('/register', 'Simlog\AuthController@register');
Route::post('/login', 'Simlog\AuthController@cek_auth');
Route::get('/logout', 'Simlog\AuthController@logout');


Route::get('/profile', 'Simlog\AuthController@getProfile');
Route::post('/update-password', 'Simlog\AuthController@updatePassword');
Route::post('/update-foto', 'Simlog\AuthController@updatePhoto');
Route::post('/update-background', 'Simlog\AuthController@updateBackground');

Route::get('notif','Simlog\NotifController@getNotif');
Route::post('notif-update-status','Simlog\NotifController@updateStatusRead');
Route::post('search-form','Simlog\AuthController@searchForm');
Route::get('search-form-list','Simlog\AuthController@searchFormList');
Route::get('search-form-list2','Simlog\AuthController@searchFormList2');
