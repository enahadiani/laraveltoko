<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        // return redirect('dash-telu/login');
        return view('silo.sesi');
    }else{
        return view('silo.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('silo.sesi');
});

Route::get('/cek_session', 'Silo\AuthController@cek_session');
Route::get('/', 'Silo\AuthController@index');
Route::get('/dash', 'Silo\AuthController@index');
Route::get('/menu', 'Silo\AuthController@getMenu');
Route::get('/login', 'Silo\AuthController@login');
Route::post('/login', 'Silo\AuthController@cek_auth');
Route::get('/logout', 'Silo\AuthController@logout');

Route::get('/profile', 'Silo\AuthController@getProfile');
Route::post('/update-password', 'Silo\AuthController@updatePassword');
Route::post('/update-foto', 'Silo\AuthController@updatePhoto');
Route::post('/update-background', 'Silo\AuthController@updateBackground');

Route::get('notif','Silo\NotifController@getNotif');
Route::post('notif-update-status','Silo\NotifController@updateStatusRead');
Route::post('search-form','Silo\AuthController@searchForm');
Route::get('search-form-list','Silo\AuthController@searchFormList');
Route::get('search-form-list2','Silo\AuthController@searchFormList2');

$router->get('storage/{filename}', function ($filename) {
    if (!Storage::disk('public')->exists('temp/'.$filename)) {
        abort(404);
    }
    return Storage::disk('public')->response('temp/'.$filename); 
});