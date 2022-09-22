<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('cust-akun', 'Toko\HelperController@getAkunCust');
Route::get('vendor-akun', 'Toko\HelperController@getAkunVend');
Route::get('gudang-nik', 'Toko\HelperController@getNIKGud');
Route::get('gudang-pp', 'Toko\HelperController@getPPGud');
Route::get('barang-klp-persediaan', 'Toko\HelperController@getAkunPersKelBar');
Route::get('barang-klp-pendapatan', 'Toko\HelperController@getAkunPdptKelBar');
Route::get('barang-klp-hpp', 'Toko\HelperController@getAkunHPPKelBar');
Route::get('menu-klp', 'Toko\HelperController@getKlpMenu');
Route::get('menu-form', 'Toko\HelperController@getLabMenu');
Route::get('masakun-curr','Toko\HelperController@getCurr');
Route::get('masakun-modul','Toko\HelperController@getModul');
Route::get('reftrans-kode/{jenis}','Toko\HelperController@getRef');
Route::get('reftrans-pemasukan','Toko\HelperController@getRefPemasukan');
Route::get('reftrans-pengeluaran','Toko\HelperController@getRefPengeluaran');
Route::get('reftrans-pindah-buku','Toko\HelperController@getRefPindahBuku');

// Data Customer //
Route::get('cust', 'Toko\CustomerController@index');
Route::get('cust/{id}', 'Toko\CustomerController@getData');
Route::post('cust', 'Toko\CustomerController@store');
Route::put('cust/{id}', 'Toko\CustomerController@update');
Route::delete('cust/{id}', 'Toko\CustomerController@delete');

// Data Vendor //
Route::get('vendor', 'Toko\VendorController@index');
Route::get('vendor/{id}', 'Toko\VendorController@getData');
Route::post('vendor', 'Toko\VendorController@store');
Route::put('vendor/{id}', 'Toko\VendorController@update');
Route::delete('vendor/{id}', 'Toko\VendorController@delete');

// Data Gudang //
Route::get('gudang', 'Toko\GudangController@index');
Route::get('gudang/{id}', 'Toko\GudangController@getData');
Route::post('gudang', 'Toko\GudangController@store');
Route::put('gudang/{id}', 'Toko\GudangController@update');
Route::delete('gudang/{id}', 'Toko\GudangController@delete');

// Data Kelompok Barang //
Route::get('barang-klp', 'Toko\KelompokBarangController@index');
Route::get('barang-klp/{id}', 'Toko\KelompokBarangController@getData');
Route::post('barang-klp', 'Toko\KelompokBarangController@store');
Route::put('barang-klp/{id}', 'Toko\KelompokBarangController@update');
Route::delete('barang-klp/{id}', 'Toko\KelompokBarangController@delete');

// Data Satuan Barang //
Route::get('barang-satuan', 'Toko\SatuanBarangController@index');
Route::get('barang-satuan/{id}', 'Toko\SatuanBarangController@getData');
Route::post('barang-satuan', 'Toko\SatuanBarangController@store');
Route::put('barang-satuan/{id}', 'Toko\SatuanBarangController@update');
Route::delete('barang-satuan/{id}', 'Toko\SatuanBarangController@delete');

// Data Barang //
Route::get('barang', 'Toko\BarangController@index');
Route::get('barang/{id}', 'Toko\BarangController@getData');
Route::post('barang', 'Toko\BarangController@store');
Route::put('barang/{id}', 'Toko\BarangController@update');
Route::delete('barang/{id}', 'Toko\BarangController@delete');

// Data Bonus //
Route::get('bonus', 'Toko\BonusController@index');
Route::get('bonus/{id}', 'Toko\BonusController@getData');
Route::post('bonus', 'Toko\BonusController@store');
Route::put('bonus/{id}', 'Toko\BonusController@update');
Route::delete('bonus/{id}', 'Toko\BonusController@delete');

// Data Unit //
Route::get('unit', 'Toko\UnitController@index');
Route::get('unit/{id}', 'Toko\UnitController@getData');
Route::post('unit', 'Toko\UnitController@store');
Route::put('unit/{id}', 'Toko\UnitController@update');
Route::delete('unit/{id}', 'Toko\UnitController@delete');

// Data Klp Menu //
Route::get('menu-klp', 'Toko\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'Toko\KelompokMenuController@getData');
Route::post('menu-klp', 'Toko\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'Toko\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'Toko\KelompokMenuController@delete');

// Data Karyawan //
Route::get('karyawan', 'Toko\KaryawanController@index');
Route::get('karyawan-detail/{id}', 'Toko\KaryawanController@getData');
Route::post('karyawan', 'Toko\KaryawanController@store');
Route::put('karyawan-ubah/{id}', 'Toko\KaryawanController@update');
Route::delete('karyawan/{id}', 'Toko\KaryawanController@delete');

// Data Akses //
Route::get('akses-user', 'Toko\AksesUserController@index');
Route::get('akses-user-detail/{id}', 'Toko\AksesUserController@getData');
Route::post('akses-user', 'Toko\AksesUserController@store');
Route::put('akses-user/{id}', 'Toko\AksesUserController@update');
Route::delete('akses-user/{id}', 'Toko\AksesUserController@delete');

// Data Form //
Route::get('form', 'Toko\FormController@index');
Route::get('form/{id}', 'Toko\FormController@getData');
Route::post('form', 'Toko\FormController@store');
Route::put('form/{id}', 'Toko\FormController@update');
Route::delete('form/{id}', 'Toko\FormController@delete');

// Setting Menu Form //
Route::get('menu/{id}', 'Toko\SettingMenuController@getData');
Route::post('menu', 'Toko\SettingMenuController@store');
Route::post('menu-move', 'Toko\SettingMenuController@storeMenu');
Route::put('menu/{kd_menu}/{kd_klp}', 'Toko\SettingMenuController@update');
Route::delete('menu/{kd_menu}/{kd_klp}', 'Toko\SettingMenuController@delete');

// Data Akun //
Route::get('masakun', 'Toko\MasakunController@index');
Route::get('masakun-detail/{id}', 'Toko\MasakunController@getData');
Route::post('masakun', 'Toko\MasakunController@store');
Route::put('masakun/{id}', 'Toko\MasakunController@update');
Route::delete('masakun/{id}', 'Toko\MasakunController@delete');

// Data Referensi Transaksi //
Route::get('reftrans', 'Toko\ReferensiTransController@index');
Route::get('reftrans-detail/{id}', 'Toko\ReferensiTransController@getData');
Route::post('reftrans', 'Toko\ReferensiTransController@store');
Route::put('reftrans/{id}', 'Toko\ReferensiTransController@update');
Route::delete('reftrans/{id}', 'Toko\ReferensiTransController@delete');

// Data Jasa Kirim //
Route::get('jasa-kirim', 'Toko\JasaKirimController@index');
Route::get('jasa-kirim-detail', 'Toko\JasaKirimController@getData');
Route::post('jasa-kirim', 'Toko\JasaKirimController@store');
Route::put('jasa-kirim', 'Toko\JasaKirimController@update');
Route::delete('jasa-kirim', 'Toko\JasaKirimController@delete');

// Data Customer //
Route::get('cust-ol', 'Toko\CustomerOLController@index');
Route::get('cust-ol/{id}', 'Toko\CustomerOLController@getData');
Route::post('cust-ol', 'Toko\CustomerOLController@store');
Route::put('cust-ol/{id}', 'Toko\CustomerOLController@update');
Route::delete('cust-ol/{id}', 'Toko\CustomerOLController@delete');

