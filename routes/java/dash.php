<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Helper
Route::get('periode', 'Java\HelperController@getPeriode');

Route::get('project-dashboard', 'Java\DashboardController@getProjectDashboard');
Route::get('profit-dashboard', 'Java\DashboardController@getProfitDashboard');
Route::get('project-aktif', 'Java\DashboardController@getProjectAktif');
Route::get('project-detail-supplier', 'Java\DashboardController@getDetailSupplier');
Route::get('project-detail-customer', 'Java\DashboardController@getDetailCustomer');

?>