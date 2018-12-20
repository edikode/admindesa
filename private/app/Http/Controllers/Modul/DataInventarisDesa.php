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
        $data = new InventarisDesa;

        $this->validate($request, [
            // 'tanggal_surat'      => 'required|unique:ekspedisi,tanggal_surat,'.$data['id'],
        ]);

        $data->jenis = $request->jenis;
        $data->beli_sendiri = $request->beli_sendiri;
        $data->pemerintah = $request->pemerintah;
        $data->provinsi = $request->provinsi;
        $data->kota = $request->kota;
        $data->sumbangan = $request->sumbangan;
        $data->awal_baik = $request->awal_baik;
        $data->awal_rusak = $request->awal_rusak;
        $data->keterangan = $request->keterangan;

        $data->save();

        Session::flash('pesan_sukses', 'Data Inventaris Desa berhasil di Ditambah');

        return redirect('data-inventaris-kekayaan-desa');
    }

    public function penghapusan(Request $request)
    {
        $data = InventarisDesa::findorfail($request->jenis);

        $this->validate($request, [
            // 'tanggal_surat'      => 'required|unique:ekspedisi,tanggal_surat,'.$data['id'],
        ]);

        $data->rusak = $request->rusak;
        $data->dijual = $request->dijual;
        $data->disumbangkan = $request->disumbangkan;
        $data->tgl_hapus = tgl_en($request->tgl_hapus);
        $data->akhir_baik = $request->akhir_baik;
        $data->akhir_rusak = $request->akhir_rusak;

        $data->save();

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
        $data = InventarisDesa::findorfail($id);
        return view('modul/inventarisdesa/show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = InventarisDesa::findorfail($id);
        return view('modul/inventarisdesa/edit', compact('data'));
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
        $data = InventarisDesa::findorfail($id);

        $data->jenis = $request->jenis;
        $data->beli_sendiri = $request->beli_sendiri;
        $data->pemerintah = $request->pemerintah;
        $data->provinsi = $request->provinsi;
        $data->kota = $request->kota;
        $data->sumbangan = $request->sumbangan;
        $data->awal_baik = $request->awal_baik;
        $data->awal_rusak = $request->awal_rusak;
        $data->rusak = $request->rusak;
        $data->dijual = $request->dijual;
        $data->disumbangkan = $request->disumbangkan;
        $data->tgl_hapus = tgl_en($request->tgl_hapus);
        $data->akhir_baik = $request->akhir_baik;
        $data->akhir_rusak = $request->akhir_rusak;
        $data->keterangan = $request->keterangan;

        $data->save();

        Session::flash('pesan_sukses', 'Data Inventaris berhasil di Diperbarui');

        return redirect('data-inventaris-kekayaan-desa/'.$data->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = InventarisDesa::findorfail($id);

        $data->delete();
        Session::flash('pesan_sukses', 'Data Inventaris : "'. $data->jenis .'" Berhasil Dihapus');
        
        return redirect('data-inventaris-kekayaan-desa');
    }

    public function cetak($keyword)
    {
        $data = InventarisDesa::all();
        $jumlah = count($data);

        $pdf = PDF::loadView('pdf/data-inventaris-kekayaan-desa',compact('data','keyword'))
                    ->setPaper('a4','landscape');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
