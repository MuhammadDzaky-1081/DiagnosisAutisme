<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index(){
        $data['data'] = Pengguna::find(Auth::user()->id);
        return view('admin.pages.profil', $data);
    }
    public function edit(Request $request, $id){
        $pass = $request->password;
        if($request->konfirmasi != $pass){
            return redirect()->back()->with('gagal', 'Kata Sandi dan Konfirmasi Kata Sandi Tidak Sama!');
        }else{
            if($pass){
                Pengguna::find($id)->update([
                    'nama_pengguna' => $request->nama,
                    'jenis_kelamin' => $request->jk,
                    'username' => $request->username,
                    'tanggal_lahir' => $request->tgl_lahir,
                    'password' => Hash::make($request->password),
                    'email_telepon' => $request->email,
                ]);
            }else{
                Pengguna::find($id)->update([
                    'nama_pengguna' => $request->nama,
                    'jenis_kelamin' => $request->jk,
                    'username' => $request->username,
                    'tanggal_lahir' => $request->tgl_lahir,
                    'email_telepon' => $request->email,
                ]);
            }
            return redirect()->back()->with('berhasil', 'Profil Berhasil Diperbarui!');
        }
    }
}
