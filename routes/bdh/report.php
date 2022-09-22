<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('filter-periodever', 'Bdh\FilterController@periodeVer');
Route::get('filter-periodespb', 'Bdh\FilterController@periodeSPB');
Route::get('filter-periodebayar', 'Bdh\FilterController@periodeBayar');
Route::get('filter-periodepb', 'Bdh\FilterController@periodePB');
Route::get('filter-periodepanjar', 'Bdh\FilterController@periodePanjar');
Route::get('filter-periode', 'Bdh\FilterController@dataPeriode');
Route::get('filter-nik', 'Bdh\FilterController@dataNik');
Route::get('filter-pp', 'Bdh\FilterController@dataPP');
Route::get('filter-tahunif', 'Bdh\FilterController@dataTahunIF');
Route::get('filter-ppif', 'Bdh\FilterController@dataPPIF');

Route::get('filter-nover', 'Bdh\FilterController@dataBuktiVer');
Route::get('filter-nospb', 'Bdh\FilterController@dataBuktiSPB');
Route::get('filter-nobayar', 'Bdh\FilterController@dataBuktiBayar');
Route::get('filter-nojurfinalpertanggungpanjar', 'Bdh\FilterController@dataBuktiJurFinalTanggungPanjar');
Route::get('filter-nopb', 'Bdh\FilterController@dataBuktiPB');
Route::get('filter-nopanjar', 'Bdh\FilterController@dataBuktiPanjar');

Route::post('lap-verifikasi', 'Bdh\LaporanController@dataVerifikasi');
Route::post('lap-spb', 'Bdh\LaporanController@dataSPB');
Route::post('lap-bayar', 'Bdh\LaporanController@dataPembayaran');
Route::post('lap-transbank', 'Bdh\LaporanController@dataTransBank');
Route::post('lap-jurfinalpertanggungpanjar', 'Bdh\LaporanController@dataJurFinalTanggungPanjar');

Route::post('lap-pb', 'Bdh\LaporanBebanController@dataPB');
Route::post('lap-posisipertanggungpb', 'Bdh\LaporanBebanController@dataPosisiTanggungPB');

Route::post('lap-panjar', 'Bdh\LaporanPanjarController@dataPanjar');
Route::post('lap-cairpanjar', 'Bdh\LaporanPanjarController@dataCairPanjar');
Route::post('lap-posisiajupanjar', 'Bdh\LaporanPanjarController@dataPosisiAjuPanjar');
Route::post('lap-tanggungpanjar', 'Bdh\LaporanPanjarController@dataTanggungPanjar');
Route::post('lap-posisitanggungpanjar', 'Bdh\LaporanPanjarController@dataPosisiTanggungPanjar');
Route::post('lap-saldopanjar', 'Bdh\LaporanPanjarController@dataSaldoPanjar');

Route::post('lap-bukaif', 'Bdh\LaporanImburseFundController@dataBukaIf');
Route::post('lap-imburseif', 'Bdh\LaporanImburseFundController@dataImburseIf');
Route::post('lap-posisiimburseif', 'Bdh\LaporanImburseFundController@dataPosisiImburseIf');
Route::post('lap-kartuif', 'Bdh\LaporanImburseFundController@dataKartuIf');

Route::post('lap-dokpbh', 'Bdh\LaporanDetailController@dataDokumenPBH');

?>