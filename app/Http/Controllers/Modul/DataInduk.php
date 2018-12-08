<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Induk;

use Session;
use PDF;

class DataInduk extends Controller
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
        $datainduk = Induk::all();
        return view('modul/datainduk/home', compact('datainduk','filter','keyword'));
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
        $pd = new Induk;

        $this->validate($request, [
            'nik'      => 'required|unique:data_induk,nik,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->jenis_kelamin = $request->jenis_kelamin;
        $pd->status = $request->status;
        $pd->tmp_lahir = $request->tmp_lahir;
        $pd->tgl_lahir = $request->tgl_lahir;
        $pd->agama = $request->agama;
        $pd->pendidikan_terakhir = $request->pendidikan_terakhir;
        $pd->pekerjaan = $request->pekerjaan;
        $pd->dapat_membaca = $request->dapat_membaca;
        $pd->kewarganegaraan = $request->kewarganegaraan;
        $pd->alamat = $request->alamat;
        $pd->kedudukan = $request->kedudukan;
        $pd->nik = $request->nik;
        $pd->no_kk = $request->no_kk;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Induk Penduduk Desa berhasil di Ditambah');

        return redirect('data-induk-penduduk-desa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = Induk::findorfail($id);
        return view('modul/datainduk/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = Induk::findorfail($id);
        return view('modul/datainduk/edit', compact('pd'));
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
        $pd = Induk::findorfail($id);

        $this->validate($request, [
            'nik'      => 'required|unique:data_induk,nik,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->jenis_kelamin = $request->jenis_kelamin;
        $pd->status = $request->status;
        $pd->tmp_lahir = $request->tmp_lahir;
        $pd->tgl_lahir = $request->tgl_lahir;
        $pd->agama = $request->agama;
        $pd->pendidikan_terakhir = $request->pendidikan_terakhir;
        $pd->pekerjaan = $request->pekerjaan;
        $pd->dapat_membaca = $request->dapat_membaca;
        $pd->kewarganegaraan = $request->kewarganegaraan;
        $pd->alamat = $request->alamat;
        $pd->kedudukan = $request->kedudukan;
        $pd->nik = $request->nik;
        $pd->no_kk = $request->no_kk;
        $pd->keterangan = $request->keterangan;
        
        $pd->save();

        Session::flash('pesan_sukses', 'Data Induk Penduduk Desa berhasil di Diperbarui');

        return redirect('data-induk-penduduk-desa/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = Induk::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Induk Penduduk Desa, NAMA: "'. $pd->nama .'" Berhasil Dihapus');
        
        return redirect('data-induk-penduduk-desa');
    }

    public function cetak($keyword)
    {
        $pd = Induk::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-induk-penduduk-desa',compact('pd','keyword'))
                    ->setPaper('a4');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
