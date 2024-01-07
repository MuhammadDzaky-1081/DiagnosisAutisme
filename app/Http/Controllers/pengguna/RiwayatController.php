<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use App\Models\Pj;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index(){
        $data['riwayat'] = Riwayat::where('pasien_id', Auth::user()->id)->get();
        return view('pengguna.pages.riwayat', $data);
    }
    public function cetak(){
        $data['riwayat'] = Riwayat::where('pasien_id', Auth::user()->id)->get();
        $data['data'] = Pj::get()->first();
        return view('pengguna.pages.cetak_riwayat', $data);
    }
}
