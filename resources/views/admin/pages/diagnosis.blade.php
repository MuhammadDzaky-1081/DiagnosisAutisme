@extends('admin.layout.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Diagnosis</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah Data
                        </button>
                    </h4>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Diagnosis</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diagnosis as $no => $d)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $d->kode }}</td>
                                        <td>{{ $d->diagnosis }}</td>
                                        <td>{{ $d->bobot }}</td>
                                        <td>
                                            <button class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $d->id }}">
                                                <i data-feather="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Update"></i>
                                            </button>
                                            <a href="{{ route('diagnosis.hapus', $d->id) }}" class="btn btn-icon btn-danger">
                                                <i data-feather="trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Diagnosis</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                </div>
                                                <form action="{{ route('diagnosis.edit', $d->id) }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <label for="">Kode</label>
                                                                <input type="text" name="kode" value="{{ $d->kode }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <label for="">Diagnosis</label>
                                                                <input type="text" name="diagnosis" value="{{ $d->diagnosis }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <label for="">Bobot</label>
                                                                <input type="number" name="bobot" value="{{ $d->bobot }}" step="0.1" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Diagnosis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <form action="{{ route('diagnosis.tambah') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12 mb-3">
                                <label for="">Kode</label>
                                <input type="text" name="kode" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 mb-3">
                                <label for="">Diagnosis</label>
                                <input type="text" name="diagnosis" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 mb-3">
                                <label for="">Bobot</label>
                                <input type="number" name="bobot" step="0.1"class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
