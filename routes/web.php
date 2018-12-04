
<?php

Auth::routes();

Route::get('/', function(){
	return redirect('home');
});
Route::get('home', 'Modul\HomeController@index')->name('home');

Route::resource('data-peraturan-desa', 'Modul\DataPeraturanDesa');
Route::get('data-peraturan-desa/cetak/{keywords}', 'Modul\DataPeraturanDesa@cetak');






