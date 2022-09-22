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

Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        return redirect('saku/login')->with('alert','Session telah habis !');
    }else{
        return view('saku.'.$id);
    }
});


Route::get('/cek_session', 'Saku\AuthController@cek_session');
Route::get('/', 'Saku\AuthController@index');
Route::get('/dash', 'Saku\AuthController@index');
Route::get('/menu', 'Saku\AuthController@getMenu');
Route::get('/login', 'Saku\AuthController@login');
Route::post('/login', 'Saku\AuthController@cek_auth');
Route::get('/logout', 'Saku\AuthController@logout');

Route::get('/fs', 'Saku\FSController@index');
Route::post('/fs', 'Saku\FSController@store');
Route::get('/fs/{id}', 'Saku\FSController@show');
Route::put('/fs/{id}','Saku\FSController@update');
Route::delete('/fs/{id}','Saku\FSController@destroy');

Route::get('/pp', 'Saku\PpController@index');
Route::post('/pp', 'Saku\PpController@store');
Route::get('/pp/{id}', 'Saku\PpController@show');
Route::put('/pp/{id}','Saku\PpController@update');
Route::delete('/pp/{id}','Saku\PpController@destroy');


Route::get('/masakun', 'Saku\MasakunController@index');
Route::post('/masakun', 'Saku\MasakunController@store');
Route::get('/masakun/{id}', 'Saku\MasakunController@show');
Route::put('/masakun/{id}','Saku\MasakunController@update');
Route::delete('/masakun/{id}','Saku\MasakunController@destroy');
Route::get('/curr', 'Saku\MasakunController@getCurrency');
Route::get('/modul', 'Saku\MasakunController@getModul');
Route::get('/flag_akun','Saku\MasakunController@getFlagAkun');
Route::get('/neraca/{kode_fs}','Saku\MasakunController@getNeraca');
Route::get('/flag_akun/{kode_flag}','Saku\MasakunController@getFlagAkunPerKode');
Route::get('/neraca/{kode_fs}/{kode_neraca}','Saku\MasakunController@getNeracaPerKode');
Route::get('/fsgar','Saku\MasakunController@getFSGar');
Route::get('/neracagar/{kode_fs}','Saku\MasakunController@getNeracaGar');

Route::get('/jurnal', 'Saku\JurnalController@index');
Route::post('/jurnal', 'Saku\JurnalController@store');
Route::get('/jurnal/{id}', 'Saku\JurnalController@show');
Route::put('/jurnal/{id}','Saku\JurnalController@update');
Route::delete('/jurnal/{id}','Saku\JurnalController@destroy');
Route::get('/pp-list', 'Saku\JurnalController@getPP');
Route::get('/akun', 'Saku\JurnalController@getAkun');
Route::get('/nikperiksa', 'Saku\JurnalController@getNIKPeriksa');
Route::get('/nikperiksa/{nik}', 'Saku\JurnalController@getNIKPeriksaByNIK');
Route::get('/jurnal-periode', 'Saku\JurnalController@getPeriodeJurnal');
// Route::get('/filter_list_jurnal','Saku\JurnalController@getFilterJurnal');

Route::get('/modultrans', 'Saku\PostingController@getModul');
Route::post('/loadJurnal', 'Saku\PostingController@loadJurnal');
Route::post('/posting', 'Saku\PostingController@store');

 //filter laporan
Route::get('gl_filter_lokasi','Saku\FilterController@getGlFilterLokasi');
Route::get('gl_filter_periode','Saku\FilterController@getGlFilterPeriode');
Route::get('gl_filter_modul','Saku\FilterController@getGlFilterModul');
Route::get('gl_filter_bukti','Saku\FilterController@getGlFilterBukti');
Route::get('gl_filter_akun','Saku\FilterController@getGlFilterAkun');
Route::get('gl_filter_fs','Saku\FilterController@getGlFilterFs');

 //konten laporan
Route::post('gl_report_jurnal','Saku\LaporanController@getGlReportJurnal');
Route::post('gl_report_jurnal_form','Saku\LaporanController@getGlReportJurnalForm');
Route::post('gl_report_buku_besar','Saku\LaporanController@getGlReportBukuBesar');
Route::post('gl_report_neraca_lajur','Saku\LaporanController@getGlReportNeracaLajur');
Route::post('gl_report_neraca','Saku\LaporanController@getGlReportNeraca');
Route::post('gl_report_laba_rugi','Saku\LaporanController@getGlReportLabaRugi');

//Format Laporan
Route::get('format-laporan','Saku\FormatLaporanController@show');
Route::post('format-laporan','Saku\FormatLaporanController@store');
Route::put('format-laporan','Saku\FormatLaporanController@update');
Route::delete('format-laporan','Saku\FormatLaporanController@destroy');
Route::get('format-laporan-versi','Saku\FormatLaporanController@getVersi');
Route::get('format-laporan-tipe','Saku\FormatLaporanController@getTipe');
Route::get('format-laporan-relakun','Saku\FormatLaporanController@getRelakun');
Route::post('format-laporan-relasi','Saku\FormatLaporanController@simpanRelasi');
Route::post('format-laporan-move','Saku\FormatLaporanController@simpanMove');


Route::get('pay','Midtrans\PaymentController@getPayment');



