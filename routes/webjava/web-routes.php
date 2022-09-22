<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::get('/', 'Webjava\Webv2Controller@home');
Route::get('/home', 'Webjava\Webv2Controller@home');
Route::get('/home-product-detail-1', 'Webjava\Webv2Controller@homeProductDetail1');
Route::get('/home-product-detail-2', 'Webjava\Webv2Controller@homeProductDetail2');
Route::get('/home-product-detail-3', 'Webjava\Webv2Controller@homeProductDetail3');
Route::get('/home-product-detail-4', 'Webjava\Webv2Controller@homeProductDetail4');
Route::get('/home-product-detail-5', 'Webjava\Webv2Controller@homeProductDetail5');
Route::get('/home-product-detail-6', 'Webjava\Webv2Controller@homeProductDetail6');
Route::get('/home-project-detail-1', 'Webjava\Webv2Controller@homeProjectDetail1');
Route::get('/home-project-detail-2', 'Webjava\Webv2Controller@homeProjectDetail2');
Route::get('/home-project-detail-3', 'Webjava\Webv2Controller@homeProjectDetail3');
Route::get('/home-project-detail-4', 'Webjava\Webv2Controller@homeProjectDetail4');
Route::get('/home-project-detail-5', 'Webjava\Webv2Controller@homeProjectDetail5');
Route::get('/home-project-detail-6', 'Webjava\Webv2Controller@homeProjectDetail6');
Route::get('/product', 'Webjava\Webv2Controller@product');
Route::get('/contact', 'Webjava\Webv2Controller@contact');
Route::get('/company', 'Webjava\Webv2Controller@company');

?>