<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        return redirect('telu/login')->with('alert','Session telah habis !');
    }else{
        return view('telu.'.$id);
    }
});

Route::get('/', 'Telu\AuthController@index');
Route::get('/login', 'Telu\AuthController@login');
Route::post('/login', 'Telu\AuthController@cek_auth');
Route::get('/logout', 'Telu\AuthController@logout');
Route::get('/menu', 'Telu\AuthController@getMenu');

//Dashboard
//Home
Route::get('/getPencapaianYoY/{periode}','Telu\DashboardController@getPencapaianYoY');
Route::get('/getRkaVsReal/{periode}','Telu\DashboardController@getRkaVsReal');
Route::get('/getGrowthRka/{periode}','Telu\DashboardController@getGrowthRka');
Route::get('/getGrowthReal/{periode}','Telu\DashboardController@getGrowthReal');
//Pendapatan
Route::get('/getKomposisiPendapatan/{periode}','Telu\DashboardController@getKomposisiPendapatan');
Route::get('/getOprNonOprPendapatan/{periode}','Telu\DashboardController@getOprNonOprPendapatan');
Route::get('/getPresentaseRkaRealisasiPendapatan/{periode}','Telu\DashboardController@getPresentaseRkaRealisasiPendapatan');
//Detail Pendapatan 1
Route::get('/getPendapatanFak/{periode}/{kodeNeraca}','Telu\DashboardController@getPendapatanFak');
Route::get('/getDetailPendapatan/{periode}/{kodeNeraca}','Telu\DashboardController@getDetailPendapatan');
//Detail Pendapatan 2
Route::get('/getPendapatanJurusan/{periode}/{kodeNeraca}/{kodeBidang}','Telu\DashboardController@getPendapatanJurusan');
Route::get('/getDataPendJurusan/{periode}/{kodeNeraca}/{kodeBidang}/{tahun}','Telu\DashboardController@getDataPendJurusan');
//Beban
Route::get('/getKomposisiBeban/{periode}','Telu\DashboardController@getKomposisiBeban');
Route::get('/getOprNonOprBeban/{periode}','Telu\DashboardController@getOprNonOprBeban');
Route::get('/getPresentaseRkaRealisasiBeban/{periode}','Telu\DashboardController@getPresentaseRkaRealisasiBeban');
//Detail Beban 1
Route::get('/getBebanFak/{periode}/{kodeNeraca}','Telu\DashboardController@getBebanFak');
Route::get('/getDetailBeban/{periode}/{kodeNeraca}','Telu\DashboardController@getDetailBeban');
//Detail Pendapatan 2
Route::get('/getBebanJurusan/{periode}/{kodeNeraca}/{kodeBidang}','Telu\DashboardController@getBebanJurusan');
Route::get('/getDataBebanJurusan/{periode}/{kodeNeraca}/{kodeBidang}/{tahun}','Telu\DashboardController@getDataBebanJurusan');

?>