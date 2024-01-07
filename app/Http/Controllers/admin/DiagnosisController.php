<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    public function index(){
        $data['diagnosis'] = Diagnosis::all();
        return view('admin.pages.diagnosis', $data);
    }
    public function tambah(Request $request){
        Diagnosis::create([
            'diagnosis' => $request->diagnosis,
            'kode' => $request->kode,
            'bobot' => $request->bobot
        ]);
        return redirect()->route('diagnosis');
    }
    public function edit(Request $request, $id){
        Diagnosis::find($id)->update([
            'diagnosis' => $request->diagnosis,
            'kode' => $request->kode,
            'bobot' => $request->bobot
        ]);
        return redirect()->route('diagnosis');
    }
    public function hapus($id){
        Diagnosis::find($id)->delete();
        return redirect()->route('diagnosis');
    }
}
