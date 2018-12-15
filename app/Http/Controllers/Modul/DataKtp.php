<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Ktp;
use App\Models\Induk;

use Session;
use PDF;

class DataKtp extends Controller
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
        $dataktp = DB::table('data_induk')
            ->join('ktp_kk', 'data_induk.id', '=', 'ktp_kk.data_induk_id')
            ->select('data_induk.nama', 'data_induk.no_kk', 'data_induk.nik', 'data_induk.tmp_lahir', 'data_induk.tgl_lahir', 'data_induk.jenis_kelamin', 'data_induk.gol_darah',  'data_induk.agama',  'data_induk.pendidikan_terakhir', 'data_induk.pekerjaan', 'data_induk.kewarganegaraan', 'data_induk.status', 'data_induk.alamat', 'ktp_kk.id', 'ktp_kk.tmp_dikeluarkan', 'ktp_kk.tgl_dikeluarkan', 'ktp_kk.status_dikeluarga', 'ktp_kk.ayah', 'ktp_kk.ibu', 'ktp_kk.tgl_didesa', 'ktp_kk.keterangan')
            ->get();
        
        return view('modul/dataktp/home', compact('dataktp','datainduk','filter','keyword'));
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
        $pd = new Ktp;

        $this->validate($request, [
            // 'nik'      => 'required|unique:data_induk,nik,'.$pd['id'],
        ]);

        $pd->data_induk_id = $request->nama;
        $pd->tmp_dikeluarkan = $request->tmp_dikeluarkan;
        $pd->tgl_dikeluarkan = tgl_en($request->tgl_dikeluarkan);
        $pd->status_dikeluarga = $request->status_dikeluarga;
        $pd->ayah = $request->ayah;
        $pd->ibu = $request->ibu;
        $pd->tgl_didesa = tgl_en($request->tgl_didesa);
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Kartu Tanda Penduduk dan Kartu Keluarga berhasil di Ditambah');

        return redirect('data-ktp-dan-kk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = DB::table('data_induk')
            ->join('ktp_kk', 'data_induk.id', '=', 'ktp_kk.data_induk_id')
            ->select('data_induk.nama', 'data_induk.no_kk', 'data_induk.nik', 'data_induk.tmp_lahir', 'data_induk.tgl_lahir', 'data_induk.jenis_kelamin', 'data_induk.gol_darah',  'data_induk.agama',  'data_induk.pendidikan_terakhir', 'data_induk.pekerjaan', 'data_induk.kewarganegaraan', 'data_induk.status', 'data_induk.alamat', 'ktp_kk.id', 'ktp_kk.tmp_dikeluarkan', 'ktp_kk.tgl_dikeluarkan', 'ktp_kk.status_dikeluarga', 'ktp_kk.ayah', 'ktp_kk.ibu', 'ktp_kk.tgl_didesa', 'ktp_kk.keterangan')
            ->where('ktp_kk.id',$id)
            ->first();
        return view('modul/dataktp/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = Ktp::findorfail($id);
        $datainduk = Induk::findorfail($pd->data_induk_id);
        return view('modul/dataktp/edit', compact('pd','datainduk'));
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
        $pd = Ktp::findorfail($id);

        $this->validate($request, [
            // 'nik'      => 'required|unique:data_induk,nik,'.$pd['id'],
        ]);

        $pd->data_induk_id = $request->nama;
        $pd->tmp_dikeluarkan = $request->tmp_dikeluarkan;
        $pd->tgl_dikeluarkan = tgl_en($request->tgl_dikeluarkan);
        $pd->status_dikeluarga = $request->status_dikeluarga;
        $pd->ayah = $request->ayah;
        $pd->ibu = $request->ibu;
        $pd->tgl_didesa = tgl_en($request->tgl_didesa);
        $pd->keterangan = $request->keterangan;
        
        $pd->save();

        Session::flash('pesan_sukses', 'Data Kartu Tanda Penduduk dan Kartu Keluarga berhasil di Diperbarui');

        return redirect('data-ktp-dan-kk/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = Ktp::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Kartu Tanda Penduduk dan Kartu Keluarga Berhasil Dihapus');
        
        return redirect('data-ktp-dan-kk');
    }

    public function cetak($keyword)
    {
        $pd = DB::table('data_induk')
            ->join('ktp_kk', 'data_induk.id', '=', 'ktp_kk.data_induk_id')
            ->select('data_induk.nama', 'data_induk.no_kk', 'data_induk.nik', 'data_induk.tmp_lahir', 'data_induk.tgl_lahir', 'data_induk.jenis_kelamin', 'data_induk.gol_darah',  'data_induk.agama',  'data_induk.pendidikan_terakhir', 'data_induk.pekerjaan', 'data_induk.kewarganegaraan', 'data_induk.status', 'data_induk.alamat', 'ktp_kk.id', 'ktp_kk.tmp_dikeluarkan', 'ktp_kk.tgl_dikeluarkan', 'ktp_kk.status_dikeluarga', 'ktp_kk.ayah', 'ktp_kk.ibu', 'ktp_kk.tgl_didesa', 'ktp_kk.keterangan')
            ->get();
            
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-ktp-dan-kk',compact('pd','keyword'))
                    ->setPaper('a4', 'landscape');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
