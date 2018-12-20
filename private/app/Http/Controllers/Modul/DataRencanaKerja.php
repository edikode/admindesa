<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RencanaKerja;

use Session;
use PDF;

class DataRencanaKerja extends Controller
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
        $rencanakerja = RencanaKerja::all();
        return view('modul/rencanakerja/home', compact('rencanakerja','filter','keyword'));
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
        $pd = new RencanaKerja;

        $this->validate($request, [
            'nama'      => 'required|unique:rencana_kerja,nama,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->lokasi = $request->lokasi;
        $pd->pemerintah = $request->pemerintah;
        $pd->provinsi = $request->provinsi;
        $pd->kota = $request->kota;
        $pd->swadaya = $request->swadaya;
        $pd->pelaksana = $request->pelaksana;
        $pd->manfaat = $request->manfaat;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Rencana Kerja Pembangunan Desa berhasil di Ditambah');

        return redirect('rencana-kerja-pembangunan-desa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = RencanaKerja::findorfail($id);
        return view('modul/rencanakerja/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = RencanaKerja::findorfail($id);
        return view('modul/rencanakerja/edit', compact('pd'));
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
        $pd = RencanaKerja::findorfail($id);

        $this->validate($request, [
            'nama'      => 'required|unique:rencana_kerja,nama,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->lokasi = $request->lokasi;
        $pd->pemerintah = $request->pemerintah;
        $pd->provinsi = $request->provinsi;
        $pd->kota = $request->kota;
        $pd->swadaya = $request->swadaya;
        $pd->pelaksana = $request->pelaksana;
        $pd->manfaat = $request->manfaat;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Rencana Kerja Pembangunan Desa berhasil di Diperbarui');

        return redirect('rencana-kerja-pembangunan-desa/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = RencanaKerja::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Rencana Kerja Pembangunan Desa : "'. $pd->nama .'" Berhasil Dihapus');
        
        return redirect('rencana-kerja-pembangunan-desa');
    }

    public function cetak($keyword)
    {
        $pd = RencanaKerja::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-rencana-kerja-pembangunan-desa',compact('pd','keyword'))
                    ->setPaper('a4');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
