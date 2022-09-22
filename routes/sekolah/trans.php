<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('siswa', 'Sekolah\SiswaController@index');
Route::get('siswa-detail', 'Sekolah\SiswaController@show');
Route::post('siswa', 'Sekolah\SiswaController@store');
Route::put('siswa', 'Sekolah\SiswaController@update');
Route::delete('siswa', 'Sekolah\SiswaController@destroy');
Route::get('siswa-param', 'Sekolah\SiswaController@getParam');
Route::get('siswa-periode', 'Sekolah\SiswaController@getPeriodeParam');

Route::get('penilaian', 'Sekolah\PenilaianController@index');
Route::get('penilaian-detail', 'Sekolah\PenilaianController@show');
Route::post('penilaian', 'Sekolah\PenilaianController@store');
Route::put('penilaian', 'Sekolah\PenilaianController@update');
Route::delete('penilaian', 'Sekolah\PenilaianController@destroy');
Route::get('penilaian-ke', 'Sekolah\PenilaianController@getPenilaianKe');
Route::post('import-excel', 'Sekolah\PenilaianController@importExcel');
Route::get('nilai-tmp', 'Sekolah\PenilaianController@getNilaiTmp');
Route::get('penilaian-dok', 'Sekolah\PenilaianController@showDokUpload');
Route::post('penilaian-dok', 'Sekolah\PenilaianController@storeDokumen');
Route::delete('penilaian-dok', 'Sekolah\PenilaianController@deleteDokumen');
Route::get('penilaian-kd', 'Sekolah\PenilaianController@getKD');
Route::get('penilaian-dok-list', 'Sekolah\PenilaianController@listUpload');
Route::get('penilaian-kelas', 'Sekolah\PenilaianController@getKelas');
Route::get('penilaian-matpel', 'Sekolah\PenilaianController@getMatpel');
Route::get('penilaian-siswa', 'Sekolah\PenilaianController@getSiswa');

Route::get('pesan', 'Sekolah\PesanController@index');
Route::get('pesan-detail', 'Sekolah\PesanController@show');
Route::post('pesan', 'Sekolah\PesanController@store');
Route::post('pesan-ubah', 'Sekolah\PesanController@update');
Route::delete('pesan', 'Sekolah\PesanController@destroy');
Route::delete('pesan-dok', 'Sekolah\PesanController@deleteDokumen');

Route::get('penilaian-multiph', 'Sekolah\PenilaianMultiPHController@index');
Route::get('penilaian-multiph-detail', 'Sekolah\PenilaianMultiPHController@show');
Route::post('penilaian-multiph', 'Sekolah\PenilaianMultiPHController@store');
Route::put('penilaian-multiph', 'Sekolah\PenilaianMultiPHController@update');
Route::delete('penilaian-multiph', 'Sekolah\PenilaianMultiPHController@destroy');
Route::get('penilaian-multiph-ke', 'Sekolah\PenilaianMultiPHController@getPenilaianKe');
Route::post('import-multiph-excel', 'Sekolah\PenilaianMultiPHController@importExcel');
Route::get('nilai-multiph-tmp', 'Sekolah\PenilaianMultiPHController@getNilaiTmp');
Route::get('penilaian-multiph-dok', 'Sekolah\PenilaianMultiPHController@showDokUpload');
Route::post('penilaian-multiph-dok', 'Sekolah\PenilaianMultiPHController@storeDokumen');
Route::delete('penilaian-multiph-dok', 'Sekolah\PenilaianMultiPHController@deleteDokumen');
Route::get('penilaian-multiph-kd', 'Sekolah\PenilaianMultiPHController@getKD');
Route::get('penilaian-multiph-dok-list', 'Sekolah\PenilaianMultiPHController@listUpload');

// RAPORT UPLOAD

Route::get('raport-dok-list', 'Sekolah\UploadRaportController@index');
Route::get('raport-dok-siswa', 'Sekolah\UploadRaportController@loadSiswa');
Route::post('raport-dok-siswa', 'Sekolah\UploadRaportController@storeDokumen');
Route::post('raport-dok-siswa-edit', 'Sekolah\UploadRaportController@updateDokumen');
Route::get('raport-dok-siswa-edit', 'Sekolah\UploadRaportController@showDokUpload');
Route::delete('raport-dok-siswa', 'Sekolah\UploadRaportController@destroy');
Route::delete('raport-dok-siswa-nis', 'Sekolah\UploadRaportController@deleteDokumen');