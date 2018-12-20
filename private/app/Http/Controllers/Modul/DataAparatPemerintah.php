<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Aparat;

use Session;
use PDF;

class DataAparatPemerintah extends Controller
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
        $aparatpemerintah = Aparat::all();
        return view('modul/aparatpemerintah/home', compact('aparatpemerintah','filter','keyword'));
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
        $pd = new Aparat;

        $this->validate($request, [
            'nip'      => 'min:18|numeric|unique:aparat_pemerintah_desa,nip,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->niap = $request->niap;
        $pd->nip = $request->nip;
        $pd->jenis_kelamin = $request->jenis_kelamin;
        $pd->ttl = $request->ttl;
        $pd->agama = $request->agama;
        $pd->pangkat = $request->pangkat;
        $pd->jabatan = $request->jabatan;
        $pd->pendidikan_terakhir = $request->pendidikan_terakhir;
        $pd->nomor_pengangkatan = $request->nomor_pengangkatan;
        $pd->nomor_pemberhentian = $request->nomor_pemberhentian;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Aparat Pemerintah Desa berhasil di Ditambah');

        return redirect('data-aparat-pemerintah-desa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = Aparat::findorfail($id);
        return view('modul/aparatpemerintah/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = Aparat::findorfail($id);
        return view('modul/aparatpemerintah/edit', compact('pd'));
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
        $pd = Aparat::findorfail($id);

         $this->validate($request, [
            'nip'      => 'min:18|numeric|unique:aparat_pemerintah_desa,nip,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->niap = $request->niap;
        $pd->nip = $request->nip;
        $pd->jenis_kelamin = $request->jenis_kelamin;
        $pd->ttl = $request->ttl;
        $pd->agama = $request->agama;
        $pd->pangkat = $request->pangkat;
        $pd->jabatan = $request->jabatan;
        $pd->pendidikan_terakhir = $request->pendidikan_terakhir;
        $pd->nomor_pengangkatan = $request->nomor_pengangkatan;
        $pd->nomor_pemberhentian = $request->nomor_pemberhentian;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Aparat Pemerintah Desa berhasil di Diperbarui');

        return redirect('data-aparat-pemerintah-desa/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = Aparat::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Aparat Pemerintah Desa NAMA: "'. $pd->nama .'" Berhasil Dihapus');
        
        return redirect('data-aparat-pemerintah-desa');
    }

    public function cetak($keyword)
    {
        $pd = Aparat::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-aparat-pemerintah-desa',compact('pd','keyword'))
                    ->setPaper('a4','landscape');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
