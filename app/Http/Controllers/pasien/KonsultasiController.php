<?php

namespace App\Http\Controllers\pasien;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Diagnosis;
use App\Models\Kriteria;
use App\Models\Pj;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index()
    {
        $data['kriteria'] = Kriteria::all();
        return view('pengguna.pages.konsultasi', $data);
    }
    public function ajaxkonsultasi(Request $request)
    {
        $data = Aturan::with('diagnosa', 'solusi')
            ->where('h1', $request->himpunan_id[0])
            ->where('h2', $request->himpunan_id[1])
            ->where('h3', $request->himpunan_id[2])
            ->where('h4', $request->himpunan_id[3])
            ->where('h5', $request->himpunan_id[4])
            ->get()
            ->first();
        if ($data) {
            // $akurasi = number_format(round(($data->total / $data->diagnosa->bobot), 2), 2);


            // $diagnosa = Diagnosis::all();

            // $hasilakhir = '';
            // $minselisih = PHP_INT_MAX;

            // foreach($diagnosa as $value){
            //     $selisih = abs($value->bobot - $akurasi);
            //     if($selisih < $minselisih){
            //         $hasilakhir = $value->bobot;
            //         $minselisih = $selisih;
            //     }
            // }
            $aturan = Aturan::with('diagnosa', 'solusi')
                ->where('total', $data->total)
                ->where('id', '!=', $data->id)
                ->get()->first();

            Riwayat::create([
                'pasien_id' => Auth::user()->id,
                'no_aturan' => $data->no_aturan,
                'h1' => $data->h1,
                'h2' => $data->h2,
                'h3' => $data->h3,
                'h4' => $data->h4,
                'h5' => $data->h5,
                'hasil_diagnosis' => $data->diagnosa->diagnosis,
                'diagnosa_lain' => $aturan->diagnosa->diagnosis,
                'akurasi_hasil_diagnosis' => $data->total,
                'akurasi_diagnosis_lain' => $data->total,
                'solusi' => $data->solusi->solusi,
                'solusi_diagnosa_lain' => $aturan->solusi->solusi,
                'tanggal' => date('Y-m-d'),
                'akurasi_diagnosa_lain' => $data->total
            ]);
        }
        if ($data) {
            $a = $data;
        } else {
            $d = [
                'diagnosa' => [
                    'diagnosis' => 'Tidak Hasil Diagnosa'
                ],
                'solusi' => [
                    'solusi' => ''
                ],
                'total' => ''
            ];
            $a = $d;
        }
        return response()->json($a);
    }
    public function cetak(Request $request){
        $data['data'] = Pj::get()->first();
        $data['data'] = Aturan::with('riwayat.pasien')->where('id', $request->id)->get()->first();
        return view('pengguna.pages.cetak_konsultasi', $data);
    }
}
