<?php 

use App\Library\Commond;

// menghitung jumlah user
function JmlAdmin(){
	$jmladmin = new Commond();
	$data = $jmladmin->JmlAdmin();
	return $data->jumlah;
}

function CekDataMutasi($id){
	$jmldata = new Commond();
	$data = $jmldata->CekDataMutasi($id);
	return count($data);
}

function PendudukAwal($kewarganegaraan,$jenis_kelamin,$dusun,$tanggal){
	$datapenduduk = new Commond();
	$data = $datapenduduk->PendudukAwal($kewarganegaraan,$jenis_kelamin,$dusun,$tanggal);
	return $data->jumlah;
}

function AwalKK($dusun,$tanggal){
	$dataKK = new Commond();
	$data = $dataKK->AwalKK($dusun,$tanggal);
	return count($data);
}

function PendudukBlnIni($kewarganegaraan,$jenis_kelamin,$dusun,$awalbulan,$akhirbulan,$dari){
	$datapenduduk = new Commond();
	$data = $datapenduduk->PendudukBlnIni($kewarganegaraan,$jenis_kelamin,$dusun,$awalbulan,$akhirbulan,$dari);
	return $data->jumlah;
}

function PendudukPindah($kewarganegaraan,$jenis_kelamin,$dusun,$awalbulan,$akhirbulan,$dari){
	$datapenduduk = new Commond();
	$data = $datapenduduk->PendudukPindah($kewarganegaraan,$jenis_kelamin,$dusun,$awalbulan,$akhirbulan,$dari);
	return $data->jumlah;
}

function PendudukMeninggal($kewarganegaraan,$jenis_kelamin,$dusun,$awalbulan,$akhirbulan,$dari){
	$datapenduduk = new Commond();
	$data = $datapenduduk->PendudukMeninggal($kewarganegaraan,$jenis_kelamin,$dusun,$awalbulan,$akhirbulan,$dari);
	return $data->jumlah;
}

function PendudukAkhir($kewarganegaraan,$jenis_kelamin,$dusun,$tanggal){
	$datapenduduk = new Commond();
	$data = $datapenduduk->PendudukAkhir($kewarganegaraan,$jenis_kelamin,$dusun,$tanggal);
	return $data->jumlah;
}

function AkhirKK($dusun,$tanggal){
	$dataKK = new Commond();
	$data = $dataKK->AkhirKK($dusun,$tanggal);
	return count($data);
}


?>