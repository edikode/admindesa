<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KegiatanPembangunan;

use Session;
use PDF;

class DataKegiatanPembangunan extends Controller
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
        $kegiatanpembangunan = KegiatanPembangunan::all();
        return view('modul/kegiatanpembangunan/home', compact('kegiatanpembangunan','filter','keyword'));
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
        $pd = new KegiatanPembangunan;

        $this->validate($request, [
            'nama'      => 'required|unique:kegiatan_pembangunan,nama,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->volume = $request->volume;
        $pd->pemerintah = $request->pemerintah;
        $pd->provinsi = $request->provinsi;
        $pd->kota = $request->kota;
        $pd->swadaya = $request->swadaya;
        $pd->waktu = tgl_en($request->waktu);
        $pd->sifat = $request->sifat;
        $pd->pelaksana = $request->pelaksana;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Kegiatan Pembangunan Desa berhasil di Ditambah');

        return redirect('kegiatan-pembangunan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = KegiatanPembangunan::findorfail($id);
        return view('modul/kegiatanpembangunan/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = KegiatanPembangunan::findorfail($id);
        return view('modul/kegiatanpembangunan/edit', compact('pd'));
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
        $pd = KegiatanPembangunan::findorfail($id);

        $this->validate($request, [
            'nama'      => 'required|unique:kegiatan_pembangunan,nama,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->volume = $request->volume;
        $pd->pemerintah = $request->pemerintah;
        $pd->provinsi = $request->provinsi;
        $pd->kota = $request->kota;
        $pd->swadaya = $request->swadaya;
        $pd->waktu = tgl_en($request->waktu);
        $pd->sifat = $request->sifat;
        $pd->pelaksana = $request->pelaksana;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Kegiatan Pembangunan Desa berhasil di Diperbarui');

        return redirect('kegiatan-pembangunan/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = KegiatanPembangunan::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Kegiatan Pembangunan Desa : "'. $pd->nama .'" Berhasil Dihapus');
        
        return redirect('kegiatan-pembangunan');
    }

    public function cetak($keyword)
    {
        $pd = KegiatanPembangunan::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-kegiatan-pembangunan',compact('pd','keyword'))
                    ->setPaper('a4');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
