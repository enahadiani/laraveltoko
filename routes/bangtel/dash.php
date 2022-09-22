<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('periode', 'Bangtel\DashboardController@getPeriode');
Route::get('pp', 'Bangtel\DashboardController@getPP');
Route::get('project-box', 'Bangtel\DashboardController@getBoxProject');
Route::get('pdpt-box', 'Bangtel\DashboardController@getBoxPendapatan');
Route::get('beban-box', 'Bangtel\DashboardController@getBoxBeban');
Route::get('profit-box', 'Bangtel\DashboardController@getBoxProfit');
Route::get('project-aktif', 'Bangtel\DashboardController@getProjectAktif');


?>