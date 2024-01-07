@extends('utama.app')
@section('content')
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-4 col-xl-4 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12 ps-md-0 m-2">
                                <div class="auth-form-wrapper px-4 py-5" align="center">
                                    <img src="{{ asset('logo/logo2.png') }}" alt=""
                                        style="width: 100px; border-radius: 50%;">
                                    <a href="#" class="noble-ui-logo d-block mb-2">LOG IN</a>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            @if ($pesan = session('berhasil'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ $pesan }}
                                                </div>
                                            @elseif ($pesan = session('gagal'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $pesan }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <form class="forms-sample" action="{{ route('postlogin') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="username"
                                                placeholder="username">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="password"
                                                autocomplete="current-password" placeholder="Kata Sandi">
                                        </div>
                                        <div class="mb-3">
                                            <select name="status_akun" id="" class="form-control">
                                                <option disabled selected>Status Akun</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Pasien">Pasien</option>
                                            </select>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="btn btn-primary me-2 mb-2 mb-md-0 text-white form-control">Masuk ke
                                                Sistem</button>
                                        </div>
                                        <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Belum Memiliki
                                            Akun?, Ayo <span style="color: blue;">Daftarkan</span></a>
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
