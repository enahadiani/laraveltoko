<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('filter-akun', 'DashTelu\FilterController@getFilterAkun');
Route::get('filter-periode-keu', 'DashTelu\FilterController@getFilterPeriodeKeuangan');
Route::get('filter-fs', 'DashTelu\FilterController@getFilterFS');
Route::get('filter-level', 'DashTelu\FilterController@getFilterLevel');
Route::get('filter-format', 'DashTelu\FilterController@getFilterFormat');
Route::get('filter-sumju', 'DashTelu\FilterController@getFilterSumju');
Route::get('filter-modul', 'DashTelu\FilterController@getFilterModul');
Route::get('filter-bukti-jurnal', 'DashTelu\FilterController@getFilterBuktiJurnal');
Route::get('filter-mutasi', 'DashTelu\FilterController@getFilterMutasi');
Route::get('filter-pp', 'DashTelu\FilterController@getFilterPP');
Route::get('filter-bidang', 'DashTelu\FilterController@getFilterBidang');
Route::get('filter-default-labarugi-agg', 'DashTelu\FilterController@getFilterDefaultLabaRugiAgg');
Route::get('filter-rektor', 'DashTelu\FilterController@getFilterRektor');
Route::get('filter-fakultas', 'DashTelu\FilterController@getFilterFakultas');
Route::get('filter-prodi', 'DashTelu\FilterController@getFilterProdi');
Route::get('filter-output', 'DashTelu\FilterController@getFilterOutput');

Route::post('lap-labarugi-agg', 'DashTelu\LaporanController@getLabaRugiAgg');
Route::post('lap-labarugi-agg-detail', 'DashTelu\LaporanController@getLabaRugiAggDetail');
Route::post('lap-neraca2', 'DashTelu\LaporanController@getNeraca2');
Route::post('lap-neraca2-detail', 'DashTelu\LaporanController@getNeraca2Detail');
Route::post('lap-investasi', 'DashTelu\LaporanController@getInvestasi');
Route::post('lap-investasi-detail', 'DashTelu\LaporanController@getInvestasiDetail');
Route::post('lap-labarugi-agg-dir', 'DashTelu\LaporanController@getLabaRugiAggDir');
Route::post('lap-labarugi-agg-dir-detail', 'DashTelu\LaporanController@getLabaRugiAggDirDetail');
Route::post('lap-labarugi-agg-fak', 'DashTelu\LaporanController@getLabaRugiAggFak');
Route::post('lap-labarugi-agg-fak-detail', 'DashTelu\LaporanController@getLabaRugiAggFakDetail');
Route::post('lap-labarugi-agg-fak2', 'DashTelu\LaporanController@getLabaRugiAggFak2');
Route::post('lap-labarugi-agg-fak2-detail', 'DashTelu\LaporanController@getLabaRugiAggFak2Detail');
Route::post('lap-labarugi-agg-prodi', 'DashTelu\LaporanController@getLabaRugiAggProdi');
Route::post('lap-labarugi-agg-prodi-detail', 'DashTelu\LaporanController@getLabaRugiAggProdiDetail');

Route::get('lap-labarugi-agg-pdf', 'DashTelu\LaporanController@getLabaRugiAggPDF');
Route::get('lap-labarugi-agg-dir-pdf', 'DashTelu\LaporanController@getLabaRugiAggDirPDF');
Route::get('lap-labarugi-agg-fak-pdf', 'DashTelu\LaporanController@getLabaRugiAggFakPDF');
Route::get('lap-labarugi-agg-fak2-pdf', 'DashTelu\LaporanController@getLabaRugiAggFak2PDF');
Route::get('lap-labarugi-agg-prodi-pdf', 'DashTelu\LaporanController@getLabaRugiAggProdiPDF');
Route::get('lap-neraca2-pdf', 'DashTelu\LaporanController@getNeraca2PDF');
Route::get('lap-investasi-pdf', 'DashTelu\LaporanController@getInvestasiPDF');

Route::post('send-email-report', 'DashTelu\LaporanController@sendEmail');
