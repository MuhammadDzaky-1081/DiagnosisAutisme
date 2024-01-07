@extends('admin.layout.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Fuzzifikasi</li>
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
                                    <th rowspan="2">No.</th>
                                    <th rowspan="2">Variabel Kriteria</th>
                                    <th rowspan="2">Kode</th>
                                    <th rowspan="2">Nama Himpunan</th>
                                    <th colspan="4" class="text-center">Batas</th>
                                    <th rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th>Bawah</th>
                                    <th>Tengah 1</th>
                                    <th>Tengah 2</th>
                                    <th>Atas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($himpunan as $no => $h)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $h->kriteria->kriteria }}</td>
                                        <td>{{ $h->kode_himpunan }}</td>
                                        <td>{{ $h->nama_himpunan }}</td>
                                        <td>{{ $h->batas_bawah }}</td>
                                        <td>{{ $h->batas_tengah1 }}</td>
                                        <td>{{ $h->batas_tengah2 }}</td>
                                        <td>{{ $h->batas_atas }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-icon" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $h->id }}">
                                                <i data-feather="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Update"></i>
                                            </button>
                                            <a href="{{ route('himpunan.hapus', $h->id) }}" class="btn btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal{{ $h->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Data Fuzzifikasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                </div>
                                                <form action="{{ route('himpunan.edit', $h->id) }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="">Kriteria</label>
                                                                <select name="kriteria_id" id="" class="form-control">
                                                                    <option value="">-- Choose Option --</option>
                                                                    @foreach ($kriteria as $k)
                                                                        <option value="{{ $k->id }}" {{ $k->id == $h->kriteria_id ? 'selected' : '' }}>{{ $k->kriteria }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="">Kode Himpunan</label>
                                                                <input type="text" name="kode_himpunan" value="{{ $h->kode_himpunan }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <label for="">Nama Himpunan</label>
                                                                <input type="text" name="nama_himpunan" value="{{ $h->nama_himpunan }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="">Batas Atas</label>
                                                                <input type="number" name="batas_atas" value="{{ $h->batas_atas }}" step="0.1" class="form-control">
                                                            </div>
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="">Batas Bawah</label>
                                                                <input type="number" name="batas_bawah" value="{{ $h->batas_bawah }}" step="0.1" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="">Batas Tengah 1</label>
                                                                <input type="number" name="batas_tengah1" value="{{ $h->batas_tengah1 }}" step="0.1" class="form-control">
                                                            </div>
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="">Batas Tengah 2</label>
                                                                <input type="number" name="batas_tengah2" value="{{ $h->batas_tengah2 }}" step="0.1" class="form-control">
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
                    <h5 class="modal-title" id="exampleModalLabel">Data Fuzzifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <form action="{{ route('himpunan.tambah') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="">Kriteria</label>
                                <select name="kriteria_id" id="" class="form-control">
                                    <option value="">-- Choose Option --</option>
                                    @foreach ($kriteria as $k)
                                        <option value="{{ $k->id }}">{{ $k->kriteria }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="">Kode Himpunan</label>
                                <input type="text" name="kode_himpunan" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 mb-3">
                                <label for="">Nama Himpunan</label>
                                <input type="text" name="nama_himpunan" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="">Batas Atas</label>
                                <input type="number" name="batas_atas" step="0.1" class="form-control">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="">Batas Bawah</label>
                                <input type="number" name="batas_bawah" step="0.1" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="">Batas Tengah 1</label>
                                <input type="number" name="batas_tengah1" step="0.1" class="form-control">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="">Batas Tengah 2</label>
                                <input type="number" name="batas_tengah2" step="0.1" class="form-control">
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
