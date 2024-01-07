@extends('pengguna.layout.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Riwayat</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('riwayat.cetak') }}" target="_blank" class="btn btn-sm btn-success">Cetak Riwayat</a>
                    </h4>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Hasil Diagnosis</th>
                                    <th>Akurasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat as $no => $r)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $r->tanggal }}</td>
                                        <td>{{ $r->hasil_diagnosis }}</td>
                                        <td>{{ $r->akurasi_hasil_diagnosis }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
