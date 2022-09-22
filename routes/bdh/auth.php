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
    if (!Session::has('isLoggedIn')) {
        return redirect('dago-auth/login')->with('alert', 'Session telah habis !');
    } else {
        return view('bdh.' . $id);
    }
});

Route::get('/sesi-habis', function () {
    return view('bdh.sesi');
});

Route::get('/cek_session', 'Bdh\AuthController@cek_session');
Route::get('/', 'Bdh\AuthController@index');
Route::get('/dash', 'Bdh\AuthController@index');
Route::get('/menu', 'Bdh\AuthController@getMenu');
Route::get('/login', 'Bdh\AuthController@login');
Route::post('/login', 'Bdh\AuthController@cek_auth');
Route::get('/logout', 'Bdh\AuthController@logout');
Route::get('/profile', 'Bdh\AuthController@getProfile');
Route::post('/update_password', 'Bdh\AuthController@updatePassword');

Route::get('notif', 'Bdh\NotifController@getNotif');
Route::post('notif-update-status', 'Bdh\NotifController@updateStatusRead');

Route::get('/cek', function () {
    echo config('api.url');
});
