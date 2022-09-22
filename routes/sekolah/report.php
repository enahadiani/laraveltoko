<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('filter-pp','Sekolah\FilterController@getFilterPP');
Route::get('filter-ta','Sekolah\FilterController@getFilterTA');
Route::get('filter-kelas','Sekolah\FilterController@getFilterKelas');
Route::get('filter-matpel','Sekolah\FilterController@getFilterMatpel');
Route::get('filter-guru','Sekolah\FilterController@getFilterGuru');
Route::get('filter-semester','Sekolah\FilterController@getFilterSemester');


Route::post('lap-nilai','Sekolah\LaporanController@getNilai');
Route::post('lap-guru-kelas','Sekolah\LaporanController@getGuruKelas');
Route::post('lap-guru-matpel','Sekolah\LaporanController@getGuruMatpel');
Route::post('lap-siswa','Sekolah\LaporanController@getSiswa');
Route::post('lap-kd','Sekolah\LaporanController@getKD');

