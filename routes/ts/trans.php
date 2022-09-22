<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('notif-billing-periode', 'Ts\NotifBillingController@getPeriode');
Route::get('notif-billing-nobill', 'Ts\NotifBillingController@getNoBill');
Route::get('notif-billing', 'Ts\NotifBillingController@index');
Route::post('notif-billing', 'Ts\NotifBillingController@store');
Route::delete('notif-billing', 'Ts\NotifBillingController@destroy');

Route::get('notif-pembayaran-periode', 'Ts\NotifPembayaranController@getPeriode');
Route::get('notif-pembayaran-norekon', 'Ts\NotifPembayaranController@getNoRekon');
Route::get('notif-pembayaran', 'Ts\NotifPembayaranController@index');
Route::post('notif-pembayaran', 'Ts\NotifPembayaranController@store');
Route::delete('notif-pembayaran', 'Ts\NotifPembayaranController@destroy');

Route::get('notif-umum-siswa', 'Ts\NotifUmumController@getSiswa');
Route::get('notif-umum-kelas', 'Ts\NotifUmumController@getKelas');
Route::get('notif-umum-pp', 'Ts\NotifUmumController@getPP');
Route::get('notif-umum', 'Ts\NotifUmumController@index');
Route::get('notif-umum-detail', 'Ts\NotifUmumController@show');
Route::post('notif-umum', 'Ts\NotifUmumController@store');
Route::post('notif-umum-ubah', 'Ts\NotifUmumController@update');
Route::delete('notif-umum', 'Ts\NotifUmumController@destroy');
Route::delete('notif-umum-dok', 'Ts\NotifUmumController@deleteDokumen');

Route::get('sis-mandiri-bill', 'Ts\BayarMandiriController@index');
Route::get('fetch-mandiri-bill', 'Ts\BayarMandiriController@show');
Route::post('create-mandiri-bill', 'Ts\BayarMandiriController@store');
Route::put('cancel-mandiri-bill', 'Ts\BayarMandiriController@update');

Route::get('hash-pass-pp', 'Ts\HashPasswordController@index');
Route::get('hash-pass-pp-batch', 'Ts\HashPasswordController@getBatch');
Route::post('hash-pass-pp', 'Ts\HashPasswordController@hashPass');
Route::get('hash-pass-pp-lokasi', 'Ts\HashPasswordController@getLokasi');