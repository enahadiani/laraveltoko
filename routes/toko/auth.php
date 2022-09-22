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
        return redirect('toko-auth/login')->with('alert','Session telah habis !');
    }else{
        return view('toko.'.$id);
    }
});

Route::get('/cek_session', 'Toko\AuthController@cek_session');
Route::get('/', 'Toko\AuthController@index');
Route::get('/dash', 'Toko\AuthController@index');
Route::get('/menu', 'Toko\AuthController@getMenu');
Route::get('/login', 'Toko\AuthController@login');
Route::post('/login', 'Toko\AuthController@cek_auth');
Route::get('/logout', 'Toko\AuthController@logout');



