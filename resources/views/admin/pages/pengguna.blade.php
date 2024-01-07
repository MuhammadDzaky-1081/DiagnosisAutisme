@extends('admin.layout.app')
@section('content')
    @include('admin.layout.tgl_indo')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pengguna</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Email atau Telepon</th>
                                    <th>Username</th>
                                    <th>Status Akun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengguna as $no => $p)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $p->nama_pasien }}</td>
                                        <td>{{ $p->jenis_kelamin }}</td>
                                        <td>{{ indo($p->tanggal_lahir) }}</td>
                                        <td>{{ $p->email_telepon }}</td>
                                        <td>{{ $p->username }}</td>
                                        <td>{{ $p->status_akun }}</td>
                                        <td>
                                            <a href="{{ route('pengguna.hapus', $p->id) }}" class="btn btn-danger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
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
