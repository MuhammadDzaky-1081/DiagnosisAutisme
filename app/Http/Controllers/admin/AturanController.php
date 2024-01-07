<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Diagnosis;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class AturanController extends Controller
{
    public function index(){
        $data['aturan'] = Aturan::with('diagnosa')->get();
        return view('admin.pages.aturan', $data);
    }
    public function form(){
        $data['diagnosis'] = Diagnosis::all();
        $data['kriteria'] = Kriteria::all();
        return view('admin.pages.form.aturan', $data);
    }
    public function form_edit($id){
        $data['data'] = Aturan::find($id);
        $data['diagnosis'] = Diagnosis::all();
        return view('admin.pages.form.edit_aturan', $data);
    }
    public function tambah(Request $request){
        Aturan::create([
            'diagnosa_id' => $request->diagnosa_id,
            'h1' => $request->himpunan_id[1] ?? null,
            'h2' => $request->himpunan_id[2] ?? null,
            'h3' => $request->himpunan_id[3] ?? null,
            'h4' => $request->himpunan_id[4] ?? null,
            'h5' => $request->himpunan_id[5] ?? null,
            'a_predikat' => $request->a_predikat,
            'z_score' => $request->z_score,
            'hasil_akurasi' => $request->hasil_akurasi,
            'persentase' => $request->persentase,
            'no_aturan' => $request->no_aturan,
            'operator' => $request->operator,
            'total' => $request->total
        ]);
        return redirect()->back()->with('berhasil', 'Data Berhasil Ditambah');
    }
    public function edit(Request $request, $id){
        Aturan::find($id)->update([
            'a_predikat' => $request->a_predikat,
            'z_score' => $request->z_score,
            'total' => $request->total,
            'operator' => $request->operator,
            'no_aturan' => $request->no_aturan,
            'hasil_akurasi' => $request->hasil_akurasi,
            'persentase' => $request->persentase
        ]);
        return redirect()->route('aturan');
    }
    public function hapus($id){
        Aturan::find($id)->delete();
        return redirect()->back();
    }

    public function ambilbobot_diagnosa(Request $request){
        $data = Diagnosis::find($request->id);
        return response()->json($data);
    }
}
