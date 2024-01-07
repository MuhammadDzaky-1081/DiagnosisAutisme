<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(){
        $data['pengguna'] = Pasien::orderBy('id', 'desc')->get();
        return view('admin.pages.pengguna', $data);
    }
    public function hapus($id){
        Pasien::find($id)->delete();
        return redirect()->back();
    }
}
