@extends('admin.layout.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pratinjau Riwayat</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('laporan.riwayat.print') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <select name="tahun" id="" class="form-control" required>
                                    <option value="" disabled selected>-- Tahun --</option>
                                    @for ($i = 1900; $i <= date('Y')+5; $i++)
                                        <option value="{{ $i++ }}">{{ $i++ }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-3 col-12">
                                <button type="submit" class="btn btn-success">Print</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email atau Telepon</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Hasil Diagnosis</th>
                                    <th>Akurasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat as $no => $r)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $r->pasien->nama_pasien }}</td>
                                        <td>{{ $r->pasien->email_telepon }}</td>
                                        <td>{{ $r->pasien->status_akun }}</td>
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
