<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Helper 
Route::get('setting-saldo-tahun','Rtrw\HelperController@getTahun');
Route::get('jenis-iuran','Rtrw\HelperController@getJenisIuran');
Route::get('masakun-curr','Rtrw\HelperController@getCurr');
Route::get('masakun-modul','Rtrw\HelperController@getModul');
Route::get('reftrans-kode/{jenis}','Rtrw\HelperController@getRef');
Route::get('reftrans-kas-masuk','Rtrw\HelperController@getRefKasMasuk');
Route::get('reftrans-kas-keluar','Rtrw\HelperController@getRefKasKeluar');
Route::get('reftrans-pindah-buku','Rtrw\HelperController@getRefPindahBuku');

//Master Satpam
Route::get('satpam','Rtrw\SatpamController@index');
Route::post('satpam','Rtrw\SatpamController@store');
Route::get('satpam/{id_satpam}','Rtrw\SatpamController@show');
Route::post('satpam/{id_satpam}','Rtrw\SatpamController@update');
Route::delete('satpam/{id_satpam}','Rtrw\SatpamController@destroy');
Route::post('satpam-generate-qrcode','Rtrw\SatpamController@generateQrCode');

//Master Blok
Route::get('blok','Rtrw\BlokController@index');
Route::get('blok/{blok}','Rtrw\BlokController@show');
Route::post('blok','Rtrw\BlokController@store');
Route::put('blok/{blok}','Rtrw\BlokController@update');
Route::delete('blok/{blok}','Rtrw\BlokController@destroy');

//Master PP
Route::get('pp','Rtrw\PpController@index');
Route::get('pp/{kode_pp}','Rtrw\PpController@show');
Route::post('pp','Rtrw\PpController@store');
Route::put('pp/{kode_pp}','Rtrw\PpController@update');
Route::delete('pp/{kode_pp}','Rtrw\PpController@destroy');

//Master Perlu
Route::get('perlu','Rtrw\KeperluanController@index');
Route::get('perlu/{kode_perlu}','Rtrw\KeperluanController@show');
Route::post('perlu','Rtrw\KeperluanController@store');
Route::put('perlu/{kode_perlu}','Rtrw\KeperluanController@update');
Route::delete('perlu/{kode_perlu}','Rtrw\KeperluanController@destroy');

//Master Rumah
Route::get('rumah','Rtrw\RumahController@index');
Route::get('rumah/{kode_rumah}','Rtrw\RumahController@show');
Route::post('rumah','Rtrw\RumahController@store');
Route::put('rumah/{kode_rumah}','Rtrw\RumahController@update');
Route::delete('rumah/{kode_rumah}','Rtrw\RumahController@destroy');

//Master Warga
Route::get('warga','Rtrw\WargaController@index');
Route::post('upload-warga','Rtrw\WargaController@upload');
Route::get('warga-detail/{no_bukti}','Rtrw\WargaController@show');
Route::post('warga','Rtrw\WargaController@store');
Route::post('warga/{no_bukti}','Rtrw\WargaController@update');
Route::delete('warga/{no_bukti}','Rtrw\WargaController@destroy');

//Master Akun
Route::get('masakun','Rtrw\MasakunController@index');
Route::get('masakun-detail/{kode}','Rtrw\MasakunController@show');
Route::post('masakun','Rtrw\MasakunController@store');
Route::put('masakun/{kode}','Rtrw\MasakunController@update');
Route::delete('masakun/{kode}','Rtrw\MasakunController@destroy');

//Master Relasi
Route::get('relakun-pp','Rtrw\RelakunPPController@index');
Route::get('relakun-pp-detail/{kode}','Rtrw\RelakunPPController@show');
Route::post('relakun-pp','Rtrw\RelakunPPController@store');
Route::put('relakun-pp/{kode}','Rtrw\RelakunPPController@update');
Route::delete('relakun-pp/{kode}','Rtrw\RelakunPPController@destroy');

//Master Referensi
Route::get('reftrans','Rtrw\ReferensiTransController@index');
Route::get('reftrans-detail/{kode}','Rtrw\ReferensiTransController@show');
Route::post('reftrans','Rtrw\ReferensiTransController@store');
Route::put('reftrans/{kode}','Rtrw\ReferensiTransController@update');
Route::delete('reftrans/{kode}','Rtrw\ReferensiTransController@destroy');

//Setting Saldo awal
Route::get('setting-saldo-awal','Rtrw\SaldoController@index');
// Route::get('reftrans-detail/{kode}','Rtrw\ReferensiTransController@show');
Route::post('setting-saldo-awal','Rtrw\SaldoController@store');
Route::put('setting-saldo-awal/{kode}/{pp}/{periode}','Rtrw\SaldoController@update');
Route::delete('setting-saldo-awal/{kode}/{pp}/{periode}','Rtrw\SaldoController@destroy');

//Generate iuran
Route::post('generate-iuran','Rtrw\IuranController@store');

//Master Lokasi
Route::get('lokasi','Rtrw\LokasiController@index');
Route::get('lokasi-detail/{kode}','Rtrw\LokasiController@show');
Route::post('lokasi','Rtrw\LokasiController@store');
Route::put('lokasi-ubah/{kode}','Rtrw\LokasiController@update');
Route::delete('lokasi/{kode}','Rtrw\LokasiController@destroy');


// Data Provinsi //
Route::get('provinsi', 'Rtrw\ProvinsiController@index');
Route::get('provinsi/{id}', 'Rtrw\ProvinsiController@getData');
Route::post('provinsi', 'Rtrw\ProvinsiController@store');
Route::put('provinsi/{id}', 'Rtrw\ProvinsiController@update');
Route::delete('provinsi/{id}', 'Rtrw\ProvinsiController@delete');
// Data Kota //
Route::get('kota', 'Rtrw\KotaController@index');
Route::get('kota/{id}', 'Rtrw\KotaController@getData');
Route::post('kota', 'Rtrw\KotaController@store');
Route::put('kota/{id}', 'Rtrw\KotaController@update');
Route::delete('kota/{id}', 'Rtrw\KotaController@delete');
// Data Camat //
Route::get('camat', 'Rtrw\CamatController@index');
Route::get('camat/{id}', 'Rtrw\CamatController@getData');
Route::post('camat', 'Rtrw\CamatController@store');
Route::put('camat/{id}', 'Rtrw\CamatController@update');
Route::delete('camat/{id}', 'Rtrw\CamatController@delete');
// Data Desa //
Route::get('desa', 'Rtrw\DesaController@index');
Route::get('desa/{id}', 'Rtrw\DesaController@getData');
Route::post('desa', 'Rtrw\DesaController@store');
Route::put('desa/{id}', 'Rtrw\DesaController@update');
Route::delete('desa/{id}', 'Rtrw\DesaController@delete');


// Data Jenis Iuran //
Route::get('jenis-iuran', 'Rtrw\JenisIuranController@index');
Route::get('jenis-iuran/{id}', 'Rtrw\JenisIuranController@getData');
Route::post('jenis-iuran', 'Rtrw\JenisIuranController@store');
Route::put('jenis-iuran/{id}', 'Rtrw\JenisIuranController@update');
Route::delete('jenis-iuran/{id}', 'Rtrw\JenisIuranController@delete');

// Data RW //
Route::get('rw', 'Rtrw\RwController@index');
Route::get('rw/{id}', 'Rtrw\RwController@getData');
Route::post('rw', 'Rtrw\RwController@store');
Route::post('rw-ubah', 'Rtrw\RwController@update');
Route::delete('rw/{id}', 'Rtrw\RwController@delete');

// Data RT //
Route::get('rt', 'Rtrw\RtController@index');
Route::get('rt/{id}', 'Rtrw\RtController@getData');
Route::post('rt', 'Rtrw\RtController@store');
Route::post('rt-ubah', 'Rtrw\RtController@update');
Route::delete('rt/{id}', 'Rtrw\RtController@delete');

//Master Warga Detail
Route::get('mawar','Rtrw\WargaDetailController@index');
Route::get('mawar-detail/{no_rumah}','Rtrw\WargaDetailController@show');
Route::put('mawar','Rtrw\WargaDetailController@store');


//Master Warga
Route::get('warga-masuk','Rtrw\WargaMasukController@index');
Route::get('generate-idwarga','Rtrw\WargaMasukController@generateIDWarga');
Route::get('warga-masuk-detail/{no_bukti}','Rtrw\WargaMasukController@show');
Route::get('warga-masuk-detail-list','Rtrw\WargaMasukController@showDetList');
Route::post('warga-masuk','Rtrw\WargaMasukController@store');
Route::post('warga-masuk/{no_bukti}','Rtrw\WargaMasukController@update');
Route::post('warga-masuk-ubahstatus','Rtrw\WargaMasukController@updateStatus');
Route::delete('warga-masuk/{no_bukti}','Rtrw\WargaMasukController@destroy');
Route::get('warga-keluar','Rtrw\WargaKeluarController@index');
Route::get('generate-idwarga-keluar','Rtrw\WargaKeluarController@generateIDWarga');
Route::get('warga-keluar-detail/{no_bukti}','Rtrw\WargaKeluarController@show');
Route::post('warga-keluar','Rtrw\WargaKeluarController@store');
Route::post('warga-keluar/{no_bukti}','Rtrw\WargaKeluarController@update');

// Data RW //
Route::get('pejabat', 'Rtrw\PejabatController@index');
Route::get('pejabat/{id}', 'Rtrw\PejabatController@getData');
Route::post('pejabat', 'Rtrw\PejabatController@store');
Route::post('pejabat-ubah', 'Rtrw\PejabatController@update');
Route::delete('pejabat/{id}', 'Rtrw\PejabatController@delete');

// Surat Pengantar //
Route::get('surat-pengantar', 'Rtrw\SuratPengantarController@index');
Route::get('surat-pengantar-detail/{id}', 'Rtrw\SuratPengantarController@show');
Route::get('generate-nosurat', 'Rtrw\SuratPengantarController@generateNBukti');
Route::post('surat-pengantar', 'Rtrw\SuratPengantarController@store');
Route::post('surat-pengantar/{id}', 'Rtrw\SuratPengantarController@update');
Route::delete('surat-pengantar/{id}', 'Rtrw\SuratPengantarController@destroy');


// Kas Masuk Routes //
Route::get('kas-masuk', 'Rtrw\KasMasukController@index');
Route::get('kas-masuk/{no_bukti}', 'Rtrw\KasMasukController@show');
Route::post('kas-masuk', 'Rtrw\KasMasukController@store');
Route::put('kas-masuk/{no_bukti}', 'Rtrw\KasMasukController@update');
Route::delete('kas-masuk/{no_bukti}', 'Rtrw\KasMasukController@destroy');

// Kas Kelyuar Routes //
Route::get('kas-keluar', 'Rtrw\KasKeluarController@index');
Route::get('kas-keluar/{no_bukti}', 'Rtrw\KasKeluarController@show');
Route::post('kas-keluar', 'Rtrw\KasKeluarController@store');
Route::put('kas-keluar/{no_bukti}', 'Rtrw\KasKeluarController@update');
Route::delete('kas-keluar/{no_bukti}', 'Rtrw\KasKeluarController@destroy');

// Pindah buku Routes //
Route::get('pindah-buku', 'Rtrw\PindahBukuController@index');
Route::get('pindah-buku/{no_bukti}', 'Rtrw\PindahBukuController@show');
Route::post('pindah-buku', 'Rtrw\PindahBukuController@store');
Route::put('pindah-buku/{no_bukti}', 'Rtrw\PindahBukuController@update');
Route::delete('pindah-buku/{no_bukti}', 'Rtrw\PindahBukuController@destroy');

//Format Laporan
Route::get('format-laporan','Rtrw\FormatLaporanController@show');
Route::post('format-laporan','Rtrw\FormatLaporanController@store');
Route::put('format-laporan','Rtrw\FormatLaporanController@update');
Route::delete('format-laporan','Rtrw\FormatLaporanController@destroy');
Route::get('format-laporan-versi','Rtrw\FormatLaporanController@getVersi');
Route::get('format-laporan-tipe','Rtrw\FormatLaporanController@getTipe');
Route::get('format-laporan-relakun','Rtrw\FormatLaporanController@getRelakun');
Route::post('format-laporan-relasi','Rtrw\FormatLaporanController@simpanRelasi');
Route::post('format-laporan-move','Rtrw\FormatLaporanController@simpanMove');