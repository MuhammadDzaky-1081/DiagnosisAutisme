@extends('admin.layout.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Aturan Inferensi</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('aturan.form') }}" class="btn btn-sm btn-primary">
                            Tambah Data
                        </a>
                    </h4>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor</th>
                                    <th>Aturan</th>
                                    <th>a-Predikat</th>
                                    <th>Z-Score</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aturan as $no => $a)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $a->no_aturan }}</td>
                                        <td>IF
                                            {{ $a->h1 ?? 'null' }} {{ $a->operator }}
                                            {{ $a->h2 ?? 'null' }} {{ $a->operator }}
                                            {{ $a->h3 ?? 'null' }} {{ $a->operator }}
                                            {{ $a->h4 ?? 'null' }} {{ $a->operator }}
                                            {{ $a->h5 ?? 'null' }}
                                            THEN
                                            {{ $a->diagnosa->kode }}
                                        </td>
                                        <td>{{ $a->a_predikat }}</td>
                                        <td>{{ $a->z_score }}</td>
                                        <td>
                                            <a href="{{ route('aturan.formedit', $a->id) }}" class="btn btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Update">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a href="{{ route('aturan.hapus', $a->id) }}" class="btn btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Update">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
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
