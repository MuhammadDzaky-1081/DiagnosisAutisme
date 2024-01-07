@extends('admin.layout.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pratinjau Master</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('laporan.master.print') }}" target="_blank" class="btn btn-success">Print</a>
                    </h4>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Aturan</th>
                                    <th>a Predikat</th>
                                    <th>Z Score</th>
                                    <th>Diagnosis</th>
                                    <th>Akurasi</th>
                                    <th>Solusi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($master as $no => $m)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>IF
                                            {{ $m->h1 ?? 'null' }} {{ $m->operator }}
                                            {{ $m->h2 ?? 'null' }} {{ $m->operator }}
                                            {{ $m->h3 ?? 'null' }} {{ $m->operator }}
                                            {{ $m->h4 ?? 'null' }} {{ $m->operator }}
                                            {{ $m->h5 ?? 'null' }}
                                            THEN
                                            {{ $m->diagnosa->kode }}
                                        </td>
                                        <td>{{ $m->a_predikat }}</td>
                                        <td>{{ $m->z_score }}</td>
                                        <td>{{ $m->diagnosa->diagnosis }}</td>
                                        <td>{{ number_format(round(($m->total / $m->diagnosa->bobot),2),2) }}</td>
                                        <td>{{ $m->solusi->solusi }}</td>
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
