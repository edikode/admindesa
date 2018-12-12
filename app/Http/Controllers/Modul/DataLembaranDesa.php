<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LembaranDesa;

use Session;
use PDF;

class DataLembaranDesa extends Controller
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
        $lembarandesa = LembaranDesa::all();
        return view('modul/lembarandesa/home', compact('lembarandesa','filter','keyword'));
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
        $ld = new LembaranDesa;

        $this->validate($request, [
            'jenis'      => 'max:100',
        ]);

        $ld->jenis = $request->jenis;
        $ld->nomor_ditetapkan = $request->nomor_ditetapkan;
        $ld->tentang = $request->tentang;
        $ld->tanggal_diundangkan = $request->tanggal_diundangkan;
        $ld->nomor_diundangkan = $request->nomor_diundangkan;
        $ld->keterangan = $request->keterangan;

        $ld->save();

        Session::flash('pesan_sukses', 'Data Lembaran Desa Desa berhasil di Ditambah');

        return redirect('data-lembaran-desa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ld = LembaranDesa::findorfail($id);
        return view('modul/lembarandesa/show', compact('ld'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ld = LembaranDesa::findorfail($id);
        return view('modul/lembarandesa/edit', compact('ld'));
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
        $ld = LembaranDesa::findorfail($id);

        $this->validate($request, [
            'jenis'      => 'max:100',
        ]);

        $ld->jenis = $request->jenis;
        $ld->nomor_ditetapkan = $request->nomor_ditetapkan;
        $ld->tentang = $request->tentang;
        $ld->tanggal_diundangkan = $request->tanggal_diundangkan;
        $ld->nomor_diundangkan = $request->nomor_diundangkan;
        $ld->keterangan = $request->keterangan;


        $ld->save();

        Session::flash('pesan_sukses', 'Data Lembaran Desa berhasil di Diperbarui');

        return redirect('data-lembaran-desa/'.$ld->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ld = LembaranDesa::findorfail($id);

        $ld->delete();
        Session::flash('pesan_sukses', 'Data Lembaran Desa, "'. $ld->jenis .'" Berhasil Dihapus');
        
        return redirect('data-lembaran-desa');
    }

    public function cetak($keyword)
    {
        $ld = LembaranDesa::all();
        $jumlah = count($ld);

        $pdf = PDF::loadView('pdf/data-lembaran-desa',compact('ld','keyword'))
                    ->setPaper('a4');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
