<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Filter Laporan
Route::get('filter-pp','Apv\FilterController@getFilterPP');
Route::get('filter-kota','Apv\FilterController@getFilterKota');
Route::get('filter-nobukti','Apv\FilterController@getFilterNoBukti');
Route::get('filter-nodokumen','Apv\FilterController@getFilterNoDokumen');

//Pihak ketiga
//Laporan
Route::post('lap-posisi','Silo\LaporanController@getPosisi');
Route::post('lap-catt-app','Apv\LaporanController@getCattApp');
