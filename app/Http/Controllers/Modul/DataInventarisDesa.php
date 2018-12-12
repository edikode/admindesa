<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\InventarisDesa;

use Session;
use PDF;

class DataInventarisDesa extends Controller
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
        $data = InventarisDesa::all();
        $inventarisdesa = InventarisDesa::all();
        return view('modul/inventarisdesa/home', compact('inventarisdesa','data','filter','keyword'));
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
        $pd = new InventarisDesa;

        $this->validate($request, [
            // 'tanggal_surat'      => 'required|unique:ekspedisi,tanggal_surat,'.$pd['id'],
        ]);

        $pd->jenis = $request->jenis;
        $pd->beli_sendiri = $request->beli_sendiri;
        $pd->pemerintah = $request->pemerintah;
        $pd->provinsi = $request->provinsi;
        $pd->kota = $request->kota;
        $pd->sumbangan = $request->sumbangan;
        $pd->awal_baik = $request->awal_baik;
        $pd->awal_rusak = $request->awal_rusak;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Inventaris Desa berhasil di Ditambah');

        return redirect('data-inventaris-kekayaan-desa');
    }

    public function penghapusan(Request $request)
    {
        $pd = InventarisDesa::findorfail($request->jenis);

        $this->validate($request, [
            // 'tanggal_surat'      => 'required|unique:ekspedisi,tanggal_surat,'.$pd['id'],
        ]);

        $pd->rusak = $request->rusak;
        $pd->dijual = $request->dijual;
        $pd->disumbangkan = $request->disumbangkan;
        $pd->tgl_hapus = $request->tgl_hapus;
        $pd->akhir_baik = $request->akhir_baik;
        $pd->akhir_rusak = $request->akhir_rusak;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Inventaris Desa berhasil di Hapus');

        return redirect('data-inventaris-kekayaan-desa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = InventarisDesa::findorfail($id);
        return view('modul/inventarisdesa/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = InventarisDesa::findorfail($id);
        return view('modul/inventarisdesa/edit', compact('pd'));
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
        $pd = InventarisDesa::findorfail($id);

        $pd->jenis = $request->jenis;
        $pd->beli_sendiri = $request->beli_sendiri;
        $pd->pemerintah = $request->pemerintah;
        $pd->provinsi = $request->provinsi;
        $pd->kota = $request->kota;
        $pd->sumbangan = $request->sumbangan;
        $pd->awal_baik = $request->awal_baik;
        $pd->awal_rusak = $request->awal_rusak;
        $pd->rusak = $request->rusak;
        $pd->dijual = $request->dijual;
        $pd->disumbangkan = $request->disumbangkan;
        $pd->tgl_hapus = $request->tgl_hapus;
        $pd->akhir_baik = $request->akhir_baik;
        $pd->akhir_rusak = $request->akhir_rusak;
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Inventaris berhasil di Diperbarui');

        return redirect('data-inventaris-kekayaan-desa/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = InventarisDesa::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Inventaris : "'. $pd->jenis .'" Berhasil Dihapus');
        
        return redirect('data-inventaris-kekayaan-desa');
    }

    public function cetak($keyword)
    {
        $pd = InventarisDesa::all();
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-inventaris-kekayaan-desa',compact('pd','keyword'))
                    ->setPaper('a4');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
