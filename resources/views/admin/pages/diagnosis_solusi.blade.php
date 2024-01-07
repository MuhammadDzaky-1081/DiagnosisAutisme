@extends('admin.layout.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Defuzzifikasi Solusi</li>
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
                                    <th>Diagnosis</th>
                                    <th>Solusi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solusi as $no => $d)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $d->diagnosa->diagnosis }}</td>
                                        <td>{{ $d->solusi }}</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $d->id }}">
                                                <i data-feather="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Update"></i>
                                            </button>
                                            <a href="{{ route('solusi.hapus', $d->id) }}" class="btn btn-icon btn-danger">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="exampleModal{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Data Defuzzifikasi Solusi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                </div>
                                                <form action="{{ route('solusi.edit', $d->id) }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="">Diagnosis</label>
                                                                <select name="diagnosa_id" id="" class="form-control">
                                                                    <option value="" disabled selected></option>
                                                                    @foreach ($diagnosa as $dg)
                                                                        <option value="{{ $dg->id }}" {{ $d->diagnosa_id == $dg->id ? 'selected' : '' }}>{{ $dg->diagnosis }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <label for="">Solusi</label>
                                                                <textarea name="solusi" rows="4" class="form-control">{{ $d->solusi }}</textarea>
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
                    <h5 class="modal-title" id="exampleModalLabel">Data Defuzzifikasi Solusi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <form action="{{ route('solusi.tambah') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12 mb-3">
                                <label for="">Diagnosis</label>
                                <select name="diagnosa_id" id="" class="form-control">
                                    <option value="" disabled selected></option>
                                    @foreach ($diagnosa as $d)
                                        <option value="{{ $d->id }}">{{ $d->kode }} | {{ $d->diagnosis }}</option>
                                    @endforeach
                                </select>
                            </div>
                           </div>
                        <div class="row">
                            <div class="col-12 col-md-12 mb-3">
                                <label for="">Solusi</label>
                                <textarea name="solusi" rows="4" class="form-control"></textarea>
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
