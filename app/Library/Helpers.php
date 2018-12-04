<?php 

use App\Library\Commond;

//untuk menu backend
function MenuHalParent($id){
	$halaman = new Commond();
	$data = $halaman->MenuHalParent($id);
	return $data;
}

function DataMenu(){
	$menu = new Commond();
	$data = $menu->DataMenu();
	return $data;
}

//sub menu front end
function MenuParent($parent){
	$menu = new Commond();
	$data = $menu->MenuParent($parent);
	return $data;
}

function HalParent($id){
	$halaman = new Commond();
	$data = $halaman->HalParent($id);
	return $data;
}

function Halaman($link){
	$halaman = new Commond();
	$data = $halaman->Halaman($link);
	return $data;
}

function Profil(){
	$profil = new Commond();
	$data = $profil->Profil();
	return $data;
}

//memanggil data refferal di users
function Referral($user_id){
	$refferal = new Commond();
	$data = $refferal->Referral($user_id);
	return $data;
}

//menampilkan data artikel berdasarkan urutan dan jumlah tampil untuk fitur
function Artikel($urutan, $jml){
	$artikel = new Commond();
	$data = $artikel->Artikel($urutan, $jml);
	return $data;
}

//menampilkan data paket berdasarkan urutan dan jumlah tampil untuk konten halaman paket
function Paket($urutan, $jml){
	$paket = new Commond();
	$data = $paket->Paket($urutan, $jml);
	return $data;
}

//menampilkan data galeri berdasarkan urutan dan jumlah tampil untuk fitur
function Galeri($urutan, $jml){
	$galeri = new Commond();
	$data = $galeri->Galeri($urutan, $jml);
	return $data;
}

//menampilkan data paket berdasarkan kategori untuk fitur
function Paket_kategori($kategori, $urutan, $jml){
	$paket = new Commond();
	$data = $paket->Paket_kategori($kategori, $urutan, $jml);
	return $data;
}

//menampilkan kategori berdasarkan tipe : artikel, paket-wisata
function Kategori($tipe){
	$kategori = new Commond();
	$data = $kategori->Kategori($tipe);
	return $data;
}

//mencari kategori untuk detail : artikel, paket wisata
function Kategori_detail($id){
	$kategori = new Commond();
	$data = $kategori->Kategori_detail($id);
	return $data;
}

//mencari jumlah data dari masing-masing kategori, untuk sidebar kategori
function jml_kategori($id, $tabel){
	$jml_kategori = new Commond();
	$data = $jml_kategori->Jml_Kategori($id, $tabel);
	return $data;
}

//menampilkan gambar pada paket
function GambarPaket($id){
	$gambar = new Commond();
	$data = $gambar->GambarPaket($id);

	if(!$data){
        $data = "kosong.jpg";
    } else {
        $data = $data->gambar;
    }
	return $data;
}

//menampilkan data paket pada data reservasi
function DataPaket($id){
	$dataPaket = new Commond();
	$data = $dataPaket->DataPaket($id);
	return $data;
}

//menampilkan data reservasi
function DataReservasi($id){
	$dataReservasi = new Commond();
	$data = $dataReservasi->DataReservasi($id);
	return $data;
}

//menampilkan data info pemesanan
function DetailPemesanan($id){
	$pemesanan = new Commond();
	$data = $pemesanan->DetailPemesanan($id);
	return $data;
}

//menampilkan data info pemesanan
function DataPemesanan(){
	$pemesanan = new Commond();
	$data = $pemesanan->DataPemesanan();
	return $data;
}

//menampilkan data info pemesanan
function InfoPemesanan(){
	$pemesanan = new Commond();
	$data = $pemesanan->InfoPemesanan();
	return $data;
}

function InfoPenarikan(){
	$penarikan = new Commond();
	$data = $penarikan->InfoPenarikan();
	return $data;
}

//masih error untuk menampilkan data laporan
function Tahun(){
	$data = new Commond();
	$data = $data->Tahun();
	return $data;
}

//menampilkan data info konfirmasi
function InfoKonfirmasi(){
	$konfirmasi = new Commond();
	$data = $konfirmasi->InfoKonfirmasi();
	return $data;
}

//cek konfirmasi
function cekKonfirmasi($invoice){
	$konfirmasi = new Commond();
	$data = $konfirmasi->cekKonfirmasi($invoice);
	return $data;
}

//cek konfirmasi
function cekKonfirmasi2($invoice){
	$konfirmasi = new Commond();
	$data = $konfirmasi->cekKonfirmasi2($invoice);
	return $data;
}

//cek konfirmasi
function cekKonfirmasiStatus($invoice){
	$konfirmasi = new Commond();
	$data = $konfirmasi->cekKonfirmasiStatus($invoice);
	$jumlah = count($konfirmasi->cekKonfirmasiStatus($invoice));
	$status = "belum";
	if($jumlah > 1){
		foreach ($data as $d) {
			if($d->konfirm == 1){
				$status = "sudah";
			}
		}
	} else {
		$status = "tidak";
	}
	
	return $status;
}

//menampilkan data total untuk laporan
function TotalKemarinJumlah($bulan,$tahun){
	$laporan = new Commond();
	$data = $laporan->TotalKemarin($bulan,$tahun);
	$jumlah = 0;
	foreach ($data as $d) {
		if($d->konfirmasi == 1){
			$jumlah = $jumlah + $d->jumlah;
		} else {
			$jumlah = $jumlah + $d->dp;
		}
	}
	return $jumlah;
}

function TotalKemarinJml_orang($bulan,$tahun){
	$laporan = new Commond();
	$data = $laporan->TotalKemarin($bulan,$tahun);
	$jumlah = 0;
	foreach ($data as $d) {
		$jumlah = $jumlah + $d->jml_dewasa  + $d->jml_anak;
	}
	return $jumlah;
}

//menampilkan data total untuk laporan
function TotalAkhir(){
	$laporan = new Commond();
	$data = $laporan->TotalAkhir();
	return $data;
}

//menampilkan total siap bayar untuk referrer
function SiapBayar($id){
	$siapbayar = new Commond();
	$data = $siapbayar->SiapBayar($id);
	return $data;
}

//menampilkan data total untuk laporan
function Jumlah_pesanan($id,$bulan,$tahun){
	$pesanan = new Commond();
	$data = $pesanan->Jumlah_pesanan($id,$bulan,$tahun);
	return $data;
}

function Total_peserta($id,$bulan,$tahun){
	$pesanan = new Commond();
	$data = $pesanan->Total_peserta($id,$bulan,$tahun);
	return $data;
}

?>