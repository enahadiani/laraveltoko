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
        return redirect('sai-auth/login')->with('alert','Session telah habis !');
    }else{
        return view('sai.'.$id);
    }
});

Route::get('/cek_session', 'Sai\AuthController@cek_session');
Route::get('/', 'Sai\AuthController@index');
Route::get('/dash', 'Sai\AuthController@index');
Route::get('/menu', 'Sai\AuthController@getMenu');
Route::get('/login', 'Sai\AuthController@login');
Route::post('/login', 'Sai\AuthController@cek_auth');
Route::get('/logout', 'Sai\AuthController@logout');



