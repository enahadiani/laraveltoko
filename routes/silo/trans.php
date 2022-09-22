<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;



Route::get('juskeb','Apv\JuskebController@index');
Route::get('juskeb-finish','Apv\JuskebController@getJuskebFinish');
Route::get('juskeb/{no_bukti}','Apv\JuskebController@show');
Route::get('kota','Apv\JuskebController@getKota');
Route::get('divisi','Apv\JuskebController@getDivisi');
Route::get('nik_verifikasi','Apv\JuskebController@getNIKVerifikasi');
Route::get('nik_verifikasi2','Apv\JuskebController@getNIKVerifikasi2');
Route::get('barang-klp','Apv\JuskebController@getBarangKlp');
Route::get('generate-dok','Silo\JuskebController@generateDok');
Route::post('juskeb','Silo\JuskebController@store');
Route::post('juskeb/{no_bukti}','Silo\JuskebController@update');
Route::delete('juskeb/{no_bukti}','Apv\JuskebController@destroy');
Route::get('juskeb_history/{no_bukti}','Apv\JuskebController@getHistory');
Route::get('juskeb_preview/{no_bukti}','Apv\JuskebController@getPreview');
Route::get('juskeb_preview2/{no_bukti}','Apv\JuskebController@getPreview2');

Route::get('verifikasi','Apv\VerifikasiController@index');
Route::get('verifikasi/{no_bukti}','Apv\VerifikasiController@show');
Route::post('verifikasi','Silo\VerifikasiController@store');
Route::get('verifikasi_status','Apv\VerifikasiController@getStatus');
Route::get('verifikasi_history','Apv\VerifikasiController@getHistory');
Route::get('verifikasi_preview/{no_bukti}','Apv\VerifikasiController@getPreview');

Route::get('juskeb_app','Apv\JuskebApprovalController@index');
Route::get('juskeb_aju','Apv\JuskebApprovalController@getPengajuan');
Route::get('juskeb_app/{no_bukti}','Apv\JuskebApprovalController@show');
Route::post('juskeb_app','Silo\JuskebApprovalController@store');
Route::get('juskeb_app_status','Apv\JuskebApprovalController@getStatus');
Route::get('juskeb_app_preview/{no_bukti}/{id}','Apv\JuskebApprovalController@getPreview');

//Justifikasi Pengadaan
Route::get('juspo','Apv\JuspoController@index');
Route::get('juspo_aju','Apv\JuspoController@getPengajuan');
Route::get('juspo/{no_bukti}','Apv\JuspoController@show');
Route::get('juspo_aju/{no_bukti}','Apv\JuspoController@getDetailJuskeb');
Route::post('juspo','Silo\JuspoController@store');
Route::post('juspo/{no_bukti}','Silo\JuspoController@update');
Route::delete('juspo/{no_bukti}','Apv\JuspoController@destroy');
Route::get('juspo_history/{no_bukti}','Apv\JuspoController@getHistory');
Route::get('juspo_preview/{no_bukti}/{no_juskeb}','Apv\JuspoController@getPreview');
Route::get('generate-dok-juspo','Silo\JuspoController@generateDok');

Route::get('juspo_app','Apv\JuspoApprovalController@index');
Route::get('juspo_app_aju','Apv\JuspoApprovalController@getPengajuan');
Route::get('juspo_app/{no_bukti}','Apv\JuspoApprovalController@show');
Route::post('juspo_app','Silo\JuspoApprovalController@store');
Route::get('juspo_app_status','Apv\JuspoApprovalController@getStatus');
Route::get('juspo_app_preview/{no_bukti}/{id}','Apv\JuspoApprovalController@getPreview');

Route::get('dash_databox','Apv\DashboardController@getDataBox');
Route::get('dash_posisi','Apv\DashboardController@getPosisi');
Route::post('notif_register','Apv\NotifController@register');
Route::get('notif_send','Apv\NotifController@sendNotif');
Route::get('notif','Apv\NotifController@getNotif');
Route::post('notif-update-status','Apv\NotifController@updateStatusRead');

Route::get('filter-nik','Silo\FilterController@getFilterNIKVerifikasi');
Route::get('filter-klp','Silo\FilterController@getFilterKlpBarang');

Route::post('save-temp', 'Silo\JuspoController@saveFileTemp');
