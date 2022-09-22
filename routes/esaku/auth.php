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
        return view('esaku.sesi');
    }else{
        $tmp = explode("_",$id);
        if(isset($tmp[1])){
            return view('esaku.'.$tmp[0].'.'.$tmp[1]);
        }else{
            return view('esaku.'.$id);
        }
    }
});

Route::get('/sesi-habis', function () {
    return view('esaku.sesi');
});

Route::get('/tes', function () {
    return view('esaku.tes');
});

Route::get('/cropper', function () {
    return view('esaku.cropper');
});

Route::get('/croppie', function () {
    return view('esaku.croppie');
});

Route::get('/cek_session', 'Esaku\AuthController@cek_session');
Route::get('/', 'Esaku\AuthController@index');
Route::get('/dash', 'Esaku\AuthController@index');
Route::get('/menu', 'Esaku\AuthController@getMenu');
Route::get('/login', 'Esaku\AuthController@login');
Route::get('/register', 'Esaku\AuthController@register');
Route::post('/login', 'Esaku\AuthController@cek_auth');
Route::get('/logout', 'Esaku\AuthController@logout');


Route::get('/profile', 'Esaku\AuthController@getProfile');
Route::post('/update-password', 'Esaku\AuthController@updatePassword');
Route::post('/update-foto', 'Esaku\AuthController@updatePhoto');
Route::post('/update-background', 'Esaku\AuthController@updateBackground');

Route::get('notif','Esaku\Setting\NotifController@getNotif');
Route::post('notif-update-status','Esaku\Setting\NotifController@updateStatusRead');
Route::post('search-form','Esaku\AuthController@searchForm');
Route::get('search-form-list','Esaku\AuthController@searchFormList');
Route::get('search-form-list2','Esaku\AuthController@searchFormList2');


Route::get('/bottom-sheet', function () {
    return view('esaku.modal');
});


Route::get('/bottom-sheet2', function () {
    return view('esaku.modal2');
});


Route::post('report-error','Esaku\AuthController@reportError');
