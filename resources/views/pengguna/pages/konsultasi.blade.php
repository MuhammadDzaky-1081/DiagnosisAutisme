@extends('pengguna.layout.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Konsultasi</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7 col-12">
                            @foreach ($kriteria as $no => $k)
                                @php
                                    $gejala = DB::table('himpunanfuzzifikasis')
                                        ->where('kriteria_id', $k->id)
                                        ->get();
                                @endphp
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for="">{{ $k->kriteria }}</label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <select name="himpunan_id" data-id="{{ $no }}"
                                            class="form-control himpunan">
                                            <option value="" disabled selected></option>
                                            @foreach ($gejala as $no => $g)
                                                <option value="{{ $g->id }}">{{ $g->kode_himpunan }} |
                                                    {{ $g->nama_himpunan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-5 col-12">
                            <canvas id="chartjsBar"></canvas>
                        </div>
                        <hr>
                        <input type="hidden" id="no_aturan">
                        <input type="hidden" id="h1">
                        <input type="hidden" id="h2">
                        <input type="hidden" id="h3">
                        <input type="hidden" id="h4">
                        <input type="hidden" id="h5">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label for="">Hasil Diagnosis</label>
                                    </div>
                                    <div class="col-md-12 col-12 mb-3">
                                        <input type="text" name="" id="diagnosa" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label for="">Akurasi Hasil Diagnosis</label>
                                    </div>
                                    <div class="col-md-12 col-12 mb-3">
                                        <input type="text" name="" id="akurasi" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label for="">Solusi Penanganan</label>
                                    </div>
                                    <div class="col-md-12 col-12 mb-3">
                                        <textarea name="" id="solusi" rows="5" readonly class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <form action="{{ route('konsultasi.cetak') }}" method="post" target="_blank">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="row mt-3">
                                <div class="col-md-4 col-6 mb-3" align="left">
                                    <a id="diagnosis" class="btn btn-primary">Diagnosis Data Konsultasi</a>
                                </div>
                                <div class="col-md-4 col-6 mb-3" align="center">
                                    <button type="submit" class="btn btn-success">Cetak Hasil Konsultasi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.2/chart.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#himpunan_id").change(function(e) {
                e.preventDefault();
                var id = e.target.value;
            });
            $("#diagnosis").click(function(e) {
                var himpunan_id = [];
                $(".himpunan").each(function() {
                    var nama = $(this).val();
                    himpunan_id.push(nama);
                });
                $.ajax({
                    type: "get",
                    url: "{{ route('konsultasi.ajax.konsultasi') }}",
                    data: {
                        himpunan_id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            var diagnosa = $("#diagnosa").val(data.diagnosa.diagnosis);
                            var akurasi = $("#akurasi").val(data.total);
                            var solusi = $("#solusi").val(data.solusi.solusi);
                            var id = $("#id").val(data.id);
                        }

                        $(function() {
                            'use strict';


                            var colors = {
                                primary: "#6571ff",
                                secondary: "#7987a1",
                                success: "#05a34a",
                                info: "#66d1d1",
                                warning: "#fbbc06",
                                danger: "#ff3366",
                                light: "#e9ecef",
                                dark: "#060c17",
                                muted: "#7987a1",
                                gridBorder: "rgba(77, 138, 240, .15)",
                                bodyColor: "#000",
                                cardBg: "#fff"
                            }

                            var fontFamily = "'Roboto', Helvetica, sans-serif"


                            // var r = $("#diagnosa").val();;

                            // Bar chart
                            if ($('#chartjsBar').length) {
                                new Chart($("#chartjsBar"), {
                                    type: 'line',
                                    data: {
                                        labels: [data.diagnosa.diagnosis],
                                        datasets: [{
                                            label: "Population",
                                            backgroundColor: [colors
                                                .primary, colors
                                                .danger, colors
                                                .warning, colors
                                                .success, colors
                                                .info
                                            ],
                                            data: [data.total],
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: false
                                            },
                                        },
                                        scales: {
                                            x: {
                                                display: true,
                                                grid: {
                                                    display: true,
                                                    color: colors.gridBorder,
                                                    borderColor: colors
                                                        .gridBorder,
                                                },
                                                ticks: {
                                                    color: colors.bodyColor,
                                                    font: {
                                                        size: 12
                                                    }
                                                }
                                            },
                                            y: {
                                                grid: {
                                                    display: true,
                                                    color: colors.gridBorder,
                                                    borderColor: colors
                                                        .gridBorder,
                                                },
                                                ticks: {
                                                    color: colors.bodyColor,
                                                    font: {
                                                        size: 12
                                                    }
                                                }
                                            }
                                        }
                                    }
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
