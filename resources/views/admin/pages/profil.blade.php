@extends('admin.layout.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Profil</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('profile.edit', $data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">
                                @if ($pesan = session('gagal'))
                                    <div class="alert alert-danger" role="alert">{{ $pesan }}</div>
                                @elseif ($pesan = session('berhasil'))
                                    <div class="alert alert-success" role="alert">{{ $pesan }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Nama Pengguna</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="nama" value="{{ $data->nama_pengguna }}" id="nama" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" id="jk_hide" value="{{ $data->jenis_kelamin }}" class="form-control">
                                <select name="jk" id="jk_show" class="form-control">
                                    <option value="Pria" {{ $data->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="Perempuan"  {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    <option value="Kelamin Ganda"  {{ $data->jenis_kelamin == 'Kelamin Ganda' ? 'selected' : '' }}>Kelamin Ganda</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Tanggal Lahir</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ $data->tanggal_lahir }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Email atau Telepon</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="email" id="email" value="{{ $data->email_telepon }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Username</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="username" id="username" value="{{ $data->username }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Kata Sandi</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="password" name="password" id="password" placeholder="Masukkan password baru" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Konfirmasi Kata Sandi</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="password" name="konformasi" id="konfirmasi" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Status Akun</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" id="status" value="{{ $data->status_akun }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12"></div>
                            <div class="col-md-3 col-6 mb-3">
                                <button type="submit" id="btnsimpan" class="btn btn-sm btn-primary">Simpan Profil</button>
                            </div>
                            <div class="col-md-3 col-6 mb-3" align="right">
                                <a id="cancel" id="cancel" class="btn btn-sm btn-secondary">Cancel</a>
                            </div>
                            <div class="col-md-3 col-6 mb-3" align="right">
                                <a id="editprofil" class="btn btn-sm btn-primary">Edit Profil</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#jk_show").hide();
            $("#cancel").hide();

            $("#nama").attr('disabled', true);
            $("#jk_hide").attr('disabled', true);
            $("#tgl_lahir").attr('disabled', true);
            $("#password").attr('disabled', true);
            $("#konfirmasi").attr('disabled', true);
            $("#email").attr('disabled', true);
            $("#status").attr('disabled', true);
            $("#username").attr('disabled', true);
            $("#btnsimpan").attr('disabled', true);

            $("#editprofil").click(function () {
                $("#jk_show").show();
                $("#cancel").show();

                $("#jk_hide").hide();

                $("#editprofil").hide();

                $("#nama").removeAttr('disabled', false);
                $("#jk_hide").removeAttr('disabled', false);
                $("#tgl_lahir").removeAttr('disabled', false);
                $("#password").removeAttr('disabled', false);
                $("#email").removeAttr('disabled', false);
                $("#username").removeAttr('disabled', false);
                $("#btnsimpan").removeAttr('disabled', false);

                $("#password").keyup(function () {
                    $("#konfirmasi").removeAttr('disabled', false);
                });
            });

            $("#cancel").click(function () {
                $("#jk_show").hide();
                $("#cancel").hide();
                $("#editprofil").show();
                $("#jk_hide").show();

                $("#password").val('');

                $("#nama").attr('disabled', true);
                $("#jk_hide").attr('disabled', true);
                $("#tgl_lahir").attr('disabled', true);
                $("#password").attr('disabled', true);
                $("#konfirmasi").attr('disabled', true);
                $("#email").attr('disabled', true);
                $("#status").attr('disabled', true);
                $("#username").attr('disabled', true);
                $("#btnsimpan").attr('disabled', true);
            });
        });
    </script>
@endsection
