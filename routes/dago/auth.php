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
        return redirect('dago-auth/login')->with('alert','Session telah habis !');
    }else{
        return view('dago.'.$id);
    }
});

Route::get('/cek_session', 'Dago\AuthController@cek_session');
Route::get('/', 'Dago\AuthController@index');
Route::get('/dash', 'Dago\AuthController@index');
Route::get('/menu', 'Dago\AuthController@getMenu');
Route::get('/login', 'Dago\AuthController@login');
Route::post('/login', 'Dago\AuthController@cek_auth');
Route::get('/logout', 'Dago\AuthController@logout');
Route::get('/profile', 'Dago\AuthController@getProfile');
Route::post('/update_password', 'Dago\AuthController@updatePassword');

Route::get('notif','Dago\NotifController@getNotif');
Route::post('notif-update-status','Dago\NotifController@updateStatusRead');

Route::get('/cek', function () {
   echo config('api.url');
});



