<?php 

// Data Produk //
Route::get('produk', 'AdmJava\ProdukController@index');
Route::get('produk-show', 'AdmJava\ProdukController@getData');
Route::post('produk', 'AdmJava\ProdukController@store');
Route::post('produk-ubah', 'AdmJava\ProdukController@update');
Route::delete('produk', 'AdmJava\ProdukController@delete');

// Data Produk //
Route::get('project', 'AdmJava\ProjectController@index');
Route::get('project-show', 'AdmJava\ProjectController@getData');
Route::post('project', 'AdmJava\ProjectController@store');
Route::post('project-ubah', 'AdmJava\ProjectController@update');
Route::delete('project', 'AdmJava\ProjectController@delete');

// Data Team //
Route::get('team', 'AdmJava\TeamController@index');
Route::get('team-show', 'AdmJava\TeamController@getData');
Route::post('team', 'AdmJava\TeamController@store');
Route::post('team-ubah', 'AdmJava\TeamController@update');
Route::delete('team', 'AdmJava\TeamController@delete');

// Data Profile perusahaan
Route::get('profile', 'AdmJava\ProfileController@index');
Route::post('profile', 'AdmJava\ProfileController@store');


?>