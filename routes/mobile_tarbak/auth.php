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
        return view('mobile-tarbak.sesi');
    }else{
        return view('mobile-tarbak.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('mobile-tarbak.sesi');
});

Route::get('/cek_session', 'Sekolah\AuthMobileController@cek_session');
Route::get('/', 'Sekolah\AuthMobileController@index');
Route::get('/dash', 'Sekolah\AuthMobileController@index');
Route::get('/menu', 'Sekolah\AuthMobileController@getMenu');
Route::get('/login', 'Sekolah\AuthMobileController@login');
Route::post('/login', 'Sekolah\AuthMobileController@cek_auth');
Route::get('/logout', 'Sekolah\AuthMobileController@logout');

Route::get('/profile', 'Sekolah\AuthMobileController@getProfile');
Route::post('/update-password', 'Sekolah\AuthMobileController@updatePassword');
Route::post('/update-foto', 'Sekolah\AuthMobileController@updatePhoto');
Route::post('/update-background', 'Sekolah\AuthMobileController@updateBackground');

Route::get('notif','Sekolah\NotifController@getNotif');
Route::post('notif-update-status','Sekolah\NotifController@updateStatusRead');
Route::post('search-form','Sekolah\AuthMobileController@searchForm');
Route::get('search-form-list','Sekolah\AuthMobileController@searchFormList');
Route::get('search-form-list2','Sekolah\AuthMobileController@searchFormList2');

Route::get('matpel', 'Sekolah\AuthMobileController@getMatpel');
Route::get('matpel-detail', 'Sekolah\AuthMobileController@getMatpelDetail');
Route::get('profile-siswa', 'Sekolah\AuthMobileController@getProfileSiswa');
Route::post('update-profile-siswa', 'Sekolah\AuthMobileController@updateProfileSiswa');
Route::get('mob-info', 'Sekolah\AuthMobileController@getInfo');
Route::get('mob-notif', 'Sekolah\AuthMobileController@getNotif');
Route::get('mob-info-detail', 'Sekolah\AuthMobileController@getDetailInfo');
Route::get('jum-status-read', 'Sekolah\AuthMobileController@getJumlahNotRead');
Route::post('update-status-read', 'Sekolah\AuthMobileController@updateStatusReadMobile');



