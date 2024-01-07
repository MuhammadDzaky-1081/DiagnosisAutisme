<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Himpunanfuzzifikasi;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HimpunanController extends Controller
{
    public function index(){
        $data['kriteria'] = Kriteria::all();
        $data['himpunan'] = Himpunanfuzzifikasi::with('kriteria')->get();
        return view('admin.pages.data_fuzzifikasi', $data);
    }
    public function tambah(Request $request){
        Himpunanfuzzifikasi::create([
            'kriteria_id' => $request->kriteria_id,
            'kode_himpunan' => $request->kode_himpunan,
            'nama_himpunan' => $request->nama_himpunan,
            'batas_atas' => $request->batas_atas,
            'batas_bawah' => $request->batas_bawah,
            'batas_tengah1' => $request->batas_tengah1,
            'batas_tengah2' => $request->batas_tengah2,
        ]);
        return redirect()->route('himpunan');
    }
    public function edit(Request $request, $id){
        Himpunanfuzzifikasi::find($id)->update([
            'kriteria_id' => $request->kriteria_id,
            'kode_himpunan' => $request->kode_himpunan,
            'nama_himpunan' => $request->nama_himpunan,
            'batas_atas' => $request->batas_atas,
            'batas_bawah' => $request->batas_bawah,
            'batas_tengah1' => $request->batas_tengah1,
            'batas_tengah2' => $request->batas_tengah2,
        ]);
        return redirect()->route('himpunan');
    }
    public function hapus($id){
        Himpunanfuzzifikasi::find($id)->delete();
        return redirect()->route('himpunan');
    }
}
