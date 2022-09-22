<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('periode', 'Sai\HelperController@getPeriode');

Route::get('cetak-tagihan-maintenance/{no_dokumen}/{kode_cust}', 'Sai\LaporanController@getTagihanDetail');
Route::post('lap-tagihan', 'Sai\LaporanController@getDataTagihan');
