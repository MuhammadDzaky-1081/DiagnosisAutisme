<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index(){
        $data['kriteria'] = Kriteria::all();
        return view('admin.pages.kriteria', $data);
    }
    public function tambah(Request $request){
        Kriteria::create([
            'kriteria' => $request->nama
        ]);
        return redirect()->route('kriteria');
    }
    public function edit(Request $request, $id){
        Kriteria::find($id)->update([
            'kriteria' => $request->nama
        ]);
        return redirect()->route('kriteria');
    }
    public function hapus($id){
        Kriteria::find($id)->delete();
        return redirect()->back();
    }
}
