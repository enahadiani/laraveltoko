<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper
Route::get('user-menu','Sai\HelperController@getMenu');

//Master Karyawan
Route::get('karyawan','Sai\KaryawanController@index');
Route::get('karyawan/{kode}','Sai\KaryawanController@show');
Route::post('karyawan','Sai\KaryawanController@store');
Route::post('karyawan-ubah/{kode}','Sai\KaryawanController@update');
Route::delete('karyawan/{kode}','Sai\KaryawanController@destroy');

//Master Customer
Route::get('customer','Sai\CustomerController@index');
Route::get('customer/{kode}','Sai\CustomerController@show');
Route::post('customer','Sai\CustomerController@store');
Route::post('customer-ubah/{kode}','Sai\CustomerController@update');
Route::delete('customer/{kode}','Sai\CustomerController@destroy');

//Master Proyek
Route::get('proyek','Sai\ProyekController@index');
Route::get('proyek/{kode}','Sai\ProyekController@show');
Route::post('proyek','Sai\ProyekController@store');
Route::put('proyek-ubah/{kode}','Sai\ProyekController@update');
Route::delete('proyek/{kode}','Sai\ProyekController@destroy'); 

//Master User
Route::get('user','Sai\UserController@index');
Route::get('user-detail/{kode}','Sai\UserController@show');
Route::post('user','Sai\UserController@store');
Route::put('user-ubah/{kode}','Sai\UserController@update');
Route::delete('user/{kode}','Sai\UserController@destroy');

//Master Kategori
Route::get('konten-ktg','Sai\KategoriKontenController@index');
Route::get('konten-ktg/{kode}','Sai\KategoriKontenController@show');
Route::post('konten-ktg','Sai\KategoriKontenController@store');
Route::put('konten-ktg/{kode}','Sai\KategoriKontenController@update');
Route::delete('konten-ktg/{kode}','Sai\KategoriKontenController@destroy');

//Master Galeri
Route::get('galeri','Sai\GaleriController@index');
Route::get('galeri/{kode}','Sai\GaleriController@show');
Route::post('galeri','Sai\GaleriController@store');
Route::post('galeri-ubah/{kode}','Sai\GaleriController@update');
Route::delete('galeri/{kode}','Sai\GaleriController@destroy');

//Master Lampiran
Route::get('lampiran','Sai\LampiranController@index');
Route::get('lampiran/{kode}','Sai\LampiranController@show');
Route::post('lampiran','Sai\LampiranController@store');
Route::put('lampiran-ubah/{kode}','Sai\LampiranController@update');
Route::delete('lampiran/{kode}','Sai\LampiranController@destroy');

//Master Modul
Route::get('modul','Sai\ModulController@index');
Route::get('modul/{kode}','Sai\ModulController@show');
Route::post('modul','Sai\ModulController@store');
Route::put('modul-ubah/{kode}','Sai\ModulController@update');
Route::delete('modul/{kode}','Sai\ModulController@destroy');