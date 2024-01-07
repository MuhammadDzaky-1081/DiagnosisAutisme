<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Pj;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function master(){
        $data['master'] = Aturan::with('diagnosa', 'solusi')->get();
        return view('admin.pages.pratinjau_master', $data);
    }
    public function master_print(){
        $data['data'] = Pj::get()->first();
        $data['master'] = Aturan::with('diagnosa', 'solusi')->get();
        return view('admin.pages.laporan.master', $data);
    }

    public function riwayat(){
        $data['riwayat'] = Riwayat::with('pasien')->get();
        return view('admin.pages.pratinjau_riwayat', $data);
    }
    public function riwayat_print(Request $request){
        $data['riwayat'] = Riwayat::with('pasien')
            // ->whereMonth('tanggal', $request->bulan)
            ->whereYear('tanggal', $request->tahun)
            ->get();
        // $data['bulann'] = $request->tahun.'-'.$request->bulan;
        $data['tahun'] = $request->tahun;
        $data['data'] = Pj::get()->first();

        return view('admin.pages.laporan.riwayat', $data);
    }
}
