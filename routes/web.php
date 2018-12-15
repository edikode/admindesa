
<?php

Auth::routes();

Route::get('/', function(){
	return redirect('home');
});

Route::get('registrasi', 'UserController@create')->name('registrasi');
Route::post('simpan-registrasi', 'UserController@store');

Route::get('home', 'Modul\HomeController@index')->name('home');

Route::resource('data-peraturan-desa', 'Modul\DataPeraturanDesa');
Route::get('data-peraturan-desa/cetak/{keywords}', 'Modul\DataPeraturanDesa@cetak');

Route::resource('data-keputusan-kepala-desa', 'Modul\DataKeputusanKades');
Route::get('data-keputusan-kepala-desa/cetak/{keywords}', 'Modul\DataKeputusanKades@cetak');

Route::resource('data-inventaris-kekayaan-desa', 'Modul\DataInventarisDesa');
Route::post('data-inventaris-kekayaan-desa/hapus', 'Modul\DataInventarisDesa@penghapusan');
Route::get('data-inventaris-kekayaan-desa/cetak/{keywords}', 'Modul\DataInventarisDesa@cetak');

Route::resource('data-aparat-pemerintah-desa', 'Modul\DataAparatPemerintah');
Route::get('data-aparat-pemerintah-desa/cetak/{keywords}', 'Modul\DataAparatPemerintah@cetak');

Route::resource('data-tanah-kas-desa', 'Modul\DataTanahKasDesa');
Route::get('data-tanah-kas-desa/cetak/{keywords}', 'Modul\DataTanahKasDesa@cetak');

Route::resource('data-tanah-di-desa', 'Modul\DataTanahDesa');
Route::get('data-tanah-di-desa/cetak/{keywords}', 'Modul\DataTanahDesa@cetak');

Route::resource('data-agenda', 'Modul\DataAgenda');
Route::get('data-agenda/cetak/{keywords}', 'Modul\DataAgenda@cetak');

Route::resource('data-ekspedisi', 'Modul\DataEkspedisi');
Route::get('data-ekspedisi/cetak/{keywords}', 'Modul\DataEkspedisi@cetak');

Route::resource('data-lembaran-desa', 'Modul\DataLembaranDesa');
Route::get('data-lembaran-desa/cetak/{keywords}', 'Modul\DataLembaranDesa@cetak');

// administrasi desa
Route::resource('data-induk-penduduk-desa', 'Modul\DataInduk');
Route::get('data-induk-penduduk-desa/cetak/{keywords}', 'Modul\DataInduk@cetak');

Route::resource('data-mutasi-penduduk-desa', 'Modul\DataMutasiPenduduk');
Route::post('data-mutasi-penduduk-desa/pengurangan', 'Modul\DataMutasiPenduduk@pengurangan');
Route::get('data-mutasi-penduduk-desa/cetak/{keywords}', 'Modul\DataMutasiPenduduk@cetak');

Route::resource('data-rekapitulasi-penduduk-akhir-bulan', 'Modul\DataRekapPenduduk');
Route::get('data-rekapitulasi-penduduk-akhir-bulan/cetak/{keywords}', 'Modul\DataRekapPenduduk@cetak');

Route::resource('data-penduduk-sementara', 'Modul\DataPendudukSementara');
Route::get('data-penduduk-sementara/cetak/{keywords}', 'Modul\DataPendudukSementara@cetak');

Route::resource('data-ktp-dan-kk', 'Modul\DataKTP');
Route::get('data-ktp-dan-kk/cetak/{keywords}', 'Modul\DataKTP@cetak');

// administrasi pembangunan
Route::resource('rencana-kerja-pembangunan-desa', 'Modul\DataRencanaKerja');
Route::get('rencana-kerja-pembangunan-desa/cetak/{keywords}', 'Modul\DataRencanaKerja@cetak');

Route::resource('kegiatan-pembangunan', 'Modul\DataKegiatanPembangunan');
Route::get('kegiatan-pembangunan/cetak/{keywords}', 'Modul\DataKegiatanPembangunan@cetak');

Route::resource('inventaris-hasil-pembangunan', 'Modul\DataInventarisPembangunan');
Route::get('inventaris-hasil-pembangunan/cetak/{keywords}', 'Modul\DataInventarisPembangunan@cetak');

Route::resource('kader-pendamping-masyarakat', 'Modul\DataKaderMasyarakat');
Route::get('kader-pendamping-masyarakat/cetak/{keywords}', 'Modul\DataKaderMasyarakat@cetak');