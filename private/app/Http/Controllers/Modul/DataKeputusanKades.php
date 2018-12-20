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
        $data = KeputusanKades::all();
        return view('modul/keputusankades/home', compact('data','filter','keyword'));
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
        $data = new KeputusanKades;

        $this->validate($request, [
            'nomor_keputusan'      => 'required|unique:keputusan_kepala_desa,nomor_keputusan,'.$data['id'],
        ]);

        $data->nomor_keputusan = $request->nomor_keputusan;
        $data->tentang = $request->tentang;
        $data->uraian = $request->uraian;
        $data->nomor_dilaporkan = $request->nomor_dilaporkan;
        $data->keterangan = $request->keterangan;

        $data->save();

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
        $data = KeputusanKades::findorfail($id);
        return view('modul/keputusankades/show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KeputusanKades::findorfail($id);
        return view('modul/keputusankades/edit', compact('data'));
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
        $data = KeputusanKades::findorfail($id);

        $this->validate($request, [
            'jenis'      => 'max:100',
        ]);

        $data->nomor_keputusan = $request->nomor_keputusan;
        $data->tentang = $request->tentang;
        $data->uraian = $request->uraian;
        $data->nomor_dilaporkan = $request->nomor_dilaporkan;
        $data->keterangan = $request->keterangan;

        $data->save();

        Session::flash('pesan_sukses', 'Data Keputusan Kepala Desa berhasil di Diperbarui');

        return redirect('data-keputusan-kepala-desa/'.$data->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KeputusanKades::findorfail($id);

        $data->delete();
        Session::flash('pesan_sukses', 'Data Keputusan Kepala Desa Nomor "'. $data->nomor_keputusan .'" Berhasil Dihapus');
        
        return redirect('data-keputusan-kepala-desa');
    }

    public function cetak($keyword)
    {
        $data = KeputusanKades::all();
        $jumlah = count($data);

        $pdf = PDF::loadView('pdf/data-keputusan-kades',compact('data','keyword'))
                    ->setPaper('a4');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
