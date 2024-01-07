@extends('admin.layout.app')
@section('content')
    @php
        if($data){
            $periode = $data->periode;
            $nama = $data->nama;
            $jabatan = $data->jabatan;
            $paraf = asset('paraf/'.$data->paraf);
        }else{
            $periode = '';
            $nama = '';
            $jabatan = '';
            $paraf = '';
        }
    @endphp
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Penanggung Jawab</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if ($data)
                        <form class="forms-sample" action="{{ route('pj.edit', $data->id) }}" method="post" enctype="multipart/form-data">
                    @else
                        <form class="forms-sample" action="{{ route('pj.tambah') }}" method="post" enctype="multipart/form-data">
                    @endif
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
                                <label for="">Nama Penanggung Jawab</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="nama" id="nama" value="{{ $nama }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Periode Penanggung Jawab</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="date" name="periode" id="periode" value="{{ $periode }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Jabatan Penanggung Jawab</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="jabatan" id="jabatan" value="{{ $jabatan }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Paraf Penanggung Jawab</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="file" name="paraf" id="paraf" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12"></div>
                            <div class="col-md-9 col-12">
                                <img src="{{ $paraf }}" alt="" style="width:100px;">
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-md-6 col-6" align="center">
                                <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col-md-6 col-6" align="center">
                                <a id="edit" class="btn btn-warning">Edit</a>
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
            $("#nama").attr('disabled', true);
            $("#periode").attr('disabled', true);
            $("#jabatan").attr('disabled', true);
            $("#paraf").attr('disabled', true);
            $("#simpan").attr('disabled', true);

            $("#edit").click(function () {
                $("#nama").attr('disabled', false);
                $("#periode").attr('disabled', false);
                $("#jabatan").attr('disabled', false);
                $("#paraf").attr('disabled', false);
                $("#simpan").attr('disabled', false);
                $("#edit").attr('disabled', true);
            });
        });
    </script>
@endsection
