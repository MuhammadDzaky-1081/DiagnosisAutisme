<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }

    public function postregister(Request $request){
        $username = Pasien::where('username', $request->username)->get()->first();
        if($username){
            return redirect()->route('register')->with('warning', 'Username Sudah Terdaftar!');
        }elseif($request->password != $request->konfirmasi){
            return redirect()->route('register')->with('gagal', 'Kata Sandi dan Konfirmasi Kata Sandi Tidak Sama!');
        }
        else{
            Pasien::create([
                'nama_pasien' => $request->nama,
                'tanggal_lahir' => $request->tgl_lahir,
                'email_telepon' => $request->email_telepon,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'jenis_kelamin' => $request->jenis_kelamin,
                'status_akun' => $request->status_akun
            ]);
            return redirect()->route('login')->with('berhasil', 'Register Berhasil');
        }
    }
    public function postlogin(Request $request){
        $login = [
            'username' => $request->username,
            'password' => $request->password,
            'status_akun' => $request->status_akun
        ];
        // dd($login);
        if(Auth::guard('web')->attempt($login)){
            return redirect()->route('home');
        }elseif(Auth::guard('pasien')->attempt($login)){
            return redirect()->route('pasien.home');
        }else{
            return redirect()->back()->with('gagal', 'Email atau Password Salah!');
        }
    }
    public function logout(){
        if(Auth::guard('web')->check()){
            Auth::guard('web')->logout();
        }elseif(Auth::guard('pasien')->check()){
            Auth::guard('pasien')->logout();
        }
        return redirect()->route('login');
    }
}
