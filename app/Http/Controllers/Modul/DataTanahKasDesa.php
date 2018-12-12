<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TanahKasDesa;

use Session;
use PDF;

class DataTanahKasDesa extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter = "";
        $keyword = "";
        $tanahkasdesa = TanahKasDesa::all();
        return view('modul/tanahkasdesa/home', compact('tanahkasdesa','filter','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kd = new TanahKasDesa;

        $this->validate($request, [
            // 'jenis'      => 'max:100',
        ]);

        $kd->asal = $request->asal;
        $kd->nomor_sertifikat = $request->nomor_sertifikat;
        $kd->luas = $request->luas;
        $kd->kelas = $request->kelas;
        $kd->asli = $request->asli;
        $kd->pemerintah = $request->pemerintah;
        $kd->provinsi = $request->provinsi;
        $kd->kota = $request->kota;
        $kd->lainlain = $request->lainlain;
        $kd->tgl_perolehan = $request->tgl_perolehan;
        $kd->sawah = $request->sawah;
        $kd->tegal = $request->tegal;
        $kd->kebun = $request->kebun;
        $kd->tambak = $request->tambak;
        $kd->darat = $request->darat;
        $kd->patok_batas = $request->patok_batas;
        $kd->papan_nama = $request->papan_nama;
        $kd->lokasi = $request->lokasi;
        $kd->peruntukan = $request->peruntukan;
        $kd->mutasi = $request->mutasi;
        $kd->keterangan = $request->keterangan;

        $kd->save();

        Session::flash('pesan_sukses', 'Data Tanah Kas Desa berhasil di Ditambah');

        return redirect('data-tanah-kas-desa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kd = TanahKasDesa::findorfail($id);
        return view('modul/tanahkasdesa/show', compact('kd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kd = TanahKasDesa::findorfail($id);
        return view('modul/tanahkasdesa/edit', compact('kd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kd = TanahKasDesa::findorfail($id);

        $this->validate($request, [
            // 'jenis'      => 'max:100',
        ]);

        $kd->asal = $request->asal;
        $kd->nomor_sertifikat = $request->nomor_sertifikat;
        $kd->luas = $request->luas;
        $kd->kelas = $request->kelas;
        $kd->asli = $request->asli;
        $kd->pemerintah = $request->pemerintah;
        $kd->provinsi = $request->provinsi;
        $kd->kota = $request->kota;
        $kd->lainlain = $request->lainlain;
        $kd->tgl_perolehan = $request->tgl_perolehan;
        $kd->sawah = $request->sawah;
        $kd->tegal = $request->tegal;
        $kd->kebun = $request->kebun;
        $kd->tambak = $request->tambak;
        $kd->darat = $request->darat;
        $kd->patok_batas = $request->patok_batas;
        $kd->papan_nama = $request->papan_nama;
        $kd->lokasi = $request->lokasi;
        $kd->peruntukan = $request->peruntukan;
        $kd->mutasi = $request->mutasi;
        $kd->keterangan = $request->keterangan;

        $kd->save();

        Session::flash('pesan_sukses', 'Data Tanah Kas Desa berhasil di Diperbarui');

        return redirect('data-tanah-kas-desa/'.$kd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kd = TanahKasDesa::findorfail($id);

        $kd->delete();
        Session::flash('pesan_sukses', 'Data Tanah Kas Desa Nomor "'. $kd->nomor_keputusan .'" Berhasil Dihapus');
        
        return redirect('data-tanah-kas-desa');
    }

    public function cetak($keyword)
    {
        $pd = TanahKasDesa::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-tanah-kas-desa',compact('pd','keyword'))
                    ->setPaper('a4','landscape');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
