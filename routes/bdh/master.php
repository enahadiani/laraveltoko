<?php

use Illuminate\Support\Facades\Route;


// jenis dokumen
Route::get('/jenis-dok', 'Bdh\JenisDokumenController@index');
Route::get('/jenis-dok/{kode_jenis}', 'Bdh\JenisDokumenController@show');
Route::post('/jenis-dok', 'Bdh\JenisDokumenController@store');
Route::post('/jenis-dok-ubah', 'Bdh\JenisDokumenController@update');
Route::delete('/jenis-dok', 'Bdh\JenisDokumenController@destroy');
