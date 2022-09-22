<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('cust-akun', 'Esaku\HelperController@getAkunCust');
Route::get('vendor-akun', 'Esaku\HelperController@getAkunVend');
Route::get('gudang-nik', 'Esaku\HelperController@getNIKGud');
Route::get('gudang-pp', 'Esaku\HelperController@getPPGud');
Route::get('barang-klp-pers', 'Esaku\HelperController@getAkunPersKelBar');
Route::get('barang-klp-pdpt', 'Esaku\HelperController@getAkunPdptKelBar');
Route::get('barang-klp-hpp', 'Esaku\HelperController@getAkunHPPKelBar');
Route::get('menu-klp', 'Esaku\HelperController@getKlpMenu');
Route::get('menu-form', 'Esaku\HelperController@getLabMenu');
Route::get('masakun-curr', 'Esaku\HelperController@getCurr');
Route::get('masakun-modul', 'Esaku\HelperController@getModul');
Route::get('reftrans-kode/{jenis}', 'Esaku\HelperController@getRef');
Route::get('reftrans-pemasukan', 'Esaku\HelperController@getRefPemasukan');
Route::get('reftrans-pengeluaran', 'Esaku\HelperController@getRefPengeluaran');
Route::get('reftrans-pindah-buku', 'Esaku\HelperController@getRefPindahBuku');

// Data Kelompok Barang //
Route::get('klp-barang', 'Esaku\Aktap\KelompokBarangAsetController@index');
Route::get('klp-barang-detail', 'Esaku\Aktap\KelompokBarangAsetController@show');
Route::post('klp-barang', 'Esaku\Aktap\KelompokBarangAsetController@store');
Route::put('klp-barang/{kode}', 'Esaku\Aktap\KelompokBarangAsetController@update');
Route::delete('klp-barang/{kode}', 'Esaku\Aktap\KelompokBarangAsetController@delete');

// Data Akun Aktiva Tetap //
Route::get('akun-aktiva-tetap', 'Esaku\Aktap\AkunAktivaTetapController@index');
Route::get('akun-aktiva-tetap-detail', 'Esaku\Aktap\AkunAktivaTetapController@show');
Route::post('akun-aktiva-tetap', 'Esaku\Aktap\AkunAktivaTetapController@store');
Route::put('akun-aktiva-tetap/{kode}', 'Esaku\Aktap\AkunAktivaTetapController@update');
Route::delete('akun-aktiva-tetap/{kode}', 'Esaku\Aktap\AkunAktivaTetapController@delete');

// Data Customer //
Route::get('cust', 'Esaku\Inventori\CustomerController@index');
Route::get('cust/{id}', 'Esaku\Inventori\CustomerController@getData');
Route::post('cust', 'Esaku\Inventori\CustomerController@store');
Route::put('cust/{id}', 'Esaku\Inventori\CustomerController@update');
Route::delete('cust/{id}', 'Esaku\Inventori\CustomerController@delete');

// Data Vendor //
Route::get('vendor', 'Esaku\Inventori\VendorController@index');
Route::get('vendor/{id}', 'Esaku\Inventori\VendorController@getData');
Route::post('vendor', 'Esaku\Inventori\VendorController@store');
Route::put('vendor/{id}', 'Esaku\Inventori\VendorController@update');
Route::delete('vendor/{id}', 'Esaku\Inventori\VendorController@delete');

// Data Gudang //
Route::get('gudang', 'Esaku\Inventori\GudangController@index');
Route::get('gudang/{id}', 'Esaku\Inventori\GudangController@getData');
Route::post('gudang', 'Esaku\Inventori\GudangController@store');
Route::put('gudang/{id}', 'Esaku\Inventori\GudangController@update');
Route::delete('gudang/{id}', 'Esaku\Inventori\GudangController@delete');

// Data Kelompok Barang //
Route::get('barang-klp', 'Esaku\Inventori\KelompokBarangController@index');
Route::get('barang-klp/{id}', 'Esaku\Inventori\KelompokBarangController@getData');
Route::post('barang-klp', 'Esaku\Inventori\KelompokBarangController@store');
Route::put('barang-klp/{id}', 'Esaku\Inventori\KelompokBarangController@update');
Route::delete('barang-klp/{id}', 'Esaku\Inventori\KelompokBarangController@delete');

// Data Satuan Barang //
Route::get('barang-satuan', 'Esaku\Inventori\SatuanBarangController@index');
Route::get('barang-satuan/{id}', 'Esaku\Inventori\SatuanBarangController@getData');
Route::post('barang-satuan', 'Esaku\Inventori\SatuanBarangController@store');
Route::put('barang-satuan/{id}', 'Esaku\Inventori\SatuanBarangController@update');
Route::delete('barang-satuan/{id}', 'Esaku\Inventori\SatuanBarangController@delete');

// Data Barang //
Route::get('barang', 'Esaku\Inventori\BarangController@index');
Route::get('barang/{id}', 'Esaku\Inventori\BarangController@getData');
Route::post('barang', 'Esaku\Inventori\BarangController@store');
Route::put('barang/{id}', 'Esaku\Inventori\BarangController@update');
Route::delete('barang/{id}', 'Esaku\Inventori\BarangController@delete');

// Data Bonus //
Route::get('bonus', 'Esaku\Inventori\BonusController@index');
Route::get('bonus/{id}', 'Esaku\Inventori\BonusController@getData');
Route::post('bonus', 'Esaku\Inventori\BonusController@store');
Route::put('bonus/{id}', 'Esaku\Inventori\BonusController@update');
Route::delete('bonus/{id}', 'Esaku\Inventori\BonusController@delete');

// Data Unit //
Route::get('unit', 'Esaku\Setting\UnitController@index');
Route::get('unit/{id}', 'Esaku\Setting\UnitController@getData');
Route::post('unit', 'Esaku\Setting\UnitController@store');
Route::put('unit/{id}', 'Esaku\Setting\UnitController@update');
Route::delete('unit/{id}', 'Esaku\Setting\UnitController@delete');

// Data Klp Menu //
Route::get('menu-klp', 'Esaku\Setting\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'Esaku\Setting\KelompokMenuController@getData');
Route::post('menu-klp', 'Esaku\Setting\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'Esaku\Setting\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'Esaku\Setting\KelompokMenuController@delete');

// Data Karyawan //
Route::get('karyawan', 'Esaku\Setting\KaryawanController@index');
Route::get('karyawan/{id}', 'Esaku\Setting\KaryawanController@getData');
Route::post('karyawan', 'Esaku\Setting\KaryawanController@store');
Route::post('karyawan-ubah/{id}', 'Esaku\Setting\KaryawanController@update');
Route::delete('karyawan/{id}', 'Esaku\Setting\KaryawanController@delete');

// Data Akses //
Route::get('akses-user', 'Esaku\Setting\AksesUserController@index');
Route::get('akses-user/{id}', 'Esaku\Setting\AksesUserController@getData');
Route::post('akses-user', 'Esaku\Setting\AksesUserController@store');
Route::put('akses-user/{id}', 'Esaku\Setting\AksesUserController@update');
Route::delete('akses-user/{id}', 'Esaku\Setting\AksesUserController@delete');

// Data Form //
Route::get('form', 'Esaku\Setting\FormController@index');
Route::get('form/{id}', 'Esaku\Setting\FormController@getData');
Route::post('form', 'Esaku\Setting\FormController@store');
Route::put('form/{id}', 'Esaku\Setting\FormController@update');
Route::delete('form/{id}', 'Esaku\Setting\FormController@delete');

// Setting Menu Form //
Route::get('setting-menu', 'Esaku\Setting\SettingMenuController@show');
Route::post('setting-menu', 'Esaku\Setting\SettingMenuController@store');
Route::post('setting-menu-move', 'Esaku\Setting\SettingMenuController@storeMove');
Route::put('setting-menu', 'Esaku\Setting\SettingMenuController@update');
Route::delete('setting-menu', 'Esaku\Setting\SettingMenuController@delete');
Route::post('setting-menu-csv', 'Esaku\Setting\SettingMenuController@storeCSV');

// Data Masakun //
Route::get('masakun', 'Esaku\Keuangan\MasakunController@index');
Route::get('masakun/{id}', 'Esaku\Keuangan\MasakunController@getData');
Route::post('masakun', 'Esaku\Keuangan\MasakunController@store');
Route::put('masakun/{id}', 'Esaku\Keuangan\MasakunController@update');
Route::delete('masakun/{id}', 'Esaku\Keuangan\MasakunController@delete');

// Data Referensi Transaksi //
Route::get('reftrans', 'Esaku\KasBank\ReferensiTransController@index');
Route::get('reftrans-detail/{id}', 'Esaku\KasBank\ReferensiTransController@getData');
Route::post('reftrans', 'Esaku\KasBank\ReferensiTransController@store');
Route::put('reftrans/{id}', 'Esaku\KasBank\ReferensiTransController@update');
Route::delete('reftrans/{id}', 'Esaku\KasBank\ReferensiTransController@delete');

// Data Jasa Kirim //
Route::get('jasa-kirim', 'Esaku\Inventori\JasaKirimController@index');
Route::get('jasa-kirim-detail', 'Esaku\Inventori\JasaKirimController@getData');
Route::post('jasa-kirim', 'Esaku\Inventori\JasaKirimController@store');
Route::put('jasa-kirim', 'Esaku\Inventori\JasaKirimController@update');
Route::delete('jasa-kirim', 'Esaku\Inventori\JasaKirimController@delete');

// Data Customer //
Route::get('cust-ol', 'Esaku\Inventori\CustomerOLController@index');
Route::get('cust-ol/{id}', 'Esaku\Inventori\CustomerOLController@getData');
Route::post('cust-ol', 'Esaku\Inventori\CustomerOLController@store');
Route::put('cust-ol/{id}', 'Esaku\Inventori\CustomerOLController@update');
Route::delete('cust-ol/{id}', 'Esaku\Inventori\CustomerOLController@delete');

//Format Laporan
Route::get('format-laporan', 'Esaku\Keuangan\FormatLaporanController@show');
Route::post('format-laporan', 'Esaku\Keuangan\FormatLaporanController@store');
Route::put('format-laporan', 'Esaku\Keuangan\FormatLaporanController@update');
Route::delete('format-laporan', 'Esaku\Keuangan\FormatLaporanController@destroy');
Route::get('format-laporan-versi', 'Esaku\Keuangan\FormatLaporanController@getVersi');
Route::get('format-laporan-tipe', 'Esaku\Keuangan\FormatLaporanController@getTipe');
Route::get('format-laporan-relakun', 'Esaku\Keuangan\FormatLaporanController@getRelakun');
Route::post('format-laporan-relasi', 'Esaku\Keuangan\FormatLaporanController@simpanRelasi');
Route::post('format-laporan-move', 'Esaku\Keuangan\FormatLaporanController@simpanMove');

// Data FS //
Route::get('fs', 'Esaku\Keuangan\FSController@index');
Route::get('fs/{id}', 'Esaku\Keuangan\FSController@getData');
Route::post('fs', 'Esaku\Keuangan\FSController@store');
Route::put('fs/{id}', 'Esaku\Keuangan\FSController@update');
Route::delete('fs/{id}', 'Esaku\Keuangan\FSController@delete');

// Data Flag Akun //
Route::get('flag-akun', 'Esaku\Keuangan\FlagAkunController@index');
Route::get('flag-akun/{id}', 'Esaku\Keuangan\FlagAkunController@getData');
Route::post('flag-akun', 'Esaku\Keuangan\FlagAkunController@store');
Route::put('flag-akun/{id}', 'Esaku\Keuangan\FlagAkunController@update');
Route::delete('flag-akun/{id}', 'Esaku\Keuangan\FlagAkunController@delete');

// Data Flag Relasi //
Route::get('flag-relasi', 'Esaku\Keuangan\FlagRelasiController@index');
Route::get('flag-relasi/{id}', 'Esaku\Keuangan\FlagRelasiController@getData');
Route::get('flag-relasi-akun', 'Esaku\Keuangan\FlagRelasiController@getAkun');
Route::put('flag-relasi/{id}', 'Esaku\Keuangan\FlagRelasiController@update');
Route::delete('flag-relasi/{id}', 'Esaku\Keuangan\FlagRelasiController@delete');

// Data Flag Relasi //
Route::get('periode-aktif', 'Esaku\Keuangan\PeriodeAktifController@index');
Route::post('periode-aktif', 'Esaku\Keuangan\PeriodeAktifController@store');
Route::get('periode-aktif/{id}', 'Esaku\Keuangan\PeriodeAktifController@show');
Route::get('periode-aktif-periode', 'Esaku\Keuangan\PeriodeAktifController@getPeriode');
Route::put('periode-aktif/{id}', 'Esaku\Keuangan\PeriodeAktifController@update');
Route::delete('periode-aktif/{id}', 'Esaku\Keuangan\PeriodeAktifController@destroy');

// Data Dok Jenis //
Route::get('dok-jenis', 'Esaku\Keuangan\JenisDokController@index');
Route::get('dok-jenis-detail', 'Esaku\Keuangan\JenisDokController@show');
Route::post('dok-jenis', 'Esaku\Keuangan\JenisDokController@store');
Route::put('dok-jenis', 'Esaku\Keuangan\JenisDokController@update');
Route::delete('dok-jenis', 'Esaku\Keuangan\JenisDokController@destroy');

Route::get('setting-grafik', 'Esaku\Setting\SettingGrafikController@index');
Route::get('setting-grafik-detail', 'Esaku\Setting\SettingGrafikController@show');
Route::post('setting-grafik', 'Esaku\Setting\SettingGrafikController@store');
Route::put('setting-grafik', 'Esaku\Setting\SettingGrafikController@update');
Route::delete('setting-grafik', 'Esaku\Setting\SettingGrafikController@destroy');
Route::get('setting-grafik-klp', 'Esaku\Setting\SettingGrafikController@getKlp');
Route::get('setting-grafik-neraca', 'Esaku\Setting\SettingGrafikController@getNeraca');

Route::get('setting-rasio', 'Esaku\Setting\SettingRasioController@index');
Route::get('setting-rasio-detail', 'Esaku\Setting\SettingRasioController@show');
Route::post('setting-rasio', 'Esaku\Setting\SettingRasioController@store');
Route::put('setting-rasio', 'Esaku\Setting\SettingRasioController@update');
Route::delete('setting-rasio', 'Esaku\Setting\SettingRasioController@destroy');
Route::get('setting-rasio-klp', 'Esaku\Setting\SettingRasioController@getKlp');
Route::get('setting-rasio-neraca', 'Esaku\Setting\SettingRasioController@getNeraca');

Route::get('msakundet', 'Esaku\Keuangan\MasakunDetailController@index');
Route::get('msakundet/{id}', 'Esaku\Keuangan\MasakunDetailController@getData');
Route::post('msakundet', 'Esaku\Keuangan\MasakunDetailController@store');
Route::put('msakundet/{id}', 'Esaku\Keuangan\MasakunDetailController@update');
Route::delete('msakundet/{id}', 'Esaku\Keuangan\MasakunDetailController@delete');

Route::get('msakundet-flag', 'Esaku\Keuangan\MasakunDetailController@getFlag');
Route::get('msakundet-neraca', 'Esaku\Keuangan\MasakunDetailController@getNeraca');



/*
|--------------------------------------------------------------------------
| Modul Simpanan -Master
|--------------------------------------------------------------------------
*/
Route::get('anggota', 'Esaku\Simpanan\Master\AnggotaController@index');
Route::get('anggota/{id}', 'Esaku\Simpanan\Master\AnggotaController@show');
Route::post('anggota', 'Esaku\Simpanan\Master\AnggotaController@store');
Route::put('anggota/{id}', 'Esaku\Simpanan\Master\AnggotaController@update');
Route::delete('anggota/{id}', 'Esaku\Simpanan\Master\AnggotaController@destroy');


// Data Master Jenis Simpanan
Route::get('jenis-simpanan', 'Esaku\Simpanan\Master\JenisSimpananController@index');
Route::get('jenis-simpanan/{id}', 'Esaku\Simpanan\Master\JenisSimpananController@show');
Route::post('jenis-simpanan', 'Esaku\Simpanan\Master\JenisSimpananController@store');
Route::put('jenis-simpanan/{id}', 'Esaku\Simpanan\Master\JenisSimpananController@update');
Route::delete('jenis-simpanan/{id}', 'Esaku\Simpanan\Master\JenisSimpananController@destroy');


// Data Master Akun -- (Data References)
Route::get('akun-simpanan', 'Esaku\Simpanan\Master\JenisSImpananController@getAkun');

//Data Master Kartu Simpanan
Route::get('kartu-simpanan', 'Esaku\Simpanan\Master\KartuSimpananController@index');
Route::get('kartu-simpanan/{id}', 'Esaku\Simpanan\Master\KartuSimpananController@show');
Route::post('kartu-simpanan', 'Esaku\Simpanan\Master\KartuSimpananController@store');
Route::put('kartu-simpanan', 'Esaku\Simpanan\Master\KartuSimpananController@update');
Route::delete('kartu-simpanan/{id}', 'Esaku\Simpanan\Master\KartuSimpananController@destroy');

/* --------------------------------------------------------------------------------------------------
BEGIN MODUL SDM
 --------------------------------------------------------------------------------------------------*/

// Data Loker //
Route::get('sdm-lokers', 'Esaku\Sdm\LokerController@index');
Route::get('sdm-loker', 'Esaku\Sdm\LokerController@show');
Route::get('sdm-loker-bm', 'Esaku\Sdm\LokerController@LokerByBm');
Route::post('sdm-loker', 'Esaku\Sdm\LokerController@store');
Route::post('sdm-loker-update', 'Esaku\Sdm\LokerController@update');
Route::delete('sdm-loker', 'Esaku\Sdm\LokerController@delete');

// Data Status Karyawan //
Route::get('sdm-statuss', 'Esaku\Sdm\StatusKaryawanController@index');
Route::get('sdm-status', 'Esaku\Sdm\StatusKaryawanController@show');
Route::post('sdm-status', 'Esaku\Sdm\StatusKaryawanController@store');
Route::post('sdm-status-update', 'Esaku\Sdm\StatusKaryawanController@update');
Route::delete('sdm-status', 'Esaku\Sdm\StatusKaryawanController@delete');

// Data Jabatan Karyawan //
Route::get('sdm-jabatans', 'Esaku\Sdm\JabatanSDMController@index');
Route::get('sdm-jabatan', 'Esaku\Sdm\JabatanSDMController@show');
Route::post('sdm-jabatan', 'Esaku\Sdm\JabatanSDMController@store');
Route::post('sdm-jabatan-update', 'Esaku\Sdm\JabatanSDMController@update');
Route::delete('sdm-jabatan', 'Esaku\Sdm\JabatanSDMController@delete');

// Data Golongan Karyawan //
Route::get('sdm-golongans', 'Esaku\Sdm\GolonganSDMController@index');
Route::get('sdm-golongan', 'Esaku\Sdm\GolonganSDMController@show');
Route::post('sdm-golongan', 'Esaku\Sdm\GolonganSDMController@store');
Route::post('sdm-golongan-update', 'Esaku\Sdm\GolonganSDMController@update');
Route::delete('sdm-golongan', 'Esaku\Sdm\GolonganSDMController@delete');

// Data Status Pajak Karyawan //
Route::get('sdm-pajaks', 'Esaku\Sdm\StatusPajakController@index');
Route::get('sdm-pajak', 'Esaku\Sdm\StatusPajakController@show');
Route::post('sdm-pajak', 'Esaku\Sdm\StatusPajakController@store');
Route::post('sdm-pajak-update', 'Esaku\Sdm\StatusPajakController@update');
Route::delete('sdm-pajak', 'Esaku\Sdm\StatusPajakController@delete');

// Data Unit Karyawan //
Route::get('sdm-units', 'Esaku\Sdm\UnitSDMController@index');
Route::get('sdm-unit', 'Esaku\Sdm\UnitSDMController@show');
Route::get('sdm-pp', 'Esaku\Sdm\UnitSDMController@getPP');
Route::post('sdm-unit', 'Esaku\Sdm\UnitSDMController@store');
Route::post('sdm-unit-update', 'Esaku\Sdm\UnitSDMController@update');
Route::delete('sdm-unit', 'Esaku\Sdm\UnitSDMController@delete');

// Data Profesi Karyawan //
Route::get('sdm-profesis', 'Esaku\Sdm\ProfesiSDMController@index');
Route::get('sdm-profesi', 'Esaku\Sdm\ProfesiSDMController@show');
Route::post('sdm-profesi', 'Esaku\Sdm\ProfesiSDMController@store');
Route::post('sdm-profesi-update', 'Esaku\Sdm\ProfesiSDMController@update');
Route::delete('sdm-profesi', 'Esaku\Sdm\ProfesiSDMController@delete');

// Data Agama Karyawan //
Route::get('sdm-agamas', 'Esaku\Sdm\AgamaSDMController@index');
Route::get('sdm-agama', 'Esaku\Sdm\AgamaSDMController@show');
Route::post('sdm-agama', 'Esaku\Sdm\AgamaSDMController@store');
Route::post('sdm-agama-update', 'Esaku\Sdm\AgamaSDMController@update');
Route::delete('sdm-agama', 'Esaku\Sdm\AgamaSDMController@delete');

// Data Jurusan Karyawam //
Route::get('sdm-jurusans', 'Esaku\Sdm\JurusanSDMController@index');
Route::get('sdm-jurusan', 'Esaku\Sdm\JurusanSDMController@show');
Route::post('sdm-jurusan', 'Esaku\Sdm\JurusanSDMController@store');
Route::post('sdm-jurusan-update', 'Esaku\Sdm\JurusanSDMController@update');
Route::delete('sdm-jurusan', 'Esaku\Sdm\JurusanSDMController@delete');

// Data Strata Karyawam //
Route::get('sdm-stratas', 'Esaku\Sdm\StrataSDMController@index');
Route::get('sdm-strata', 'Esaku\Sdm\StrataSDMController@show');
Route::post('sdm-strata', 'Esaku\Sdm\StrataSDMController@store');
Route::post('sdm-strata-update', 'Esaku\Sdm\StrataSDMController@update');
Route::delete('sdm-strata', 'Esaku\Sdm\StrataSDMController@delete');


//DATA AREA
Route::get('sdm-areas', 'Esaku\Sdm\AreaController@index');
Route::get('sdm-area', 'Esaku\Sdm\AreaController@show');
Route::post('sdm-area', 'Esaku\Sdm\AreaController@store');
Route::post('sdm-area-update', 'Esaku\Sdm\AreaController@update');
Route::delete('sdm-area', 'Esaku\Sdm\AreaController@delete');

//DATA FM
Route::get('sdm-fms', 'Esaku\Sdm\FmController@index');
Route::get('sdm-fm', 'Esaku\Sdm\FmController@show');
Route::post('sdm-fm', 'Esaku\Sdm\FmController@store');
Route::post('sdm-fm-update', 'Esaku\Sdm\FmController@update');
Route::delete('sdm-fm', 'Esaku\Sdm\FmController@delete');

//DATA BM
Route::get('sdm-bms', 'Esaku\Sdm\BmController@index');
Route::get('sdm-bm', 'Esaku\Sdm\BmController@show');
Route::post('sdm-bm', 'Esaku\Sdm\BmController@store');
Route::post('sdm-bm-update', 'Esaku\Sdm\BmController@update');
Route::delete('sdm-bm', 'Esaku\Sdm\BmController@delete');

//DATA WITEL
Route::get('sdm-witels', 'Esaku\Sdm\WitelController@index');
Route::get('sdm-witel', 'Esaku\Sdm\WitelController@show');
Route::post('sdm-witel', 'Esaku\Sdm\WitelController@store');
Route::post('sdm-witel-update', 'Esaku\Sdm\WitelController@update');
Route::delete('sdm-witel', 'Esaku\Sdm\WitelController@delete');

//DATA BANK
Route::get('sdm-banks', 'Esaku\Sdm\BankController@index');
Route::get('sdm-bank', 'Esaku\Sdm\BankController@show');
Route::post('sdm-bank', 'Esaku\Sdm\BankController@store');
Route::post('sdm-bank-update', 'Esaku\Sdm\BankController@update');
Route::delete('sdm-bank', 'Esaku\Sdm\BankController@delete');

//DATA KLIEN
Route::get('sdm-kliens', 'Esaku\Sdm\KlienController@index');
Route::get('sdm-klien', 'Esaku\Sdm\KlienController@show');
Route::post('sdm-klien', 'Esaku\Sdm\KlienController@store');
Route::post('sdm-klien-update', 'Esaku\Sdm\KlienController@update');
Route::delete('sdm-klien', 'Esaku\Sdm\KlienController@delete');

//DATA GAJI PARAM
Route::get('sdm-gaji-params', 'Esaku\Sdm\GajiParamController@index');
Route::get('sdm-gaji-param', 'Esaku\Sdm\GajiParamController@show');
Route::post('sdm-gaji-param', 'Esaku\Sdm\GajiParamController@store');
Route::post('sdm-gaji-param-update', 'Esaku\Sdm\GajiParamController@update');
Route::delete('sdm-gaji-param', 'Esaku\Sdm\GajiParamController@delete');

// additional routes for filter
Route::get('get-fm-area', 'Esaku\Sdm\FmController@getFmByArea');
Route::get('get-bm-fm', 'Esaku\Sdm\BmController@getBmByFm');
/* --------------------------------------------------------------------------------------------------
END MODUL SDM
 --------------------------------------------------------------------------------------------------*/
