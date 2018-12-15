<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;

use Image;
use Session;
use PDF;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $this->validate($request, [
            'nama'      => 'required|unique:users,name,'.$user['id'],
            'email'     => 'required|unique:users,email,'.$user['id'],
            // 'telepon'   =>   'numeric|min:11',
            'password'  => 'required|min:6'
            // 'password'  => 'required|min:6|same:konfirmasiPassword'
        ]);

        $user->name   = $request->nama;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->level    = "Admin Desa";
        $user->activation_token = str_random(255);

        $user->nama_desa   = $request->nama_desa;
        $user->kode_desa   = $request->kode_desa;
        $user->kode_pos   = $request->kode_pos;
        $user->nama_kades   = $request->nama_kades;
        $user->nip_kades   = $request->nip_kades;
        $user->alamat_kantor   = $request->alamat_kantor;
        $user->telepon   = $request->telepon;

        if($request->hasFile('foto')) {
            $user->foto = $this->UploadFoto($request, $user->name);
        }

        if($request->hasFile('logo_desa')) {
            $user->logo_desa = $this->UploadLogo($request, $user->nama_desa);
        }

        $user->save();

        // dd("tes");

        Session::flash('pesan_sukses', 'Registrasi Berhasil!!');

        return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = User::findorfail($id);
        return view('modul/user/show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = User::findorfail($id);
        return view('modul/user/edit', compact('pd'));
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
        $pd = User::findorfail($id);

        $this->validate($request, [
            'nomor'      => 'required|unique:user,nomor,'.$pd['id'],
        ]);

        $pd->tanggal_surat = $request->tanggal_surat;
        $pd->nomor = $request->nomor;
        $pd->tanggal = $request->tanggal;
        $pd->pengirim = $request->pengirim;
        $pd->isi = $request->isi;
        $pd->keterangan = $request->keterangan;
        $pd->jenis = $request->jenis;

        $pd->save();

        Session::flash('pesan_sukses', 'Data user berhasil di Diperbarui');

        return redirect('data-user/'.$pd->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function UploadFoto(Request $request, $nama)
    {
        $gambar = $request->file('foto');
        $ext    = $gambar->getClientOriginalExtension();

        if($request->file('foto')->isValid()) {

            $gambar_nama = $nama . ".$ext";
            $upload_path = "upload/gambar";
            $request->file('foto')->move($upload_path, $gambar_nama);
            
            $imgkecil = Image::make($upload_path. "/" .$gambar_nama);
            $imgkecil->fit(400, 400);
            $imgkecil->save();

            return $gambar_nama;
        }
        return false;
    }

    private function UploadLogo(Request $request, $nama)
    {
        $gambar = $request->file('logo_desa');
        $ext    = $gambar->getClientOriginalExtension();

        if($request->file('logo_desa')->isValid()) {

            $gambar_nama = $nama . ".$ext";
            $upload_path = "upload/gambar";
            $request->file('logo_desa')->move($upload_path, $gambar_nama);
            
            $imgkecil = Image::make($upload_path. "/" .$gambar_nama);
            $imgkecil->fit(200, 250);
            $imgkecil->save();

            return $gambar_nama;
        }
        return false;
    }

}
