<?php

namespace App\Library;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commond
{

    public function MenuHalParent($id){
        $hal_parent = DB::table('halaman')->select('id', 'parent', 'nama')->where('parent', $id)->get();

        return $hal_parent;
    }

    public function DataMenu(){
        $menu = DB::table('menu')->select('id', 'parent', 'label','link')->where('parent', 0)->orderby('sortir')->get();
        return $menu;
    }

    public function MenuParent($parent){
        $menu = DB::table('menu')->select('id', 'parent', 'tipe', 'label','link')->where('parent', $parent)->orderby('sortir')->get();
        return $menu;
    }

    public function HalParent($id){
        $hal_parent = DB::table('halaman')->select('id', 'parent', 'nama')->where('id', $id)->first();
        return $hal_parent;
    }

    public function Halaman($link){
        $halaman = DB::table('halaman')->where('link', $link)->first();
        return $halaman;
    }

    public function Profil(){
        $profil = DB::table('kontak')->first();
        return $profil;
    }

    public function Referral($id){
        $data = DB::table('referral')->where('id', $id)->first();
        return $data;
    }

    public function Artikel($urutan, $jml){
        if($urutan == 'acak') {
            $artikel = DB::table('artikel')->where('tampil', 1)->inRandomOrder()->limit($jml)->get();
        } else {
            $artikel = DB::table('artikel')->where('tampil', 1)->orderby($urutan, 'desc')->limit($jml)->get();
        }
        return $artikel;
    }

    public function Paket($urutan, $jml){
        if($urutan == 'acak') {
            $paket = DB::table('paket_tour')->where('tampil', 1)->inRandomOrder()->limit($jml)->get();
        } else {
            $paket = DB::table('paket_tour')->where('tampil', 1)->orderby($urutan, 'desc')->limit($jml)->get();
        }
        return $paket;
    }

    public function Galeri($urutan, $jml){
        if($urutan == 'acak' || $urutan == 'dilihat') {
            $gambar = DB::table('gambar')->where('tipe', 'galeri')->inRandomOrder()->limit($jml)->get();
        } else {
            $gambar = DB::table('gambar')->where('tipe', 'galeri')->orderby('id', 'desc')->limit($jml)->get();
        }
        return $gambar;
    }

    public function Paket_kategori($kategori, $urutan, $jml){
        $kategori_id = DB::table('kategori')->where('kategori','paket')->where('link', $kategori)->first();
        // dd($kategori_id);
        if($urutan == 'acak') {
            $paket = DB::table('paket_tour')->where('tampil', 1)->where('kategori_id',$kategori_id->id)->inRandomOrder()->limit($jml)->get();
        } else {
            $paket = DB::table('paket_tour')->where('tampil', 1)->where('kategori_id',$kategori_id->id)->orderby($urutan, 'desc')->limit($jml)->get();
        }

        return $paket;
    }

    public function Jml_Kategori($id, $tabel){
        $jml_kategori = DB::table($tabel)->where('tampil', 1)->where('kategori_id', $id)->count();
        return $jml_kategori;
    }

    public function Kategori($tipe){
        $kategori = DB::table('kategori')->where('kategori', $tipe)->get();
        return $kategori;
    }

    public function Kategori_detail($id){
        $kategori = DB::table('kategori')->where('id', $id)->first();
        return $kategori;
    }

    public function GambarPaket($id){
        $gambar = DB::table('gambar')->where('kat_id', $id)->where('tipe', "paket")->first();
        return $gambar;
    }

    public function DataPaket($id){
        $paket = DB::table('paket_tour')->where('id', $id)->first();
        return $paket;
    }

    public function DetailPemesanan($id){
        $detail = DB::table('detail_reservasi')->where('reservasi_id', $id)->get();
        return $detail;
    }

    public function DataPemesanan(){
        $data = DB::table('reservasi')->get();
        return $data;
    }

    public function InfoPemesanan(){
        $reservasi = DB::table('reservasi')->where('dp', 0)->get();
        return $reservasi;
    }

    public function InfoKonfirmasi(){
        $konfirmasi = DB::table('konfirmasi')->where('konfirm', 0)->get();
        return $konfirmasi;
    }

    public function cekKonfirmasi($invoice){
        $konfirmasi = DB::table('konfirmasi')->where('invoice', $invoice)->get();
        return $konfirmasi;
    }

    public function cekKonfirmasi2($invoice){
        $konfirmasi = DB::table('konfirmasi')->where('invoice', $invoice)->where('konfirm', 1)->get();
        return $konfirmasi;
    }

    public function cekKonfirmasiStatus($invoice){
        $konfirmasi = DB::table('konfirmasi')->where('invoice', $invoice)->get();
        return $konfirmasi;
    }

    public function InfoPenarikan(){
        $konfirmasi = DB::table('komisi')->where('konfirmasi', 1)->get();
        return $konfirmasi;
    }

    public function Tahun(){
        $data = DB::table('reservasi')->GroupBy('created_at')->get();
        return $data;
    }

    public function TotalKemarin($bulan,$tahun){

        $tanggalSekarang = strtotime($tahun.'-'.$bulan.'-15');

        //Kurangi variabel mengurangi Bulan untuk hari ini
        $tanggalKemarin = date('Y-m-d', strtotime('-1 month', $tanggalSekarang));

        $bulan = substr($tanggalKemarin,5,2);
        $tahun = substr($tanggalKemarin,0,4);
        $tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        
        $kemarin = $tahun.'-'.$bulan.'-'.$tanggal; 

        $data = DB::table('reservasi')->whereBetween('tanggal_tour',array('2018-01-01',$kemarin))->get();
        
        return $data;
    }

    public function DataReservasi($id){
        $reservasi = DB::table('reservasi')->where('id', $id)->first();
        return $reservasi;
    }
    
    public function SiapBayar($referral_id){

        $reservasi = DB::table('reservasi')->where('referral_id',$referral_id)->where('dp','!=',0)->get();
        $siap_bayar=0;
        foreach ($reservasi as $b) {
            $kadaluarsa = waktuTour($b->tanggal_tour);
            if($kadaluarsa <= 0){
                $total  = DB::table('komisi')->where('referral_id',$referral_id)->where('reservasi_id',$b->id)->where('bayar',0)->sum('komisi');
                $siap_bayar     = $siap_bayar+$total;
            }
        }

        return $siap_bayar;
    }

    public function Jumlah_pesanan($id,$bulan,$tahun){
        $reservasi = DB::table('reservasi')->where('paket_id',$id)->whereMonth('tanggal_tour',$bulan)->whereYear('tanggal_tour',$tahun)->count();
        return $reservasi;
    }

    public function Total_peserta($id,$bulan,$tahun){
        $reservasi = DB::table('reservasi')->where('paket_id',$id)->whereMonth('tanggal_tour',$bulan)->whereYear('tanggal_tour',$tahun)->get();
        return $reservasi;
    }

}
