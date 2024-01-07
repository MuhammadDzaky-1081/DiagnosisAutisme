<?php

namespace App\Http\Controllers\pasien;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilpasienController extends Controller
{
    public function index(){
        $data['data'] = Pasien::find(Auth::user()->id);
        return view('pengguna.pages.profil', $data);
    }
    public function edit(Request $request, $id){
        $pass = $request->password;
        if($request->konfirmasi != $pass){
            return redirect()->back()->with('gagal', 'Kata Sandi dan Konfirmasi Kata Sandi Tidak Sama!');
        }else{
            if($pass){
                Pasien::find($id)->update([
                    'nama_pasien' => $request->nama,
                    'jenis_kelamin' => $request->jk,
                    'username' => $request->username,
                    'tanggal_lahir' => $request->tgl_lahir,
                    'password' => Hash::make($request->password),
                    'email_telepon' => $request->email,
                ]);
            }else{
                Pasien::find($id)->update([
                    'nama_pasien' => $request->nama,
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
