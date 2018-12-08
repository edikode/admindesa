<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Agenda;

use Session;
use PDF;

class DataAgenda extends Controller
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
        $agenda = Agenda::all();
        return view('modul/agenda/home', compact('agenda','filter','keyword'));
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
        $pd = new Agenda;

        $this->validate($request, [
            'nomor'      => 'required|unique:agenda,nomor,'.$pd['id'],
        ]);

        $pd->tanggal_surat = $request->tanggal_surat;
        $pd->nomor = $request->nomor;
        $pd->tanggal = $request->tanggal;
        $pd->pengirim = $request->pengirim;
        $pd->isi = $request->isi;
        $pd->keterangan = $request->keterangan;
        $pd->jenis = $request->jenis;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Agenda berhasil di Ditambah');

        return redirect('data-agenda');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = Agenda::findorfail($id);
        return view('modul/agenda/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = Agenda::findorfail($id);
        return view('modul/agenda/edit', compact('pd'));
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
        $pd = Agenda::findorfail($id);

        $this->validate($request, [
            'nomor'      => 'required|unique:agenda,nomor,'.$pd['id'],
        ]);

        $pd->tanggal_surat = $request->tanggal_surat;
        $pd->nomor = $request->nomor;
        $pd->tanggal = $request->tanggal;
        $pd->pengirim = $request->pengirim;
        $pd->isi = $request->isi;
        $pd->keterangan = $request->keterangan;
        $pd->jenis = $request->jenis;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Agenda berhasil di Diperbarui');

        return redirect('data-agenda/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = Agenda::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Agenda Nomor: "'. $pd->nomor .'" Berhasil Dihapus');
        
        return redirect('data-agenda');
    }

    public function cetak($keyword)
    {
        $pd = Agenda::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-agenda',compact('pd','keyword'))
                    ->setPaper('a4');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
