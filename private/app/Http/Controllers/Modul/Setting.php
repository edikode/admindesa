<?php

namespace App\Http\Controllers\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Auth;
use Hash;
use Image;
use Session;
use PDF;

class Setting extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $filter = "";
        $keyword = "";
        $setting = User::findorfail(Auth::user()->id);
        return view('modul/setting/show', compact('setting','filter','keyword'));
    }

    public function gantipassword()
    {
        $setting = User::findorfail(Auth::user()->id);
        return view('modul/setting/ganti-password', compact('setting','filter','keyword'));
    }

    public function simpanpassword(Request $request)
    {
        $setting = User::findorfail(Auth::user()->id);

        if (Hash::check($request->password, $setting->password)){

            $this->validate($request, [
                'password_baru'  => 'required|min:6',
                'password_baru'  => 'required|min:6|same:password_ulangi'
            ]);
    
            $setting->password = bcrypt($request->password_baru);
            $setting->save();
    
            Session::flash('pesan_sukses', 'Password Berhasil diperbarui');
    
            return redirect('setting');

        } else {
            Session::flash('pesan_error', 'Password lama salah');
            return redirect('setting/ganti-password');
        }
    }

    public function pengguna()
    {
        $setting = User::findorfail(Auth::user()->id);
        return view('modul/setting/edit-pengguna', compact('setting','filter','keyword'));
    }

    public function simpanpengguna(Request $request)
    {
        $setting = User::findorfail(Auth::user()->id);

        $setting->name = $request->nama;
        $setting->email = $request->email;

        if($request->hasFile('foto')) {
            $setting->foto = $this->UploadFoto($request, $setting->name);
        }

        $setting->save();

        Session::flash('pesan_sukses', 'Data Pengguna Berhasil diperbarui');

        return redirect('setting/pengguna');
    }

    public function hapusfotoadmin()
    {
        $setting = User::findorfail(Auth::user()->id);

        if($setting->foto != ""){
            unlink(public_path('upload/gambar/').$setting->foto);
        }

        $setting->foto = "";
        $setting->save();
        Session::flash('pesan_sukses', 'Foto Admin Berhasil Dihapus');
        
        return redirect('setting/pengguna');
    }

    public function infodesa()
    {
        $setting = User::findorfail(Auth::user()->id);
        return view('modul/setting/edit-info-desa', compact('setting','filter','keyword'));
    }

    public function simpaninfodesa(Request $request)
    {
        $setting = User::findorfail(Auth::user()->id);

        $setting->nama_desa   = $request->nama_desa;
        $setting->kode_desa   = $request->kode_desa;
        $setting->kode_pos   = $request->kode_pos;
        $setting->nama_kades   = $request->nama_kades;
        $setting->nip_kades   = $request->nip_kades;
        $setting->alamat_kantor   = $request->alamat_kantor;
        $setting->telepon   = $request->telepon;

        if($request->hasFile('logo_desa')) {
            $setting->logo_desa = $this->UploadLogo($request, $setting->nama_desa);
        }

        $setting->save();

        Session::flash('pesan_sukses', 'Data Informasi Desa Berhasil diperbarui');

        return redirect('setting/info-desa');
    }

    public function hapuslogodesa()
    {
        $setting = User::findorfail(Auth::user()->id);

        if($setting->logo_desa != ""){
            unlink(public_path('upload/gambar/').$setting->logo_desa);
        }

        $setting->logo_desa = "";
        $setting->save();
        Session::flash('pesan_sukses', 'Logo Desa Berhasil Dihapus');
        
        return redirect('setting/info-desa');
    }

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
