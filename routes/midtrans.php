<?php

use Illuminate\Support\Facades\Route;

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
        return redirect('saku/login')->with('alert','Session telah habis !');
    }else{
        return view('saku.'.$id);
    }
});


Route::get('/cek_session', 'Midtrans\AuthController@cek_session');
Route::get('/menu', 'Saku\AuthController@getMenu');
Route::get('/login', 'Midtrans\AuthController@login');
Route::post('/login', 'Midtrans\AuthController@cek_auth');
Route::get('/logout', 'Midtrans\AuthController@logout');

Route::get('/', 'Midtrans\AuthController@index')->name('midtrans');
Route::get('/finish', function(){
    return response()->json(["message" => 'finish'], 200);
})->name('donation.finish');

Route::get('/unfinish', function(){
    return response()->json(["message" => 'unfinish'], 200);
})->name('donation.unfinish');

Route::get('/error', function(){
    return response()->json(["message" => 'error'], 200);
})->name('donation.error');

Route::post('/finish', function(){
    return response()->json(["message" => 'finish'], 200);
})->name('donation.finish');

Route::post('/unfinish', function(){
    return response()->json(["message" => 'unfinish'], 200);
})->name('donation.unfinish');

Route::post('/error', function(){
    return response()->json(["message" => 'error'], 200);
})->name('donation.error');
 
Route::post('/donation/store', 'Midtrans\Donasi2Controller@store')->name('donation.store');
Route::get('/donation', 'Midtrans\Donasi2Controller@index');
Route::post('/callback', 'Midtrans\Donasi2Controller@notificationHandler')->name('notification.handler');
 