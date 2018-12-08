<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ekspedisi;

use Session;
use PDF;

class DataEkspedisi extends Controller
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
        $ekspedisi = Ekspedisi::all();
        return view('modul/ekspedisi/home', compact('ekspedisi','filter','keyword'));
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
        $pd = new Ekspedisi;

        $this->validate($request, [
            'tanggal_surat'      => 'required|unique:ekspedisi,tanggal_surat,'.$pd['id'],
        ]);

        $pd->tanggal_pengiriman = $request->tanggal_pengiriman;
        $pd->tanggal_surat = $request->tanggal_surat;
        $pd->isi = $request->isi;
        $pd->tujuan = $request->tujuan;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Ekspedisi berhasil di Ditambah');

        return redirect('data-ekspedisi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = Ekspedisi::findorfail($id);
        return view('modul/ekspedisi/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = Ekspedisi::findorfail($id);
        return view('modul/ekspedisi/edit', compact('pd'));
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
        $pd = Ekspedisi::findorfail($id);

        $this->validate($request, [
            'tanggal_surat'      => 'required|unique:ekspedisi,tanggal_surat,'.$pd['id'],
        ]);

        $pd->tanggal_pengiriman = $request->tanggal_pengiriman;
        $pd->tanggal_surat = $request->tanggal_surat;
        $pd->isi = $request->isi;
        $pd->tujuan = $request->tujuan;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Ekspedisi berhasil di Diperbarui');

        return redirect('data-ekspedisi/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = Ekspedisi::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Ekspedisi Nomor: "'. $pd->tanggal_surat .'" Berhasil Dihapus');
        
        return redirect('data-ekspedisi');
    }

    public function cetak($keyword)
    {
        $pd = Ekspedisi::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-ekspedisi',compact('pd','keyword'))
                    ->setPaper('a4');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
