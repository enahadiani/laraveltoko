<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('tagihan','Rkap\TagihanController@index');
Route::get('tagihan-detail','Rkap\TagihanController@show');
Route::post('tagihan','Rkap\TagihanController@store');
Route::put('tagihan','Rkap\TagihanController@update');
Route::delete('tagihan','Rkap\TagihanController@destroy');
Route::get('tagihan-load','Rkap\TagihanController@load');
Route::post('tagihan-upload', 'Rkap\TagihanController@importExcel');
Route::get('tagihan-tmp', 'Rkap\TagihanController@getDataTmp');

Route::get('pengeluaran','Rkap\PengeluaranController@index');
Route::get('pengeluaran-detail','Rkap\PengeluaranController@show');
Route::post('pengeluaran','Rkap\PengeluaranController@store');
Route::put('pengeluaran','Rkap\PengeluaranController@update');
Route::delete('pengeluaran','Rkap\PengeluaranController@destroy');
Route::get('pengeluaran-load','Rkap\PengeluaranController@load');
Route::post('pengeluaran-upload', 'Rkap\PengeluaranController@importExcel');
Route::get('pengeluaran-tmp', 'Rkap\PengeluaranController@getDataTmp');

//Usulan Anggaran Umum
Route::get('u-anggaran-umum','Rkap\UAnggaranUmumController@index');//ok
Route::get('u-anggaran-umum-detail','Rkap\UAnggaranUmumController@show');//ok
Route::post('u-anggaran-umum','Rkap\UAnggaranUmumController@store');//ok
Route::put('u-anggaran-umum','Rkap\UAnggaranUmumController@update');//ok
Route::delete('u-anggaran-umum','Rkap\UAnggaranUmumController@destroy');//ok
Route::get('u-anggaran-umum-load','Rkap\UAnggaranUmumController@load');
Route::post('u-anggaran-umum-upload', 'Rkap\UAnggaranUmumController@importExcel');
Route::get('u-anggaran-umum-tmp', 'Rkap\UAnggaranUmumController@getDataTmp');
Route::get('get-akun', 'Rkap\UAnggaranUmumController@get_akun'); //sementara sampai master akun bener
Route::get('get-akun-detail', 'Rkap\UAnggaranUmumController@get_akun_detail'); //sementara sampai master akun bener

// Pengajuan RKM
Route::get('cek-akses-form','Rkap\PengajuanController@cekAksesForm');
Route::get('aju','Rkap\PengajuanController@index');
Route::get('aju-box','Rkap\PengajuanController@getDataBox');
Route::get('aju-perbaikan','Rkap\PengajuanController@getDataPerbaikan');
Route::get('aju-finish','Rkap\PengajuanController@getFinish');
Route::get('aju/{no_bukti}','Rkap\PengajuanController@show');
Route::get('aju-dam','Rkap\PengajuanController@getDAM');
Route::get('aju-pp','Rkap\PengajuanController@getPP');
Route::get('aju-rkm','Rkap\PengajuanController@getRKM');
Route::get('aju-preview','Rkap\PengajuanController@getPreview');
Route::get('aju-history','Rkap\PengajuanController@getHistory');
Route::post('aju-notifikasi', 'Rkap\PengajuanController@sendNotifikasi');
Route::get('aju-draft','Rkap\PengajuanController@getDraft');
Route::get('aju-sedang','Rkap\PengajuanController@getSedang');
Route::get('aju-selesai','Rkap\PengajuanController@getSelesai');

Route::get('aju-preview-his','Rkap\PengajuanController@getPreviewHis');
Route::get('aju-history-his','Rkap\PengajuanController@getHistoryHis');

Route::post('aju','Rkap\PengajuanController@store');
Route::post('aju/{no_bukti}','Rkap\PengajuanController@update');
Route::delete('aju/{no_bukti}','Rkap\PengajuanController@destroy');


Route::get('app','Rkap\ApprovalController@index');
Route::get('app-aju','Rkap\ApprovalController@getPengajuan');
Route::get('app-detail','Rkap\ApprovalController@show');
Route::post('app','Rkap\ApprovalController@store');
Route::get('app-status','Rkap\ApprovalController@getStatus');
Route::get('app-preview','Rkap\ApprovalController@getPreview');

// Pengajuan DAM
Route::get('ajudam','Rkap\PengajuanDamController@index');
Route::get('ajudam-box','Rkap\PengajuanDamController@getDataBox');
Route::get('ajudam-perbaikan','Rkap\PengajuanDamController@getDataPerbaikan');
Route::get('ajudam-finish','Rkap\PengajuanDamController@getFinish');
Route::get('ajudam/{no_bukti}','Rkap\PengajuanDamController@show');
Route::get('ajudam-si','Rkap\PengajuanDamController@getSI');
Route::get('ajudam-pp','Rkap\PengajuanDamController@getPP');
Route::get('ajudam-dam','Rkap\PengajuanDamController@getDAM');
Route::get('ajudam-preview','Rkap\PengajuanDamController@getPreview');
Route::get('ajudam-history','Rkap\PengajuanDamController@getHistory');

Route::get('ajudam-preview-his','Rkap\PengajuanDamController@getPreviewHis');
Route::get('ajudam-history-his','Rkap\PengajuanDamController@getHistoryHis');
Route::get('ajudam-draft','Rkap\PengajuanDamController@getDraft');
Route::get('ajudam-sedang','Rkap\PengajuanDamController@getSedang');
Route::get('ajudam-selesai','Rkap\PengajuanDamController@getSelesai');

Route::post('ajudam','Rkap\PengajuanDamController@store');
Route::post('ajudam/{no_bukti}','Rkap\PengajuanDamController@update');
Route::delete('ajudam/{no_bukti}','Rkap\PengajuanDamController@destroy');


Route::get('appdam','Rkap\ApprovalDamController@index');
Route::get('appdam-aju','Rkap\ApprovalDamController@getPengajuan');
Route::get('appdam-detail','Rkap\ApprovalDamController@show');
Route::post('appdam','Rkap\ApprovalDamController@store');
Route::get('appdam-status','Rkap\ApprovalDamController@getStatus');
Route::get('appdam-preview','Rkap\ApprovalDamController@getPreview');
//Pengajuan Outlook

Route::get('cek-akses-form-outlook','Rkap\PengajuanOutlookController@cekAksesForm');//pengajuan
Route::get('aju-outlook','Rkap\PengajuanOutlookController@index');//pengajuan

Route::get('aju-finish-outlook','Rkap\PengajuanOutlookController@getFinish'); //fHistoryAjuOutlook
Route::get('aju-outlook/{no_bukti}','Rkap\PengajuanOutlookController@show');//pengajuan
Route::get('aju-dam-outlook','Rkap\PengajuanOutlookController@getDAM'); //pengajuan
Route::get('aju-pp-outlook','Rkap\PengajuanOutlookController@getPP');//pengajuan
Route::get('aju-rkm-outlook','Rkap\PengajuanOutlookController@getRKM');
Route::get('aju-preview-outlook','Rkap\PengajuanOutlookController@getPreview');//pengajuan
Route::get('aju-history-outlook','Rkap\PengajuanOutlookController@getHistory');//pengajuan

Route::get('aju-preview-his-outlook','Rkap\PengajuanOutlookController@getPreviewHis'); //fHistoryAjuOutlook
Route::get('aju-history-his-outlook','Rkap\PengajuanOutlookController@getHistoryHis'); //fHistoryAjuOutlook

Route::post('aju-outlook','Rkap\PengajuanOutlookController@store');//pengajuan
Route::post('aju-outlook/{no_bukti}','Rkap\PengajuanOutlookController@update');//pengajuan
Route::delete('aju-outlook/{no_bukti}','Rkap\PengajuanOutlookController@destroy');//pengajuan

//Approval Outlook
Route::get('app-outlook','Rkap\ApprovalOutlookController@index'); //fHistoryAppOutlook
Route::get('app-aju-outlook','Rkap\ApprovalOutlookController@getPengajuan'); //approval
Route::get('app-detail-outlook','Rkap\ApprovalOutlookController@show');//approval
Route::post('app-outlook','Rkap\ApprovalOutlookController@store');//approval
Route::get('app-status-outlook','Rkap\ApprovalOutlookController@getStatus');
Route::get('app-preview-outlook','Rkap\ApprovalOutlookController@getPreview');//dikerjakan

// Pengajuan DRK
Route::get('ajudrk','Rkap\PengajuanDrkController@index');
Route::get('ajudrk-finish','Rkap\PengajuanDrkController@getFinish');
Route::get('ajudrk/{no_bukti}','Rkap\PengajuanDrkController@show');
Route::get('ajudrk-rkm','Rkap\PengajuanDrkController@getRKM');
Route::get('ajudrk-pp','Rkap\PengajuanDrkController@getPP');
Route::get('ajudrk-drk','Rkap\PengajuanDrkController@getDAM');
Route::get('ajudrk-preview','Rkap\PengajuanDrkController@getPreview');
Route::get('ajudrk-history','Rkap\PengajuanDrkController@getHistory');

Route::get('ajudrk-preview-his','Rkap\PengajuanDrkController@getPreviewHis');
Route::get('ajudrk-history-his','Rkap\PengajuanDrkController@getHistoryHis');

Route::post('ajudrk','Rkap\PengajuanDrkController@store');
Route::post('ajudrk/{no_bukti}','Rkap\PengajuanDrkController@update');
Route::delete('ajudrk/{no_bukti}','Rkap\PengajuanDrkController@destroy');


Route::get('appdrk','Rkap\ApprovalDrkController@index');
Route::get('appdrk-aju','Rkap\ApprovalDrkController@getPengajuan');
Route::get('appdrk-detail','Rkap\ApprovalDrkController@show');
Route::post('appdrk','Rkap\ApprovalDrkController@store');
Route::get('appdrk-status','Rkap\ApprovalDrkController@getStatus');
Route::get('appdrk-preview','Rkap\ApprovalDrkController@getPreview');


// Pengajuan Usulan
Route::get('aju-usul-cek-akses-form','Rkap\PengajuanUsulController@cekAksesForm');
Route::get('aju-usul','Rkap\PengajuanUsulController@index');
Route::get('aju-usul-box','Rkap\PengajuanUsulController@getDataBox');
Route::get('aju-usul-perbaikan','Rkap\PengajuanUsulController@getDataPerbaikan');
//Route::get('aju-usul-finish','Rkap\PengajuanUsulController@getFinish');
Route::get('aju-usul/{no_bukti}','Rkap\PengajuanUsulController@show');

//Route::get('aju-usul-pp','Rkap\PengajuanUsulController@getPP');
Route::get('aju-usul-rkm','Rkap\PengajuanUsulController@getRKM');
Route::get('aju-usul-akun','Rkap\PengajuanUsulController@getAkun');
Route::get('aju-usul-preview','Rkap\PengajuanUsulController@getPreview');
Route::get('aju-usul-history','Rkap\PengajuanUsulController@getHistory');
//Route::post('aju-usul-notifikasi', 'Rkap\PengajuanUsulController@sendNotifikasi');
Route::get('aju-usul-draft','Rkap\PengajuanUsulController@getDraft');
Route::get('aju-usul-sedang','Rkap\PengajuanUsulController@getSedang');
Route::get('aju-usul-selesai','Rkap\PengajuanUsulController@getSelesai');
//
//Route::get('aju-usul-preview-his','Rkap\PengajuanUsulController@getPreviewHis');
//Route::get('aju-usul-history-his','Rkap\PengajuanUsulController@getHistoryHis');
//
Route::post('aju-usul','Rkap\PengajuanUsulController@store');
Route::post('aju-usul/{no_bukti}','Rkap\PengajuanUsulController@update');
Route::delete('aju-usul/{no_bukti}','Rkap\PengajuanUsulController@destroy');


Route::get('app-usul','Rkap\ApprovalUsulController@index');
Route::get('app-usul-aju','Rkap\ApprovalUsulController@getPengajuan');
Route::get('app-usul-detail','Rkap\ApprovalUsulController@show');
Route::post('app-usul','Rkap\ApprovalUsulController@store');
//Route::get('app-usul-status','Rkap\ApprovalUsulController@getStatus');
Route::get('app-usul-preview','Rkap\ApprovalUsulController@getPreview');