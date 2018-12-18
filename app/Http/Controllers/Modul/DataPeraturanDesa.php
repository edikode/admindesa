<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PeraturanDesa;

use Session;
use PDF;

class DataPeraturanDesa extends Controller
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
        $peraturandesa = PeraturanDesa::all();
        return view('modul/peraturandesa/home', compact('peraturandesa','filter','keyword'));
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
        $data = new PeraturanDesa;

        $this->validate($request, [
            'jenis'      => 'max:100',
        ]);

        $data->jenis = $request->jenis;
        $data->nomor_ditetapkan = $request->nomor_ditetapkan;
        $data->tentang = $request->tentang;
        $data->uraian = $request->uraian;
        $data->tanggal_kesepakatan = tgl_en($request->tanggal_kesepakatan);
        $data->tanggal_dilaporkan = $request->tanggal_dilaporkan;
        $data->tanggal_diundang = $request->tanggal_diundang;
        $data->tanggal_berita_desa = $request->tanggal_berita_desa;
        $data->keterangan = $request->keterangan;

        $data->save();

        Session::flash('pesan_sukses', 'Data Peraturan Desa berhasil di Ditambah');

        return redirect('data-peraturan-desa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PeraturanDesa::findorfail($id);
        return view('modul/peraturandesa/show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PeraturanDesa::findorfail($id);
        return view('modul/peraturandesa/edit', compact('data'));
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
        $data = PeraturanDesa::findorfail($id);

        $this->validate($request, [
            'jenis'      => 'max:100',
        ]);

        $data->jenis = $request->jenis;
        $data->nomor_ditetapkan = $request->nomor_ditetapkan;
        $data->tentang = $request->tentang;
        $data->uraian = $request->uraian;
        $data->tanggal_kesepakatan = tgl_en($request->tanggal_kesepakatan);
        $data->tanggal_dilaporkan = $request->tanggal_dilaporkan;
        $data->tanggal_diundang = $request->tanggal_diundang;
        $data->tanggal_berita_desa = $request->tanggal_berita_desa;
        $data->keterangan = $request->keterangan;

        $data->save();

        Session::flash('pesan_sukses', 'Data Peraturan Desa berhasil di Diperbarui');

        return redirect('data-peraturan-desa/'.$data->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PeraturanDesa::findorfail($id);

        $data->delete();
        Session::flash('pesan_sukses', 'Data Peraturan Desa Nomor "'. $data->nomor_ditetapkan .'" Berhasil Dihapus');
        
        return redirect('data-peraturan-desa');
    }

    public function cetak($keyword)
    {
        $data = PeraturanDesa::all();
        $jumlah = count($data);

        $pdf = PDF::loadView('pdf/data-peraturan-desa',compact('data','keyword'))
                    ->setPaper('a4','landscape');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
