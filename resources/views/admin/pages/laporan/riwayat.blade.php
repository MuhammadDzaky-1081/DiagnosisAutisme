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
    <div class="container">
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
            <h6 class="text-center mb-3">DATA RIWAYAT PADA TAHUN {{ $tahun }} DIAGNOSIS AWAL GANGGUAN AUTISME
            </h6>
            <table class="table table-bordered">
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
                            <td>{{ $no + 1 }}</td>
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
    @include('admin.layout.script')
</body>

</html>
