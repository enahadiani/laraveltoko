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
        return view('dash-telu.sesi');
    }else{
        return view('dash-telu.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('dash-telu.sesi');
});

Route::get('/tes', function () {
    return view('dash-telu.tes');
});

Route::get('/cropper', function () {
    return view('dash-telu.cropper');
});

Route::get('/croppie', function () {
    return view('dash-telu.croppie');
});

Route::get('/cek_session', 'DashTelu\AuthController@cek_session');
Route::get('/', 'DashTelu\AuthController@index');
Route::get('/dash', 'DashTelu\AuthController@index');
Route::get('/menu', 'DashTelu\AuthController@getMenu');
Route::get('/login', 'DashTelu\AuthController@login');
Route::post('/login', 'DashTelu\AuthController@cek_auth');
Route::get('/logout', 'DashTelu\AuthController@logout');


Route::get('/profile', 'DashTelu\AuthController@getProfile');
Route::post('/update-password', 'DashTelu\AuthController@updatePassword');
Route::post('/update-foto', 'DashTelu\AuthController@updatePhoto');
Route::post('/update-background', 'DashTelu\AuthController@updateBackground');

Route::get('notif','DashTelu\NotifController@getNotif');
Route::post('notif-update-status','DashTelu\NotifController@updateStatusRead');
Route::post('search-form','DashTelu\AuthController@searchForm');
Route::get('search-form-list','DashTelu\AuthController@searchFormList');
Route::get('search-form-list2','DashTelu\AuthController@searchFormList2');



