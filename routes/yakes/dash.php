<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('data-tahun', 'Yakes\DashboardController@getFilterTahun');
Route::get('data-periode', 'Yakes\DashboardController@getFilterPeriode');
Route::get('data-regional', 'Yakes\DashboardController@getFilterRegional');
Route::get('data-jenis', 'Yakes\DashboardController@getFilterRasio');
Route::get('data-organik/{periode}/{regional}', 'Yakes\DashboardController@getdataOrganik');
Route::get('data-demography/{periode}/{regional}', 'Yakes\DashboardController@getdataDemography');
Route::get('data-medis/{periode}/{regional}', 'Yakes\DashboardController@getdataMedis');
Route::get('data-dokter/{periode}/{regional}', 'Yakes\DashboardController@getdataDokter');
Route::get('data-gender/{periode}/{regional}', 'Yakes\DashboardController@getdataGender');
Route::get('data-education/{periode}/{regional}', 'Yakes\DashboardController@getdataEdu');
Route::get('data-pendapatan/{tahun}/{regional}', 'Yakes\DashboardController@getdataPendapatan');
Route::get('data-beban/{tahun}/{regional}', 'Yakes\DashboardController@getdataBeban');
Route::get('data-cc/{periode}/{regional}', 'Yakes\DashboardController@getdataRealCC');
Route::get('data-bp/{periode}/{regional}', 'Yakes\DashboardController@getdataRealBP');
Route::get('data-real-beban/{periode}/{regional}', 'Yakes\DashboardController@getdataRealBeban');
Route::get('data-kunj-bpcc/{periode}/{jenis}/{regional}', 'Yakes\DashboardController@getdataKunjBPCC');
Route::get('data-layanan-bpcc/{periode}/{jenis}/{regional}', 'Yakes\DashboardController@getdataLayananBPCC');
Route::get('data-claim/{periode}/{jenis}', 'Yakes\DashboardController@getdataClaim');
Route::get('data-kapitasi/{tahun}/{pp}', 'Yakes\DashboardController@getdataKapitasi');
Route::get('data-kapitasi-detail/{tahun}/{pp}', 'Yakes\DashboardController@getdataKapitasiDetail');
Route::get('data-bpjs-iuran/{periode}/{jenis}', 'Yakes\DashboardController@getdataIuranBPJS');
Route::get('data-bpjs-kapitasi/{periode}/{jenis}', 'Yakes\DashboardController@getdataKapitasiBPJS');
Route::get('data-bpjs-claim/{periode}/{jenis}', 'Yakes\DashboardController@getdataClaimBPJS');
Route::get('data-claimant/{periode}/{jenis}/{regional}', 'Yakes\DashboardController@getdataClaimant');
Route::get('data-kunj-total/{periode}/{jenis}/{regional}', 'Yakes\DashboardController@getdataKunjTotal');
Route::get('data-layanan-kunj/{periode}/{jenis}/{regional}', 'Yakes\DashboardController@getdataKunjLayanan');
Route::get('data-kpku/{tahun}/{jenis}', 'Yakes\DashboardController@getdataKPKU');

Route::get('param-default', 'Yakes\DashInvesController@getParamDefault');
Route::get('filter-plan', 'Yakes\DashInvesController@getFilterPlan');
Route::get('filter-klp', 'Yakes\DashInvesController@getFilterKlp');
Route::get('filter-kolom', 'Yakes\DashInvesController@getFilKolom');
Route::post('filter-kolom', 'Yakes\DashInvesController@simpanFilterKolom');
Route::post('update-tgl', 'Yakes\DashInvesController@updateTgl');
Route::post('update-param', 'Yakes\DashInvesController@updateParam');

Route::get('global-market', 'Yakes\DashInvesController@getGlobalMarket');

Route::get('chart-index', 'Yakes\DashInvesController@getBMark');
Route::get('global-index', 'Yakes\DashInvesController@getGlobalIndex');
Route::get('bond-index', 'Yakes\DashInvesController@getBondIndex');

Route::get('persen-aset', 'Yakes\DashInvesController@getPersenAset');
Route::get('table-alokasi', 'Yakes\DashInvesController@getTableAlokasi');
Route::get('roi-kkp', 'Yakes\DashInvesController@getRoiKkp');

Route::get('portofolio', 'Yakes\DashInvesController@getPortofolio');
Route::get('persen', 'Yakes\DashInvesController@getBatasAlokasi');
Route::get('aset-chart', 'Yakes\DashInvesController@getAset');

Route::get('table-real', 'Yakes\DashInvesController@getRealHasil');
Route::get('table-roi', 'Yakes\DashInvesController@getROIReal');

Route::get('plan-aset', 'Yakes\DashInvesController@getPlanAset');

Route::get('kinerja-plan-aset', 'Yakes\DashInvesController@getKinerja');
Route::get('kinerja-etf', 'Yakes\DashInvesController@getKinerjaETF');
Route::get('bindo', 'Yakes\DashInvesController@getKinerjaBindo');
Route::get('bmark', 'Yakes\DashInvesController@getKinerjaBmark');

Route::get('cash-out', 'Yakes\DashInvesController@getCashOut');

Route::get('table-portofolio', 'Yakes\DashInvesController@getTableObli');
Route::get('komposisi', 'Yakes\DashInvesController@getKomposisi');
Route::get('rating', 'Yakes\DashInvesController@getRating');

Route::get('komposisi-tenor','Yakes\DashInvesController@getKomposisiTenor');
Route::get('tenor','Yakes\DashInvesController@getTenor');