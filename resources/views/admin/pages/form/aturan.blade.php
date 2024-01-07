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
                    <form action="{{ route('aturan.tambah') }}" method="post">
                        @csrf
                        <div class="row">
                            @if ($pesan = session('berhasil'))
                                <div class="alert alert-success" role="alert">{{ $pesan }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                @foreach ($kriteria as $no => $k)
                                    @php
                                        $gejala = DB::table('himpunanfuzzifikasis')
                                            ->where('kriteria_id', $k->id)
                                            ->get();
                                    @endphp
                                    {{-- <input type="hidden" name="kriteria_id[{{ $k->id }}]" value="{{ $k->id }}"> --}}
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label for="">{{ $k->kriteria }}</label>
                                            <select name="himpunan_id[{{ $k->id }}]" id="" class="form-control">
                                                <option value="" disabled selected></option>
                                                @foreach ($gejala as $no => $g)
                                                    <option value="{{ $g->id }}">{{ $g->kode_himpunan }} | {{ $g->nama_himpunan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-3">
                                        <label for="">Hasil Diagnosis</label>
                                        <select name="diagnosa_id" id="diagnosis_id" class="form-control">
                                            <option value="" disabled selected></option>
                                            @foreach ($diagnosis as $d)
                                                <option value="{{ $d->id }}">{{ $d->kode }} | {{ $d->diagnosis }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" id="bobot">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="">a-Predikat</label>
                                        <input type="text" name="a_predikat" id="a_predikat" step="0.11" class="form-control">
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="">Z-Score</label>
                                        <input type="text" name="z_score" id="z_score" class="form-control" step="0.1">
                                    </div>
                                </div>
                                <div class="row" id="inputhasil">
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="">Hasil</label>
                                        <input type="text" name="total" id="hasil" readonly class="form-control">
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="">Hasil Akurasi</label>
                                        <input type="text" name="hasil_akurasi" id="hasil_akurasi" readonly class="form-control">
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="">Persentase (%)</label>
                                        <input type="text" name="persentase" id="persentase" readonly class="form-control">
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
                                            <option value="AND">AND</option>
                                            <option value="OR">OR</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="">Nomor Aturan</label>
                                        <input type="text" name="no_aturan" class="form-control">
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
            $("#inputhasil").hide();
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
