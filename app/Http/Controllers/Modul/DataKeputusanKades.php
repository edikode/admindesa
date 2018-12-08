<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KeputusanKades;

use Session;
use PDF;

class DataKeputusanKades extends Controller
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
        $keputusankades = KeputusanKades::all();
        return view('modul/keputusankades/home', compact('keputusankades','filter','keyword'));
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
        $kd = new KeputusanKades;

        $this->validate($request, [
            'jenis'      => 'max:100',
        ]);

        $kd->nomor_keputusan = $request->nomor_keputusan;
        $kd->tentang = $request->tentang;
        $kd->uraian = $request->uraian;
        $kd->nomor_dilaporkan = $request->nomor_dilaporkan;
        $kd->keterangan = $request->keterangan;

        $kd->save();

        Session::flash('pesan_sukses', 'Data Keputusan Kepala Desa berhasil di Ditambah');

        return redirect('data-keputusan-kepala-desa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kd = KeputusanKades::findorfail($id);
        return view('modul/keputusankades/show', compact('kd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kd = KeputusanKades::findorfail($id);
        return view('modul/keputusankades/edit', compact('kd'));
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
        $kd = KeputusanKades::findorfail($id);

        $this->validate($request, [
            'jenis'      => 'max:100',
        ]);

        $kd->nomor_keputusan = $request->nomor_keputusan;
        $kd->tentang = $request->tentang;
        $kd->uraian = $request->uraian;
        $kd->nomor_dilaporkan = $request->nomor_dilaporkan;
        $kd->keterangan = $request->keterangan;

        $kd->save();

        Session::flash('pesan_sukses', 'Data Keputusan Kepala Desa berhasil di Diperbarui');

        return redirect('data-keputusan-kepala-desa/'.$kd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kd = KeputusanKades::findorfail($id);

        $kd->delete();
        Session::flash('pesan_sukses', 'Data Keputusan Kepala Desa Nomor "'. $kd->nomor_keputusan .'" Berhasil Dihapus');
        
        return redirect('data-keputusan-kepala-desa');
    }

    public function cetak($keyword)
    {
        $kd = KeputusanKades::all();
        $jumlah = count($kd);

        $pdf = PDF::loadView('pdf/data-keputusan-kades',compact('kd','keyword'))
                    ->setPaper('a4');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
