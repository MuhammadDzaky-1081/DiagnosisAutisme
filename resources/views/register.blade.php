@extends('utama.app')
@section('content')
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12 ps-md-0 m-2">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <div class="text-center">
                                        <img src="{{ asset('logo/logo2.png ') }}" alt=""
                                            style="width: 100px; border-radius: 50%;">
                                        <a href="#" class="noble-ui-logo d-block mb-2">PENDAFTARAN AKUN</a>
                                    </div>
                                    @if ($message = session('gagal'))
                                        <div class="row">
                                            <div class="col-md-12 col-12" height="1">
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($message = session('warning'))
                                        <div class="row">
                                            <div class="col-md-12 col-12" height="1">
                                                <div class="alert alert-warning" role="alert">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <form class="forms-sample" action="{{ route('postregister') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <label for="">Nama Pengguna</label>
                                            </div>
                                            <div class="col-md-9 col-12 mb-3">
                                                <input type="text" name="nama" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <label for="">Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-9 col-12 mb-3">
                                                <select name="jenis_kelamin" id="" class="form-control">
                                                    <option value="Pria">Pria</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                    <option value="Kelamin Ganda">Kelamin Ganda</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <label for="">Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-9 col-12 mb-3">
                                                <input type="date" name="tgl_lahir" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <label for="">Email atau Telepon</label>
                                            </div>
                                            <div class="col-md-9 col-12 mb-3">
                                                <input type="text" name="email_telepon" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <label for="">Username</label>
                                            </div>
                                            <div class="col-md-9 col-12 mb-3">
                                                <input type="text" name="username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <label for="">Kata Sandi</label>
                                            </div>
                                            <div class="col-md-9 col-12 mb-3">
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <label for="">Konfirmasi Kata Sandi</label>
                                            </div>
                                            <div class="col-md-9 col-12 mb-3">
                                                <input type="password" name="konfirmasi" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <label for="">Status Akun</label>
                                            </div>
                                            <div class="col-md-9 col-12 mb-3">
                                                <select name="status_akun" id="" class="form-control">
                                                    <option value="Pasien">Pasien</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-12" align="right">
                                                <sup class="text-danger">Pastikan Kebenaran Informasi yang Diisikan</sup>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-6 mb-3">
                                                <a href="{{ route('login') }}" class="btn btn-sm btn-secondary">Kembali</a>
                                            </div>
                                            <div class="col-md-6 col-6 mb-3" align="right">

                                                <button type="submit" class="btn btn-sm btn-primary">Daftarkan
                                                    Akun</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
