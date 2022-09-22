<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::get('data-fp-box', 'DashTarbak\DashboardFPController@getDataBoxFirst');
Route::get('v2/data-fp-box', 'DashTarbak\DashboardFPV2Controller@getDataBoxFirst');
Route::get('data-fp-pdpt', 'DashTarbak\DashboardFPController@getDataBoxPdpt');
Route::get('v2/data-fp-pdpt', 'DashTarbak\DashboardFPV2Controller@getDataPdpt');
Route::get('data-fp-beban', 'DashTarbak\DashboardFPController@getDataBoxBeban');
Route::get('v2/data-fp-beban', 'DashTarbak\DashboardFPV2Controller@getDataBeban');
Route::get('data-fp-shu', 'DashTarbak\DashboardFPController@getDataBoxShu');
Route::get('v2/data-fp-shu', 'DashTarbak\DashboardFPV2Controller@getDataShu');
Route::get('data-fp-or', 'DashTarbak\DashboardFPController@getDataBoxShu');
Route::get('v2/data-fp-or', 'DashTarbak\DashboardFPV2Controller@getDataOR');
Route::get('data-fp-lr', 'DashTarbak\DashboardFPController@getDataBoxLabaRugi');
Route::get('data-fp-pl', 'DashTarbak\DashboardFPController@getDataBoxPerformLembaga');

Route::get('data-fp-detail-perform', 'DashTarbak\DashboardFPController@getDataPerformansiLembaga');
Route::get('data-fp-detail-lembaga', 'DashTarbak\DashboardFPController@getDataPerLembaga');
Route::get('data-fp-detail-kelompok', 'DashTarbak\DashboardFPController@getDataPerKelompok');
Route::get('data-fp-detail-akun', 'DashTarbak\DashboardFPController@getDataPerAkun');
Route::get('data-fp-detail-or-5tahun', 'DashTarbak\DashboardFPController@getDataOR5Tahun');

Route::get('data-ccr-box', 'DashTarbak\DashboardCCRController@getDataBox');
Route::get('data-ccr-top', 'DashTarbak\DashboardCCRController@getTopCCR');
Route::get('data-ccr-bidang', 'DashTarbak\DashboardCCRController@getBidang');
Route::get('data-ccr-trend','DashTarbak\DashboardCCRController@getTrendCCR');  
Route::get('data-ccr-trend-saldo','DashTarbak\DashboardCCRController@getTrendSaldoPiutang');  
Route::get('data-ccr-umur-piutang','DashTarbak\DashboardCCRController@getUmurPiutang');  

Route::get('data-cf-box', 'DashTarbak\DashboardCFController@getDataBox');
Route::get('data-cf-chart-bulanan', 'DashTarbak\DashboardCFController@getDataChartBulanan');
Route::get('data-cf-soakhir', 'DashTarbak\DashboardCFController@getSoAkhirPerLembaga');

// INVEST

Route::get('data-inves-box', 'DashTarbak\DashboardInvesController@getDataBox');
Route::get('data-inves-serap-agg', 'DashTarbak\DashboardInvesController@getSerapAgg');
Route::get('data-inves-nilai-aset', 'DashTarbak\DashboardInvesController@getNilaiAsetChart');
Route::get('data-inves-agg-lembaga','DashTarbak\DashboardInvesController@getAggPerLembagaChart');  
// END INVEST

// RASIO

Route::get('data-rasio-jenis', 'DashTarbak\DashboardRasioController@getKlpRasio');
Route::get('data-rasio-lembaga', 'DashTarbak\DashboardRasioController@getLokasi');
Route::get('data-rasio-ytd', 'DashTarbak\DashboardRasioController@getRasioYTD');
Route::get('data-rasio-yoy', 'DashTarbak\DashboardRasioController@getRasioYoY');
Route::get('data-rasio-tahun', 'DashTarbak\DashboardRasioController@getRasioTahun');

// PIUTANG

Route::get('data-piutang-box', 'DashTarbak\DashboardPiutangController@getDataBox');
Route::get('data-piutang-top', 'DashTarbak\DashboardPiutangController@getTopPiutang');
Route::get('data-piutang-bidang', 'DashTarbak\DashboardPiutangController@getBidang');
Route::get('data-piutang-komposisi', 'DashTarbak\DashboardPiutangController@getKomposisiPiutang');
Route::get('data-piutang-umur', 'DashTarbak\DashboardPiutangController@getUmurPiutang');
Route::get('data-piutang-saldo', 'DashTarbak\DashboardPiutangController@getTrendSaldoPiutang');

?>