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
        // return redirect('dash-telu/login');
        return view('sdm2.sesi');
    } else {
        $tmp = explode("_", $id);
        if (isset($tmp[1])) {
            return view('sdm2.' . $tmp[0] . '.' . $tmp[1]);
        } else {
            return view('sdm2.' . $id);
        }
    }
});

Route::get('/sesi-habis', function () {
    return view('sdm2.sesi');
});

Route::get('/tes', function () {
    return view('sdm2.tes');
});

Route::get('/cropper', function () {
    return view('sdm2.cropper');
});

Route::get('/croppie', function () {
    return view('sdm2.croppie');
});

Route::get('/cek_session', 'Sdm2\AuthController@cek_session');
Route::get('/', 'Sdm2\AuthController@index');
Route::get('/dash', 'Sdm2\AuthController@index');
Route::get('/menu', 'Sdm2\AuthController@getMenu');
Route::get('/login', 'Sdm2\AuthController@login');
Route::get('/register', 'Sdm2\AuthController@register');
Route::post('/login', 'Sdm2\AuthController@cek_auth');
Route::get('/logout', 'Sdm2\AuthController@logout');


Route::get('/profile', 'Sdm2\AuthController@getProfile');
Route::post('/update-password', 'Sdm2\AuthController@updatePassword');
Route::post('/update-foto', 'Sdm2\AuthController@updatePhoto');
Route::post('/update-background', 'Sdm2\AuthController@updateBackground');

Route::get('notif', 'Sdm2\Setting\NotifController@getNotif');
Route::post('notif-update-status', 'Sdm2\Setting\NotifController@updateStatusRead');
Route::post('search-form', 'Sdm2\AuthController@searchForm');
Route::get('search-form-list', 'Sdm2\AuthController@searchFormList');
Route::get('search-form-list2', 'Sdm2\AuthController@searchFormList2');


Route::get('/bottom-sheet', function () {
    return view('sdm2.modal');
});


Route::get('/bottom-sheet2', function () {
    return view('sdm2.modal2');
});


Route::post('report-error', 'Sdm2\AuthController@reportError');
