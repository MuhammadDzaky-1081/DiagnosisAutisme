<?php

use App\Http\Controllers\admin\{
    AturanController,
    DiagnosisController,
    DiagnosissolusiController,
    HimpunanController,
    HomeController,
    KriteriaController,
    LaporanController,
    PasienController,
    PjController,
    ProfilController
};
use App\Http\Controllers\AuthController;
use App\Http\Controllers\pasien\{
    HalamanutamaController,
    KonsultasiController,
    ProfilpasienController
};
use App\Http\Controllers\pengguna\RiwayatController;
use App\Models\Diagnosissolusi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $data['slider'] = DB::table('sliders')->get();
    return view('utama.welcome', $data);
})->name('halaman_utama');
Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::get('register', 'register')->name('register');

    Route::post('postregister', 'postregister')->name('postregister');
    Route::post('postlogin', 'postlogin')->name('postlogin');

    Route::get('logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth:web']], function(){
    Route::controller(HomeController::class)->group(function (){
        Route::get('home', 'index')->name('home');
        Route::get('artikel', 'slider')->name('slider');
        Route::post('artikel/tambah', 'tambah')->name('slider.tambah');
        Route::get('artikel/hapus/{id}', 'hapus')->name('slider.hapus');
    });
    Route::controller(PasienController::class)->group(function(){
        Route::get('data-pengguna', 'index')->name('pengguna');
        Route::get('data-pengguna/hapus/{id}', 'hapus')->name('pengguna.hapus');
    });
    Route::controller(ProfilController::class)->group(function(){
        Route::get('data-profile', 'index')->name('profile');
        Route::post('data-profile/edit/{id}', 'edit')->name('profile.edit');
    });
    Route::controller(KriteriaController::class)->group(function(){
        Route::get('kriteria', 'index')->name('kriteria');
        Route::post('kriteria/tambah', 'tambah')->name('kriteria.tambah');
        Route::post('kriteria/edit/{id}', 'edit')->name('kriteria.edit');
        Route::get('kriteria/hapus/{id}', 'hapus')->name('kriteria.hapus');
    });
    Route::controller(DiagnosisController::class)->group(function(){
        Route::get('diagnosis', 'index')->name('diagnosis');
        Route::post('diagnosis/tambah', 'tambah')->name('diagnosis.tambah');
        Route::post('diagnosis/edit/{id}', 'edit')->name('diagnosis.edit');
        Route::get('diagnosis/hapus/{id}', 'hapus')->name('diagnosis.hapus');
    });
    Route::controller(HimpunanController::class)->group(function(){
        Route::get('himpunan-fuzzifikasi', 'index')->name('himpunan');
        Route::post('himpunan-fuzzifikasi/tambah', 'tambah')->name('himpunan.tambah');
        Route::post('himpunan-fuzzifikasi/edit/{id}', 'edit')->name('himpunan.edit');
        Route::get('himpunan-fuzzifikasi/hapus/{id}', 'hapus')->name('himpunan.hapus');
    });
    Route::controller(AturanController::class)->group(function (){
        Route::get('aturan-inferensi', 'index')->name('aturan');
        Route::get('aturan-inferensi/form', 'form')->name('aturan.form');
        Route::get('aturan-inferensi/form_edit/{id}', 'form_edit')->name('aturan.formedit');
        Route::post('aturan-inferensi/update/{id}', 'edit')->name('aturan.edit');
        Route::post('aturan-inferensi/tambah', 'tambah')->name('aturan.tambah');
        Route::get('aturan-inferensi/hapus/{id}', 'hapus')->name('aturan.hapus');

        Route::get('aturan-inferensi/ambil-bobot', 'ambilbobot_diagnosa')->name('ajax.aturan.ambil_bobot');
    });
    Route::controller(DiagnosissolusiController::class)->group(function(){
        Route::get('defuzzifikasi-solusi', 'index')->name('solusi');
        Route::post('defuzzifikasi-solusi/tambah', 'tambah')->name('solusi.tambah');
        Route::post('defuzzifikasi-solusi/edit/{id}', 'edit')->name('solusi.edit');
        Route::get('defuzzifikasi-solusi/hapus/{id}', 'hapus')->name('solusi.hapus');
    });
    Route::controller(PjController::class)->group(function(){
        Route::get('penanggung-jawab', 'index')->name('pj');
        Route::post('penanggung-jawab/tambah', 'tambah')->name('pj.tambah');
        Route::post('penanggung-jawab/edit/{id}', 'edit')->name('pj.edit');
    });
    Route::controller(LaporanController::class)->group(function(){
        Route::get('pratinjau-master', 'master')->name('laporan.master');
        Route::get('pratinjau-riwayat', 'riwayat')->name('laporan.riwayat');
        Route::get('pratinjau-master/print', 'master_print')->name('laporan.master.print');
        Route::post('pratinjau-riwayat/print', 'riwayat_print')->name('laporan.riwayat.print');
    });
});
Route::group(['middleware' => ['auth:pasien']], function(){
    Route::get('halaman-utama', [HalamanutamaController::class, 'index'])->name('pasien.home');
    Route::controller(ProfilpasienController::class)->group(function(){
        Route::get('profil', 'index')->name('pasien.profil');
        Route::post('profil/edit/{id}', 'edit')->name('pasien.profil.edit');
    });
    Route::controller(KonsultasiController::class)->group(function (){
        Route::get('konsultasi', 'index')->name('konsultasi');
        Route::get('konsultasi/ajax', 'ajaxkonsultasi')->name('konsultasi.ajax.konsultasi');
        Route::get('konsultasi/simpan', 'simpan')->name('konsultasi.simpan');

        Route::post('cetak-konsultasi', 'cetak')->name('konsultasi.cetak');
    });
    Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::get('riwayat/cetak', [RiwayatController::class, 'cetak'])->name('riwayat.cetak');
});
