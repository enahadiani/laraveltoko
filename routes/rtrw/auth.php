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
        return redirect('rtrw-auth/login')->with('alert','Session telah habis !');
    }else{
        return view('rtrw-baru.'.$id);
    }
});

Route::get('/cek_session', 'Rtrw\AuthController@cek_session');
Route::get('/', 'Rtrw\AuthController@index');
Route::get('/dash', 'Rtrw\AuthController@index');
Route::get('/menu', 'Rtrw\AuthController@getMenu');
Route::get('/login', 'Rtrw\AuthController@login');
Route::post('/login', 'Rtrw\AuthController@cek_auth');
Route::get('/logout', 'Rtrw\AuthController@logout');



