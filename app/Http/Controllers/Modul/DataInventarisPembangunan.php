<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\InventarisPembangunan;

use Session;
use PDF;

class DataInventarisPembangunan extends Controller
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
        $inventarispembangunan = InventarisPembangunan::all();
        return view('modul/inventarispembangunan/home', compact('inventarispembangunan','filter','keyword'));
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
        $pd = new InventarisPembangunan;

        $this->validate($request, [
            // 'tanggal_surat'      => 'required|unique:inventarispembangunan,tanggal_surat,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->volume = $request->volume;
        $pd->biaya = $request->biaya;
        $pd->lokasi = $request->lokasi;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Inventaris Hasil Pembangunan berhasil di Ditambah');

        return redirect('inventaris-hasil-pembangunan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = InventarisPembangunan::findorfail($id);
        return view('modul/inventarispembangunan/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = InventarisPembangunan::findorfail($id);
        return view('modul/inventarispembangunan/edit', compact('pd'));
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
        $pd = InventarisPembangunan::findorfail($id);

        $this->validate($request, [
            // 'tanggal_surat'      => 'required|unique:inventarispembangunan,tanggal_surat,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->volume = $request->volume;
        $pd->biaya = $request->biaya;
        $pd->lokasi = $request->lokasi;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Inventaris Hasil Pembangunan berhasil di Diperbarui');

        return redirect('inventaris-hasil-pembangunan/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = InventarisPembangunan::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Inventaris Hasil Pembangunan : "'. $pd->nama .'" Berhasil Dihapus');
        
        return redirect('inventaris-hasil-pembangunan');
    }

    public function cetak($keyword)
    {
        $pd = InventarisPembangunan::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-inventaris-hasil-pembangunan',compact('pd','keyword'))
                    ->setPaper('a4');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
