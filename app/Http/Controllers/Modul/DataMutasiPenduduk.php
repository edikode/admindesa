<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\MutasiPenduduk;
use App\Models\Induk;

use Session;
use PDF;

class DataMutasiPenduduk extends Controller
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
        $datamutasi = DB::table('data_induk')
            ->join('mutasi_penduduk', 'data_induk.id', '=', 'mutasi_penduduk.data_induk_id')
            ->select('data_induk.nama', 'data_induk.tmp_lahir', 'data_induk.tgl_lahir', 'data_induk.jenis_kelamin', 'data_induk.kewarganegaraan', 'mutasi_penduduk.id', 'mutasi_penduduk.tmp_datang', 'mutasi_penduduk.tgl_datang', 'mutasi_penduduk.tmp_pindah', 'mutasi_penduduk.tgl_pindah', 'mutasi_penduduk.tmp_meninggal', 'mutasi_penduduk.tgl_meninggal', 'mutasi_penduduk.keterangan')
            ->get();
        return view('modul/datamutasi/home', compact('datamutasi','datainduk','filter','keyword'));
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
        $pd->tgl_lahir = tgl_en($request->tgl_lahir);
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
        $pd->dari = datang;

        $pd->save();

        $md = new MutasiPenduduk;

        $md->data_induk_id = $pd->id;
        $md->tmp_datang = $request->tmp_datang;
        $md->tgl_datang = tgl_en($request->tgl_datang);
        $md->jenis = "datang";
        
        $md->save();


        Session::flash('pesan_sukses', 'Data Mutasi Penduduk Desa berhasil di Ditambah');

        return redirect('data-mutasi-penduduk-desa');
    }

    public function pengurangan(Request $request)
    {
        $pd = new MutasiPenduduk;

        $this->validate($request, [
            // 'nik'      => 'required|unique:data_induk,nik,'.$pd['id'],
        ]);

        $pd->data_induk_id = $request->nama;

        if($request->jenis == "pindah"){
            $pd->tmp_pindah = $request->tempat;
            $pd->tgl_pindah = tgl_en($request->tanggal);
            $pd->jenis = "pindah";

            $induk = Induk::findorfail($request->nama);
            $induk->dari = "pindah";
            $induk->save();

        } else {
            $pd->tmp_meninggal = $request->tempat;
            $pd->tgl_meninggal = tgl_en($request->tanggal);
            $pd->jenis = "meninggal";

            $induk = Induk::findorfail($request->nama);
            $induk->dari = "meninggal";
            $induk->save();

        }
        
        $pd->save();

        Session::flash('pesan_sukses', 'Data Mutasi Penduduk Desa berhasil di Ditambah');

        return redirect('data-mutasi-penduduk-desa');
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
            ->join('mutasi_penduduk', 'data_induk.id', '=', 'mutasi_penduduk.data_induk_id')
            ->select('data_induk.nik', 'data_induk.nama', 'data_induk.tmp_lahir', 'data_induk.tgl_lahir', 'data_induk.jenis_kelamin', 'data_induk.kewarganegaraan', 'mutasi_penduduk.id', 'mutasi_penduduk.tmp_datang', 'mutasi_penduduk.tgl_datang', 'mutasi_penduduk.tmp_pindah', 'mutasi_penduduk.tgl_pindah', 'mutasi_penduduk.tmp_meninggal', 'mutasi_penduduk.tgl_meninggal', 'mutasi_penduduk.keterangan')
            ->where('mutasi_penduduk.id',$id)
            ->first();
        return view('modul/datamutasi/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = MutasiPenduduk::findorfail($id);
        $datainduk = Induk::findorfail($pd->data_induk_id);
        return view('modul/datamutasi/edit', compact('pd','datainduk'));
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
        $pd = MutasiPenduduk::findorfail($id);

        $this->validate($request, [
            // 'nik'      => 'required|unique:data_induk,nik,'.$pd['id'],
        ]);

        if($request->jenis == "datang"){
            $pd->tmp_datang = $request->tmp_datang;
            $pd->tgl_datang = tgl_en($request->tgl_datang);
            
        } elseif($request->jenis == "pindah"){
            $pd->tmp_pindah = $request->tmp_pindah;
            $pd->tgl_pindah = tgl_en($request->tgl_pindah);
            
        } elseif($request->jenis == "meninggal"){
            $pd->tmp_meninggal = $request->tmp_meninggal;
            $pd->tgl_meninggal = tgl_en($request->tgl_meninggal);
            
        }
        
        $pd->keterangan = $request->keterangan;

        $pd->save();

        Session::flash('pesan_sukses', 'Data Mutasi Penduduk Desa berhasil di Diperbarui');

        return redirect('data-mutasi-penduduk-desa/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = MutasiPenduduk::findorfail($id);

        $pd->delete();
        Session::flash('pesan_sukses', 'Data Mutasi Penduduk Desa Berhasil Dihapus');
        
        return redirect('data-mutasi-penduduk-desa');
    }

    public function cetak($keyword)
    {
        $pd = DB::table('data_induk')
            ->join('mutasi_penduduk', 'data_induk.id', '=', 'mutasi_penduduk.data_induk_id')
            ->select('data_induk.nama', 'data_induk.tmp_lahir', 'data_induk.tgl_lahir', 'data_induk.jenis_kelamin', 'data_induk.kewarganegaraan', 'mutasi_penduduk.id', 'mutasi_penduduk.tmp_datang', 'mutasi_penduduk.tgl_datang', 'mutasi_penduduk.tmp_pindah', 'mutasi_penduduk.tgl_pindah', 'mutasi_penduduk.tmp_meninggal', 'mutasi_penduduk.tgl_meninggal', 'mutasi_penduduk.keterangan')
            ->get();;
        $jumlah = count($pd);

        $pdf = PDF::loadView('pdf/data-mutasi-penduduk-desa',compact('pd','keyword'))
                    ->setPaper('a4', 'landscape');

        return $pdf->stream();
        // return $pdf->download('Data Peraturan Daerah.pdf');
    }

}
