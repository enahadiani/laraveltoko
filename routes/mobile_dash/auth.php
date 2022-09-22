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
        // return redirect('dash-telu/login');
        return view('mobile-dash.sesi');
    }else{
        return view('mobile-dash.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('mobile-dash.sesi');
});

Route::get('/cek_session', 'DashTelu\AuthMobileController@cek_session');
Route::get('/', 'DashTelu\AuthMobileController@index');
Route::get('/dash', 'DashTelu\AuthMobileController@index');
Route::get('/menu', 'DashTelu\AuthMobileController@getMenu');
Route::get('/login', 'DashTelu\AuthMobileController@login');
Route::post('/login', 'DashTelu\AuthMobileController@cek_auth');
Route::get('/logout', 'DashTelu\AuthMobileController@logout');

Route::get('/profile', 'DashTelu\AuthMobileController@getProfile');
Route::post('/update-password', 'DashTelu\AuthMobileController@updatePassword');
Route::post('/update-foto', 'DashTelu\AuthMobileController@updatePhoto');
Route::post('/update-background', 'DashTelu\AuthMobileController@updateBackground');

Route::get('notif','DashTelu\NotifController@getNotif');
Route::post('notif-update-status','DashTelu\NotifController@updateStatusRead');
Route::post('search-form','DashTelu\AuthMobileController@searchForm');
Route::get('search-form-list','DashTelu\AuthMobileController@searchFormList');
Route::get('search-form-list2','DashTelu\AuthMobileController@searchFormList2');


//Dashboard
//Home
Route::get('/getPencapaianYoY','DashTelu\DashboardController@getPencapaianYoY');
Route::get('/getRkaVsReal','DashTelu\DashboardController@getRkaVsReal');
Route::get('/getGrowthRka','DashTelu\DashboardController@getGrowthRka');
Route::get('/getGrowthReal','DashTelu\DashboardController@getGrowthReal');
//Pendapatan
Route::get('/getKomposisiPendapatan','DashTelu\DashboardController@getKomposisiPendapatan');
Route::get('/getOprNonOprPendapatan','DashTelu\DashboardController@getOprNonOprPendapatan');
Route::get('/getPresentaseRkaRealisasiPendapatan','DashTelu\DashboardController@getPresentaseRkaRealisasiPendapatan');
Route::get('/getPresentaseRkaRealisasiPendapatanRp','DashTelu\DashboardController@getPresentaseRkaRealisasiPendapatanRp');
//Detail Pendapatan 1
Route::get('/getPendapatanFak','DashTelu\DashboardController@getPendapatanFak');
Route::get('/getDetailPendapatan','DashTelu\DashboardController@getDetailPendapatan');

Route::get('/getPendapatanFakNon','DashTelu\DashboardController@getPendapatanFakNon');
Route::get('/getDetailPendapatanNon','DashTelu\DashboardController@getDetailPendapatanNon');
//Detail Pendapatan 2
Route::get('/getPendapatanJurusan','DashTelu\DashboardController@getPendapatanJurusan');
Route::get('/getDataPendJurusan','DashTelu\DashboardController@getDataPendJurusan');
//Beban
Route::get('/getKomposisiBeban','DashTelu\DashboardController@getKomposisiBeban');
Route::get('/getOprNonOprBeban','DashTelu\DashboardController@getOprNonOprBeban');
Route::get('/getPresentaseRkaRealisasiBeban','DashTelu\DashboardController@getPresentaseRkaRealisasiBeban');
Route::get('/getPresentaseRkaRealisasiBebanRp','DashTelu\DashboardController@getPresentaseRkaRealisasiBebanRp');
//Detail Beban 1
Route::get('/getBebanFak','DashTelu\DashboardController@getBebanFak');
Route::get('/getBebanFakNon','DashTelu\DashboardController@getBebanFakNon');
Route::get('/getDetailBeban','DashTelu\DashboardController@getDetailBeban');
Route::get('/getDetailBebanNon','DashTelu\DashboardController@getDetailBebanNon');
//Detail Beban 2
Route::get('/getBebanJurusan','DashTelu\DashboardController@getBebanJurusan');
Route::get('/getDataBebanJurusan','DashTelu\DashboardController@getDataBebanJurusan');


//BudgetComitee
Route::get('/rka','DashTelu\DashboardController@getBCRKA');
Route::get('/rka-persen','DashTelu\DashboardController@getBCRKAPersen');
Route::get('/growth-rka','DashTelu\DashboardController@getBCGrowthRKA');
Route::get('/tuition','DashTelu\DashboardController@getBCTuition');
Route::get('/tuition-persen','DashTelu\DashboardController@getBCTuitionPersen');
Route::get('/growth-tuition','DashTelu\DashboardController@getBCGrowthTuition');

Route::get('/komponen-investasi','DashTelu\DashboardController@komponenInvestasi');
Route::get('/rka-real-investasi','DashTelu\DashboardController@rkaVSRealInvestasi');
Route::get('/penyerapan-investasi','DashTelu\DashboardController@penyerapanInvestasi');
Route::get('/penyerapan-investasi-tahun','DashTelu\DashboardController@penyerapanInvestasiTahun');


Route::get('/profile', 'DashTelu\AuthMobileController@getProfile');
Route::post('/update-password', 'DashTelu\AuthMobileController@updatePassword');
Route::post('/update-foto', 'DashTelu\AuthMobileController@updatePhoto');
Route::post('/update-background', 'DashTelu\AuthMobileController@updateBackground');
Route::post('/update-profile', 'DashTelu\AuthMobileController@updateProfile');

Route::get('notif','DashTelu\NotifController@getNotif');
Route::post('notif-update-status','DashTelu\NotifController@updateStatusRead');
Route::post('search-form','DashTelu\AuthMobileController@searchForm');
Route::get('search-form-list','DashTelu\AuthMobileController@searchFormList');
Route::get('search-form-list2','DashTelu\AuthMobileController@searchFormList2');
Route::get('periode','DashTelu\DashboardController@getPeriode');
Route::get('tahun','DashTelu\DashboardController@getTahun');

Route::get('watch/{id}', function ($id) {
    $data['id'] = $id;
    return view('mobile-dash.watch',$data);
});

//Management System
Route::get('/profit-loss','DashTelu\DashboardController@profitLoss');
Route::get('/fx-position','DashTelu\DashboardController@fxPosition');
Route::get('/penyerapan-beban','DashTelu\DashboardController@penyerapanBeban');
Route::get('/debt','DashTelu\DashboardController@debt');
Route::get('/kelola-keuangan','DashTelu\DashboardController@kelolaKeuangan');
Route::get('/penjualan-pin','DashTelu\DashboardController@penjualanPin');

Route::get('/ms-pengembangan-rka','DashTelu\DashboardController@msPengembanganRKA');
Route::get('/ms-pengembangan-rka-dir','DashTelu\DashboardController@msPengembanganRKADir');
Route::get('/ms-pengembangan-komposisi','DashTelu\DashboardController@msPengembanganKomposisi');

Route::get('/laba-rugi-5tahun','DashTelu\DashboardController@getLabaRugi5Tahun');
Route::get('/laba-rugi-5tahun-yoy','DashTelu\DashboardController@getLabaRugi5TahunYoY');
Route::get('/pend-5tahun','DashTelu\DashboardController@getPend5Tahun');
Route::get('/pend-5tahun-yoy','DashTelu\DashboardController@getPend5TahunYoY');
Route::get('/pend-5tahun-tf','DashTelu\DashboardController@getPend5TahunTF');
Route::get('/pend-5tahun-tf-yoy','DashTelu\DashboardController@getPend5TahunTFYoY');
Route::get('/pend-5tahun-ntf','DashTelu\DashboardController@getPend5TahunNTF');
Route::get('/pend-5tahun-ntf-yoy','DashTelu\DashboardController@getPend5TahunNTFYoY');
Route::get('/pend-5tahun-komposisi','DashTelu\DashboardController@getPend5TahunKomposisi');
Route::get('/pend-5tahun-komposisi-yoy','DashTelu\DashboardController@getPend5TahunKomposisiYoY');
Route::get('/pend-5tahun-growth','DashTelu\DashboardController@getPend5TahunGrowth');
Route::get('/pend-5tahun-growth-yoy','DashTelu\DashboardController@getPend5TahunGrowthYoY');

Route::get('/beban-5tahun','DashTelu\DashboardController@getBeban5Tahun');
Route::get('/beban-5tahun-yoy','DashTelu\DashboardController@getBeban5TahunYoY');
Route::get('/beban-5tahun-sdm','DashTelu\DashboardController@getBeban5TahunSDM');
Route::get('/beban-5tahun-sdm-yoy','DashTelu\DashboardController@getBeban5TahunSDMYoY');
Route::get('/beban-5tahun-non-sdm','DashTelu\DashboardController@getBeban5TahunNonSDM');
Route::get('/beban-5tahun-non-sdm-yoy','DashTelu\DashboardController@getBeban5TahunNonSDMYoY');
Route::get('/beban-5tahun-komposisi','DashTelu\DashboardController@getBeban5TahunKomposisi');
Route::get('/beban-5tahun-komposisi-yoy','DashTelu\DashboardController@getBeban5TahunKomposisiYoY');
Route::get('/beban-5tahun-growth','DashTelu\DashboardController@getBeban5TahunGrowth');
Route::get('/beban-5tahun-growth-yoy','DashTelu\DashboardController@getBeban5TahunGrowthYoY');

Route::get('/shu-5tahun','DashTelu\DashboardController@getSHU5Tahun');
Route::get('/shu-5tahun-yoy','DashTelu\DashboardController@getSHU5TahunYoY');

Route::get('/ms-pend-capai','DashTelu\DashboardController@getPendCapai');
Route::get('/ms-pend-capai-klp','DashTelu\DashboardController@getPendCapaiKlp');

Route::get('/ms-beban-capai','DashTelu\DashboardController@getBebanCapai');
Route::get('/ms-beban-capai-klp','DashTelu\DashboardController@getBebanCapaiKlp');

Route::get('/ms-bank','DashTelu\DashboardController@getDaftarBank');
Route::get('/ms-shu','DashTelu\DashboardController@getSHUDetail');

Route::get('/ms-aset','DashTelu\DashboardController@getMSAset');
Route::get('/ms-hutang','DashTelu\DashboardController@getMSHutang');
Route::get('/ms-hutang-klp','DashTelu\DashboardController@getMSHutangKlp');
Route::get('/ms-modal','DashTelu\DashboardController@getMSModal');
Route::get('/ms-kasbank','DashTelu\DashboardController@getMSKasBank');

Route::get('/ms-piutang','DashTelu\DashboardController@getMSPiutang');
Route::get('drill-fakultas','DashTelu\DashboardController@getDrillFakultas');
Route::get('drill-detail-fakultas','DashTelu\DashboardController@getDetailDrillFakultas');
Route::get('drill-direktorat','DashTelu\DashboardController@getDrillDirektorat');
Route::get('drill-detail-direktorat','DashTelu\DashboardController@getDetailDrillDirektorat');

Route::get('drill-pp','DashTelu\DashboardController@getDrillPP');
Route::get('drill-detail-pp','DashTelu\DashboardController@getDetailDrillPP');

Route::get('video-list','DashTelu\DashboardController@getVideoList');
Route::get('financial-target','DashTelu\DashboardController@getTarget');
Route::post('note','DashTelu\DashboardController@updateNoteTarget');







