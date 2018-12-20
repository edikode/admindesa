<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TanahDesa;

use Session;
use PDF;

class DataTanahDesa extends Controller
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
        $tanahdesa = TanahDesa::all();
        return view('modul/tanahdesa/home', compact('tanahdesa','filter','keyword'));
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
        $kd = new TanahDesa;

        $this->validate($request, [
            'nama'      => 'unique:tanah_desa,nama,'.$kd['id'],
        ]);

        $kd->nama = $request->nama;
        $kd->jumlah = $request->jumlah;
        $kd->status = $request->status;
        $kd->luas = $request->luas;
        $kd->penggunaan_tanah = $request->penggunaan;
        $kd->luas_penggunaan = $request->luas_penggunaan;
        $kd->keterangan = $request->keterangan;

        $kd->save();

        Session::flash('pesan_sukses', 'Data Tanah Di Desa berhasil di Ditambah');

        return redirect('data-tanah-di-desa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kd = TanahDesa::findorfail($id);
        return view('modul/tanahdesa/show', compact('kd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kd = TanahDesa::findorfail($id);
        return view('modul/tanahdesa/edit', compact('kd'));
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
        $kd = TanahDesa::findorfail($id);

        $this->validate($request, [
            'nama'      => 'unique:tanah_desa,nama,'.$kd['id'],
        ]);

        $kd->nama = $request->nama;
        $kd->jumlah = $request->jumlah;
        $kd->status = $request->status;
        $kd->luas = $request->luas;
        $kd->penggunaan_tanah = $request->penggunaan;
        $kd->luas_penggunaan = $request->luas_penggunaan;
        $kd->keterangan = $request->keterangan;

        $kd->save();

        Session::flash('pesan_sukses', 'Data Tanah Di Desa berhasil di Diperbarui');

        return redirect('data-tanah-di-desa/'.$kd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kd = TanahDesa::findorfail($id);

        $kd->delete();
        Session::flash('pesan_sukses', 'Data Tanah Di Desa Nomor "'. $kd->nomor_keputusan .'" Berhasil Dihapus');
        
        return redirect('data-tanah-di-desa');
    }

    public function cetak($keyword)
    {
        $pd = TanahDesa::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-tanah-di-desa',compact('pd','keyword'))
                    ->setPaper('A4','landscape');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
