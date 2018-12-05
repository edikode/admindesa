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
        $pd = new PeraturanDesa;

        $this->validate($request, [
            'jenis'      => 'max:100',
        ]);

        $pd->jenis = $request->jenis;
        $pd->nomor_ditetapkan = $request->nomor_ditetapkan;
        $pd->tentang = $request->tentang;
        $pd->uraian = $request->uraian;
        $pd->tanggal_kesepakatan = $request->tanggal_kesepakatan;
        $pd->tanggal_dilaporkan = $request->tanggal_dilaporkan;
        $pd->tanggal_diundang = $request->tanggal_diundang;
        $pd->tanggal_berita_desa = $request->tanggal_berita_desa;
        $pd->keterangan = $request->keterangan;

        $pd->save();

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
        $pd = PeraturanDesa::findorfail($id);
        return view('modul/peraturandesa/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = PeraturanDesa::findorfail($id);
        return view('modul/peraturandesa/edit', compact('pd'));
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
        $pd = PeraturanDesa::findorfail($id);

        $this->validate($request, [
            'jenis'      => 'max:100',
        ]);

        $pd->jenis = $request->jenis;
        $pd->nomor_ditetapkan = $request->nomor_ditetapkan;
        $pd->tentang = $request->tentang;
        $pd->uraian = $request->uraian;
        $pd->tanggal_kesepakatan = $request->tanggal_kesepakatan;
        $pd->tanggal_dilaporkan = $request->tanggal_dilaporkan;
        $pd->tanggal_diundang = $request->tanggal_diundang;
        $pd->tanggal_berita_desa = $request->tanggal_berita_desa;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Peraturan Desa berhasil di Diperbarui');

        return redirect('data-peraturan-desa/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = PeraturanDesa::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Peraturan Desa Nomor "'. $pd->nomor_ditetapkan .'" Berhasil Dihapus');
        
        return redirect('data-peraturan-desa');
    }

    public function cetak($keyword)
    {
        $pd = PeraturanDesa::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-peraturan-desa',compact('pd','keyword'))
                    ->setPaper('a4');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
