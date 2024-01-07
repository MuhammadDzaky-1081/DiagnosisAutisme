<?php

namespace App\Http\Controllers\pasien;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HalamanutamaController extends Controller
{
    public function index(){
        $data['slider'] = Slider::all();
        return view('pengguna.pages.halaman_utama', $data);
    }
}
