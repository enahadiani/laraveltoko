<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('pp', 'Sekolah\PPController@getPP');
Route::get('tingkatan', 'Sekolah\TingkatanController@getTingkatan');
Route::get('guru-nik', 'Sekolah\GuruController@getNIKGuru');

Route::get('tahun-ajaran', 'Sekolah\TahunAjaranController@index');
Route::get('tahun-ajaran-detail', 'Sekolah\TahunAjaranController@show');
Route::post('tahun-ajaran', 'Sekolah\TahunAjaranController@store');
Route::put('tahun-ajaran', 'Sekolah\TahunAjaranController@update');
Route::delete('tahun-ajaran', 'Sekolah\TahunAjaranController@destroy');

Route::get('angkatan', 'Sekolah\AngkatanController@index');
Route::get('angkatan-detail', 'Sekolah\AngkatanController@show');
Route::post('angkatan', 'Sekolah\AngkatanController@store');
Route::put('angkatan', 'Sekolah\AngkatanController@update');
Route::delete('angkatan', 'Sekolah\AngkatanController@destroy');

Route::get('jurusan', 'Sekolah\JurusanController@index');
Route::get('jurusan-detail', 'Sekolah\JurusanController@show');
Route::post('jurusan', 'Sekolah\JurusanController@store');
Route::put('jurusan', 'Sekolah\JurusanController@update');
Route::delete('jurusan', 'Sekolah\JurusanController@destroy');

Route::get('kelas', 'Sekolah\KelasController@index');
Route::get('kelas-detail', 'Sekolah\KelasController@show');
Route::post('kelas', 'Sekolah\KelasController@store');
Route::put('kelas', 'Sekolah\KelasController@update');
Route::delete('kelas', 'Sekolah\KelasController@destroy');

Route::get('status-siswa', 'Sekolah\StatusSiswaController@index');
Route::get('status-siswa-detail', 'Sekolah\StatusSiswaController@show');
Route::post('status-siswa', 'Sekolah\StatusSiswaController@store');
Route::put('status-siswa', 'Sekolah\StatusSiswaController@update');
Route::delete('status-siswa', 'Sekolah\StatusSiswaController@destroy');

Route::get('slot-jadwal', 'Sekolah\SlotController@index');
Route::get('slot-jadwal-detail', 'Sekolah\SlotController@show');
Route::post('slot-jadwal', 'Sekolah\SlotController@store');
Route::put('slot-jadwal', 'Sekolah\SlotController@update');
Route::delete('slot-jadwal', 'Sekolah\SlotController@destroy');

Route::get('jenis-penilaian', 'Sekolah\JenisPenilaianController@index');
Route::get('jenis-penilaian-detail', 'Sekolah\JenisPenilaianController@show');
Route::post('jenis-penilaian', 'Sekolah\JenisPenilaianController@store');
Route::put('jenis-penilaian', 'Sekolah\JenisPenilaianController@update');
Route::delete('jenis-penilaian', 'Sekolah\JenisPenilaianController@destroy');

Route::get('status-guru', 'Sekolah\StatusGuruController@index');
Route::get('status-guru-detail', 'Sekolah\StatusGuruController@show');
Route::post('status-guru', 'Sekolah\StatusGuruController@store');
Route::put('status-guru', 'Sekolah\StatusGuruController@update');
Route::delete('status-guru', 'Sekolah\StatusGuruController@destroy');

Route::get('matpel', 'Sekolah\MataPelajaranController@index');
Route::get('matpel-detail', 'Sekolah\MataPelajaranController@show');
Route::post('matpel', 'Sekolah\MataPelajaranController@store');
Route::put('matpel', 'Sekolah\MataPelajaranController@update');
Route::delete('matpel', 'Sekolah\MataPelajaranController@destroy');

Route::get('kkm', 'Sekolah\KkmController@index');
Route::get('kkm-detail', 'Sekolah\KkmController@show');
Route::post('kkm', 'Sekolah\KkmController@store');
Route::put('kkm', 'Sekolah\KkmController@update');
Route::delete('kkm', 'Sekolah\KkmController@destroy');

Route::get('guru-matpel', 'Sekolah\GuruMatpelController@index');
Route::get('guru-matpel-detail', 'Sekolah\GuruMatpelController@show');
Route::post('guru-matpel', 'Sekolah\GuruMatpelController@store');
Route::put('guru-matpel', 'Sekolah\GuruMatpelController@update');
Route::delete('guru-matpel', 'Sekolah\GuruMatpelController@destroy');

Route::get('kalender-akad', 'Sekolah\KalenderAkademikController@index');
Route::get('kalender-akad-detail', 'Sekolah\KalenderAkademikController@show');
Route::post('kalender-akad', 'Sekolah\KalenderAkademikController@store');
Route::put('kalender-akad', 'Sekolah\KalenderAkademikController@update');
Route::delete('kalender-akad', 'Sekolah\KalenderAkademikController@destroy');

Route::get('jadwal-harian', 'Sekolah\JadwalHarianController@index');
Route::get('jadwal-harian-detail', 'Sekolah\JadwalHarianController@show');
Route::post('jadwal-harian', 'Sekolah\JadwalHarianController@store');
Route::delete('jadwal-harian', 'Sekolah\JadwalHarianController@destroy');

Route::get('jadwal-ujian', 'Sekolah\JadwalUjianController@index');
Route::get('jadwal-ujian-detail', 'Sekolah\JadwalUjianController@show');
Route::post('jadwal-ujian', 'Sekolah\JadwalUjianController@store');
Route::put('jadwal-ujian', 'Sekolah\JadwalUjianController@update');
Route::delete('jadwal-ujian', 'Sekolah\JadwalUjianController@destroy');

Route::get('hari', 'Sekolah\HariController@index');
Route::get('hari-detail', 'Sekolah\HariController@show');
Route::post('hari', 'Sekolah\HariController@store');
Route::put('hari', 'Sekolah\HariController@update');
Route::delete('hari', 'Sekolah\HariController@destroy');

Route::get('kd', 'Sekolah\KdController@index');
Route::get('kd-detail', 'Sekolah\KdController@show');
Route::post('kd', 'Sekolah\KdController@store');
Route::put('kd', 'Sekolah\KdController@update');
Route::delete('kd', 'Sekolah\KdController@destroy');
Route::post('import-kd', 'Sekolah\KdController@importExcel');
Route::get('kd-tmp', 'Sekolah\KdController@getKdTmp');

Route::get('guru-multi-kelas', 'Sekolah\GuruMultiKelasController@index');
Route::get('multi-kelas', 'Sekolah\GuruMultiKelasController@getMultiKelas');
Route::get('guru-multi-kelas-detail', 'Sekolah\GuruMultiKelasController@show');
Route::post('guru-multi-kelas', 'Sekolah\GuruMultiKelasController@store');
Route::put('guru-multi-kelas', 'Sekolah\GuruMultiKelasController@update');
Route::delete('guru-multi-kelas', 'Sekolah\GuruMultiKelasController@destroy');

Route::get('guru', 'Sekolah\GuruController@index');
Route::get('guru-detail', 'Sekolah\GuruController@show');
Route::post('guru', 'Sekolah\GuruController@store');
Route::put('guru', 'Sekolah\GuruController@update');
Route::delete('guru', 'Sekolah\GuruController@destroy');

Route::get('sis-matpel-khusus', 'Sekolah\SisMatpelKhususController@index');
Route::get('sis-matpel-khusus-detail', 'Sekolah\SisMatpelKhususController@show');
Route::post('sis-matpel-khusus', 'Sekolah\SisMatpelKhususController@store');
Route::put('sis-matpel-khusus', 'Sekolah\SisMatpelKhususController@update');
Route::delete('sis-matpel-khusus', 'Sekolah\SisMatpelKhususController@destroy');

Route::get('kelas-khusus', 'Sekolah\KelasKhususController@index');
Route::get('kelas-khusus-detail', 'Sekolah\KelasKhususController@show');
Route::post('kelas-khusus', 'Sekolah\KelasKhususController@store');
Route::put('kelas-khusus', 'Sekolah\KelasKhususController@update');
Route::delete('kelas-khusus', 'Sekolah\KelasKhususController@destroy');

Route::get('absen-kelas', 'Sekolah\AbsenKelasController@show');
Route::post('absen-kelas', 'Sekolah\AbsenKelasController@store');

Route::post('siswa-simpan', 'Sekolah\SiswaInputController@store');
Route::post('siswa-update', 'Sekolah\SiswaInputController@update');
Route::get('siswa-edit', 'Sekolah\SiswaInputController@show');

Route::post('siswa-upload-simpan', 'Sekolah\UploadSiswaController@store');
Route::post('siswa-upload', 'Sekolah\UploadSiswaController@uploadXLS');
Route::get('siswa-upload-load', 'Sekolah\UploadSiswaController@loadDataTmp');

// Data Unit //
Route::get('unit', 'Sekolah\UnitController@index');
Route::get('unit/{id}', 'Sekolah\UnitController@getData');
Route::post('unit', 'Sekolah\UnitController@store');
Route::put('unit/{id}', 'Sekolah\UnitController@update');
Route::delete('unit/{id}', 'Sekolah\UnitController@delete');

// Data Klp Menu //
Route::get('menu-klp', 'Sekolah\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'Sekolah\KelompokMenuController@getData');
Route::post('menu-klp', 'Sekolah\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'Sekolah\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'Sekolah\KelompokMenuController@delete');

// Data Karyawan //
Route::get('karyawan', 'Sekolah\KaryawanController@index');
Route::get('karyawan/{id}', 'Sekolah\KaryawanController@getData');
Route::post('karyawan', 'Sekolah\KaryawanController@store');
Route::post('karyawan-ubah/{id}', 'Sekolah\KaryawanController@update');
Route::delete('karyawan/{id}', 'Sekolah\KaryawanController@delete');

// Data Akses //
Route::get('akses-user', 'Sekolah\AksesUserController@index');
Route::get('akses-user/{id}', 'Sekolah\AksesUserController@getData');
Route::post('akses-user', 'Sekolah\AksesUserController@store');
Route::put('akses-user/{id}', 'Sekolah\AksesUserController@update');
Route::delete('akses-user/{id}', 'Sekolah\AksesUserController@delete');

// Data Form //
Route::get('form', 'Sekolah\FormController@index');
Route::get('form/{id}', 'Sekolah\FormController@getData');
Route::post('form', 'Sekolah\FormController@store');
Route::put('form/{id}', 'Sekolah\FormController@update');
Route::delete('form/{id}', 'Sekolah\FormController@delete');

// Setting Menu Form //
Route::get('setting-menu', 'Sekolah\SettingMenuController@show');
Route::post('setting-menu', 'Sekolah\SettingMenuController@store');
Route::post('setting-menu-move', 'Sekolah\SettingMenuController@storeMove');
Route::put('setting-menu', 'Sekolah\SettingMenuController@update');
Route::delete('setting-menu', 'Sekolah\SettingMenuController@delete');
Route::post('setting-menu-csv', 'Sekolah\SettingMenuController@storeCSV');
