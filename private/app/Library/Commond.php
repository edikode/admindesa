<?php

namespace App\Library;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commond
{

    public function JmlAdmin(){
        $data = DB::table('users')->select(DB::raw('COUNT(level) as jumlah'))->where('level', "Admin Desa")->first();
        
        return $data;
    }

    public function CekData($table,$field,$id){
        $data = DB::table($table)->select('id')->where($field, $id)->first();
        
        return $data;
    }

    public function PendudukAwal($kewarganegaraan,$jenis_kelamin,$dusun,$tanggal){
        $kemarin = date('Y-m-d', strtotime("-1 day", strtotime($tanggal)));

        $data = DB::table('data_induk')->select(DB::raw('COUNT(nik) as jumlah'))
        ->where('dusun', $dusun)
        ->where('kewarganegaraan', $kewarganegaraan)
        ->where('jenis_kelamin', $jenis_kelamin)
        ->whereBetween('created_at', array("2018-11-01",$kemarin))->first();

        return $data;
    }

    public function JumlahKK($dusun,$tanggal){
        $kemarin = date('Y-m-d', strtotime("-1 day", strtotime($tanggal)));

        $data = DB::table('data_induk')->select(DB::raw('COUNT(nik) as jumlah'))
        ->where('dusun', $dusun)
        ->where('kedudukan', "KK")
        ->whereBetween('created_at', array("2018-11-01",$kemarin))->first();

        return $data;
    }

    public function JumlahAnggota($dusun,$tanggal){
        $kemarin = date('Y-m-d', strtotime("-1 day", strtotime($tanggal)));

        $data = DB::table('data_induk')->select(DB::raw('COUNT(nik) as jumlah'))
        ->where('dusun', $dusun)
        ->where('kedudukan', "Ist")
        ->orwhere('kedudukan', "AK")
        ->orwhere('kedudukan', "AA")
        ->orwhere('kedudukan', "Pemb")
        ->whereBetween('created_at', array("2018-11-01",$kemarin))->first();

        return $data;
    }

    public function PendudukBlnIni($kewarganegaraan,$jenis_kelamin,$dusun,$awalbulan,$akhirbulan,$dari){

        $data = DB::table('data_induk')->select(DB::raw('COUNT(jenis_kelamin) as jumlah'))
        ->where('dusun', $dusun)
        ->where('dari', $dari)
        ->where('kewarganegaraan', $kewarganegaraan)
        ->where('jenis_kelamin', $jenis_kelamin)
        ->whereBetween('created_at', array($awalbulan,$akhirbulan))->first();

        return $data;
    }

    public function PendudukPindah($kewarganegaraan,$jenis_kelamin,$dusun,$awalbulan,$akhirbulan,$dari){
        
        $data = DB::table('data_induk')
        ->join('mutasi_penduduk', 'data_induk.id', '=', 'mutasi_penduduk.data_induk_id')
        ->select(DB::raw('COUNT(data_induk.jenis_kelamin) as jumlah'))
        ->where('data_induk.dusun', $dusun)
        ->where('data_induk.dari', $dari)
        ->where('data_induk.kewarganegaraan', $kewarganegaraan)
        ->where('data_induk.jenis_kelamin', $jenis_kelamin)
        ->whereBetween('tgl_pindah', array($awalbulan,$akhirbulan))->first();

        return $data;
    }

    public function PendudukMeninggal($kewarganegaraan,$jenis_kelamin,$dusun,$awalbulan,$akhirbulan,$dari){
        
        $data = DB::table('data_induk')
        ->join('mutasi_penduduk', 'data_induk.id', '=', 'mutasi_penduduk.data_induk_id')
        ->select(DB::raw('COUNT(data_induk.jenis_kelamin) as jumlah'))
        ->where('data_induk.dusun', $dusun)
        ->where('data_induk.dari', $dari)
        ->where('data_induk.kewarganegaraan', $kewarganegaraan)
        ->where('data_induk.jenis_kelamin', $jenis_kelamin)
        ->whereBetween('tgl_meninggal', array($awalbulan,$akhirbulan))->first();

        return $data;
    }

    public function PendudukAkhir($kewarganegaraan,$jenis_kelamin,$dusun,$tanggal){

        $data = DB::table('data_induk')->select(DB::raw('COUNT(jenis_kelamin) as jumlah'))
        ->where('dusun', $dusun)
        ->where('kewarganegaraan', $kewarganegaraan)
        ->where('jenis_kelamin', $jenis_kelamin)
        ->where('dari',"lahir")
        ->orwhere('dari',"datang")
        ->whereBetween('created_at', array("2018-11-01",$tanggal))->first();

        return $data;
    }

    public function JumlahKKAkhir($dusun,$tanggal){

        $data = DB::table('data_induk')->select(DB::raw('COUNT(nik) as jumlah'))
        ->where('dusun', $dusun)
        ->where('kedudukan', "KK")
        ->whereBetween('created_at', array("2018-11-01",$tanggal))->first();

        return $data;
    }

    public function JumlahAnggotaAkhir($dusun,$tanggal){

        $data = DB::table('data_induk')->select(DB::raw('COUNT(nik) as jumlah'))
        ->where('dusun', $dusun)
        ->where('kedudukan', "Ist")
        ->orwhere('kedudukan', "AK")
        ->orwhere('kedudukan', "AA")
        ->orwhere('kedudukan', "Pemb")
        ->whereBetween('created_at', array("2018-11-01",$tanggal))->first();

        return $data;
    }

}
