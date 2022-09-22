<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

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
    // if(!Session::has('isLoggedIn')){
    //     return redirect('apv/login')->with('alert','Session telah habis !');
    // }else{
        return view('apv.'.$id);
    // }
});

Route::get('/', 'Apv\AuthController@index');
Route::get('/cek_session', 'Apv\AuthController@cek_session');
Route::get('/dash', 'Apv\AuthController@index');
Route::get('/menu', 'Apv\AuthController@getMenu');
Route::get('/login', 'Apv\AuthController@login');
Route::post('/login', 'Apv\AuthController@cek_auth');
Route::get('/logout', 'Apv\AuthController@logout');

Route::get('/profile', 'Apv\AuthController@getProfile');
Route::post('/update-password', 'Apv\AuthController@updatePassword');

Route::get('/karyawan', 'Apv\KaryawanController@index');
Route::post('/karyawan', 'Apv\KaryawanController@store');
Route::get('/karyawan/{nik}', 'Apv\KaryawanController@show');
Route::post('/karyawan/{nik}','Apv\KaryawanController@update');
Route::delete('/karyawan/{nik}','Apv\KaryawanController@destroy');

Route::get('/unit', 'Apv\UnitController@index');
Route::post('/unit', 'Apv\UnitController@store');
Route::get('/unit/{kode_pp}', 'Apv\UnitController@show');
Route::put('/unit/{kode_pp}','Apv\UnitController@update');
Route::delete('/unit/{kode_pp}','Apv\UnitController@destroy');

Route::get('/jabatan', 'Apv\JabatanController@index');
Route::post('/jabatan', 'Apv\JabatanController@store');
Route::get('/jabatan/{kode_jab}', 'Apv\JabatanController@show');
Route::put('/jabatan/{kode_jab}','Apv\JabatanController@update');
Route::delete('/jabatan/{kode_jab}','Apv\JabatanController@destroy');

Route::get('/role', 'Apv\RoleController@index');
Route::post('/role', 'Apv\RoleController@store');
Route::get('/role/{kode_role}', 'Apv\RoleController@show');
Route::put('/role/{kode_role}','Apv\RoleController@update');
Route::delete('/role/{kode_role}','Apv\RoleController@destroy');

Route::get('/hakakses','Apv\HakaksesController@index');
Route::get('/hakakses/{nik}','Apv\HakaksesController@show');
Route::post('/hakakses','Apv\HakaksesController@store');
Route::put('/hakakses/{nik}','Apv\HakaksesController@update');
Route::delete('/hakakses/{nik}','Apv\HakaksesController@destroy');
Route::get('/form','Apv\HakaksesController@getForm');
Route::get('/hakakses_menu','Apv\HakaksesController@getMenu');

Route::get('/kota_all', 'Apv\KotaController@index');
Route::post('/kota', 'Apv\KotaController@store');
Route::get('/kota/{kode_kota}', 'Apv\KotaController@show');
Route::put('/kota/{kode_kota}','Apv\KotaController@update');
Route::delete('/kota/{kode_kota}','Apv\KotaController@destroy');
Route::get('/kota-aju', 'Apv\KotaController@getKotaByNIK');

Route::get('/divisi_all', 'Apv\DivisiController@index');
Route::post('/divisi', 'Apv\DivisiController@store');
Route::get('/divisi/{kode_divisi}', 'Apv\DivisiController@show');
Route::put('/divisi/{kode_divisi}','Apv\DivisiController@update');
Route::delete('/divisi/{kode_divisi}','Apv\DivisiController@destroy');
Route::get('/divisi-aju', 'Apv\DivisiController@getDivisiByNIK');

Route::get('juskeb','Apv\JuskebController@index');
Route::get('juskeb-finish','Apv\JuskebController@getJuskebFinish');
Route::get('juskeb/{no_bukti}','Apv\JuskebController@show');
Route::get('kota','Apv\JuskebController@getKota');
Route::get('divisi','Apv\JuskebController@getDivisi');
Route::get('nik_verifikasi','Apv\JuskebController@getNIKVerifikasi');
Route::get('nik_verifikasi2','Apv\JuskebController@getNIKVerifikasi2');
Route::get('barang-klp','Apv\JuskebController@getBarangKlp');
Route::get('generate-dok','Apv\JuskebController@generateDok');
Route::post('juskeb','Apv\JuskebController@store');
Route::post('juskeb/{no_bukti}','Apv\JuskebController@update');
Route::delete('juskeb/{no_bukti}','Apv\JuskebController@destroy');
Route::get('juskeb_history/{no_bukti}','Apv\JuskebController@getHistory');
Route::get('juskeb_preview/{no_bukti}','Apv\JuskebController@getPreview');
Route::get('juskeb_preview2/{no_bukti}','Apv\JuskebController@getPreview2');
Route::get('juskeb-dok','Apv\JuskebController@getDokumen');

Route::get('verifikasi','Apv\VerifikasiController@index');
Route::get('verifikasi/{no_bukti}','Apv\VerifikasiController@show');
Route::post('verifikasi','Apv\VerifikasiController@store');
Route::get('verifikasi_status','Apv\VerifikasiController@getStatus');
Route::get('verifikasi_history','Apv\VerifikasiController@getHistory');
Route::get('verifikasi_preview/{no_bukti}','Apv\VerifikasiController@getPreview');

Route::get('juskeb_app','Apv\JuskebApprovalController@index');
Route::get('juskeb_aju','Apv\JuskebApprovalController@getPengajuan');
Route::get('juskeb_app/{no_bukti}','Apv\JuskebApprovalController@show');
Route::post('juskeb_app','Apv\JuskebApprovalController@store');
Route::get('juskeb_app_status','Apv\JuskebApprovalController@getStatus');
Route::get('juskeb_app_preview/{no_bukti}/{id}','Apv\JuskebApprovalController@getPreview');

//Justifikasi Pengadaan
Route::get('juspo','Apv\JuspoController@index');
Route::get('juspo_aju','Apv\JuspoController@getPengajuan');
Route::get('juspo/{no_bukti}','Apv\JuspoController@show');
Route::get('juspo_aju/{no_bukti}','Apv\JuspoController@getDetailJuskeb');
Route::post('juspo','Apv\JuspoController@store');
Route::post('juspo/{no_bukti}','Apv\JuspoController@update');
Route::delete('juspo/{no_bukti}','Apv\JuspoController@destroy');
Route::get('juspo_history/{no_bukti}','Apv\JuspoController@getHistory');
Route::get('juspo_preview/{no_bukti}/{no_juskeb}','Apv\JuspoController@getPreview');
Route::get('generate-dok-juspo','Apv\JuspoController@generateDok');

Route::get('juspo_app','Apv\JuspoApprovalController@index');
Route::get('juspo_app_aju','Apv\JuspoApprovalController@getPengajuan');
Route::get('juspo_app/{no_bukti}','Apv\JuspoApprovalController@show');
Route::post('juspo_app','Apv\JuspoApprovalController@store');
Route::get('juspo_app_status','Apv\JuspoApprovalController@getStatus');
Route::get('juspo_app_preview/{no_bukti}/{id}','Apv\JuspoApprovalController@getPreview');
Route::delete('juspo_app_dok','Apv\JuspoApprovalController@deleteDok');

Route::get('dash_databox','Apv\DashboardController@getDataBox');
Route::get('dash_posisi','Apv\DashboardController@getPosisi');
Route::post('notif_register','Apv\NotifController@register');
Route::get('notif_send','Apv\NotifController@sendNotif');
Route::get('notif','Apv\NotifController@getNotif');
Route::post('notif-update-status','Apv\NotifController@updateStatusRead');

//Filter Laporan
Route::get('filter-pp','Apv\FilterController@getFilterPP');
Route::get('filter-kota','Apv\FilterController@getFilterKota');
Route::get('filter-nobukti','Apv\FilterController@getFilterNoBukti');
Route::get('filter-nodokumen','Apv\FilterController@getFilterNoDokumen');

//Pihak ketiga
//Laporan
Route::post('lap-posisi','Apv\LaporanController@getPosisi');
Route::post('lap-catt-app','Apv\LaporanController@getCattApp');
Route::post('lap-rekap-aju','Apv\LaporanController@getRekapAju');
Route::post('lap-rekap-aju-det','Apv\LaporanController@getRekapAjuDetail');



