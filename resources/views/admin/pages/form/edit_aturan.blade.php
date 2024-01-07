@extends('admin.layout.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('aturan') }}">Data Aturan Inferensi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('aturan.edit', $data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            @if ($pesan = session('berhasil'))
                                <div class="alert alert-success" role="alert">{{ $pesan }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-3">
                                        <label for="">Hasil Diagnosis</label>
                                        <select name="diagnosa_id" id="diagnosis_id" class="form-control">
                                            <option value="" disabled selected></option>
                                            @foreach ($diagnosis as $d)
                                                <option value="{{ $d->id }}" {{ $data->diagnosa_id == $d->id ? 'selected' : '' }}>{{ $d->kode }} | {{ $d->diagnosis }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" id="bobot">
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="">a-Predikat</label>
                                        <input type="text" name="a_predikat" value="{{ $data->a_predikat }}" id="a_predikat" step="0.11" class="form-control">
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="">Z-Score</label>
                                        <input type="text" name="z_score" id="z_score" value="{{ $data->z_score }}" class="form-control" step="0.1">
                                    </div>
                                </div>
                                <div class="row" id="inputhasil">
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="">Hasil</label>
                                        <input type="text" name="total" id="hasil" value="{{ $data->total }}" readonly class="form-control">
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="">Hasil Akurasi</label>
                                        <input type="text" name="hasil_akurasi" id="hasil_akurasi" value="{{ $data->hasil_akurasi }}" readonly class="form-control">
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="">Persentase (%)</label>
                                        <input type="text" name="persentase" id="persentase" value="{{ $data->persentase }}" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-3">
                                        <a id="hitungdata" class="form-control btn btn-sm btn-primary">Hitung Data</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="">Operator</label>
                                        <select name="operator" id="" class="form-control" required>
                                            <option value="" disabled selected></option>
                                            <option value="AND" {{ $data->operator == 'AND' ? 'selected' : '' }}>AND</option>
                                            <option value="OR" {{ $data->operator == 'OR' ? 'selected' : '' }}>OR</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="">Nomor Aturan</label>
                                        <input type="text" name="no_aturan" value="{{ $data->no_aturan }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-6 mb-3">
                                        <a href="{{ route('aturan') }}" class="btn btn-secondary form-control">Kembali</a>
                                    </div>
                                    <div class="col-md-6 col-6 mb-3" align="right">
                                        <button class="btn btn-primary form-control" type="submit">Simpan</button>
                                    </div>
                                </div>
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
            $("#inputhasil").show();
            $("#hitungdata").click(function () {
                var a_predikat = $("#a_predikat").val();
                var z_score = $("#z_score").val();
                var bobot = $("#bobot").val();
                var hasil = (a_predikat * z_score).toFixed(4);
                var hasil_akurasi = hasil / bobot;

                $("#persentase").val((hasil_akurasi * 100).toFixed(2));
                $("#hasil").val(hasil);
                $("#hasil_akurasi").val(hasil_akurasi.toFixed(4));
                $("#inputhasil").show();
            });

            $("#diagnosis_id").change(function (e) {
                var id = e.target.value;
                $.ajax({
                    type: "get",
                    url: "{{ route('ajax.aturan.ambil_bobot') }}",
                    data: {id},
                    dataType: "json",
                    success: function (data) {
                        $("#bobot").val(data.bobot);
                    }
                });
            });
        });
    </script>
@endsection
