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
        return view('bangtel.sesi');
    }else{
        return view('bangtel.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('bangtel.sesi');
});

Route::get('/cek_session', 'Bangtel\AuthController@cek_session');
Route::get('/', 'Bangtel\AuthController@index');
Route::get('/dash', 'Bangtel\AuthController@index');
Route::get('/menu', 'Bangtel\AuthController@getMenu');
Route::get('/login', 'Bangtel\AuthController@login');
Route::get('/register', 'Bangtel\AuthController@register');
Route::post('/login', 'Bangtel\AuthController@cek_auth');
Route::get('/logout', 'Bangtel\AuthController@logout');


Route::get('/profile', 'Bangtel\AuthController@getProfile');
Route::post('/update-password', 'Bangtel\AuthController@updatePassword');
Route::post('/update-foto', 'Bangtel\AuthController@updatePhoto');
Route::post('/update-background', 'Bangtel\AuthController@updateBackground');

Route::get('notif','Bangtel\NotifController@getNotif');
Route::post('notif-update-status','Bangtel\NotifController@updateStatusRead');
Route::post('search-form','Bangtel\AuthController@searchForm');
Route::get('search-form-list','Bangtel\AuthController@searchFormList');
Route::get('search-form-list2','Bangtel\AuthController@searchFormList2');
