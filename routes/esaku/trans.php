<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
// use Mike42\Escpos\Printer;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
// use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
// use Mike42\Escpos\PrintConnectors\FilePrintConnector;

// Mutasi Routes //
Route::get('generate-mutasi', 'Esaku\Inventori\MutasiController@generateKode');
Route::get('generate-hpp-mutasi', 'Esaku\Inventori\MutasiController@generateHpp');
Route::get('barang-mutasi-detail', 'Esaku\Inventori\MutasiController@getBarangDetail');
Route::get('filter-barang-mutasi', 'Esaku\HelperController@getFilterMutasiBarang');
Route::get('filter-bukti-mutasi-kirim', 'Esaku\HelperController@getFilterBuktiMutasiKirim');
Route::get('filter-bukti-mutasi-terima', 'Esaku\HelperController@getFilterBuktiMutasiTerima');
Route::get('barang-mutasi-kirim', 'Esaku\Inventori\MutasiController@getBarangMutasiKirim');
Route::get('mutasi-kirim', 'Esaku\Inventori\MutasiController@getMutasiKirim');
Route::get('mutasi-terima', 'Esaku\Inventori\MutasiController@getMutasiTerima');
Route::get('mutasi-detail', 'Esaku\Inventori\MutasiController@show');
Route::post('mutasi-barang', 'Esaku\Inventori\MutasiController@store');
Route::delete('mutasi-barang', 'Esaku\Inventori\MutasiController@destroy');
Route::put('mutasi-barang-update', 'Esaku\Inventori\MutasiController@update');

Route::post('send-whatsapp', 'Esaku\Setting\WAController@sendMessage');
Route::post('pooling', 'Esaku\Setting\WAController@storePooling');
Route::post('jurnal-notifikasi', 'Esaku\Keuangan\JurnalController@sendNotifikasi');

//Aktiva tetap //
Route::post('aktap', 'Esaku\Aktap\TransAktivaTetapController@store');

//Penjualan Routes //
Route::get('penjualan-open', 'Esaku\Inventori\PenjualanController@getNoOpen');
Route::get('penjualan-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Esaku\Inventori\PenjualanController@cekBonus');
Route::post('penjualan', 'Esaku\Inventori\PenjualanController@store');
Route::post('penjualan-ubah', 'Esaku\Inventori\PenjualanController@update');
Route::get('nota', 'Esaku\Inventori\PenjualanController@printNota');
Route::get('nota-tes', 'Esaku\Inventori\PenjualanController@printNotaJualBaru');

//Penjualan Routes //
Route::get('brghilang-open', 'Esaku\Inventori\BarangHilangController@getNoOpen');
Route::get('brghilang-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Esaku\Inventori\BarangHilangController@cekBonus');
Route::post('brghilang', 'Esaku\Inventori\BarangHilangController@store');
Route::post('brghilang-ubah', 'Esaku\Inventori\BarangHilangController@update');
// Route::get('nota', 'Esaku\Inventori\BarangHilangController@printNota');
// Route::get('nota-tes', 'Esaku\Inventori\BarangHilangController@printNotaJualBaru');

//Open Kasir //
Route::get('open-kasir', 'Esaku\Inventori\OpenKasirController@index');
Route::post('open-kasir', 'Esaku\Inventori\OpenKasirController@store');
Route::put('open-kasir', 'Esaku\Inventori\OpenKasirController@update');
Route::delete('open-kasir', 'Esaku\Inventori\OpenKasirController@delete');

//Close Kasir //
Route::get('close-kasir-new', 'Esaku\Inventori\CloseKasirController@indexNew');
Route::get('close-kasir-finish', 'Esaku\Inventori\CloseKasirController@indexFinish');
Route::get('close-kasir-detail/{no_open}', 'Esaku\Inventori\CloseKasirController@getData');
Route::post('close-kasir', 'Esaku\Inventori\CloseKasirController@store');

//Closing Toko//
Route::get('close-toko', 'Esaku\Inventori\CloseTokoController@index');
Route::get('close-toko-nobukti','Esaku\Inventori\CloseTokoController@GenerateBukti');
Route::get('close-toko-data','Esaku\Inventori\CloseTokoController@loadData');
Route::get('close-toko-data-detail','Esaku\Inventori\CloseTokoController@loadDataDetail');
Route::get('close-toko-data-pnj','Esaku\Inventori\CloseTokoController@loadDataPenjualan');
Route::get('close-toko-data-beli','Esaku\Inventori\CloseTokoController@loadDataBeli');
Route::post('close-toko', 'Esaku\Inventori\CloseTokoController@store');
//sync waktu close toko
Route::get('sync-pmb-ct', 'Esaku\Inventori\CloseTokoController@getSyncCT');
Route::post('sync-pmb-ct', 'Esaku\Inventori\CloseTokoController@syncPmbCT');
Route::post('sync-update', 'Esaku\Inventori\CloseTokoController@syncUpdate');

// Pembelian Routes //
Route::get('pembelian', 'Esaku\Inventori\PembelianController@index');
Route::get('pembelian-barang', 'Esaku\Inventori\PembelianController@getBarang');
Route::post('pembelian', 'Esaku\Inventori\PembelianController@store');
Route::post('pembelian-detail', 'Esaku\Inventori\PembelianController@storeDetail');
Route::get('pembelian-detail-tmp', 'Esaku\Inventori\PembelianController@showDetail');
Route::put('pembelian-update', 'Esaku\Inventori\PembelianController@update');
Route::post('pembelian-detail-ubah', 'Esaku\Inventori\PembelianController@updateDetail');
Route::delete('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\Inventori\PembelianController@delete');
Route::get('pembelian-detail', 'Esaku\Inventori\PembelianController@show');
Route::get('pembelian-nota', 'Esaku\Inventori\PembelianController@printNota');
Route::get('pembelian-data-nota', 'Esaku\Inventori\PembelianController@getDataNota');
Route::delete('pembelian-detail-tmp', 'Esaku\Inventori\PembelianController@clearTmp');
Route::delete('pembelian-detail', 'Esaku\Inventori\PembelianController@destroyDetail');

// Pembelian 3 Routes //
Route::get('pembelian3', 'Esaku\Inventori\Pembelian3Controller@index');
Route::get('pembelian3-barang', 'Esaku\Inventori\Pembelian3Controller@getBarang'); //udah
Route::post('pembelian3', 'Esaku\Inventori\Pembelian3Controller@store'); //udah
Route::put('pembelian3-update', 'Esaku\Inventori\Pembelian3Controller@update');
Route::delete('pembelian3/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\Inventori\Pembelian3Controller@delete');
Route::get('pembelian3-detail', 'Esaku\Inventori\Pembelian3Controller@show');
Route::get('pembelian3-nota', 'Esaku\Inventori\Pembelian3Controller@printNota'); //udah
Route::get('pembelian3-data-nota', 'Esaku\Inventori\Pembelian3Controller@getDataNota'); //udah

//Pembelian Non PPN
Route::get('pembelian4-barang', 'Esaku\Inventori\PembelianNonPPNController@getBarang');
Route::get('pembelian4-data-nota', 'Esaku\Inventori\PembelianNonPPNController@getDataNota');
Route::get('pembelian4-nota', 'Esaku\Inventori\PembelianNonPPNController@printNota');
Route::post('pembelian4', 'Esaku\Inventori\PembelianNonPPNController@store');


// Retur Pembelian //
Route::post('retur-beli', 'Esaku\Inventori\ReturBeliController@store');
Route::delete('retur-beli', 'Esaku\Inventori\ReturBeliController@delete');
Route::get('retur-beli-new', 'Esaku\Inventori\ReturBeliController@getNew');
Route::get('retur-beli-finish', 'Esaku\Inventori\ReturBeliController@getFinish');
Route::get('retur-beli-barang/{no_bukti1}/{no_bukti2}/{no_bukti3}/{no_bukti4}', 'Esaku\Inventori\ReturBeliController@getBarang');
Route::get('retur-beli-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}/{no_bukti4}', 'Esaku\Inventori\ReturBeliController@show');


// Pemasukan Routes //
Route::get('pemasukan', 'Esaku\KasBank\PemasukanController@index');
Route::get('pemasukan/{no_bukti}', 'Esaku\KasBank\PemasukanController@show');
Route::post('pemasukan', 'Esaku\KasBank\PemasukanController@store');
Route::put('pemasukan/{no_bukti}', 'Esaku\KasBank\PemasukanController@update');
Route::delete('pemasukan/{no_bukti}', 'Esaku\KasBank\PemasukanController@destroy');

// Pemasukan Routes //
Route::get('pengeluaran', 'Esaku\KasBank\PengeluaranController@index');
Route::get('pengeluaran/{no_bukti}', 'Esaku\KasBank\PengeluaranController@show');
Route::post('pengeluaran', 'Esaku\KasBank\PengeluaranController@store');
Route::put('pengeluaran/{no_bukti}', 'Esaku\KasBank\PengeluaranController@update');
Route::delete('pengeluaran/{no_bukti}', 'Esaku\KasBank\PengeluaranController@destroy');

// Pindah buku Routes //
Route::get('pindah-buku', 'Esaku\KasBank\PindahBukuController@index');
Route::get('pindah-buku/{no_bukti}', 'Esaku\KasBank\PindahBukuController@show');
Route::post('pindah-buku', 'Esaku\KasBank\PindahBukuController@store');
Route::put('pindah-buku/{no_bukti}', 'Esaku\KasBank\PindahBukuController@update');
Route::delete('pindah-buku/{no_bukti}', 'Esaku\KasBank\PindahBukuController@destroy');

// Daftar Penjualan //
Route::get('daftar-penjualan', 'Esaku\Inventori\DaftarPenjualanController@index');
Route::get('daftar-penjualandetail', 'Esaku\Inventori\DaftarPenjualanController@show');

//Penjualan OL //
Route::get('penjualan-langsung-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Esaku\Inventori\PenjualanLangsungController@cekBonus');
Route::post('penjualan-langsung', 'Esaku\Inventori\PenjualanLangsungController@store');

// Data Provinsi //
Route::get('provinsi', 'Esaku\Inventori\PenjualanLangsungController@getProvinsi');
Route::get('kota', 'Esaku\Inventori\PenjualanLangsungController@getKota');
Route::get('kecamatan', 'Esaku\Inventori\PenjualanLangsungController@getKecamatan');
Route::get('service', 'Esaku\Inventori\PenjualanLangsungController@getService');

Route::get('barcode-load', 'Esaku\Inventori\BarcodeController@loadData');
Route::get('periode', 'Esaku\Inventori\BarcodeController@getPeriode');
Route::post('barcode', 'Esaku\Inventori\BarcodeController@store');

Route::get('/jurnal', 'Esaku\Keuangan\JurnalController@index');
Route::post('/jurnal', 'Esaku\Keuangan\JurnalController@store');
Route::get('/jurnal/{id}', 'Esaku\Keuangan\JurnalController@show');
Route::post('/jurnal/{id}', 'Esaku\Keuangan\JurnalController@update');
Route::delete('/jurnal/{id}', 'Esaku\Keuangan\JurnalController@destroy');
Route::get('/pp', 'Esaku\Keuangan\JurnalController@getPP');
Route::get('/akun', 'Esaku\Keuangan\JurnalController@getAkun');
Route::get('/nikperiksa', 'Esaku\Keuangan\JurnalController@getNIKPeriksa');
Route::get('/nikperiksa/{nik}', 'Esaku\Keuangan\JurnalController@getNIKPeriksaByNIK');
Route::get('/jurnal-periode', 'Esaku\Keuangan\JurnalController@getPeriodeJurnal');
Route::post('/import-excel', 'Esaku\Keuangan\JurnalController@importExcel');
Route::get('jurnal-tmp', 'Esaku\Keuangan\JurnalController@getJurnalTmp');

Route::get('/inv-hitung-hpp', 'Esaku\Keuangan\HPPController@index');
Route::get('/inv-hitung-hpp-load', 'Esaku\Keuangan\HPPController@loadData');
Route::post('/inv-hitung-hpp', 'Esaku\Keuangan\HPPController@store');
Route::get('/inv-hitung-hpp/{id}', 'Esaku\Keuangan\HPPController@show');
Route::post('/inv-hitung-hpp/{id}', 'Esaku\Keuangan\HPPController@update');
Route::delete('/inv-hitung-hpp/{id}', 'Esaku\Keuangan\HPPController@destroy');


Route::get('kas-bank', 'Esaku\KasBank\KasBankController@index');
Route::post('kas-bank', 'Esaku\KasBank\KasBankController@store');
Route::get('kas-bank/{id}', 'Esaku\KasBank\KasBankController@show');
Route::put('kas-bank/{id}', 'Esaku\KasBank\KasBankController@update');
Route::delete('kas-bank/{id}', 'Esaku\KasBank\KasBankController@destroy');
Route::post('kas-bank-import-excel', 'Esaku\KasBank\KasBankController@importExcel');
Route::get('kas-bank-tmp', 'Esaku\KasBank\KasBankController@getDataTmp');

Route::get('uang-masuk', 'Esaku\KasBank\UangMasukController@index');
Route::post('uang-masuk', 'Esaku\KasBank\UangMasukController@store');
Route::get('uang-masuk/{id}', 'Esaku\KasBank\UangMasukController@show');
Route::post('uang-masuk/{id}', 'Esaku\KasBank\UangMasukController@update');
Route::delete('uang-masuk/{id}', 'Esaku\KasBank\UangMasukController@destroy');
Route::post('uang-masuk-import-excel', 'Esaku\KasBank\UangMasukController@importExcel');
Route::get('uang-masuk-tmp', 'Esaku\KasBank\UangMasukController@getDataTmp');


Route::get('uang-keluar', 'Esaku\KasBank\UangKeluarController@index');
Route::post('uang-keluar', 'Esaku\KasBank\UangKeluarController@store');
Route::get('uang-keluar/{id}', 'Esaku\KasBank\UangKeluarController@show');
Route::post('uang-keluar/{id}', 'Esaku\KasBank\UangKeluarController@update');
Route::delete('uang-keluar/{id}', 'Esaku\KasBank\UangKeluarController@destroy');
Route::post('uang-keluar-import-excel', 'Esaku\KasBank\UangKeluarController@importExcel');
Route::get('uang-keluar-tmp', 'Esaku\KasBank\UangKeluarController@getDataTmp');

Route::get('terima-dari', 'Esaku\KasBank\UangMasukController@getTerimaDari');
Route::get('akun-terima', 'Esaku\KasBank\UangMasukController@getAkunTerima');

Route::get('sync-master', 'Esaku\Inventori\SyncController@getSyncMaster');
Route::post('sync-master', 'Esaku\Inventori\SyncController@syncMaster');

Route::get('sync-pnj', 'Esaku\Inventori\SyncController@getSyncPnj');
Route::get('sync-pnj-detail', 'Esaku\Inventori\SyncController@getSyncPnjDetail');
Route::post('sync-pnj', 'Esaku\Inventori\SyncController@syncPnj');

Route::get('sync-pmb', 'Esaku\Inventori\SyncController@getSyncPmb');
Route::get('sync-pmb-detail', 'Esaku\Inventori\SyncController@getSyncPmbDetail');
Route::post('sync-pmb', 'Esaku\Inventori\SyncController@syncPmb');

Route::get('sync-retur-beli', 'Esaku\Inventori\SyncController@getSyncReturBeli');
Route::get('sync-retur-beli-detail', 'Esaku\Inventori\SyncController@getSyncReturBeliDetail');
Route::post('sync-retur-beli', 'Esaku\Inventori\SyncController@syncReturBeli');

Route::get('modultrans', 'Esaku\Keuangan\PostingController@getModul');
Route::post('loadJurnal', 'Esaku\Keuangan\PostingController@loadJurnal');
Route::post('posting', 'Esaku\Keuangan\PostingController@store');
Route::post('unposting-jurnal', 'Esaku\Keuangan\UnPostingController@loadJurnal');
Route::post('unposting', 'Esaku\Keuangan\UnPostingController@store');

Route::get('jurnal-dok', 'Esaku\Keuangan\UploadDokJurnalController@show');
Route::post('jurnal-dok', 'Esaku\Keuangan\UploadDokJurnalController@store');
Route::delete('jurnal-dok', 'Esaku\Keuangan\UploadDokJurnalController@destroy');

Route::get('kas-bank-dok', 'Esaku\KasBank\UploadDokKasBankController@show');
Route::post('kas-bank-dok', 'Esaku\KasBank\UploadDokKasBankController@store');
Route::delete('kas-bank-dok', 'Esaku\KasBank\UploadDokKasBankController@destroy');

//Closing Periode
Route::get('closing-periode', 'Esaku\Keuangan\ClosingPeriodeController@show');
Route::post('closing-periode', 'Esaku\Keuangan\ClosingPeriodeController@store');

Route::get('jurnal-penutup-list', 'Esaku\Keuangan\JurnalPenutupController@index');
Route::get('jurnal-penutup', 'Esaku\Keuangan\JurnalPenutupController@getDataAwal');
Route::post('jurnal-penutup', 'Esaku\Keuangan\JurnalPenutupController@store');

Route::post('sawal-upload', 'Esaku\Keuangan\SawalController@importExcel');
Route::get('sawal-load', 'Esaku\Keuangan\SawalController@getSawalTmp');
Route::post('sawal', 'Esaku\Keuangan\SawalController@store');

Route::post('jurnal-upload-upload', 'Esaku\Keuangan\JurnalUploadController@importExcel');
Route::get('jurnal-upload-load', 'Esaku\Keuangan\JurnalUploadController@getJurnalUploadTmp');
Route::post('jurnal-upload', 'Esaku\Keuangan\JurnalUploadController@store');

Route::post('akun-upload', 'Esaku\Keuangan\AkunController@importExcel');
Route::get('akun-load', 'Esaku\Keuangan\AkunController@getAkunTmp');
Route::post('akun', 'Esaku\Keuangan\AkunController@store');

//Open Toko
Route::get('open-toko', 'Esaku\Inventori\OpenTokoController@index');
Route::get('open-toko/{id}', 'Esaku\Inventori\OpenTokoController@getData');
Route::post('open-toko', 'Esaku\Inventori\OpenTokoController@store');
Route::put('open-toko/{id}', 'Esaku\Inventori\OpenTokoController@update');
Route::delete('open-toko/{id}', 'Esaku\Inventori\OpenTokoController@delete');

//Pembayaran Vendor
Route::get('pembayaran-vendor', 'Esaku\Inventori\PembayaranVendorController@index');
Route::get('pembayaran-nobukti','Esaku\Inventori\PembayaranVendorController@GenerateBukti');
Route::get('pembayaran-list', 'Esaku\Inventori\PembayaranVendorController@getData');
Route::get('pembayaran-bayar', 'Esaku\Inventori\PembayaranVendorController@show');
Route::post('pembayaran-simpan', 'Esaku\Inventori\PembayaranVendorController@store');

//Konsinyasi Pembelian
Route::get('get-nobeli', 'Esaku\Inventori\KonsinyasiPembController@getNoBeli');
Route::get('get-vendor', 'Esaku\Inventori\KonsinyasiPembController@getVendor');
Route::get('get-nohutang', 'Esaku\Inventori\KonsinyasiPembController@getHutang');
Route::get('konsinyasi-nobukti','Esaku\Inventori\KonsinyasiPembController@GenerateBukti');
Route::get('get-loaddata', 'Esaku\Inventori\KonsinyasiPembController@getLoadData');
Route::get('konsinyasi-index', 'Esaku\Inventori\KonsinyasiPembController@index');
Route::post('konsinyasi-bayar', 'Esaku\Inventori\KonsinyasiPembController@store');
Route::put('konsinyasi-bayar', 'Esaku\Inventori\KonsinyasiPembController@update');
Route::delete('konsinyasi-bayar/{id}', 'Esaku\Inventori\KonsinyasiPembController@delete');

// Stok Opname //
Route::get('stok-opname', 'Esaku\Inventori\StokOpnameController@index');
Route::get('stok-nobukti','Esaku\Inventori\StokOpnameController@GenerateBukti');
Route::get('get-loaddata-stok', 'Esaku\Inventori\StokOpnameController@getLoadData');
Route::post('stok-opname', 'Esaku\Inventori\StokOpnameController@store');

// Pembayaran Pembelian
Route::get('bayar-beli', 'Esaku\Inventori\PembayaranPembelianController@index');
Route::get('bayar-beli-nobukti','Esaku\Inventori\PembayaranPembelianController@GenerateBukti');
Route::get('bayar-beli-vendor', 'Esaku\Inventori\PembayaranPembelianController@getVendor');
Route::get('bayar-beli-detail', 'Esaku\Inventori\PembayaranPembelianController@getDetailPembelian');
Route::post('bayar-beli', 'Esaku\Inventori\PembayaranPembelianController@store');
Route::delete('bayar-beli', 'Esaku\Inventori\PembayaranPembelianController@destroy');

// Pembelian (PPn) //
Route::get('pembelian3-ppn', 'Esaku\Inventori\PembelianPPnController@index');
Route::get('pembelian3-ppn-barang', 'Esaku\Inventori\PembelianPPnController@getBarang');
Route::post('pembelian3-ppn', 'Esaku\Inventori\PembelianPPnController@store'); 
Route::put('pembelian3-ppn-update', 'Esaku\Inventori\PembelianPPnController@update');
Route::delete('pembelian3-ppn/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\Inventori\PembelianPPnController@delete');
Route::get('pembelian3-ppn-detail', 'Esaku\Inventori\PembelianPPnController@show');
Route::get('pembelian3-ppn-nota', 'Esaku\Inventori\PembelianPPnController@printNota'); 
Route::get('pembelian3-ppn-data-nota', 'Esaku\Inventori\PembelianPPnController@getDataNota'); 

// Pembelian (Non PPn) //
Route::get('pembelian3-non', 'Esaku\Inventori\PembelianNonPPn2Controller@index');
Route::get('pembelian3-non-barang', 'Esaku\Inventori\PembelianNonPPn2Controller@getBarang');
Route::post('pembelian3-non', 'Esaku\Inventori\PembelianNonPPn2Controller@store'); 
Route::put('pembelian3-non-update', 'Esaku\Inventori\PembelianNonPPn2Controller@update');
Route::delete('pembelian3-non/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\Inventori\PembelianNonPPn2Controller@delete');
Route::get('pembelian3-non-detail', 'Esaku\Inventori\PembelianNonPPn2Controller@show');
Route::get('pembelian3-non-nota', 'Esaku\Inventori\PembelianNonPPn2Controller@printNota'); 
Route::get('pembelian3-non-data-nota', 'Esaku\Inventori\PembelianNonPPn2Controller@getDataNota');

//Barang Hilang/Rusak/Kadaluarsa //
// Route::get('penjualan-open', 'Esaku\Inventori\BarangHilangController@getNoOpen');
// Route::get('penjualan-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Esaku\Inventori\BarangHilangController@cekBonus');
// Route::post('penjualan', 'Esaku\Inventori\BarangHilangController@store');
// Route::post('penjualan-ubah', 'Esaku\Inventori\BarangHilangController@update');
// Route::get('nota', 'Esaku\Inventori\BarangHilangController@printNota');
// Route::get('nota-tes', 'Esaku\Inventori\BarangHilangController@printNotaJualBaru');


/*
|--------------------------------------------------------------------------
| Modul Simpanan -Transaksi
|--------------------------------------------------------------------------
*/
Route::get('akru-simp', 'Esaku\Simpanan\Transaksi\AkruBillingController@index');
Route::get('show-akru/{no_bukti}', 'Esaku\Simpanan\Transaksi\AkruBillingController@show');
Route::get('akru-simp-jurnal/{tanggal}', 'Esaku\Simpanan\Transaksi\AkruBillingController@loadJurnal');
Route::post('akru-simp-jurnal', 'Esaku\Simpanan\Transaksi\AkruBillingController@store');
Route::post('update-akru-simp-jurnal', 'Esaku\Simpanan\Transaksi\AkruBillingController@update');
Route::delete('akru-simp/{no_bukti}', 'Esaku\Simpanan\Transaksi\AkruBillingController@destroy');


/*transaksi reverse akru simpanan*/
Route::get('reverse-akru-simp', 'Esaku\Simpanan\Transaksi\ReverseController@index');
Route::get('reverse-get-anggota', 'Esaku\Simpanan\Transaksi\ReverseController@getAnggota');
Route::get('reverse-akru-simp-nokartu/{no_agg}', 'Esaku\Simpanan\Transaksi\ReverseController@getKartuSimpanan');
Route::post('load-reverse-akru', 'Esaku\Simpanan\Transaksi\ReverseController@loadData');
Route::post('reverse-akru-simp', 'Esaku\Simpanan\Transaksi\ReverseController@store');
Route::delete('reverse-akru-simp/{no_bukti}', 'Esaku\Simpanan\Transaksi\ReverseController@destroy');

/*transaksi penerimaan simpanan tunai  */
Route::get('terima-simp-akunkas', 'Esaku\Simpanan\Transaksi\PenerimaanTunaiController@getAkun');
Route::get('terima-simp-tagihan/{no_agg}', 'Esaku\Simpanan\Transaksi\PenerimaanTunaiController@loadTagihan');
Route::post('terima-simp', 'Esaku\Simpanan\Transaksi\PenerimaanTunaiController@store');


// Transaksi Aktiva Tetap
## Percepatan Reguler
Route::get('hitung-reguler', 'Esaku\Aktap\PenyusutanRegulerController@hitungPenyusutan');
Route::post('susut-reguler', 'Esaku\Aktap\PenyusutanRegulerController@store');

## Percepatan Penyusutan
Route::post('percepatan-penyusutan', 'Esaku\Aktap\PercepatanPenyusutanController@store');
Route::get('percepatan-aktap', 'Esaku\Aktap\PercepatanPenyusutanController@getAktap');
Route::get('percepatan-data-aktap', 'Esaku\Aktap\PercepatanPenyusutanController@getDataAktap');

## Penghapusan Aktiva
Route::get('penghapusan-data', 'Esaku\Aktap\PenghapusanAktapController@index');
Route::get('penghapusan-aktap', 'Esaku\Aktap\PenghapusanAktapController@getAktap');
Route::get('penghapusan-akun', 'Esaku\Aktap\PenghapusanAktapController@getAkunBeban');
Route::get('penghapusan-show', 'Esaku\Aktap\PenghapusanAktapController@getData');
Route::get('penghapusan-data-aktap', 'Esaku\Aktap\PenghapusanAktapController@getDataAktap');
Route::post('penghapusan-aktiva', 'Esaku\Aktap\PenghapusanAktapController@store');
Route::delete('penghapusan-aktiva-hapus', 'Esaku\Aktap\PenghapusanAktapController@delete');
Route::put('penghapusan-aktiva-ubah', 'Esaku\Aktap\PenghapusanAktapController@update');

## Pembatalan Penyusutan
Route::get('pembatalan-aktap', 'Esaku\Aktap\PembatalanPenyusutanController@getAktap');
Route::get('pembatalan-data-aktap', 'Esaku\Aktap\PembatalanPenyusutanController@getDataAktap');
Route::post('pembatalan-penyusutan', 'Esaku\Aktap\PembatalanPenyusutanController@store');

## Edit Aktiva Tetap
Route::get('edit-show-aktap', 'Esaku\Aktap\EditAktapController@getAktap');
Route::get('edit-data-aktap', 'Esaku\Aktap\EditAktapController@getDataAktap');
Route::put('edit-aktap', 'Esaku\Aktap\EditAktapController@store');
Route::delete('edit-aktap', 'Esaku\Aktap\EditAktapController@delete');

## Upload Data Anggaran
Route::post('import-anggaran-excel', 'Esaku\Anggaran\UploadAnggaranController@importExcel');
Route::post('simpan-anggaran', 'Esaku\Anggaran\UploadAnggaranController@store');
Route::get('load-anggaran', 'Esaku\Anggaran\UploadAnggaranController@loadAnggaran');

## Pengajuan RRA
Route::get('pengajuan-rra', 'Esaku\Anggaran\PengajuanAnggaranController@index');
Route::get('pengajuan-rra-detail', 'Esaku\Anggaran\PengajuanAnggaranController@show');
Route::post('pengajuan-rra', 'Esaku\Anggaran\PengajuanAnggaranController@store');
Route::delete('pengajuan-rra', 'Esaku\Anggaran\PengajuanAnggaranController@delete');
Route::put('pengajuan-rra-ubah', 'Esaku\Anggaran\PengajuanAnggaranController@update');
Route::get('nik-approve', 'Esaku\Anggaran\PengajuanAnggaranController@getNikApprove');
Route::get('pp-terima', 'Esaku\Anggaran\PengajuanAnggaranController@getPPTerima');
Route::get('akun-terima', 'Esaku\Anggaran\PengajuanAnggaranController@getAkunTerima');
Route::get('mata-anggaran', 'Esaku\Anggaran\PengajuanAnggaranController@getMataAnggaran');
Route::get('pp-anggaran', 'Esaku\Anggaran\PengajuanAnggaranController@getPPAnggaran');
Route::get('cek-saldo', 'Esaku\Anggaran\PengajuanAnggaranController@getSaldoAnggaran');

## Approve RRA
Route::get('rra-anggaran', 'Esaku\Anggaran\ApproveAnggaranController@getRRAAnggaran');
Route::get('rra-data', 'Esaku\Anggaran\ApproveAnggaranController@getDataRRAAnggaran');
Route::post('approve-rra', 'Esaku\Anggaran\ApproveAnggaranController@store');

## SDM Kepegawaian
Route::get('sdm-karyawans', 'Esaku\Sdm\KepegawaianController@index');
Route::get('sdm-karyawan', 'Esaku\Sdm\KepegawaianController@show');
Route::post('sdm-karyawan', 'Esaku\Sdm\KepegawaianController@store');
Route::post('sdm-karyawan-update', 'Esaku\Sdm\KepegawaianController@update');
Route::delete('sdm-karyawan', 'Esaku\Sdm\KepegawaianController@delete');

Route::get('v2/sdm-karyawans', 'Esaku\Sdm\KepegawaianV2Controller@index');
Route::get('v2/sdm-karyawan', 'Esaku\Sdm\KepegawaianV2Controller@show');
Route::post('v2/sdm-karyawan', 'Esaku\Sdm\KepegawaianV2Controller@store');
Route::post('v2/sdm-karyawan-update', 'Esaku\Sdm\KepegawaianV2Controller@update');
Route::delete('v2/sdm-karyawan', 'Esaku\Sdm\KepegawaianV2Controller@delete');

Route::get('v3/sdm-karyawans', 'Esaku\Sdm\KepegawaianV3Controller@index');
Route::get('v3/sdm-karyawan', 'Esaku\Sdm\KepegawaianV3Controller@show');
Route::post('v3/sdm-karyawan', 'Esaku\Sdm\KepegawaianV3Controller@store');
Route::post('v3/sdm-karyawan-update', 'Esaku\Sdm\KepegawaianV3Controller@update');
Route::delete('v3/sdm-karyawan', 'Esaku\Sdm\KepegawaianV3Controller@delete');

Route::get('v3/sdm-kontraks', 'Esaku\Sdm\KepegawaianV3Controller@get_kontrak');
Route::get('v3/sdm-kontrak', 'Esaku\Sdm\KepegawaianV3Controller@show_kontrak');
Route::post('v3/sdm-kontrak', 'Esaku\Sdm\KepegawaianV3Controller@store_kontrak');
Route::post('v3/sdm-kontrak-update', 'Esaku\Sdm\KepegawaianV3Controller@update_kontrak');

// STATUS
Route::get('v3/sdm-status', 'Esaku\Sdm\KepegawaianV3Controller@get_status');

Route::get('v3/sdm-gaji-param', 'Esaku\Sdm\KepegawaianV3Controller@show_gaji');
Route::post('v3/sdm-gaji-param', 'Esaku\Sdm\KepegawaianV3Controller@store_gaji');

Route::post('sdm-karyawan-simpan', 'Esaku\Sdm\UploadKaryawanController@store');
Route::post('sdm-karyawan-upload', 'Esaku\Sdm\UploadKaryawanController@uploadXLS');
Route::get('sdm-karyawan-load', 'Esaku\Sdm\UploadKaryawanController@loadDataTmp');

## SDM keluarga
Route::get('sdm-keluargas', 'Esaku\Sdm\KeluargaController@index');
Route::get('sdm-keluarga', 'Esaku\Sdm\KeluargaController@show');
Route::post('sdm-keluarga', 'Esaku\Sdm\KeluargaController@store');
Route::post('sdm-keluarga-update', 'Esaku\Sdm\KeluargaController@update');
Route::delete('sdm-keluarga', 'Esaku\Sdm\KeluargaController@delete');

Route::get('sdm-adm-keluargas', 'Esaku\Sdm\KeluargaAdmController@index');
Route::get('sdm-adm-keluarga', 'Esaku\Sdm\KeluargaAdmController@show');
Route::post('sdm-adm-keluarga', 'Esaku\Sdm\KeluargaAdmController@store');
Route::post('sdm-adm-keluarga-update', 'Esaku\Sdm\KeluargaAdmController@update');
Route::delete('sdm-adm-keluarga', 'Esaku\Sdm\KeluargaAdmController@delete');

## SDM kedinasan
Route::get('sdm-dinass', 'Esaku\Sdm\DinasController@index');
Route::get('sdm-dinas', 'Esaku\Sdm\DinasController@show');
Route::post('sdm-dinas', 'Esaku\Sdm\DinasController@store');
Route::post('sdm-dinas-update', 'Esaku\Sdm\DinasController@update');
Route::delete('sdm-dinas', 'Esaku\Sdm\DinasController@delete');

Route::get('sdm-adm-dinass', 'Esaku\Sdm\DinasAdmController@index');
Route::get('sdm-adm-dinas', 'Esaku\Sdm\DinasAdmController@show');
Route::post('sdm-adm-dinas', 'Esaku\Sdm\DinasAdmController@store');
Route::post('sdm-adm-dinas-update', 'Esaku\Sdm\DinasAdmController@update');
Route::delete('sdm-adm-dinas', 'Esaku\Sdm\DinasAdmController@delete');

## SDM pendidikan
Route::get('sdm-pendidikans', 'Esaku\Sdm\PendidikanController@index');
Route::get('sdm-pendidikan', 'Esaku\Sdm\PendidikanController@show');
Route::post('sdm-pendidikan', 'Esaku\Sdm\PendidikanController@store');
Route::post('sdm-pendidikan-update', 'Esaku\Sdm\PendidikanController@update');
Route::delete('sdm-pendidikan', 'Esaku\Sdm\PendidikanController@delete');

Route::get('sdm-adm-pendidikans', 'Esaku\Sdm\PendidikanAdmController@index');
Route::get('sdm-adm-pendidikan', 'Esaku\Sdm\PendidikanAdmController@show');
Route::post('sdm-adm-pendidikan', 'Esaku\Sdm\PendidikanAdmController@store');
Route::post('sdm-adm-pendidikan-update', 'Esaku\Sdm\PendidikanAdmController@update');
Route::delete('sdm-adm-pendidikan', 'Esaku\Sdm\PendidikanAdmController@delete');

## SDM pelatihan
Route::get('sdm-pelatihans', 'Esaku\Sdm\PelatihanController@index');
Route::get('sdm-pelatihan', 'Esaku\Sdm\PelatihanController@show');
Route::post('sdm-pelatihan', 'Esaku\Sdm\PelatihanController@store');
Route::post('sdm-pelatihan-update', 'Esaku\Sdm\PelatihanController@update');
Route::delete('sdm-pelatihan', 'Esaku\Sdm\PelatihanController@delete');

Route::get('sdm-adm-pelatihans', 'Esaku\Sdm\PelatihanAdmController@index');
Route::get('sdm-adm-pelatihan', 'Esaku\Sdm\PelatihanAdmController@show');
Route::post('sdm-adm-pelatihan', 'Esaku\Sdm\PelatihanAdmController@store');
Route::post('sdm-adm-pelatihan-update', 'Esaku\Sdm\PelatihanAdmController@update');
Route::delete('sdm-adm-pelatihan', 'Esaku\Sdm\PelatihanAdmController@delete');

## SDM penghargaan
Route::get('sdm-penghargaans', 'Esaku\Sdm\PenghargaanController@index');
Route::get('sdm-penghargaan', 'Esaku\Sdm\PenghargaanController@show');
Route::post('sdm-penghargaan', 'Esaku\Sdm\PenghargaanController@store');
Route::post('sdm-penghargaan-update', 'Esaku\Sdm\PenghargaanController@update');
Route::delete('sdm-penghargaan', 'Esaku\Sdm\PenghargaanController@delete');

Route::get('sdm-adm-penghargaans', 'Esaku\Sdm\PenghargaanAdmController@index');
Route::get('sdm-adm-penghargaan', 'Esaku\Sdm\PenghargaanAdmController@show');
Route::post('sdm-adm-penghargaan', 'Esaku\Sdm\PenghargaanAdmController@store');
Route::post('sdm-adm-penghargaan-update', 'Esaku\Sdm\PenghargaanAdmController@update');
Route::delete('sdm-adm-penghargaan', 'Esaku\Sdm\PenghargaanAdmController@delete');

## SDM sanksi
Route::get('sdm-sanksis', 'Esaku\Sdm\SanksiController@index');
Route::get('sdm-sanksi', 'Esaku\Sdm\SanksiController@show');
Route::post('sdm-sanksi', 'Esaku\Sdm\SanksiController@store');
Route::post('sdm-sanksi-update', 'Esaku\Sdm\SanksiController@update');
Route::delete('sdm-sanksi', 'Esaku\Sdm\SanksiController@delete');

Route::get('sdm-adm-sanksis', 'Esaku\Sdm\SanksiAdmController@index');
Route::get('sdm-adm-sanksi', 'Esaku\Sdm\SanksiAdmController@show');
Route::post('sdm-adm-sanksi', 'Esaku\Sdm\SanksiAdmController@store');
Route::post('sdm-adm-sanksi-update', 'Esaku\Sdm\SanksiAdmController@update');
Route::delete('sdm-adm-sanksi', 'Esaku\Sdm\SanksiAdmController@delete');

// Retur Penjualan //
Route::post('retur-jual', 'Esaku\Inventori\ReturJualController@store');
Route::get('retur-jual-bukti', 'Esaku\Inventori\ReturJualController@getPenjualan');
Route::get('retur-jual-detail/{no_bukti}', 'Esaku\Inventori\ReturJualController@show');

// Daftar Penjualan Cetak //
Route::get('daftar-penjualan-cetak', 'Esaku\Inventori\CetakStrukController@index');

Route::get('hold-rak-nobukti', 'Esaku\Inventori\HoldRakController@generateNoBukti');
Route::get('hold-rak-gudang', 'Esaku\Inventori\HoldRakController@getGudang');
Route::get('hold-rak-rak', 'Esaku\Inventori\HoldRakController@getRak');
Route::get('hold-rak', 'Esaku\Inventori\HoldRakController@index');
Route::get('hold-rak/{no_bukti}', 'Esaku\Inventori\HoldRakController@show');
Route::post('hold-rak', 'Esaku\Inventori\HoldRakController@store');
Route::post('hold-rak/{no_bukti}', 'Esaku\Inventori\HoldRakController@update');
Route::delete('hold-rak/{no_bukti}', 'Esaku\Inventori\HoldRakController@destroy');

Route::get('release-rak-nobukti', 'Esaku\Inventori\ReleaseRakController@generateNoBukti');
Route::get('release-rak-hold', 'Esaku\Inventori\ReleaseRakController@getHold');
Route::get('release-rak-load', 'Esaku\Inventori\ReleaseRakController@loadData');
Route::get('release-rak', 'Esaku\Inventori\ReleaseRakController@index');
Route::get('release-rak/{no_bukti}', 'Esaku\Inventori\ReleaseRakController@show');
Route::post('release-rak', 'Esaku\Inventori\ReleaseRakController@store');
Route::post('release-rak/{no_bukti}', 'Esaku\Inventori\ReleaseRakController@update');
Route::delete('release-rak/{no_bukti}', 'Esaku\Inventori\ReleaseRakController@destroy');

Route::get('soph-nobukti', 'Esaku\Inventori\SopHController@generateNoBukti');
Route::get('soph-hold', 'Esaku\Inventori\SopHController@getHold');
Route::get('soph-load', 'Esaku\Inventori\SopHController@loadData');
Route::get('soph', 'Esaku\Inventori\SopHController@index');
Route::get('soph/{no_bukti}', 'Esaku\Inventori\SopHController@show');
Route::post('soph', 'Esaku\Inventori\SopHController@store');
Route::post('soph/{no_bukti}', 'Esaku\Inventori\SopHController@update');
Route::delete('soph/{no_bukti}', 'Esaku\Inventori\SopHController@destroy');

Route::get('stok-nobukti', 'Esaku\Inventori\StokController@generateNoBukti');
Route::get('stok-barang', 'Esaku\Inventori\StokController@getBarang');
Route::get('stok', 'Esaku\Inventori\StokController@index');
Route::get('stok/{no_bukti}', 'Esaku\Inventori\StokController@show');
Route::post('stok', 'Esaku\Inventori\StokController@store');
Route::post('stok/{no_bukti}', 'Esaku\Inventori\StokController@update');
Route::delete('stok/{no_bukti}', 'Esaku\Inventori\StokController@destroy');

Route::get('/tes-print', function () {
    try {
        // $ip = ''; // IP Komputer kita atau printer lain yang masih satu jaringan
        $printer = "POS58"; // Nama Printer yang di sharing
        // $connector = new WindowsPrintConnector("smb://" . $ip . "/" . $printer);
        $connector = new WindowsPrintConnector($printer);
        // $printer = new Printer($connector);
        // $connector = new NetworkPrintConnector("10.79.241.85", 9100);
        /* Information for the receipt */
        /* Start the printer */
        $items = array(
            0 => array(
                'barang' => 'Saori Saos Tiram',
                'jumlah' => 2,
                'harga' => '12.500',
                'sub' => '25.000'
            ),
            1 => array(
                'barang' => 'Susu 7 Kurma',
                'jumlah' => 5,
                'harga' => '10.000',
                'sub' => '50.000'
            )
        );

        $subtotal = "75.000";
        // $logo = EscposImage::load("img/escpos-php.png", false);
        $printer = new Printer($connector);
        /* Date is kept the same for testing */
        $date = date('d-m-Y h:i:s A');
        // $date = "Monday 6th of April 2015 02:56:25 PM";

        /* Print top logo */
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        // $printer -> graphics($logo);

        /* Name of shop */
        $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
        $printer->text("TJ Mart.\n");
        $printer->selectPrintMode();
        $printer->text("Jl. Sumur Bandung No. 12\n");
        $printer->feed(1);
        $printer->text("--------------------------------");

        $printer->setJustification(Printer::JUSTIFY_LEFT);
        /* Title of receipt */
        $printer->setEmphasis(true);

        $printer->text("No Bukti: 04-PNJ2108.0001\n");
        $printer->text("Kasir: Admin SAI\n");
        $printer->text($date . "\n");
        $printer->text("--------------------------------");
        $printer->setEmphasis(false);

        /* Items */
        $printer->setEmphasis(true);
        foreach ($items as $item) {
            $printer->text($item['barang'] . "\n");
            $printer->text(buatBaris3Kolom($item['jumlah'] . "x", $item['harga'], $item['sub']));
        }
        $printer->setEmphasis(true);
        $printer->text("--------------------------------");

        $printer->text(buatBaris3Kolom("Total Transaksi", "", $subtotal));
        $printer->setEmphasis(false);
        $printer->text(buatBaris3Kolom("Total Diskon", "", 0));
        $printer->text(buatBaris3Kolom("Total Set. Disk.", "", $subtotal));
        $printer->text(buatBaris3Kolom("Total Bayar", "", "100.000"));
        $printer->text(buatBaris3Kolom("Kembalian", "", "25.000"));
        $printer->text("--------------------------------");
        $printer->feed();

        /* Tax and total */
        // $printer -> text($tax);

        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->selectPrintMode();

        /* Footer */
        $printer->feed(1);
        $printer->text("Terima Kasih \n telah berbelanja \n di TJMart\n");
        $printer->feed(2);

        /* Cut the receipt and open the cash drawer */
        $printer->cut();
        $printer->pulse();

        $printer->close();


        $response = ['success' => 'true', 'message' => 'Berhasil!'];
    } catch (Exception $e) {
        $response = ['success' => 'false', 'message' => $e->getMessage()];
    }
    return response()->json($response);
});

function buatBaris3Kolom($kolom1, $kolom2, $kolom3)
{
    // Mengatur lebar setiap kolom (dalam satuan karakter)
    $lebar_kolom_1 = 12;
    $lebar_kolom_2 = 8;
    $lebar_kolom_3 = 8;

    // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n
    $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
    $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
    $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);

    // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
    $kolom1Array = explode("\n", $kolom1);
    $kolom2Array = explode("\n", $kolom2);
    $kolom3Array = explode("\n", $kolom3);

    // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
    $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array));

    // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
    $hasilBaris = array();

    // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris
    for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

        // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan,
        $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
        $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");

        // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
        $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);

        // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
        $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3;
    }

    // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
    return implode($hasilBaris, "\n") . "\n";
}
