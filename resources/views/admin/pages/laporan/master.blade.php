<!DOCTYPE html>
<html lang="en">
<?php
function indo($tanggal)
{
    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];

    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

?>

<head>
    @include('admin.layout.header')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-2" align="center">
                <img src="{{ asset('logo/logo.jpg') }}" alt="" style="width:100px; text-align: center;">
            </div>
            <div class="col-md-8 col-8 text-center">
                <h4>KEMENTERIAN KESEHATAN REPUBLIK INDONESIA</h4>
                <h5>DIREKTORAT JENDERAL PELAYANAN KESEHATAN</h5>
                <h6>RUMAH SAKIT UMUM PUSAT DR. M. DJAMIL PADANG</h6>
                <p>Jalan Perintis Kemerdekaan Padang – 2512</p>
                <p>Phone : (0751) 32371, 810253, 810254 Fax : (0751) 32371</p>
                <p>Website : www.rsdjamil.co.id, Email : rsupdjamil@yahoo.com</p>
            </div>
            <div class="col-md-2 col-2">
                <img src="{{ asset('logo/logo2.png') }}" alt="" style="width:100px; text-align: center;">
            </div>
        </div>
        <hr style="background-color: black; width: 100%; height: 10px;">
        <div class="col-md-12">
            <h6 class="text-center mb-3">DATA MASTER DIAGNOSIS AWAL GANGGUAN AUTISME</h6>
            <table class="table-bordered text-center" style="width: 100%;">
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
                            <td>{{ $no + 1 }}</td>
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
                            <td>{{ number_format(round($m->total / $m->diagnosa->bobot, 2), 2) }}</td>
                            <td>{{ $m->solusi->solusi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row mt-3 mb-3">
                <div class="col-md-10"></div>
                <div class="col-md-2" align="center">
                    <p>
                        Padang, {{ indo(date('Y-m-d')) }}
                    </p>
                    <span >{{ $data->jabatan }}</span>
                    <p class="mt-2">
                        <img src="{{ asset('paraf/'.$data->paraf) }}" alt="" style="width:100px;">
                    </p>
                    <p class="mt-2">{{ $data->nama }}</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    @include('admin.layout.script')
</body>

</html>
