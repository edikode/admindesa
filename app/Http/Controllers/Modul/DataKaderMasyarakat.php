<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KaderMasyarakat;

use Session;
use PDF;

class DataKaderMasyarakat extends Controller
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
        $kadermasyarakat = KaderMasyarakat::all();
        return view('modul/kadermasyarakat/home', compact('kadermasyarakat','filter','keyword'));
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
        $pd = new KaderMasyarakat;

        $this->validate($request, [
            // 'nik'      => 'required|unique:data_induk,nik,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->umur = $request->umur;
        $pd->jenis_kelamin = $request->jenis_kelamin;
        $pd->pendidikan = $request->pendidikan;
        $pd->bidang = $request->bidang;
        $pd->alamat = $request->alamat;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Kader Pemberdayaan Masyarakat berhasil di Ditambah');

        return redirect('kader-pendamping-masyarakat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = KaderMasyarakat::findorfail($id);
        return view('modul/kadermasyarakat/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = KaderMasyarakat::findorfail($id);
        return view('modul/kadermasyarakat/edit', compact('pd'));
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
        $pd = KaderMasyarakat::findorfail($id);

        $this->validate($request, [
            // 'nik'      => 'required|unique:data_induk,nik,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->umur = $request->umur;
        $pd->jenis_kelamin = $request->jenis_kelamin;
        $pd->pendidikan = $request->pendidikan;
        $pd->bidang = $request->bidang;
        $pd->alamat = $request->alamat;
        $pd->keterangan = $request->keterangan;
        
        $pd->save();

        Session::flash('pesan_sukses', 'Data Kader Pemberdayaan Masyarakat berhasil di Diperbarui');

        return redirect('kader-pendamping-masyarakat/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = KaderMasyarakat::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Kader Pemberdayaan Masyarakat, NAMA: "'. $pd->nama .'" Berhasil Dihapus');
        
        return redirect('kader-pendamping-masyarakat');
    }

    public function cetak($keyword)
    {
        $pd = KaderMasyarakat::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-kader-pendamping-masyarakat',compact('pd','keyword'))
                    ->setPaper('a4', 'potrait');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
