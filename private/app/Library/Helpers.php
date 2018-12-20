<?php 

use App\Library\Commond;

// menghitung jumlah user
function JmlAdmin(){
	$jmladmin = new Commond();
	$data = $jmladmin->JmlAdmin();
	return $data->jumlah;
}

function CekData($table,$field,$id){
	$jmldata = new Commond();
	$data = $jmldata->CekData($table,$field,$id);
	return count($data);
}

function PendudukAwal($kewarganegaraan,$jenis_kelamin,$dusun,$tanggal){
	$datapenduduk = new Commond();
	$data = $datapenduduk->PendudukAwal($kewarganegaraan,$jenis_kelamin,$dusun,$tanggal);
	return $data->jumlah;
}

function JumlahKK($dusun,$tanggal){
	$dataKK = new Commond();
	$data = $dataKK->JumlahKK($dusun,$tanggal);
	return $data->jumlah;
}

function JumlahAnggota($dusun,$tanggal){
	$dataKK = new Commond();
	$data = $dataKK->JumlahAnggota($dusun,$tanggal);
	return $data->jumlah;
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

function JumlahKKAkhir($dusun,$tanggal){
	$dataKK = new Commond();
	$data = $dataKK->JumlahKKAkhir($dusun,$tanggal);
	return $data->jumlah;
}

function JumlahAnggotaAkhir($dusun,$tanggal){
	$dataKK = new Commond();
	$data = $dataKK->JumlahAnggotaAkhir($dusun,$tanggal);
	return $data->jumlah;
}


?>