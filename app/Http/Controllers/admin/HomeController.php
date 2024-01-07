<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use PDO;

class HomeController extends Controller
{
    public function index(){
        $data['slider'] = Slider::all();
        return view('admin.pages.home', $data);
    }
    public function slider(){
        $data['slider'] = Slider::all();
        return view('admin.pages.slider', $data);
    }
    public function tambah(Request $request){
        $request->validate([
            'slider' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $foto= $request->file('slider');
        $fotoname = uniqid().'.'.$foto->getClientOriginalExtension();
        $foto->move('slider', $fotoname);

        Slider::create([
            'slider' => $fotoname
        ]);
        return redirect()->route('slider');
    }
    public function hapus($id){
        Slider::find($id)->delete();
        return redirect()->back();
    }
}
