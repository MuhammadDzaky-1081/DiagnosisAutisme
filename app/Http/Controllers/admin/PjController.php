<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PjController extends Controller
{
    public function index(){
        $data['data'] = Pj::get()->first();
        return view('admin.pages.penanggu_jawab', $data);
    }
    public function tambah(Request $request){
        $paraf = $request->file('paraf');
        if($paraf){
            $parafname = uniqid().'.'.$paraf->getClientOriginalExtension();
            $paraf->move('paraf', $parafname);
            Pj::create([
                'paraf' => $parafname,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'periode' => $request->periode
            ]);
        }else{
            Pj::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'periode' => $request->periode
            ]);
        }
        return redirect()->back()->with('berhasil', 'Data Berhasil Diupadate');
    }
    public function edit(Request $request, $id){
        $paraf = $request->file('paraf');
        if($paraf){
            $parafname = uniqid().'.'.$paraf->getClientOriginalExtension();
            $paraf->move('paraf', $parafname);
            Pj::find($id)->update([
                'paraf' => $parafname,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'periode' => $request->periode
            ]);
        }else{
            Pj::find($id)->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'periode' => $request->periode
            ]);
        }
        return redirect()->back()->with('berhasil', 'Data Berhasil Diupadate');
    }
}
