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
        return redirect('yakes-auth/login');
    }else{
        return view('yakes.'.$id);
    }
});

Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        // return redirect('dash-telu/login');
        return view('yakes.sesi');
    }else{
        return view('yakes.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('yakes.sesi');
});

Route::get('/tes', function () {
    return view('yakes.tes');
});

Route::get('/cek_session', 'Yakes\AuthController@cek_session');
Route::get('/', 'Yakes\AuthController@index');
Route::get('/dash', 'Yakes\AuthController@index');
Route::get('/menu', 'Yakes\AuthController@getMenu');
Route::get('/login', 'Yakes\AuthController@login');
Route::post('/login', 'Yakes\AuthController@cek_auth');
Route::get('/logout', 'Yakes\AuthController@logout');


Route::get('/profile', 'Yakes\AuthController@getProfile');
Route::post('/update-password', 'Yakes\AuthController@updatePassword');
Route::post('/update-foto', 'Yakes\AuthController@updatePhoto');
Route::post('/update-background', 'Yakes\AuthController@updateBackground');

Route::get('notif','Yakes\NotifController@getNotif');
Route::post('notif-update-status','Yakes\NotifController@updateStatusRead');
Route::post('search-form','Yakes\AuthController@searchForm');
Route::get('search-form-list','Yakes\AuthController@searchFormList');
Route::get('search-form-list2','Yakes\AuthController@searchFormList2');



