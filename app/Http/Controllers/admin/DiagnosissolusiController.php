<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use App\Models\Diagnosissolusi;
use Illuminate\Http\Request;

class DiagnosissolusiController extends Controller
{
    public function index(){
        $data['diagnosa'] = Diagnosis::all();
        $data['solusi'] = Diagnosissolusi::with('diagnosa')->get();
        return view('admin.pages.diagnosis_solusi', $data);
    }
    public function tambah(Request $request){
        Diagnosissolusi::create([
            'diagnosa_id' => $request->diagnosa_id,
            'solusi' => $request->solusi
        ]);
        return redirect()->route('solusi');
    }
    public function edit(Request $request, $id){
        Diagnosissolusi::find($id)->update([
            'diagnosa_id' => $request->diagnosa_id,
            'solusi' => $request->solusi
        ]);
        return redirect()->route('solusi');
    }
    public function hapus($id){
        Diagnosissolusi::find($id)->delete();
        return redirect()->back();
    }
}
