<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Session;
use Route;
use Storage;
use Image;
use App\Http\Requests;
use App\Models\User;

class UserAdmin extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $user = User::all();

        return view('admin/user/home', compact('user'));
    }

    public function tambah(Request $request)
    {
    
        $user = new User;

        $this->validate($request, [
            'nama'      => 'unique:users,name,'.$user['id'],
        ]);

        $user->name = $request->nama;
        $user->save();

        return redirect('admin/pengguna/edit/' . $user->id);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin/user/edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'nama'  	=> 'required|unique:users,name,'.$user['id'],
            'email'  	=> 'required|unique:users,email,'.$user['id'],
            'password'  => 'required|min:6',
            'password'  => 'required|min:6|same:konfirmasiPassword'
        ]);

        $user->name = $request->nama;
        $user->email = $request->email;
        $user->status    = false;
        $user->activation_token = str_random(255);
        $gambar =  Str::slug($request->nama);

        if($request->hasFile('gambar')) {
            $user->gambar = $this->UploadGambar($request, $gambar);
        }

        if ($request->password != $user->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        Session::flash('flash_message', 'Data Pengguna berhasil di perbarui');

        return redirect('admin/pengguna/edit/' . $id);

    }

    public function aktif($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        Session::flash('flash_message', 'Akun '. $user->name .' Diaktifkan');

        return redirect('admin/pengguna');
    }

     public function nonaktif($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();

        Session::flash('flash_message', 'Akun '. $user->name .' Dinonaktifkan');

        return redirect('admin/pengguna');
    }

    private function UploadGambar(Request $request, $link)
    {
        $gambar = $request->file('gambar');
        $ext    = $gambar->getClientOriginalExtension();

        if($request->file('gambar')->isValid()) {

            $gambar_nama = $link . ".$ext";
            $upload_path = "upload/user/kecil";
            $upload_path2 = "upload/user/sedang";
            $request->file('gambar')->move($upload_path, $gambar_nama);
            
            copy($upload_path. "/" .$gambar_nama, $upload_path2. "/" .$gambar_nama);

            $imgkecil = Image::make($upload_path. "/" .$gambar_nama);
            $imgkecil->fit(400, 400);
            $imgkecil->save();

            $imgsedang = Image::make($upload_path2. "/" .$gambar_nama);
            $imgsedang->fit(600, 300);
            $imgsedang->save();

            return $gambar_nama;
        }

        return false;
    }

    public function hapus($id)
    {
        $user = User::find($id);

        if($user->gambar != ""){

            if(file_exists(public_path('upload/user/kecil').$user->gambar)) {
                unlink(public_path('upload/user/kecil').$user->gambar);
            }

            if(file_exists(public_path('upload/user/sedang').$user->gambar)) {
                unlink(public_path('upload/user/sedang').$user->gambar);
            }
        }

        $user->delete();

        Session::flash('flash_message', 'Data '. $user->nama .' Berhasil Dihapus');

        return redirect('admin/pengguna');
    }

    public function hapusGambar($id)
    {
        $user = User::find($id);

        if(file_exists(public_path('upload/user/kecil/').$user->gambar)) {
            unlink(public_path('upload/user/kecil/').$user->gambar);

            if(file_exists(public_path('upload/user/sedang/').$user->gambar)) {
                unlink(public_path('upload/user/sedang/').$user->gambar);
            }
            
            $user->gambar = "";
            $user->save();
        }

        return redirect('admin/pengguna/edit/' . $user->id);
    }

    // public function changePassword(Request $request){
    
    //     if (!(Hash::check($request->get('password'), Auth::user()->password))) {
    //         // The passwords matches
    //         return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
    //     }

    //     if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
    //         //Current password and new password are same
    //         return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    //     }

    //     $validatedData = $request->validate([
    //                                         'current-password' => 'required',
    //                                         'new-password' => 'required|string|min:6|confirmed',
    //                                         ]);
    //     // Change Password
    //     $user = Auth::user();
    //     $user->password = bcrypt($request->get('password'));
    //     $user->save();
    //     return redirect()->back()->with("success","Password changed successfully !");
    // }
}
