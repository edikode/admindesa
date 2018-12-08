
<?php

Auth::routes();

Route::get('/', function(){
	return redirect('home');
});
Route::get('home', 'Modul\HomeController@index')->name('home');

Route::resource('data-peraturan-desa', 'Modul\DataPeraturanDesa');
Route::get('data-peraturan-desa/cetak/{keywords}', 'Modul\DataPeraturanDesa@cetak');

Route::resource('data-keputusan-kepala-desa', 'Modul\DataKeputusanKades');
Route::get('data-keputusan-kepala-desa/cetak/{keywords}', 'Modul\DataKeputusanKades@cetak');

// belum
// Route::resource('data-inventaris-kekayaan-desa', 'Modul\InventarisDesa');
// Route::get('data-inventaris-kekayaan-desa/cetak/{keywords}', 'Modul\InventarisDesa@cetak');

Route::resource('data-aparat-pemerintah-desa', 'Modul\DataAparatPemerintah');
Route::get('data-aparat-pemerintah-desa/cetak/{keywords}', 'Modul\DataAparatPemerintah@cetak');

Route::resource('data-agenda', 'Modul\DataAgenda');
Route::get('data-agenda/cetak/{keywords}', 'Modul\DataAgenda@cetak');

Route::resource('data-ekspedisi', 'Modul\DataEkspedisi');
Route::get('data-ekspedisi/cetak/{keywords}', 'Modul\DataEkspedisi@cetak');

// administrasi desa
Route::resource('data-induk-penduduk-desa', 'Modul\DataInduk');
Route::get('data-induk-penduduk-desa/cetak/{keywords}', 'Modul\DataInduk@cetak');




