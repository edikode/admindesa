<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PendudukSementara;

use Session;
use PDF;

class DataPendudukSementara extends Controller
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
        $penduduksementara = PendudukSementara::all();
        return view('modul/penduduksementara/home', compact('penduduksementara','filter','keyword'));
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
        $pd = new PendudukSementara;

        $this->validate($request, [
            // 'nik'      => 'required|unique:data_induk,nik,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->jenis_kelamin = $request->jenis_kelamin;
        $pd->nomor_identitas = $request->nomor_identitas;
        $pd->tmp_lahir = $request->tmp_lahir;
        $pd->tgl_lahir = $request->tgl_lahir;
        $pd->pekerjaan = $request->pekerjaan;
        $pd->kewarganegaraan = $request->kewarganegaraan;
        $pd->datang_dari = $request->datang_dari;
        $pd->tujuan = $request->tujuan;
        $pd->nama_didatangi = $request->nama_didatangi;
        $pd->alamat_didatangi = $request->alamat_didatangi;
        $pd->datang_tgl = $request->datang_tgl;
        $pd->pergi_tgl = $request->pergi_tgl;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Penduduk Sementara berhasil di Ditambah');

        return redirect('data-penduduk-sementara');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = PendudukSementara::findorfail($id);
        return view('modul/penduduksementara/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = PendudukSementara::findorfail($id);
        return view('modul/penduduksementara/edit', compact('pd'));
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
        $pd = PendudukSementara::findorfail($id);

        $this->validate($request, [
            // 'nik'      => 'required|unique:data_induk,nik,'.$pd['id'],
        ]);

        $pd->nama = $request->nama;
        $pd->jenis_kelamin = $request->jenis_kelamin;
        $pd->nomor_identitas = $request->nomor_identitas;
        $pd->tmp_lahir = $request->tmp_lahir;
        $pd->tgl_lahir = $request->tgl_lahir;
        $pd->pekerjaan = $request->pekerjaan;
        $pd->kewarganegaraan = $request->kewarganegaraan;
        $pd->datang_dari = $request->datang_dari;
        $pd->tujuan = $request->tujuan;
        $pd->nama_didatangi = $request->nama_didatangi;
        $pd->alamat_didatangi = $request->alamat_didatangi;
        $pd->datang_tgl = $request->datang_tgl;
        $pd->pergi_tgl = $request->pergi_tgl;
        $pd->keterangan = $request->keterangan;
        
        $pd->save();

        Session::flash('pesan_sukses', 'Data Penduduk Sementara berhasil di Diperbarui');

        return redirect('data-penduduk-sementara/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = PendudukSementara::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Penduduk Sementara, NAMA: "'. $pd->nama .'" Berhasil Dihapus');
        
        return redirect('data-penduduk-sementara');
    }

    public function cetak($keyword)
    {
        $pd = PendudukSementara::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-penduduk-sementara',compact('pd','keyword'))
                    ->setPaper('a4', 'landscape');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
